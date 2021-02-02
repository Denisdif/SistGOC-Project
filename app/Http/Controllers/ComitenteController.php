<?php

namespace App\Http\Controllers;

use App\DataTables\ComitenteDataTable;
use App\Models\Proyecto;
use App\Models\Comitente;
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

    public function index(ComitenteDataTable $comitenteDataTable)
    {
        $comitentes = Comitente::all();
        return View('comitentes.index', compact('comitentes'));
    }

    public function create()
    {
        return view('comitentes.create');
    }

    public function store(CreateComitenteRequest $request)
    {
        $comitente = new Comitente;
            $comitente->NombreComitente = $request->NombreComitente;
            $comitente->ApellidoComitente = $request->Apellido;
            $comitente->Email = $request->Email;
            $comitente->Telefono = $request->Telefono;
            $comitente->Cuit = $request->Cuit;
            $comitente->Sexo_id = $request->Sexo_id;
            $comitente->save();

        Flash::success('Se realizó con éxito la carga del comitente');

        return redirect(route('comitentes.index'));
    }

    public function show($id)
    {
        $comitente = $this->comitenteRepository->find($id);

        if (empty($comitente)) {
            Flash::error('Comitente not found');

            return redirect(route('comitentes.index'));
        }

        return view('comitentes.show')->with('comitente', $comitente);
    }

    public function edit($id)
    {
        $comitente = $this->comitenteRepository->find($id);

        if (empty($comitente)) {
            Flash::error('Comitente not found');

            return redirect(route('comitentes.index'));
        }

        return view('comitentes.edit')->with('comitente', $comitente);
    }

    public function update($id, UpdateComitenteRequest $request)
    {
        $comitente = $this->comitenteRepository->find($id);

        if (empty($comitente)) {
            Flash::error('Comitente not found');

            return redirect(route('comitentes.index'));
        }

        $comitente = $this->comitenteRepository->update($request->all(), $id);

        Flash::success('Se realizó con éxito la actualización de datos del comitente');

        return redirect(route('comitentes.index'));
    }

    public function destroy($id)
    {
        $comitente = $this->comitenteRepository->find($id);

        if (empty($comitente)) {
            Flash::error('Comitente not found');

            return redirect(route('comitentes.index'));
        }

        $this->comitenteRepository->delete($id);

        Flash::success('El comitente se ha eliminado con éxito');

        return redirect(route('comitentes.index'));
    }
}
