<?php

namespace App\Http\Controllers;

use App\DataTables\RolPersonalDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateRolPersonalRequest;
use App\Http\Requests\UpdateRolPersonalRequest;
use App\Repositories\RolPersonalRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class RolPersonalController extends AppBaseController
{
    /** @var  RolPersonalRepository */
    private $rolPersonalRepository;

    public function __construct(RolPersonalRepository $rolPersonalRepo)
    {
        $this->rolPersonalRepository = $rolPersonalRepo;
    }

    /**
     * Display a listing of the RolPersonal.
     *
     * @param RolPersonalDataTable $rolPersonalDataTable
     * @return Response
     */
    public function index(RolPersonalDataTable $rolPersonalDataTable)
    {
        return $rolPersonalDataTable->render('rol_personals.index');
    }

    /**
     * Show the form for creating a new RolPersonal.
     *
     * @return Response
     */
    public function create()
    {
        return view('rol_personals.create');
    }

    /**
     * Store a newly created RolPersonal in storage.
     *
     * @param CreateRolPersonalRequest $request
     *
     * @return Response
     */
    public function store(CreateRolPersonalRequest $request)
    {
        $input = $request->all();

        $rolPersonal = $this->rolPersonalRepository->create($input);

        Flash::success('Rol Personal saved successfully.');

        return redirect(route('rolPersonals.index'));
    }

    /**
     * Display the specified RolPersonal.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $rolPersonal = $this->rolPersonalRepository->find($id);

        if (empty($rolPersonal)) {
            Flash::error('Rol Personal not found');

            return redirect(route('rolPersonals.index'));
        }

        return view('rol_personals.show')->with('rolPersonal', $rolPersonal);
    }

    /**
     * Show the form for editing the specified RolPersonal.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $rolPersonal = $this->rolPersonalRepository->find($id);

        if (empty($rolPersonal)) {
            Flash::error('Rol Personal not found');

            return redirect(route('rolPersonals.index'));
        }

        return view('rol_personals.edit')->with('rolPersonal', $rolPersonal);
    }

    /**
     * Update the specified RolPersonal in storage.
     *
     * @param  int              $id
     * @param UpdateRolPersonalRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRolPersonalRequest $request)
    {
        $rolPersonal = $this->rolPersonalRepository->find($id);

        if (empty($rolPersonal)) {
            Flash::error('Rol Personal not found');

            return redirect(route('rolPersonals.index'));
        }

        $rolPersonal = $this->rolPersonalRepository->update($request->all(), $id);

        Flash::success('Rol Personal updated successfully.');

        return redirect(route('rolPersonals.index'));
    }

    /**
     * Remove the specified RolPersonal from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $rolPersonal = $this->rolPersonalRepository->find($id);

        if (empty($rolPersonal)) {
            Flash::error('Rol Personal not found');

            return redirect(route('rolPersonals.index'));
        }

        $this->rolPersonalRepository->delete($id);

        Flash::success('Rol Personal deleted successfully.');

        return redirect(route('rolPersonals.index'));
    }
}
