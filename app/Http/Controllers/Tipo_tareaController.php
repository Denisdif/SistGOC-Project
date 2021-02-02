<?php

namespace App\Http\Controllers;

use App\DataTables\Tipo_tareaDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateTipo_tareaRequest;
use App\Http\Requests\UpdateTipo_tareaRequest;
use App\Repositories\Tipo_tareaRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use App\Models\Tipo_tarea;
use Response;

class Tipo_tareaController extends AppBaseController
{
    /** @var  Tipo_tareaRepository */
    private $tipoTareaRepository;

    public function __construct(Tipo_tareaRepository $tipoTareaRepo)
    {
        $this->tipoTareaRepository = $tipoTareaRepo;
    }

    public function index(Tipo_tareaDataTable $tipoTareaDataTable)
    {
        $tipos_tareas = Tipo_tarea::all();
        return view('tipo_tareas.index', compact('tipos_tareas'));
    }

    /**
     * Show the form for creating a new Tipo_tarea.
     *
     * @return Response
     */
    public function create()
    {
        return view('tipo_tareas.create');
    }

    /**
     * Store a newly created Tipo_tarea in storage.
     *
     * @param CreateTipo_tareaRequest $request
     *
     * @return Response
     */
    public function store(CreateTipo_tareaRequest $request)
    {
        $input = $request->all();

        $tipoTarea = $this->tipoTareaRepository->create($input);

        Flash::success('Tipo Tarea saved successfully.');

        return redirect(route('tipoTareas.index'));
    }

    /**
     * Display the specified Tipo_tarea.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tipoTarea = $this->tipoTareaRepository->find($id);

        if (empty($tipoTarea)) {
            Flash::error('Tipo Tarea not found');

            return redirect(route('tipoTareas.index'));
        }

        return view('tipo_tareas.show')->with('tipoTarea', $tipoTarea);
    }

    /**
     * Show the form for editing the specified Tipo_tarea.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tipoTarea = $this->tipoTareaRepository->find($id);

        if (empty($tipoTarea)) {
            Flash::error('Tipo Tarea not found');

            return redirect(route('tipoTareas.index'));
        }

        return view('tipo_tareas.edit')->with('tipoTarea', $tipoTarea);
    }

    /**
     * Update the specified Tipo_tarea in storage.
     *
     * @param  int              $id
     * @param UpdateTipo_tareaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTipo_tareaRequest $request)
    {
        $tipoTarea = $this->tipoTareaRepository->find($id);

        if (empty($tipoTarea)) {
            Flash::error('Tipo Tarea not found');

            return redirect(route('tipoTareas.index'));
        }

        $tipoTarea = $this->tipoTareaRepository->update($request->all(), $id);

        Flash::success('Tipo Tarea updated successfully.');

        return redirect(route('tipoTareas.index'));
    }

    /**
     * Remove the specified Tipo_tarea from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tipoTarea = $this->tipoTareaRepository->find($id);

        if (empty($tipoTarea)) {
            Flash::error('Tipo Tarea not found');

            return redirect(route('tipoTareas.index'));
        }

        $this->tipoTareaRepository->delete($id);

        Flash::success('Tipo Tarea deleted successfully.');

        return redirect(route('tipoTareas.index'));
    }

    public function obtener_tipos_tareas(){
            $data = Tipo_tarea::all();
        return $data;
    }
}
