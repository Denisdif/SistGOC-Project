<?php

namespace App\Http\Controllers;

use App\DataTables\TareaDataTable;
use App\Models\Proyecto;
use App\Http\Requests;
use App\Http\Requests\CreateTareaRequest;
use App\Http\Requests\UpdateTareaRequest;
use App\Repositories\TareaRepository;
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

        return view('tareas.show')->with('tarea', $tarea);
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

        return view('tareas.edit')->with('tarea', $tarea);
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

            return redirect(route('tareas.index'));
        }

        $tarea = $this->tareaRepository->update($request->all(), $id);

        Flash::success('Tarea updated successfully.');

        return redirect(route('tareas.index'));
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
        $tarea = $this->tareaRepository->find($id);

        if (empty($tarea)) {
            Flash::error('Tarea not found');

            return redirect(route('tareas.index'));
        }

        $this->tareaRepository->delete($id);

        Flash::success('Tarea deleted successfully.');

        return redirect(route('tareas.index'));
    }
}
