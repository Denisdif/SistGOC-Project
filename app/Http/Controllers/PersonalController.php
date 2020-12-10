<?php

namespace App\Http\Controllers;

use App\Models\Personal;
use App\Models\Direccion;
use App\Models\Evaluacion;
use App\User;
use Cardumen\ArgentinaProvinciasLocalidades\Models\Pais;
use App\DataTables\PersonalDataTable;
use App\Http\Requests\CreatePersonalRequest;
use App\Http\Requests\UpdatePersonalRequest;
use Illuminate\Http\Request;
use App\Repositories\PersonalRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use App\Models\Tipo_tarea;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Response;

class PersonalController extends AppBaseController
{
    /** @var  PersonalRepository */
    private $personalRepository;

    public function __construct(PersonalRepository $personalRepo)
    {
        $this->personalRepository = $personalRepo;
    }

    /**
     * Display a listing of the Personal.
     *
     * @param PersonalDataTable $personalDataTable
     * @return Response
     */
    public function index(Request $request)
    {

        //Variables para filtrar edad

            $hasta = Carbon::now();
            $desde = Carbon::now();
            $desde->subYears(200);

            if ($request->mayorQ) {
                $hasta = Carbon::now();
                $mayorQ = $request->mayorQ;
                $mayorQ += 1;
                $hasta = $hasta->subYears($mayorQ);
            }

            if ($request->menorQ) {
                $desde = Carbon::now();
                $menorQ = $request->menorQ;
                $desde = $desde->subYears($menorQ);
            }

        //Fin de variables para filtrar edad

        $ListaPersonal = Personal::orderBy('id', 'DESC')
                ->Name($request->Nombre)
                ->Apellido($request->Apellido)
                ->FechaNac($desde, $hasta)
                ->Rol($request->rol)
                ->paginate('100');

        //Lista para vista de director de proyectos

            if (Auth::user()->Rol_id == 2) {
                $ListaPersonal = Personal::orderBy('id', 'DESC')
                    ->Name($request->Nombre)
                    ->Apellido($request->Apellido)
                    ->FechaNac($request->desde, $request->hasta)
                    ->Rol("Desarrollador")
                    ->paginate('100');
            }

        //Fin de lista para vista de director de proyectos

        //Variables para filtros

            $Nombre = $request->Nombre;
            $Apellido = $request->Apellido;
            $MayorQ = $request->mayorQ;
            $MenorQ = $request->menorQ;
            $Rol = $request->rol;

        //Fin de variables para filtros

        return View('personals.index', compact('ListaPersonal','Nombre','Apellido','MayorQ','MenorQ','Rol'));
    }

    /**
     * Show the form for creating a new Personal.
     *
     * @return Response
     */
    public function create()
    {
        $paises = Pais::all();

        //debemos retornar la vista al formulario de creacion de cliente
        return view('personals.create', compact('paises'));
    }

    /**
     * Store a newly created Personal in storage.
     *
     * @param CreatePersonalRequest $request
     *
     * @return Response
     */
    public function store(CreatePersonalRequest $request)
    {
        //$input = $request->all();

        //$personal = $this->personalRepository->create($input);

        $direccion = new Direccion();
        $direccion->Calle = $request->Calle ;
        $direccion->Altura = $request->Altura ;
        $direccion->Codigo_postal = $request->Codigo_postal ;
        $direccion->Pais_id = $request->pais_id ;
        $direccion->Provincia_id = $request->provincia_id ;
        $direccion->Localidad_id = $request->localidad_id ;
        $direccion->save();
        $personal = new Personal();
        $personal->NombrePersonal = $request->NombrePersonal ;
        $personal->ApellidoPersonal = $request->Apellido ;
        $personal->Sexo_id = $request->Sexo_id ;
        $personal->FechaNac = $request->FechaNac ;
        $personal->DNI = $request->DNI ;
        $personal->Telefono = $request->Telefono ;
        $personal->direccion_id = $direccion->id ;
        $personal->save();
        $user = new User;
        $user->name = ("NataliaNatalia".$personal->id);
        $user->email = $request->Email;
        $user->password = Hash::make($request->DNI);
        $user->Rol_id = $request->Rol_id;
        $user->Personal_id = $personal->id ;
        $user->save();

        Flash::success('Se realizó con éxito la carga del nuevo personal');

        return redirect(route('personals.show', $personal->id));
    }

    /**
     * Display the specified Personal.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $personal = $this->personalRepository->find($id);

        if (empty($personal)) {
            Flash::error('Personal not found');

            return redirect(route('personals.index'));
        }
        $usuarios = User::all()->where('Personal_id','=', $id)->first();
        $evaluaciones = Evaluacion::all()->where('Personal_id','=', $id);
        $tipos_tareas = Tipo_tarea::all();

        //Datos para grafica

            $tipos_tareas_graf = [];
            $calificacion_graf = [];

            foreach ($tipos_tareas as $item) {
                if (($personal->get_rendimiento($personal->get_tareas_desarrolladas($item->Nombre_tipo_tarea)))>1) {
                    $tipos_tareas_graf[]=$item->Nombre_tipo_tarea;
                    $calificacion_graf[]=$personal->get_rendimiento($personal->get_tareas_desarrolladas($item->Nombre_tipo_tarea));
                }

            }

        //Fin datos para grafica

        //Modulo inteligente de crear evaluaciones cada mes

            $evaluar = true;
            $ahora = Carbon::now();
            $ahora = $ahora->subMonth(1);
            $ahora = $ahora->startOfMonth();

            foreach ($evaluaciones as $item) {
                $date = new Carbon($item->Fecha_inicio);
                if ($ahora == $date) {
                    $evaluar = false;
                }
            }

            if ($evaluar) {
                $evaluacion = new Evaluacion();
                $evaluacion->Fecha_inicio = $ahora->startOfMonth();
                $evaluacion->Fecha_fin = $ahora->endOfMonth();
                $evaluacion->Personal_id = $personal->id;
                $evaluacion->Evaluador_id = 1;
                $evaluacion->save();
            }

            $evaluaciones = Evaluacion::all()->where('Personal_id','=', $id);

        //Fin modulo inteligente de crear evaluaciones cada mes

        return view('personals.show', compact('id', 'tipos_tareas', 'usuarios', 'evaluaciones','tipos_tareas_graf','calificacion_graf'))->with('personal', $personal);
    }

    /**
     * Show the form for editing the specified Personal.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $personal = $this->personalRepository->find($id);

        $paises = Pais::all();

        if (empty($personal)) {
            Flash::error('Personal not found');

            return redirect(route('personals.index'));
        }

        return view('personals.edit',compact('paises'))->with('personal', $personal);
    }

    /**
     * Update the specified Personal in storage.
     *
     * @param  int              $id
     * @param UpdatePersonalRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePersonalRequest $request)
    {
        $personal = $this->personalRepository->find($id);

        if (empty($personal)) {
            Flash::error('Personal not found');

            return redirect(route('personals.index'));
        }

        $personal = $this->personalRepository->update($request->all(), $id);

        Flash::success('Se realizó con éxito la actualización de los datos del personal');

        return redirect(route('personals.index'));
    }

    /**
     * Remove the specified Personal from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $personal = $this->personalRepository->find($id);

        if (empty($personal)) {
            Flash::error('Personal not found');

            return redirect(route('personals.index'));
        }

        $user = $personal->User;

        $user->delete();
        $this->personalRepository->delete($id);

        Flash::success('El personal fue eliminado con éxito');

        return redirect()->back();
    }
}
