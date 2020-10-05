<?php

namespace App\Http\Controllers;

use App\DataTables\ambienteDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateambienteRequest;
use App\Http\Requests\UpdateambienteRequest;
use App\Repositories\ambienteRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class ambienteController extends AppBaseController
{
    /** @var  ambienteRepository */
    private $ambienteRepository;

    public function __construct(ambienteRepository $ambienteRepo)
    {
        $this->ambienteRepository = $ambienteRepo;
    }

    /**
     * Display a listing of the ambiente.
     *
     * @param ambienteDataTable $ambienteDataTable
     * @return Response
     */
    public function index(ambienteDataTable $ambienteDataTable)
    {
        return $ambienteDataTable->render('ambientes.index');
    }

    /**
     * Show the form for creating a new ambiente.
     *
     * @return Response
     */
    public function create()
    {
        return view('ambientes.create');
    }

    /**
     * Store a newly created ambiente in storage.
     *
     * @param CreateambienteRequest $request
     *
     * @return Response
     */
    public function store(CreateambienteRequest $request)
    {
        $input = $request->all();

        $ambiente = $this->ambienteRepository->create($input);

        Flash::success('Ambiente saved successfully.');

        return redirect(route('ambientes.index'));
    }

    /**
     * Display the specified ambiente.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $ambiente = $this->ambienteRepository->find($id);

        if (empty($ambiente)) {
            Flash::error('Ambiente not found');

            return redirect(route('ambientes.index'));
        }

        return view('ambientes.show')->with('ambiente', $ambiente);
    }

    /**
     * Show the form for editing the specified ambiente.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $ambiente = $this->ambienteRepository->find($id);

        if (empty($ambiente)) {
            Flash::error('Ambiente not found');

            return redirect(route('ambientes.index'));
        }

        return view('ambientes.edit')->with('ambiente', $ambiente);
    }

    /**
     * Update the specified ambiente in storage.
     *
     * @param  int              $id
     * @param UpdateambienteRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateambienteRequest $request)
    {
        $ambiente = $this->ambienteRepository->find($id);

        if (empty($ambiente)) {
            Flash::error('Ambiente not found');

            return redirect(route('ambientes.index'));
        }

        $ambiente = $this->ambienteRepository->update($request->all(), $id);

        Flash::success('Ambiente updated successfully.');

        return redirect(route('ambientes.index'));
    }

    /**
     * Remove the specified ambiente from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $ambiente = $this->ambienteRepository->find($id);

        if (empty($ambiente)) {
            Flash::error('Ambiente not found');

            return redirect(route('ambientes.index'));
        }

        $this->ambienteRepository->delete($id);

        Flash::success('Ambiente deleted successfully.');

        return redirect(route('ambientes.index'));
    }
}
