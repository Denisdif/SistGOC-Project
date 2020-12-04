<?php

namespace App\Http\Controllers;

use App\DataTables\EvaluacionDataTable;
use App\Models\Personal;
use App\Http\Requests;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\CreateEvaluacionRequest;
use App\Http\Requests\UpdateEvaluacionRequest;
use App\Models\Evaluacion;
use App\Models\Tipo_tarea;
use App\Repositories\EvaluacionRepository;
use Flash;
use Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

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
        $user = Auth::user();
        $evaluacion = new Evaluacion;
        $evaluacion->Fecha_fin = new Carbon($request->Fecha_fin);
        $evaluacion->Fecha_inicio = new Carbon($request->Fecha_inicio);
        $evaluacion->Personal_id = $personal->id;
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
        $tipos_de_tareas = Tipo_tarea::all();
        return view('evaluacions.show', compact('tipos_de_tareas'))->with('evaluacion', $evaluacion);
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

        return redirect()->back();
    }
}
