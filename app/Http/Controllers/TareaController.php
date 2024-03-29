<?php

namespace App\Http\Controllers;

use App\DataTables\TareaDataTable;
use App\Models\Proyecto;
use App\Models\Tarea;
use App\Models\Personal;
use App\Models\AsignacionPersonalTarea;
use App\Models\Entrega;
use App\Models\Comentario;
use App\Models\Predecesora;
use App\Models\Estado_tarea;
use App\Models\Tipo_tarea;
use App\Models\Proyecto_ambiente;
use App\Http\Requests;
use App\Http\Requests\CreateTareaRequest;
use App\Http\Requests\UpdateTareaRequest;
use App\Repositories\TareaRepository;
use Illuminate\Support\Facades\Auth;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use Carbon\Carbon;

class TareaController extends AppBaseController
{
    /** @var  TareaRepository */
    private $tareaRepository;

    public function __construct(TareaRepository $tareaRepo)
    {
        $this->tareaRepository = $tareaRepo;
        Carbon::setLocale('es');
    }

    /**
     * Display a listing of the Tarea.
     *
     * @param TareaDataTable $tareaDataTable
     * @return Response
     */
    public function index(TareaDataTable $tareaDataTable)
    {
        return $tareaDataTable->render('tareas.index');
    }

    /**
     * Show the form for creating a new Tarea.
     *
     * @return Response
     */
    public function create(Proyecto $proyecto)
    {
        $tareas = Tarea::all()->where('Proyecto_id', '=', $proyecto->id);
        return view('tareas.create',compact('proyecto', 'tareas'));
    }

    /**
     * Store a newly created Tarea in storage.
     *
     * @param CreateTareaRequest $request
     *
     * @return Response
     */
    public function store(Proyecto $proyecto, CreateTareaRequest $request)
    {

        $tarea = new Tarea;
        $tarea->Nombre_tarea = $request->nombre;

        if ($request->nombre == '') {

            $tareaSeleccionada = Tarea::all()->find($request->Nombre_tarea);
            $tarea->Nombre_tarea = $tareaSeleccionada->Nombre_tarea;

        }

        $tarea->Tipo_tarea_id = $request->Tipo_tarea_id;
        $tarea->Fecha_limite = $request->Fecha_limite;
        $tarea->Prioridad = "Normal";
        $tarea->Correcciones = 'false';
        $tarea->Proyecto_id = $proyecto->id;
        $tarea->Estado_tarea_id = 1; // 1 id estado tarea = creada
        $tarea->save();

        if ($request->Predecesoras) {
            for ($i=0; $i < sizeof($request->Predecesoras); $i++) {
                $predecesora = new Predecesora();
                $predecesora->Tarea_id = $tarea->id;
                $predecesora->Predecesora_id = $request->Predecesoras[$i];
                $predecesora->save();
            }
        }

        Flash::success('Se realizó con éxito la carga de la tarea');

        return redirect(route('proyectos.show', $proyecto->id, compact('proyecto')));
    }

    /**
     * Display the specified Tarea.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tarea = $this->tareaRepository->find($id);
        $proyecto = Proyecto::all()->find($tarea->Proyecto_id);

        if (empty($tarea)) {
            Flash::error('Tarea not found');

            return redirect(route('tareas.index'));
        }

        $user = Auth::user();

        $asignaciones = AsignacionPersonalTarea::all()->where('Tarea_id','=', $id);

        //Se cambia el estado de la tarea y la fecha de inicio cuando el desarrollador visualiza los datos

        if ($tarea->Estado_tarea_id == 2) {
            foreach ($asignaciones as $asignacion) {
                if ((($asignacion->Personal_id) == ($user->Personal_id))){
                    $tarea->Estado_tarea_id = 3;
                    getdate($fechaActual = time());
                    $tarea->Fecha_inicio = $fechaActual;
                    Flash::success('La tarea pasó a estar en estado de desarrollo');

                    $tarea->save();

                    if ($proyecto->Estado_proyecto == "Creado") {
                        $proyecto->Estado_proyecto = "En desarrollo";
                        $proyecto->save();
                    }
                }
            }
        }


        //-----------------------------------------------------------------------------

        $comentarios = Comentario::all()->where('Tarea_id','=', $id);
        $entregas = Entrega::all()->where('Tarea_id','=', $id);
        $listaPersonal = Personal::all();


        return view('tareas.show', compact('asignaciones','listaPersonal','entregas', 'comentarios'))->with('tarea', $tarea);
    }

    public function edit($id)
    {
        $tarea = $this->tareaRepository->find($id);

        if (empty($tarea)) {
            Flash::error('Tarea not found');

            return redirect(route('tareas.index'));
        }

        $proyecto = Proyecto::all()->where('id','=', $tarea->Proyecto_id)->first();

        return view('tareas.edit', compact('proyecto'))->with('tarea', $tarea);
    }

    public function update($id, UpdateTareaRequest $request)
    {
        $tarea = $this->tareaRepository->find($id);

        if (empty($tarea)) {
            Flash::error('Tarea not found');

            return redirect(route('proyectos.index'));
        }

        $tarea = $this->tareaRepository->update($request->all(), $id);

        Flash::success('Se realizó con éxito la actualización de datos de la tarea');

        return redirect(route('proyectos.show', $tarea->Proyecto_id));
    }

    public function destroy($id)
    {

         /* INICIO obtencion del id del proyecto actual

         $lista = Tarea::all();
         $idProyecto = 0;
         foreach ($lista as $item) {
             if ($item->id == $id){
                 $idProyecto = $item->Proyecto_id;
             }
         }

         FIN obtencion del id del proyecto actual*/

        $tarea = $this->tareaRepository->find($id);

        if (empty($tarea)) {

            Flash::error('Tarea not found');

            return redirect()->back();

            //return redirect(route('proyectos.show', $idProyecto, compact('proyecto')));
        }

        $this->tareaRepository->delete($id);

        $asignaciones = AsignacionPersonalTarea::all()->where('Tarea_id','=', $id);

        foreach ($asignaciones as $asignacion) {
            $asignacion->delete($asignacion->Tarea_id);
        }

        Flash::success('La tarea se eliminó con éxito');

        return redirect()->back();

        //return redirect(route('proyectos.show', $idProyecto, compact('proyecto')));
    }

    public function aprobar($id)
    {
        $tarea = $this->tareaRepository->find($id);
        if ($tarea->Estado_tarea_id == 4) {
            $tarea->Estado_tarea_id = 6;
            $tarea->save();
            Flash::success('La tarea fue aprobada con éxito');
            return redirect()->back();
        }
        return "Sacar botón";
    }

    public function desaprobar($id)
    {
        $tarea = $this->tareaRepository->find($id);
        if ($tarea->Estado_tarea_id == 4) {
            $tarea->Estado_tarea_id = 5;
            $tarea->save();
            Flash::success('La tarea fue desaprobada con éxito y espera las respectivas correcciones');
            return redirect()->back();
        }
        return "Sacar botón";
    }

    public function autoAsignar($id)
    {
        $tarea = Tarea::all()->find($id);
        $tarea->asignacion_inteligente();
        return "Se asignaron responables";
    }

    public function obtenerTareas( $tipo)
    {

        $tipo = Tipo_tarea::all()->find($tipo );

        $tareasPorTipo = [];
        foreach ($tipo->Tarea as $item) {
            $agregar = true;
            foreach ($tareasPorTipo as $item2) {
                if ($item2->Nombre_tarea == $item->Nombre_tarea) {
                    $agregar = false;
                }
            }
            if ($agregar) {
                $tareasPorTipo[] = $item;
            }
        }
        return $tareasPorTipo;
    }
}
