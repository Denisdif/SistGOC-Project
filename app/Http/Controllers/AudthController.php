<?php

namespace App\Http\Controllers;

use App\Models\Proyecto;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Models\Audit;

class AudthController extends Controller
{
    public $modelosAuditoria = [
        'proyectos' => 'Proyecto', 'ambientes' => 'Ambiente', 'asignacion_personal_tareas' => 'AsignacionPersonalTarea',
        'comentarios' => 'Comentario', 'comitentes' => 'Comitente', 'entregas' => 'Entrega', 'estado_tareas' => 'Estado_tarea',
        'evaluacions' => 'Evaluacion', 'personals' => 'Personal', 'proyecto_ambientes' => 'Proyecto_ambiente', 'tareas' => 'Tarea',
        'tipo_proyectos' => 'Tipo_proyecto', 'tipo_tareas' => 'Tipo_tarea'
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $modelosAuditoria = $this->modelosAuditoria;
        $usuarios = User::all();

        $user_id = $request->user_id;
        $tabla = $request->tabla;
        $hasta = Carbon::now();
        $desde = new Carbon('1900-03-02 10:32:45.654321');

        if ($request->desde) {
            $desde = $request->desde;
        }
        if ($request->hasta) {
            $hasta = $request->hasta;
        }

        if ($request->user_id) {
            $auditorias = Audit::orderBy('id', 'DESC')
            ->where('user_id', '=', $request->user_id)
            ->where('auditable_type', 'LIKE', "%$request->tabla%")
            ->whereDate('created_at', '>=', $desde)
            ->whereDate('created_at', '<=', $hasta)
            ->paginate('100');
        }else {
                $auditorias = Audit::orderBy('id', 'DESC')
                ->where('auditable_type', 'LIKE', "%$request->tabla%")
                ->whereDate('created_at', '>=', $desde)
                ->whereDate('created_at', '<=', $hasta)
                ->paginate('100');
                }

        return view('auditoria.index', compact('auditorias', 'modelosAuditoria', 'usuarios','desde','hasta','user_id','tabla'));
    }

    public function show($id)
    {
        $auditoria = Audit::find($id);

        return view('auditoria.show', compact('auditoria'));
    }

    public function historial($id)
    {
        $auditoria = Audit::find($id);
        $tabla = str_replace(['App\\Models\\', '$', ' '], '', $auditoria->auditable_type);
        $objetoAuditable = $auditoria->auditable_type::withTrashed()->find($auditoria->auditable_id);
        $auditorias = $objetoAuditable->audits()->latest()->get();
        return view('auditoria.historial', compact('auditorias', 'tabla'));
    }
}
