<?php

namespace App\Http\Controllers;

use App\DataTables\EvaluacionDataTable;
use App\Models\Personal;
use App\Http\Requests;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\CreateEvaluacionRequest;
use App\Http\Requests\UpdateEvaluacionRequest;
use App\Repositories\EvaluacionRepository;
use Flash;
use Response;
use Illuminate\Support\Facades\Auth;

class EvaluacionController extends AppBaseController
{
    /** @var  EvaluacionRepository */
    private $evaluacionRepository;

    public function __construct(EvaluacionRepository $evaluacionRepo)
    {
        $this->evaluacionRepository = $evaluacionRepo;
    }

    /**
     * Display a listing of the Evaluacion.
     *
     * @param EvaluacionDataTable $evaluacionDataTable
     * @return Response
     */
    public function index(EvaluacionDataTable $evaluacionDataTable)
    {
        return $evaluacionDataTable->render('evaluacions.index');
    }

    /**
     * Show the form for creating a new Evaluacion.
     *
     * @return Response
     */
    public function create(Personal $personal)
    {
        return view('evaluacions.create', compact('personal'));
    }

    /**
     * Store a newly created Evaluacion in storage.
     *
     * @param CreateEvaluacionRequest $request
     *
     * @return Response
     */
    public function store(Personal $personal, CreateEvaluacionRequest $request)
    {
        $input = $request->all();

        $evaluacion = $this->evaluacionRepository->create($input);

        $evaluacion->Personal_id = $personal->id;

        $user = Auth::user();

        $evaluacion->Evaluador_id = $user->Personal_id;

        $evaluacion->save();

        Flash::success('Evaluacion saved successfully.');

        return redirect(route('personals.show', $personal->id));
    }

    /**
     * Display the specified Evaluacion.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $evaluacion = $this->evaluacionRepository->find($id);

        if (empty($evaluacion)) {
            Flash::error('Evaluacion not found');

            return redirect(route('evaluacions.index'));
        }

        return view('evaluacions.show')->with('evaluacion', $evaluacion);
    }

    /**
     * Show the form for editing the specified Evaluacion.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $evaluacion = $this->evaluacionRepository->find($id);

        if (empty($evaluacion)) {
            Flash::error('Evaluacion not found');

            return redirect(route('evaluacions.index'));
        }

        return view('evaluacions.edit')->with('evaluacion', $evaluacion);
    }

    /**
     * Update the specified Evaluacion in storage.
     *
     * @param  int              $id
     * @param UpdateEvaluacionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEvaluacionRequest $request)
    {
        $evaluacion = $this->evaluacionRepository->find($id);

        if (empty($evaluacion)) {
            Flash::error('Evaluacion not found');

            return redirect(route('evaluacions.index'));
        }

        $evaluacion = $this->evaluacionRepository->update($request->all(), $id);

        Flash::success('Evaluacion updated successfully.');

        return redirect(route('evaluacions.index'));
    }

    /**
     * Remove the specified Evaluacion from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $evaluacion = $this->evaluacionRepository->find($id);

        if (empty($evaluacion)) {
            Flash::error('Evaluacion not found');

            return redirect(route('evaluacions.index'));
        }

        $this->evaluacionRepository->delete($id);

        Flash::success('Evaluacion deleted successfully.');

        return redirect(route('evaluacions.index'));
    }
}