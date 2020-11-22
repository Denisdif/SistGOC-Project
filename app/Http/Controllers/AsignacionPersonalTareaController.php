<?php

namespace App\Http\Controllers;

use App\DataTables\AsignacionPersonalTareaDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateAsignacionPersonalTareaRequest;
use App\Http\Requests\UpdateAsignacionPersonalTareaRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\AsignacionPersonalTareaRepository;
use App\Models\AsignacionPersonalTarea;
use App\Models\Tarea;
use App\Models\Personal;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Redirector;
use Exception;
use Redirect;
use Response;
use Flash;

class AsignacionPersonalTareaController extends AppBaseController
{
    /** @var  AsignacionPersonalTareaRepository */
    private $asignacionPersonalTareaRepository;

    public function __construct(AsignacionPersonalTareaRepository $asignacionPersonalTareaRepo)
    {
        $this->asignacionPersonalTareaRepository = $asignacionPersonalTareaRepo;
    }

    /**
     * Display a listing of the AsignacionPersonalTarea.
     *
     * @param AsignacionPersonalTareaDataTable $asignacionPersonalTareaDataTable
     * @return Response
     */
    public function index(AsignacionPersonalTareaDataTable $asignacionPersonalTareaDataTable)
    {
        return $asignacionPersonalTareaDataTable->render('asignacion_personal_tareas.index');
    }

    public function indexPersonal(AsignacionPersonalTareaDataTable $asignacionPersonalTareaDataTable)
    {
        $user = Auth::user();
        $personal = Personal::all()->where('id','=', $user->personal->id)->first();

        return View('asignacion_personal_tareas.index', compact('tareas','personal'));
    }

    /**
     * Show the form for creating a new AsignacionPersonalTarea.
     *
     * @return Response
     */
    public function create(Tarea $tarea)
    {
        $personal = Personal::all();
        $asignaciones = AsignacionPersonalTarea::all()->where('Tarea_id','=', $tarea->id);
        return view('asignacion_personal_tareas.create', compact('tarea','personal','asignaciones'));
    }

    /**
     * Store a newly created AsignacionPersonalTarea in storage.
     *
     * @param CreateAsignacionPersonalTareaRequest $request
     *
     * @return Response
     */
    public function store(Tarea $tarea, CreateAsignacionPersonalTareaRequest $request)
    {
        try {
            $asignacionPersonalTarea = new AsignacionPersonalTarea;
            $asignacionPersonalTarea->Personal_id = $request->Personal_id;
            $asignacionPersonalTarea->Responsabilidad = "Desarrollador";
            $asignacionPersonalTarea->Tarea_id = $tarea->id;
            $asignacionPersonalTarea->save();

            if ($tarea->Estado_tarea_id == 1) { //Cambia el estado de la tarea de creada a asignada
                $tarea->Estado_tarea_id = 2; //Id "2" de estado tarea = Asignada
                $tarea->save();
            }

            return Redirect::back();

        } catch (Exception $e) {

            Flash::error('El usuario seleccionado ya fue asignado a esta tarea');

            return Redirect::back();
        }


    }

    /**
     * Display the specified AsignacionPersonalTarea.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $asignacionPersonalTarea = $this->asignacionPersonalTareaRepository->find($id);

        if (empty($asignacionPersonalTarea)) {
            Flash::error('Asignacion Personal Tarea not found');

            return redirect(route('asignacionPersonalTareas.index'));
        }

        return view('asignacion_personal_tareas.show')->with('asignacionPersonalTarea', $asignacionPersonalTarea);
    }

    /**
     * Show the form for editing the specified AsignacionPersonalTarea.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $asignacionPersonalTarea = $this->asignacionPersonalTareaRepository->find($id);

        if (empty($asignacionPersonalTarea)) {
            Flash::error('Asignacion Personal Tarea not found');

            return redirect(route('asignacionPersonalTareas.index'));
        }

        return view('asignacion_personal_tareas.edit')->with('asignacionPersonalTarea', $asignacionPersonalTarea);
    }

    /**
     * Update the specified AsignacionPersonalTarea in storage.
     *
     * @param  int              $id
     * @param UpdateAsignacionPersonalTareaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAsignacionPersonalTareaRequest $request)
    {
        $asignacionPersonalTarea = $this->asignacionPersonalTareaRepository->find($id);

        if (empty($asignacionPersonalTarea)) {
            Flash::error('Asignacion Personal Tarea not found');

            return redirect(route('asignacionPersonalTareas.index'));
        }

        $asignacionPersonalTarea = $this->asignacionPersonalTareaRepository->update($request->all(), $id);

        Flash::success('Asignacion Personal Tarea updated successfully.');

        return redirect(route('asignacionPersonalTareas.index'));
    }

    /**
     * Remove the specified AsignacionPersonalTarea from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {

        $asignacionPersonalTarea = $this->asignacionPersonalTareaRepository->find($id);

        if (empty($asignacionPersonalTarea)) {
            Flash::error('Asignacion Personal Tarea not found');

            return redirect()->back();
        }

        $this->asignacionPersonalTareaRepository->delete($id);

        Flash::success('Asignacion Personal Tarea deleted successfully.');

        return redirect()->back();
    }
}
