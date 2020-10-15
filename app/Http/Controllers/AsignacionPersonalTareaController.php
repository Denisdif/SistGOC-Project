<?php

namespace App\Http\Controllers;

use App\DataTables\AsignacionPersonalTareaDataTable;
use App\Models\Tarea;
use App\Http\Requests;
use App\Http\Requests\CreateAsignacionPersonalTareaRequest;
use App\Http\Requests\UpdateAsignacionPersonalTareaRequest;
use App\Repositories\AsignacionPersonalTareaRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use App\Models\AsignacionPersonalTarea;
use Response;

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

    /**
     * Show the form for creating a new AsignacionPersonalTarea.
     *
     * @return Response
     */
    public function create(Tarea $tarea)
    {
        return view('asignacion_personal_tareas.create', compact('tarea'));
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
        $input = $request->all();

        $asignacionPersonalTarea = $this->asignacionPersonalTareaRepository->create($input);

        $asignacionPersonalTarea->Tarea_id = $tarea->id;

        $asignacionPersonalTarea->save();

        Flash::success('Asignacion Personal Tarea saved successfully.');

        return redirect(route('tareas.show',$tarea->id));
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

        /* INICIO obtencion del id del proyecto actual*/

        $lista = AsignacionPersonalTarea::all();
        $idtarea = 0;
        foreach ($lista as $item) {
            if ($item->id == $id){
                $idtarea = $item->Tarea_id;
            }
        }

        /* FIN obtencion del id del proyecto actual*/

        $asignacionPersonalTarea = $this->asignacionPersonalTareaRepository->find($id);

        if (empty($asignacionPersonalTarea)) {
            Flash::error('Asignacion Personal Tarea not found');

            return redirect(route('tareas.show',$idtarea));
        }

        $this->asignacionPersonalTareaRepository->delete($id);

        Flash::success('Asignacion Personal Tarea deleted successfully.');

        return redirect(route('tareas.show',$idtarea));
    }
}
