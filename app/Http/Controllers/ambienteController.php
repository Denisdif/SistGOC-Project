<?php

namespace App\Http\Controllers;

use App\DataTables\ambienteDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateambienteRequest;
use App\Http\Requests\UpdateambienteRequest;
use App\Repositories\ambienteRepository;
use App\Http\Controllers\AppBaseController;
use App\Models\ambiente;
use Illuminate\Support\Facades\Storage;
use Flash;
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
        $ambientes = ambiente::all();
        return view('ambientes.index', compact('ambientes'));
    }

    public function create()
    {
        return view('ambientes.create');
    }

    public function store(CreateambienteRequest $request)
    {
        $input = $request->all();

        $ambiente = $this->ambienteRepository->create($input);

        if ($request->file('Imagen')) {
            $file = $request->file('Imagen');
            $name = time().$file->getClientOriginalName();
            $file->move(public_path().'/ImagenesAmbientes/', $name);
        }
        $ambiente->Imagen = "/ImagenesAmbientes/".$name;
        $ambiente->save();

        Flash::success('Se realizó con éxito la carga del ambiente');

        return redirect(route('ambientes.index'));
    }

    public function show($id)
    {
        $ambiente = $this->ambienteRepository->find($id);

        if (empty($ambiente)) {
            Flash::error('Ambiente not found');

            return redirect(route('ambientes.index'));
        }

        return view('ambientes.show')->with('ambiente', $ambiente);
    }

    public function edit($id)
    {
        $ambiente = $this->ambienteRepository->find($id);

        if (empty($ambiente)) {
            Flash::error('Ambiente not found');

            return redirect(route('ambientes.index'));
        }

        return view('ambientes.edit')->with('ambiente', $ambiente);
    }

    public function update($id, UpdateambienteRequest $request)
    {
        $ambiente = $this->ambienteRepository->find($id);

        if (empty($ambiente)) {
            Flash::error('Ambiente not found');

            return redirect(route('ambientes.index'));
        }

        $ambiente = $this->ambienteRepository->update($request->all(), $id);

        if ($request->file('Imagen')) {
            $file = $request->file('Imagen');
            $name = time().$file->getClientOriginalName();
            $file->move(public_path().'/ImagenesAmbientes/', $name);
        }
        $ambiente->Imagen = "/ImagenesAmbientes/".$name;
        $ambiente->save();

        Flash::success('Se realizó con éxito la actualización del ambiente');

        return redirect(route('ambientes.index'));
    }

    public function destroy($id)
    {
        $ambiente = $this->ambienteRepository->find($id);

        if (empty($ambiente)) {
            Flash::error('Ambiente not found');

            return redirect(route('ambientes.index'));
        }

        $this->ambienteRepository->delete($id);

        Flash::success('Se eliminó con éxito el ambiente');

        return redirect(route('ambientes.index'));
    }
}
