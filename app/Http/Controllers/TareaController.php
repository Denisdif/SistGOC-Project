<?php

namespace App\Http\Controllers;

use App\DataTables\TareaDataTable;
use App\Models\Proyecto;
use App\Models\Tarea;
use App\Models\Personal;
use App\Models\AsignacionPersonalTarea;
use App\Models\Entrega;
use App\Models\Comentario;
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

class TareaController extends AppBaseController
{
    /** @var  TareaRepository */
    private $tareaRepository;

    public function __construct(TareaRepository $tareaRepo)
    {
        $this->tareaRepository = $tareaRepo;
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
        return view('tareas.create',compact('proyecto'));
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
        $input = $request->all();

        $tarea = $this->tareaRepository->create($input);

        $tarea->Proyecto_id = $proyecto->id;

        $tarea->Estado_tarea_id = 1;

        $tarea->save();

        Flash::success('Tarea saved successfully.');

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

        if (empty($tarea)) {
            Flash::error('Tarea not found');

            return redirect(route('tareas.index'));
        }

        $user = Auth::user();

        $asignaciones = AsignacionPersonalTarea::all()->where('Tarea_id','=', $id);

        //Se cambia el estado de la tarea y la fecha de inicio cuando el desarrollador visualiza los datos

        if ($tarea->Estado_tarea_id < 3) {
            foreach ($asignaciones as $asignacion) {
                if ((($asignacion->Responsabilidad == "Desarrollador")) and (($asignacion->Personal_id) == ($user->Personal_id))){
                    $tarea->Estado_tarea_id = 3;
                    getdate($fechaActual = time());
                    $tarea->Fecha_inicio = $fechaActual;
                    $tarea->save();
                }
            }
        }


        //-----------------------------------------------------------------------------

        $comentarios = Comentario::all()->where('Tarea_id','=', $id);
        $entregas = Entrega::all()->where('Tarea_id','=', $id);
        $listaPersonal = Personal::all();


        return view('tareas.show', compact('asignaciones','listaPersonal','entregas', 'comentarios'))->with('tarea', $tarea);
    }

    /**
     * Show the form for editing the specified Tarea.
     *
     * @param  int $id
     *
     * @return Response
     */
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

    /**
     * Update the specified Tarea in storage.
     *
     * @param  int              $id
     * @param UpdateTareaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTareaRequest $request)
    {
        $tarea = $this->tareaRepository->find($id);

        if (empty($tarea)) {
            Flash::error('Tarea not found');

            return redirect(route('proyectos.index'));
        }

        $tarea = $this->tareaRepository->update($request->all(), $id);

        Flash::success('Tarea updated successfully.');

        return redirect(route('proyectos.show', $tarea->Proyecto_id));
    }

    /**
     * Remove the specified Tarea from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
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

        Flash::success('Tarea deleted successfully.');

        return redirect()->back();

        //return redirect(route('proyectos.show', $idProyecto, compact('proyecto')));
    }

    public function aprobar($id)
    {
        $tarea = $this->tareaRepository->find($id);
        $tarea->Estado_tarea_id = 6;
        $tarea->save();
        return redirect()->back();
    }

    public function desaprobar($id)
    {
        $tarea = $this->tareaRepository->find($id);
        $tarea->Estado_tarea_id = 5;
        $tarea->save();
        return redirect()->back();
    }
}
