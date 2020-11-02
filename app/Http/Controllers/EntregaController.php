<?php

namespace App\Http\Controllers;

use App\DataTables\EntregaDataTable;
use App\Models\Tarea;
use App\Models\Entrega;
use App\Http\Requests;
use App\Http\Requests\CreateEntregaRequest;
use App\Http\Requests\UpdateEntregaRequest;
use App\Repositories\EntregaRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class EntregaController extends AppBaseController
{
    /** @var  EntregaRepository */
    private $entregaRepository;

    public function __construct(EntregaRepository $entregaRepo)
    {
        $this->entregaRepository = $entregaRepo;
    }

    /**
     * Display a listing of the Entrega.
     *
     * @param EntregaDataTable $entregaDataTable
     * @return Response
     */
    public function index(EntregaDataTable $entregaDataTable)
    {
        return $entregaDataTable->render('entregas.index');
    }

    /**
     * Show the form for creating a new Entrega.
     *
     * @return Response
     */
    public function create(Tarea $tarea)
    {
        return view('entregas.create', compact('tarea'));
    }

    /**
     * Store a newly created Entrega in storage.
     *
     * @param CreateEntregaRequest $request
     *
     * @return Response
     */
    public function store(Tarea $tarea, CreateEntregaRequest $request)
    {
        $items = $request->file('archivos');

        foreach ($items as $item) {
            $entrega = new Entrega;
            $name = time().$item->getClientOriginalName();
            $item->move(public_path().'/EntregaArchivos/', $name);
            $entrega->Archivo = "/EntregaArchivos/".$item;
            $entrega->Tarea_id = $tarea->id;
            $entrega->save();
        }

        $tarea->Estado_tarea_id = 4; //Id "4" de estado tarea = Esperando revision
        $tarea->save();

        Flash::success('Entrega saved successfully.');

        return redirect(route('tareas.show',$tarea->id));
    }

    /**
     * Display the specified Entrega.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $entrega = $this->entregaRepository->find($id);

        if (empty($entrega)) {
            Flash::error('Entrega not found');

            return redirect(route('entregas.index'));
        }

        return view('entregas.show')->with('entrega', $entrega);
    }

    /**
     * Show the form for editing the specified Entrega.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $entrega = $this->entregaRepository->find($id);

        if (empty($entrega)) {
            Flash::error('Entrega not found');

            return redirect(route('entregas.index'));
        }

        return view('entregas.edit')->with('entrega', $entrega);
    }

    /**
     * Update the specified Entrega in storage.
     *
     * @param  int              $id
     * @param UpdateEntregaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEntregaRequest $request)
    {
        $entrega = $this->entregaRepository->find($id);

        if (empty($entrega)) {
            Flash::error('Entrega not found');

            return redirect(route('entregas.index'));
        }

        $entrega = $this->entregaRepository->update($request->all(), $id);

        Flash::success('Entrega updated successfully.');

        return redirect(route('entregas.index'));
    }

    /**
     * Remove the specified Entrega from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $entrega = $this->entregaRepository->find($id);

        if (empty($entrega)) {
            Flash::error('Entrega not found');

            return redirect(route('entregas.index'));
        }

        $this->entregaRepository->delete($id);

        Flash::success('Entrega deleted successfully.');

        return redirect(route('entregas.index'));
    }
}
