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

    public function create(Personal $personal)
    {
        return view('evaluacions.create', compact('personal'));
    }

    public function store(Personal $personal, CreateEvaluacionRequest $request)
    {
        $user = Auth::user();
        $evaluacion = new Evaluacion;
        $evaluacion->Fecha_fin = new Carbon($request->Fecha_fin);
        $evaluacion->Fecha_inicio = new Carbon($request->Fecha_inicio);
        $evaluacion->Personal_id = $personal->id;
        $evaluacion->Evaluador_id = $user->Personal_id;
        $evaluacion->save();

        Flash::success('Se realizó con éxito la carga de la evaluación');

        return redirect(route('personals.show', $personal->id));
    }

    public function show($id)
    {
        $evaluacion = $this->evaluacionRepository->find($id);

        $personal = Personal::all()->find($evaluacion->Personal_id);

        $tipos_tareas = Tipo_tarea::all();

        //Datos para grafica

            $tipos_tareas_graf = [];
            $calificacion_graf = [];

            foreach ($tipos_tareas as $item) {
                if (($personal->get_rendimiento($personal->get_tareas_desarrolladas_por_fecha($item->Nombre_tipo_tarea,$evaluacion->Fecha_inicio, $evaluacion->Fecha_fin)))>1) {

                    $tipos_tareas_graf[]=$item->Nombre_tipo_tarea;
                    $calificacion_graf[]=$personal->get_rendimiento($personal->get_tareas_desarrolladas_por_fecha($item->Nombre_tipo_tarea,$evaluacion->Fecha_inicio, $evaluacion->Fecha_fin));

                }
            }

        //Fin datos para grafica

        if (empty($evaluacion)) {
            Flash::error('Evaluacion not found');

            return redirect(route('evaluacions.index'));
        }
        $tipos_de_tareas = Tipo_tarea::all();
        return view('evaluacions.show', compact('personal','tipos_de_tareas','tipos_tareas_graf','calificacion_graf'))->with('evaluacion', $evaluacion);
    }

    public function edit($id)
    {
        $evaluacion = $this->evaluacionRepository->find($id);

        if (empty($evaluacion)) {
            Flash::error('Evaluacion not found');

            return redirect(route('evaluacions.index'));
        }

        return view('evaluacions.edit')->with('evaluacion', $evaluacion);
    }

    public function update($id, UpdateEvaluacionRequest $request)
    {
        $evaluacion = $this->evaluacionRepository->find($id);

        if (empty($evaluacion)) {
            Flash::error('Evaluacion not found');

            return redirect(route('evaluacions.index'));
        }

        $evaluacion = $this->evaluacionRepository->update($request->all(), $id);

        Flash::success('Se realizó con éxito la actualización de datos de la evaluación');

        return redirect(route('evaluacions.index'));
    }

    public function destroy($id)
    {
        $evaluacion = $this->evaluacionRepository->find($id);

        if (empty($evaluacion)) {
            Flash::error('Evaluacion not found');

            return redirect(route('evaluacions.index'));
        }

        $this->evaluacionRepository->delete($id);

        Flash::success('Se evaluación fue eliminada con éxtio');

        return redirect()->back();
    }
}
