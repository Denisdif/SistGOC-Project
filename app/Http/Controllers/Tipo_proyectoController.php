<?php

namespace App\Http\Controllers;

use App\DataTables\Tipo_proyectoDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateTipo_proyectoRequest;
use App\Http\Requests\UpdateTipo_proyectoRequest;
use App\Repositories\Tipo_proyectoRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class Tipo_proyectoController extends AppBaseController
{
    /** @var  Tipo_proyectoRepository */
    private $tipoProyectoRepository;

    public function __construct(Tipo_proyectoRepository $tipoProyectoRepo)
    {
        $this->tipoProyectoRepository = $tipoProyectoRepo;
    }

    /**
     * Display a listing of the Tipo_proyecto.
     *
     * @param Tipo_proyectoDataTable $tipoProyectoDataTable
     * @return Response
     */
    public function index(Tipo_proyectoDataTable $tipoProyectoDataTable)
    {
        return $tipoProyectoDataTable->render('tipo_proyectos.index');
    }

    /**
     * Show the form for creating a new Tipo_proyecto.
     *
     * @return Response
     */
    public function create()
    {
        return view('tipo_proyectos.create');
    }

    /**
     * Store a newly created Tipo_proyecto in storage.
     *
     * @param CreateTipo_proyectoRequest $request
     *
     * @return Response
     */
    public function store(CreateTipo_proyectoRequest $request)
    {
        $input = $request->all();

        $tipoProyecto = $this->tipoProyectoRepository->create($input);

        Flash::success('Tipo Proyecto saved successfully.');

        return redirect(route('tipoProyectos.index'));
    }

    /**
     * Display the specified Tipo_proyecto.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tipoProyecto = $this->tipoProyectoRepository->find($id);

        if (empty($tipoProyecto)) {
            Flash::error('Tipo Proyecto not found');

            return redirect(route('tipoProyectos.index'));
        }

        return view('tipo_proyectos.show')->with('tipoProyecto', $tipoProyecto);
    }

    /**
     * Show the form for editing the specified Tipo_proyecto.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tipoProyecto = $this->tipoProyectoRepository->find($id);

        if (empty($tipoProyecto)) {
            Flash::error('Tipo Proyecto not found');

            return redirect(route('tipoProyectos.index'));
        }

        return view('tipo_proyectos.edit')->with('tipoProyecto', $tipoProyecto);
    }

    /**
     * Update the specified Tipo_proyecto in storage.
     *
     * @param  int              $id
     * @param UpdateTipo_proyectoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTipo_proyectoRequest $request)
    {
        $tipoProyecto = $this->tipoProyectoRepository->find($id);

        if (empty($tipoProyecto)) {
            Flash::error('Tipo Proyecto not found');

            return redirect(route('tipoProyectos.index'));
        }

        $tipoProyecto = $this->tipoProyectoRepository->update($request->all(), $id);

        Flash::success('Tipo Proyecto updated successfully.');

        return redirect(route('tipoProyectos.index'));
    }

    /**
     * Remove the specified Tipo_proyecto from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tipoProyecto = $this->tipoProyectoRepository->find($id);

        if (empty($tipoProyecto)) {
            Flash::error('Tipo Proyecto not found');

            return redirect(route('tipoProyectos.index'));
        }

        $this->tipoProyectoRepository->delete($id);

        Flash::success('Tipo Proyecto deleted successfully.');

        return redirect(route('tipoProyectos.index'));
    }
}
