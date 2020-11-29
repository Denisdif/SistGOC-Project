<?php

namespace App\Http\Controllers;

use App\DataTables\ProyectoDataTable;
use App\Models\Tarea;
use App\Models\Proyecto;
use App\Models\Direccion;
use App\Models\Personal;
use App\Models\AsignacionPersonalTarea;
use App\Models\Comitente;
use App\Models\ambiente;
use App\Models\Estado_tarea;
use App\Models\Tipo_tarea;
use App\Models\Tipo_proyecto;
use App\Http\Requests\CreateProyectoRequest;
use App\Http\Requests\UpdateProyectoRequest;
use Illuminate\Http\Request;
use App\Repositories\ProyectoRepository;
use App\Models\Proyecto_ambiente;
use App\Http\Controllers\AppBaseController;
use Cardumen\ArgentinaProvinciasLocalidades\Models\Pais;
use Illuminate\Support\Facades\Auth;
use Response;
use Redirect;
use Exception;
use Flash;
use App\Http\Requests;
use Carbon\Carbon;

class ProyectoController extends AppBaseController
{
    /** @var  ProyectoRepository */
    private $proyectoRepository;

    public function __construct(ProyectoRepository $proyectoRepo)
    {
        $this->proyectoRepository = $proyectoRepo;
    }

    /**
     * Display a listing of the Proyecto.
     *
     * @param ProyectoDataTable $proyectoDataTable
     * @return Response
     */
    public function index(Request $request)
    {
        $proyectos = Proyecto::all();

        if (Auth::user()->Rol_id == 2) {
            $proyectos = Proyecto::all()->where('Director_id', '=', Auth::user()->Personal_id);
        }

        return View('proyectos.index', compact('proyectos'));
    }

    /**
     * Show the form for creating a new Proyecto.
     *
     * @return Response
     */
    public function create()
    {
        $paises = Pais::all();
        return view('proyectos.create', compact('paises'));
    }

    /**
     * Store a newly created Proyecto in storage.
     *
     * @param CreateProyectoRequest $request
     *
     * @return Response
     */
    public function store(CreateProyectoRequest $request)
    {

        try {
            if (sizeof($request->Cantidad) == 0) {
                Flash::error('No se cargaron ambientes al proyecto');
                return Redirect::back()->withInput();
            }
        } catch (Exception $e) {
                Flash::error('No se cargaron ambientes al proyecto');
                return Redirect::back()->withInput();
        }


        $direccion = new Direccion();
        $direccion->Calle = $request->Calle ;
        $direccion->Altura = $request->Altura ;
        $direccion->Codigo_postal = $request->Codigo_postal ;
        $direccion->Pais_id = $request->pais_id ;
        $direccion->Provincia_id = $request->provincia_id ;
        $direccion->Localidad_id = $request->localidad_id ;

        $proyecto = new Proyecto;
        $proyecto->Nombre_proyecto = "Proy".$proyecto->id;
        $proyecto->Estado_proyecto = "Creado";
        $proyecto->Tipo_proyecto_id = $request->Tipo_proyecto_id;
        $proyecto->Fecha_inicio_Proy = Carbon::now();
        $proyecto->Fecha_fin_Proy = $request->Fecha_fin_Proy;
        $proyecto->Descripcion = $request->Descripcion;


        if ($request->file('Informe')) {
            $file = $request->file('Informe');
            $name = time().$file->getClientOriginalName();
            $file->move(public_path().'/InformesProyectos/', $name);
        }
        $proyecto->Informe = "/InformesProyectos/".$name;

        if ($request->Comitente_id == "") {
            try {
                $comitente = new Comitente;
                $comitente->NombreComitente = $request->NombreComitente;
                $comitente->Email = $request->Email;
                $comitente->Telefono = $request->Telefono;
                $comitente->Cuit = $request->Cuit;
                if ($request->TipoPersona == 1) {
                    $comitente->ApellidoComitente = $request->Apellido;
                    $comitente->Sexo_id = $request->Sexo_id;
                }
                $comitente->save();
                $proyecto->Comitente_id = $comitente->id;
            } catch (Exception $e) {

                Flash::error('Los datos del comitente no se cargaron correctamente');

            return Redirect::back()->withInput();
        }

        }else{

            $proyecto->Comitente_id = $request->Comitente_id;
        }

        $user = Auth::user();
        $proyecto->Director_id = $user->Personal_id;
        $direccion->save();
        $proyecto->direccion_id = $direccion->id ;
        $proyecto->save();

        $ambientesDelProyecto = Proyecto_ambiente::all()->where('Proyecto_id','=', $proyecto->id);
        $tareasDelProyecto = Tarea::all()->where('Proyecto_id','=', $proyecto->id);
        $Lista_asignaciones = AsignacionPersonalTarea::all();

        try {
            for ($i=0; $i < sizeof($request->Cantidad); $i++) {
                $lista_ambientes = Proyecto_ambiente::all()->where('Proyecto_id','=', $proyecto->id);
                $existe = false;
                foreach ($lista_ambientes as $item) {
                    if (($item->Ambiente_id) == ($request->Ambiente_id[$i])) {
                        $item->Cantidad += $request->Cantidad[$i];
                        $item->save();
                        $existe = true;
                    }
                }
                if ($existe == false) {
                    $proyectoAmbiente = new Proyecto_ambiente();
                    $proyectoAmbiente->Ambiente_id = $request->Ambiente_id[$i];
                    $proyectoAmbiente->Cantidad = $request->Cantidad[$i];
                    $proyectoAmbiente->Proyecto_id = $proyecto->id;
                    $proyectoAmbiente->save();
                }
            }
            }catch (Exception $e) {
            return redirect(route('proyectos.show', $proyecto->id, compact('proyecto')));
            }

        Flash::success('Proyecto saved successfully.');

        return redirect(route('proyectos.show', $proyecto->id, compact('proyecto')));

    }

    /**
     * Display the specified Proyecto.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $proyecto = Proyecto::all()->find($id);

        if (empty($proyecto)) {
            Flash::error('Proyecto not found');

            return redirect(route('proyectos.index'));
        }

        $ambientesDelProyecto = Proyecto_ambiente::all()->where('Proyecto_id','=', $id);

        $tareasDelProyecto = Tarea::all()->where('Proyecto_id','=', $id);

        // Inicio de filtro de personal con tareas del proyecto asignadas

        $Lista_asignaciones = AsignacionPersonalTarea::all();

        $indice = 0;

        $Lista_personal = array();

        foreach ($tareasDelProyecto as $tarea) {
            foreach ($Lista_asignaciones as $asignacion) {
                if ($tarea->id == $asignacion->Tarea_id) {
                    $Personal = Personal::all()->where('id','=', $asignacion->Personal_id)->first();
                    $Igualdad = false;
                    foreach ($Lista_personal as $Item) {
                        if ($Item == $Personal) {
                            $Igualdad = true;
                        }
                    }
                    if ($Igualdad == false) {
                        $Lista_personal[] = $Personal;
                        $indice ++;
                    }
                }
            }
        }

       /*for ($i=0; $i < $indice; $i++) {
            echo "{$Lista_Personal[$i]->NombrePersonal} <br>";
        }*/

        // Fin de filtro de personal con tareas del proyecto asignadas

        return view('proyectos.show', compact('ambientesDelProyecto','tareasDelProyecto','Lista_personal'))->with('proyecto', $proyecto);
    }

    /**
     * Show the form for editing the specified Proyecto.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $proyecto = $this->proyectoRepository->find($id);

        if (empty($proyecto)) {
            Flash::error('Proyecto not found');

            return redirect(route('proyectos.index'));
        }

        return view('proyectos.edit')->with('proyecto', $proyecto);
    }

    /**
     * Update the specified Proyecto in storage.
     *
     * @param  int              $id
     * @param UpdateProyectoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProyectoRequest $request)
    {
        $proyecto = $this->proyectoRepository->find($id);

        if (empty($proyecto)) {
            Flash::error('Proyecto not found');

            return redirect(route('proyectos.index'));
        }

        $proyecto = $this->proyectoRepository->update($request->all(), $id);

        Flash::success('Proyecto updated successfully.');

        return redirect(route('proyectos.index'));
    }

    /**
     * Remove the specified Proyecto from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $proyecto = $this->proyectoRepository->find($id);

        if (empty($proyecto)) {
            Flash::error('Proyecto not found');

            return redirect(route('proyectos.index'));
        }

        $this->proyectoRepository->delete($id);

        Flash::success('Proyecto deleted successfully.');

        return redirect(route('proyectos.index'));
    }

    public function descargarInforme($id)
    {
        $proyecto = Proyecto::all()->find($id);

        if (empty($proyecto)) {
            Flash::error('Proyecto not found');

            return redirect(route('proyectos.index'));
        }

        try {
            return response()->download(public_path($proyecto->Informe));
        } catch (Exception $e) {
            return "No hay archivo";
        }


    }

    public function autoAsignar($id)
    {
        $proyecto = Proyecto::all()->find($id);
        $proyecto->asignacion_inteligente();
        return "Se asignaron responables";
    }

    public function finalizar($id)
    {
        $proyecto = Proyecto::all()->find($id);
        if ($proyecto->Estado_proyecto == "En desarrollo") {
            $proyecto->Estado_proyecto = "Finalizado";
            $proyecto->save();
            return redirect()->back();
        }
        return "No se pudo finalizar el proyecto";
    }
}
