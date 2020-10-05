<?php

namespace App\Http\Controllers;

use App\DataTables\proyectoDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateproyectoRequest;
use App\Http\Requests\UpdateproyectoRequest;
use App\Repositories\proyectoRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class proyectoController extends AppBaseController
{
    /** @var  proyectoRepository */
    private $proyectoRepository;

    public function __construct(proyectoRepository $proyectoRepo)
    {
        $this->proyectoRepository = $proyectoRepo;
    }

    /**
     * Display a listing of the proyecto.
     *
     * @param proyectoDataTable $proyectoDataTable
     * @return Response
     */
    public function index(proyectoDataTable $proyectoDataTable)
    {
        return $proyectoDataTable->render('proyectos.index');
    }

    /**
     * Show the form for creating a new proyecto.
     *
     * @return Response
     */
    public function create()
    {
        return view('proyectos.create');
    }

    /**
     * Store a newly created proyecto in storage.
     *
     * @param CreateproyectoRequest $request
     *
     * @return Response
     */
    public function store(CreateproyectoRequest $request)
    {
        $input = $request->all();

        $proyecto = $this->proyectoRepository->create($input);

        Flash::success('Proyecto saved successfully.');

        return redirect(route('proyectos.index'));
    }

    /**
     * Display the specified proyecto.
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

        return view('proyectos.show')->with('proyecto', $proyecto);
    }

    /**
     * Show the form for editing the specified proyecto.
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
     * Update the specified proyecto in storage.
     *
     * @param  int              $id
     * @param UpdateproyectoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateproyectoRequest $request)
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
     * Remove the specified proyecto from storage.
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
