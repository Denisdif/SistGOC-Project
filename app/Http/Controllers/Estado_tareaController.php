<?php

namespace App\Http\Controllers;

use App\DataTables\Estado_tareaDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateEstado_tareaRequest;
use App\Http\Requests\UpdateEstado_tareaRequest;
use App\Repositories\Estado_tareaRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class Estado_tareaController extends AppBaseController
{
    /** @var  Estado_tareaRepository */
    private $estadoTareaRepository;

    public function __construct(Estado_tareaRepository $estadoTareaRepo)
    {
        $this->estadoTareaRepository = $estadoTareaRepo;
    }

    /**
     * Display a listing of the Estado_tarea.
     *
     * @param Estado_tareaDataTable $estadoTareaDataTable
     * @return Response
     */
    public function index(Estado_tareaDataTable $estadoTareaDataTable)
    {
        return $estadoTareaDataTable->render('estado_tareas.index');
    }

    /**
     * Show the form for creating a new Estado_tarea.
     *
     * @return Response
     */
    public function create()
    {
        return view('estado_tareas.create');
    }

    /**
     * Store a newly created Estado_tarea in storage.
     *
     * @param CreateEstado_tareaRequest $request
     *
     * @return Response
     */
    public function store(CreateEstado_tareaRequest $request)
    {
        $input = $request->all();

        $estadoTarea = $this->estadoTareaRepository->create($input);

        Flash::success('Estado Tarea saved successfully.');

        return redirect(route('estadoTareas.index'));
    }

    /**
     * Display the specified Estado_tarea.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $estadoTarea = $this->estadoTareaRepository->find($id);

        if (empty($estadoTarea)) {
            Flash::error('Estado Tarea not found');

            return redirect(route('estadoTareas.index'));
        }

        return view('estado_tareas.show')->with('estadoTarea', $estadoTarea);
    }

    /**
     * Show the form for editing the specified Estado_tarea.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $estadoTarea = $this->estadoTareaRepository->find($id);

        if (empty($estadoTarea)) {
            Flash::error('Estado Tarea not found');

            return redirect(route('estadoTareas.index'));
        }

        return view('estado_tareas.edit')->with('estadoTarea', $estadoTarea);
    }

    /**
     * Update the specified Estado_tarea in storage.
     *
     * @param  int              $id
     * @param UpdateEstado_tareaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEstado_tareaRequest $request)
    {
        $estadoTarea = $this->estadoTareaRepository->find($id);

        if (empty($estadoTarea)) {
            Flash::error('Estado Tarea not found');

            return redirect(route('estadoTareas.index'));
        }

        $estadoTarea = $this->estadoTareaRepository->update($request->all(), $id);

        Flash::success('Estado Tarea updated successfully.');

        return redirect(route('estadoTareas.index'));
    }

    /**
     * Remove the specified Estado_tarea from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $estadoTarea = $this->estadoTareaRepository->find($id);

        if (empty($estadoTarea)) {
            Flash::error('Estado Tarea not found');

            return redirect(route('estadoTareas.index'));
        }

        $this->estadoTareaRepository->delete($id);

        Flash::success('Estado Tarea deleted successfully.');

        return redirect(route('estadoTareas.index'));
    }
}
