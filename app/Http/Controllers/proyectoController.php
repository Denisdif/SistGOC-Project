<?php

namespace App\Http\Controllers;

use App\DataTables\ProyectoDataTable;
use Illuminate\Support\Facades\Auth;
use App\Models\ambiente;
use App\Models\Tarea;
use App\Models\Estado_tarea;
use App\Models\Tipo_tarea;
use App\Models\Proyecto;
use App\Models\Personal;
use App\Models\Tipo_proyecto;
use App\Models\AsignacionPersonalTarea;
use App\Http\Requests;
use App\Http\Requests\CreateProyectoRequest;
use App\Http\Requests\UpdateProyectoRequest;
use App\Repositories\ProyectoRepository;
use App\Models\Proyecto_ambiente;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

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
    public function index(ProyectoDataTable $proyectoDataTable)
    {
        $proyectos = Proyecto::all();
        return View('proyectos.index', compact('proyectos'));
    }

    /**
     * Show the form for creating a new Proyecto.
     *
     * @return Response
     */
    public function create()
    {
        return view('proyectos.create');
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
        $input = $request->all();

        $proyecto = $this->proyectoRepository->create($input);

        $user = Auth::user();

        $proyecto->Director_id = $user->Personal_id;

        $proyecto->save();

        Flash::success('Proyecto saved successfully.');

        return redirect(route('proyectos.show', $proyecto->id));
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
        $proyecto = $this->proyectoRepository->find($id);

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
}
