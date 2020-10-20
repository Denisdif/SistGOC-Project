<?php

namespace App\Http\Controllers;

use App\DataTables\ComitenteDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateComitenteRequest;
use App\Http\Requests\UpdateComitenteRequest;
use App\Repositories\ComitenteRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class ComitenteController extends AppBaseController
{
    /** @var  ComitenteRepository */
    private $comitenteRepository;

    public function __construct(ComitenteRepository $comitenteRepo)
    {
        $this->comitenteRepository = $comitenteRepo;
    }

    /**
     * Display a listing of the Comitente.
     *
     * @param ComitenteDataTable $comitenteDataTable
     * @return Response
     */
    public function index(ComitenteDataTable $comitenteDataTable)
    {
        return $comitenteDataTable->render('comitentes.index');
    }

    /**
     * Show the form for creating a new Comitente.
     *
     * @return Response
     */
    public function create()
    {
        return view('comitentes.create');
    }

    /**
     * Store a newly created Comitente in storage.
     *
     * @param CreateComitenteRequest $request
     *
     * @return Response
     */
    public function store(CreateComitenteRequest $request)
    {
        $input = $request->all();

        $comitente = $this->comitenteRepository->create($input);

        Flash::success('Comitente saved successfully.');

        return redirect(route('comitentes.index'));
    }

    /**
     * Display the specified Comitente.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $comitente = $this->comitenteRepository->find($id);

        if (empty($comitente)) {
            Flash::error('Comitente not found');

            return redirect(route('comitentes.index'));
        }

        return view('comitentes.show')->with('comitente', $comitente);
    }

    /**
     * Show the form for editing the specified Comitente.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $comitente = $this->comitenteRepository->find($id);

        if (empty($comitente)) {
            Flash::error('Comitente not found');

            return redirect(route('comitentes.index'));
        }

        return view('comitentes.edit')->with('comitente', $comitente);
    }

    /**
     * Update the specified Comitente in storage.
     *
     * @param  int              $id
     * @param UpdateComitenteRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateComitenteRequest $request)
    {
        $comitente = $this->comitenteRepository->find($id);

        if (empty($comitente)) {
            Flash::error('Comitente not found');

            return redirect(route('comitentes.index'));
        }

        $comitente = $this->comitenteRepository->update($request->all(), $id);

        Flash::success('Comitente updated successfully.');

        return redirect(route('comitentes.index'));
    }

    /**
     * Remove the specified Comitente from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $comitente = $this->comitenteRepository->find($id);

        if (empty($comitente)) {
            Flash::error('Comitente not found');

            return redirect(route('comitentes.index'));
        }

        $this->comitenteRepository->delete($id);

        Flash::success('Comitente deleted successfully.');

        return redirect(route('comitentes.index'));
    }
}
