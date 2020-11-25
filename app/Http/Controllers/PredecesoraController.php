<?php

namespace App\Http\Controllers;

use App\DataTables\PredecesoraDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatePredecesoraRequest;
use App\Http\Requests\UpdatePredecesoraRequest;
use App\Repositories\PredecesoraRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class PredecesoraController extends AppBaseController
{
    /** @var  PredecesoraRepository */
    private $predecesoraRepository;

    public function __construct(PredecesoraRepository $predecesoraRepo)
    {
        $this->predecesoraRepository = $predecesoraRepo;
    }

    /**
     * Display a listing of the Predecesora.
     *
     * @param PredecesoraDataTable $predecesoraDataTable
     * @return Response
     */
    public function index(PredecesoraDataTable $predecesoraDataTable)
    {
        return $predecesoraDataTable->render('predecesoras.index');
    }

    /**
     * Show the form for creating a new Predecesora.
     *
     * @return Response
     */
    public function create()
    {
        return view('predecesoras.create');
    }

    /**
     * Store a newly created Predecesora in storage.
     *
     * @param CreatePredecesoraRequest $request
     *
     * @return Response
     */
    public function store(CreatePredecesoraRequest $request)
    {
        $input = $request->all();

        $predecesora = $this->predecesoraRepository->create($input);

        Flash::success('Predecesora saved successfully.');

        return redirect(route('predecesoras.index'));
    }

    /**
     * Display the specified Predecesora.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $predecesora = $this->predecesoraRepository->find($id);

        if (empty($predecesora)) {
            Flash::error('Predecesora not found');

            return redirect(route('predecesoras.index'));
        }

        return view('predecesoras.show')->with('predecesora', $predecesora);
    }

    /**
     * Show the form for editing the specified Predecesora.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $predecesora = $this->predecesoraRepository->find($id);

        if (empty($predecesora)) {
            Flash::error('Predecesora not found');

            return redirect(route('predecesoras.index'));
        }

        return view('predecesoras.edit')->with('predecesora', $predecesora);
    }

    /**
     * Update the specified Predecesora in storage.
     *
     * @param  int              $id
     * @param UpdatePredecesoraRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePredecesoraRequest $request)
    {
        $predecesora = $this->predecesoraRepository->find($id);

        if (empty($predecesora)) {
            Flash::error('Predecesora not found');

            return redirect(route('predecesoras.index'));
        }

        $predecesora = $this->predecesoraRepository->update($request->all(), $id);

        Flash::success('Predecesora updated successfully.');

        return redirect(route('predecesoras.index'));
    }

    /**
     * Remove the specified Predecesora from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $predecesora = $this->predecesoraRepository->find($id);

        if (empty($predecesora)) {
            Flash::error('Predecesora not found');

            return redirect(route('predecesoras.index'));
        }

        $this->predecesoraRepository->delete($id);

        Flash::success('Predecesora deleted successfully.');

        return redirect(route('predecesoras.index'));
    }
}
