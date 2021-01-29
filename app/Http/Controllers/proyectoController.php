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
use Exception;
use App\Http\Requests;
use App\Mail\EmergencyCallReceived;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Laracasts\Flash\Flash;

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

        if (Auth::user()->Rol_id == 2) {
            $proyectos = Proyecto::all()->where('Director_id', '=', Auth::user()->Personal_id);
        }

        $proyectos = Proyecto::orderBy('id', 'DESC')
                ->Id($request->codigo)
                ->Comitente($request->comitente)
                ->Tipo($request->tipo)
                ->Provincia($request->provincia, $request->localidad,$request->calle)
                ->paginate('100');

        $codigo = $request->codigo;
        $tipo = $request->tipo;
        $comitente = $request->comitente;
        $provincia = $request->provincia;
        $localidad = $request->localidad;
        $calle = $request->calle;

        $proy_atrasados = [];
        $proy_en_desarrollo = [];
        $proy_finalizados = [];

        foreach ($proyectos as $item) {
            if (($item->Estado_proyecto == "Finalizado")) {
                $proy_finalizados[] = $item;
            }else{
                $proy_en_desarrollo[] = $item;
                if ($item->Fecha_fin_Proy > Carbon::now()) {
                    $proy_atrasados[] = $item;
                }
            }
        }

        return View('proyectos.index', compact('proyectos','proy_atrasados','proy_en_desarrollo','proy_finalizados','codigo','tipo','comitente','provincia','localidad','calle'));
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
        $proyecto->Nombre_proyecto = "Proyecto ".$proyecto->id;
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

        Flash::success('Se realizó con éxito la carga del proyecto');

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

        $tareas_finalizadas = 0;
        $tareas_no_finalizadas = 0;

        foreach ($tareasDelProyecto as $item) {
            if ($item->Estado_tarea_id == 6) {
                $tareas_finalizadas += 1;
            }else {
                $tareas_no_finalizadas += 1;
            }
        }

        $etiquetasGraf[] = "Tareas finalizadas";
        $etiquetasGraf[] = "Tareas por finalizar";
        $cantidadesGraf[] = $tareas_finalizadas;
        $cantidadesGraf[] = $tareas_no_finalizadas;

        return view('proyectos.show', compact('ambientesDelProyecto','tareasDelProyecto','Lista_personal','etiquetasGraf','cantidadesGraf'))->with('proyecto', $proyecto);
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

        Flash::success('Se realizó con éxito la actualización de los datos del proyecto');

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

        Mail::to("stalkerdif@gmail.com")->send(new EmergencyCallReceived($proyecto));

        if (empty($proyecto)) {
            Flash::error('Proyecto not found');

            return redirect(route('proyectos.index'));
        }

        $this->proyectoRepository->delete($id);

        Flash::success('El proyecto fué eliminado con éxito');

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
            Flash::error('No se ha cargado un informe a este proyecto');
            return Redirect::back();
        }


    }

    public function autoAsignar($id)
    {
        $proyecto = Proyecto::all()->find($id);
        $proyecto->asignacion_inteligente();
        Flash::success('Se asignaron los responsables mejor capacitados a las tareas del proyecto');
        return Redirect::back();
    }

    public function finalizar($id)
    {
        $proyecto = Proyecto::all()->find($id);
        if ($proyecto->Estado_proyecto == "En desarrollo") {
            $proyecto->Estado_proyecto = "Finalizado";
            $proyecto->Fecha_fin_Proy = Carbon::now();
            $proyecto->save();
            Flash::success('Se finalizó con el proyecto');
            return redirect()->back();
        }
        return "No se pudo finalizar el proyecto";
    }

    public function estadisticas(Request $request)
    {
        $cant_meses = 6;
        $actual = Carbon::now();
        $fecha_act = Carbon::now();

        if ($request->Meses) {
            $cant_meses = $request->Meses;
        }

        if ($request->Fecha) {
            $fecha_act = new Carbon($request->Fecha);
            $actual = new Carbon($request->Fecha);
        }


        //obtener array con los meses a mostrar en la grafica
            for ($i=0; $i < $cant_meses; $i++) {
                $mes[] = $fecha_act->formatLocalized('%B');
                $fechas[] = new Carbon($fecha_act); //un array con fechas para realizar la consulta en la base de datos
                $fecha_act = $fecha_act->subMonth(1);
            }
        //

        //invertir orden de meses y fechas
            $mes = array_reverse($mes);
            $fechas = array_reverse($fechas);
        //

        //obtener array con cantidad de proyectos por mes
            foreach ($fechas as $item) {
                $desde = new Carbon($item->startOfMonth());
                $hasta = new Carbon($item->endOfMonth());
                $proyectos_x_mes[] = sizeof(Proyecto::all()->whereBetween('Fecha_fin_Proy', [$desde,$hasta]));
            }
        //

        $hasta = new Carbon($actual);
        $desde = new Carbon($actual);
        $desde->subMonth($cant_meses);
        $proyectos = Proyecto::all()->whereBetween('Fecha_fin_Proy', [$desde,$hasta]);

        foreach ($proyectos as $item) {
            $tipos_proyectos[] = $item->tipo_proyecto->Nombre;
        }

        $datos_tipos = (array_count_values($tipos_proyectos));

        foreach ($datos_tipos as $item) {
            $etiquetas_tipos[] = key($datos_tipos);             //Obtener la posicion del puntero del array
            $cantidad_tipos[] = $item;                          //Obtener datos del array
            next($datos_tipos);                                 //Avanzar el puntero en el array
        }

        return view('proyectos.estadistica', compact(   'proyectos_x_mes','mes','cant_meses', 'fecha_act','actual',
                                                        'etiquetas_tipos','cantidad_tipos'));
    }
}
