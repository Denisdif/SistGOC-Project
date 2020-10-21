<?php

namespace App\Http\Controllers;

use App\Models\Personal;
use App\Models\Direccion;
use App\User;
use Cardumen\ArgentinaProvinciasLocalidades\Models\Pais;
use App\DataTables\PersonalDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatePersonalRequest;
use App\Http\Requests\UpdatePersonalRequest;
use App\Repositories\PersonalRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class PersonalController extends AppBaseController
{
    /** @var  PersonalRepository */
    private $personalRepository;

    public function __construct(PersonalRepository $personalRepo)
    {
        $this->personalRepository = $personalRepo;
    }

    /**
     * Display a listing of the Personal.
     *
     * @param PersonalDataTable $personalDataTable
     * @return Response
     */
    public function index(PersonalDataTable $personalDataTable)
    {
        $ListaPersonal = Personal::all();
        return View('personals.index', compact('ListaPersonal'));
    }

    /**
     * Show the form for creating a new Personal.
     *
     * @return Response
     */
    public function create()
    {
        $paises = Pais::all();

        //debemos retornar la vista al formulario de creacion de cliente
        return view('personals.create', compact('paises'));
    }

    /**
     * Store a newly created Personal in storage.
     *
     * @param CreatePersonalRequest $request
     *
     * @return Response
     */
    public function store(CreatePersonalRequest $request)
    {
        //$input = $request->all();

        //$personal = $this->personalRepository->create($input);

        $direccion = new Direccion();
        $direccion->Calle = $request->Calle ;
        $direccion->Altura = $request->Altura ;
        $direccion->Codigo_postal = $request->Codigo_postal ;
        $direccion->Pais_id = $request->pais_id ;
        $direccion->Provincia_id = $request->provincia_id ;
        $direccion->Localidad_id = $request->localidad_id ;
        $direccion->save();
        $personal = new Personal();
        $personal->NombrePersonal = $request->NombrePersonal ;
        $personal->Apellido = $request->Apellido ;
        $personal->Sexo_id = $request->Sexo_id ;
        $personal->FechaNac = $request->FechaNac ;
        $personal->DNI = $request->DNI ;
        $personal->Telefono = $request->Telefono ;
        $personal->direccion_id = $direccion->id ;
        $personal->save();

        Flash::success('Personal saved successfully.');

        return redirect(route('personals.show', $personal->id));
    }

    /**
     * Display the specified Personal.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $personal = $this->personalRepository->find($id);

        if (empty($personal)) {
            Flash::error('Personal not found');

            return redirect(route('personals.index'));
        }

        return view('personals.show', compact('id'))->with('personal', $personal);
    }

    /**
     * Show the form for editing the specified Personal.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $personal = $this->personalRepository->find($id);

        $paises = Pais::all();

        if (empty($personal)) {
            Flash::error('Personal not found');

            return redirect(route('personals.index'));
        }

        return view('personals.edit',compact('paises'))->with('personal', $personal);
    }

    /**
     * Update the specified Personal in storage.
     *
     * @param  int              $id
     * @param UpdatePersonalRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePersonalRequest $request)
    {
        $personal = $this->personalRepository->find($id);

        if (empty($personal)) {
            Flash::error('Personal not found');

            return redirect(route('personals.index'));
        }

        $personal = $this->personalRepository->update($request->all(), $id);

        Flash::success('Personal updated successfully.');

        return redirect(route('personals.index'));
    }

    /**
     * Remove the specified Personal from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $personal = $this->personalRepository->find($id);

        if (empty($personal)) {
            Flash::error('Personal not found');

            return redirect(route('personals.index'));
        }

        $this->personalRepository->delete($id);

        Flash::success('Personal deleted successfully.');

        return redirect(route('personals.index'));
    }
}
