<?php

namespace App\Http\Controllers;

use App\DataTables\consideracionDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateconsideracionRequest;
use App\Http\Requests\UpdateconsideracionRequest;
use App\Repositories\consideracionRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class consideracionController extends AppBaseController
{
    /** @var  consideracionRepository */
    private $consideracionRepository;

    public function __construct(consideracionRepository $consideracionRepo)
    {
        $this->consideracionRepository = $consideracionRepo;
    }

    /**
     * Display a listing of the consideracion.
     *
     * @param consideracionDataTable $consideracionDataTable
     * @return Response
     */
    public function index(consideracionDataTable $consideracionDataTable)
    {
        return $consideracionDataTable->render('consideracions.index');
    }

    /**
     * Show the form for creating a new consideracion.
     *
     * @return Response
     */
    public function create()
    {
        return view('consideracions.create');
    }

    /**
     * Store a newly created consideracion in storage.
     *
     * @param CreateconsideracionRequest $request
     *
     * @return Response
     */
    public function store(CreateconsideracionRequest $request)
    {
        $input = $request->all();

        $consideracion = $this->consideracionRepository->create($input);

        Flash::success('Consideracion saved successfully.');

        return redirect(route('consideracions.index'));
    }

    /**
     * Display the specified consideracion.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $consideracion = $this->consideracionRepository->find($id);

        if (empty($consideracion)) {
            Flash::error('Consideracion not found');

            return redirect(route('consideracions.index'));
        }

        return view('consideracions.show')->with('consideracion', $consideracion);
    }

    /**
     * Show the form for editing the specified consideracion.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $consideracion = $this->consideracionRepository->find($id);

        if (empty($consideracion)) {
            Flash::error('Consideracion not found');

            return redirect(route('consideracions.index'));
        }

        return view('consideracions.edit')->with('consideracion', $consideracion);
    }

    /**
     * Update the specified consideracion in storage.
     *
     * @param  int              $id
     * @param UpdateconsideracionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateconsideracionRequest $request)
    {
        $consideracion = $this->consideracionRepository->find($id);

        if (empty($consideracion)) {
            Flash::error('Consideracion not found');

            return redirect(route('consideracions.index'));
        }

        $consideracion = $this->consideracionRepository->update($request->all(), $id);

        Flash::success('Consideracion updated successfully.');

        return redirect(route('consideracions.index'));
    }

    /**
     * Remove the specified consideracion from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $consideracion = $this->consideracionRepository->find($id);

        if (empty($consideracion)) {
            Flash::error('Consideracion not found');

            return redirect(route('consideracions.index'));
        }

        $this->consideracionRepository->delete($id);

        Flash::success('Consideracion deleted successfully.');

        return redirect(route('consideracions.index'));
    }
}
