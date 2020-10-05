<?php

namespace App\Http\Controllers;

use App\DataTables\consideracion_ambienteDataTable;
use App\Http\Requests;
use App\Http\Requests\Createconsideracion_ambienteRequest;
use App\Http\Requests\Updateconsideracion_ambienteRequest;
use App\Repositories\consideracion_ambienteRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class consideracion_ambienteController extends AppBaseController
{
    /** @var  consideracion_ambienteRepository */
    private $consideracionAmbienteRepository;

    public function __construct(consideracion_ambienteRepository $consideracionAmbienteRepo)
    {
        $this->consideracionAmbienteRepository = $consideracionAmbienteRepo;
    }

    /**
     * Display a listing of the consideracion_ambiente.
     *
     * @param consideracion_ambienteDataTable $consideracionAmbienteDataTable
     * @return Response
     */
    public function index(consideracion_ambienteDataTable $consideracionAmbienteDataTable)
    {
        return $consideracionAmbienteDataTable->render('consideracion_ambientes.index');
    }

    /**
     * Show the form for creating a new consideracion_ambiente.
     *
     * @return Response
     */
    public function create()
    {
        return view('consideracion_ambientes.create');
    }

    /**
     * Store a newly created consideracion_ambiente in storage.
     *
     * @param Createconsideracion_ambienteRequest $request
     *
     * @return Response
     */
    public function store(Createconsideracion_ambienteRequest $request)
    {
        $input = $request->all();

        $consideracionAmbiente = $this->consideracionAmbienteRepository->create($input);

        Flash::success('Consideracion Ambiente saved successfully.');

        return redirect(route('consideracionAmbientes.index'));
    }

    /**
     * Display the specified consideracion_ambiente.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $consideracionAmbiente = $this->consideracionAmbienteRepository->find($id);

        if (empty($consideracionAmbiente)) {
            Flash::error('Consideracion Ambiente not found');

            return redirect(route('consideracionAmbientes.index'));
        }

        return view('consideracion_ambientes.show')->with('consideracionAmbiente', $consideracionAmbiente);
    }

    /**
     * Show the form for editing the specified consideracion_ambiente.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $consideracionAmbiente = $this->consideracionAmbienteRepository->find($id);

        if (empty($consideracionAmbiente)) {
            Flash::error('Consideracion Ambiente not found');

            return redirect(route('consideracionAmbientes.index'));
        }

        return view('consideracion_ambientes.edit')->with('consideracionAmbiente', $consideracionAmbiente);
    }

    /**
     * Update the specified consideracion_ambiente in storage.
     *
     * @param  int              $id
     * @param Updateconsideracion_ambienteRequest $request
     *
     * @return Response
     */
    public function update($id, Updateconsideracion_ambienteRequest $request)
    {
        $consideracionAmbiente = $this->consideracionAmbienteRepository->find($id);

        if (empty($consideracionAmbiente)) {
            Flash::error('Consideracion Ambiente not found');

            return redirect(route('consideracionAmbientes.index'));
        }

        $consideracionAmbiente = $this->consideracionAmbienteRepository->update($request->all(), $id);

        Flash::success('Consideracion Ambiente updated successfully.');

        return redirect(route('consideracionAmbientes.index'));
    }

    /**
     * Remove the specified consideracion_ambiente from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $consideracionAmbiente = $this->consideracionAmbienteRepository->find($id);

        if (empty($consideracionAmbiente)) {
            Flash::error('Consideracion Ambiente not found');

            return redirect(route('consideracionAmbientes.index'));
        }

        $this->consideracionAmbienteRepository->delete($id);

        Flash::success('Consideracion Ambiente deleted successfully.');

        return redirect(route('consideracionAmbientes.index'));
    }
}
