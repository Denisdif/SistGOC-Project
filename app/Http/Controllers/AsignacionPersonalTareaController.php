<?php

namespace App\Http\Controllers;

use App\DataTables\AsignacionPersonalTareaDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateAsignacionPersonalTareaRequest;
use App\Http\Requests\UpdateAsignacionPersonalTareaRequest;
use App\Http\Controllers\AppBaseController;
use App\Mail\AsignacionTarea;
use App\Repositories\AsignacionPersonalTareaRepository;
use App\Models\AsignacionPersonalTarea;
use App\Models\Tarea;
use App\Models\Personal;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\EmergencyCallReceived;
use Illuminate\Routing\Redirector;
use Exception;
use Redirect;
use Response;
use Flash;
use Illuminate\Support\Facades\Redirect as FacadesRedirect;

class AsignacionPersonalTareaController extends AppBaseController
{
    /** @var  AsignacionPersonalTareaRepository */
    private $asignacionPersonalTareaRepository;

    public function __construct(AsignacionPersonalTareaRepository $asignacionPersonalTareaRepo)
    {
        $this->asignacionPersonalTareaRepository = $asignacionPersonalTareaRepo;
    }

    public function index(AsignacionPersonalTareaDataTable $asignacionPersonalTareaDataTable)
    {
        return $asignacionPersonalTareaDataTable->render('asignacion_personal_tareas.index');
    }

    public function indexPersonal(AsignacionPersonalTareaDataTable $asignacionPersonalTareaDataTable)
    {
        $user = Auth::user();
        $personal = Personal::all()->where('id','=', $user->personal->id)->first();

        return View('asignacion_personal_tareas.index', compact('tareas','personal'));
    }

    public function create(Tarea $tarea)
    {
        $personal = Personal::all();
        $asignaciones = AsignacionPersonalTarea::all()->where('Tarea_id','=', $tarea->id);
        return view('asignacion_personal_tareas.create', compact('tarea','personal','asignaciones'));
    }

    public function store(Tarea $tarea, CreateAsignacionPersonalTareaRequest $request)
    {
        $aviso = "";

            if ($request->Responsable) {
                $asignacionPersonalTarea = new AsignacionPersonalTarea;
                $asignacionPersonalTarea->Personal_id = $request->Responsable;
                $asignacionPersonalTarea->Responsabilidad = "Responsable";
                $asignacionPersonalTarea->Tarea_id = $tarea->id;
                $asignacionPersonalTarea->save();
                //Mail::to($asignacionPersonalTarea->Personal->User->email)->send(new AsignacionTarea($asignacionPersonalTarea));
                Mail::to("sistgoc@gmail.com")->send(new AsignacionTarea($asignacionPersonalTarea));

                $aviso =    $aviso."Se asignó a ".$asignacionPersonalTarea->Personal->NombrePersonal." ".
                            $asignacionPersonalTarea->Personal->ApellidoPersonal." como ".$asignacionPersonalTarea->Responsabilidad.
                            " de la tarea ".$asignacionPersonalTarea->tarea->Nombre_tarea."<br>";
            }
        try {
            if ($request->Colaboradores) {
                for ($i=0; $i < sizeof($request->Colaboradores); $i++) {
                    $asignacionPersonalTarea = new AsignacionPersonalTarea;
                    $asignacionPersonalTarea->Personal_id = $request->Colaboradores[$i];
                    $asignacionPersonalTarea->Responsabilidad = "Colaborador";
                    $asignacionPersonalTarea->Tarea_id = $tarea->id;
                    $asignacionPersonalTarea->save();
                    Mail::to("sistgoc@gmail.com")->send(new AsignacionTarea($asignacionPersonalTarea));

                    $aviso =    $aviso."Se asignó a ".$asignacionPersonalTarea->Personal->NombrePersonal." ".
                                $asignacionPersonalTarea->Personal->ApellidoPersonal." como ".$asignacionPersonalTarea->Responsabilidad.
                                " de la tarea ".$asignacionPersonalTarea->tarea->Nombre_tarea."<br>";
                }
            }
            if ($tarea->Estado_tarea_id == 1){ //Cambia el estado de la tarea de creada a asignada
                $tarea->Estado_tarea_id = 2; //Id "2" de estado tarea = Asignada
                $tarea->save();
            }

            Flash::success('Se realizaron con éxito las siguientes asignaciones:'.'<br><br>'.$aviso);
            return Redirect::back();

        } catch (Exception $e) {

            Flash::error('El usuario responsable no puede ser colaborador de la misma tarea');

            return Redirect::back();
        }


    }

    public function show($id)
    {
        $asignacionPersonalTarea = $this->asignacionPersonalTareaRepository->find($id);

        if (empty($asignacionPersonalTarea)) {
            Flash::error('Asignacion Personal Tarea not found');

            return redirect(route('asignacionPersonalTareas.index'));
        }

        return view('asignacion_personal_tareas.show')->with('asignacionPersonalTarea', $asignacionPersonalTarea);
    }

    public function edit($id)
    {
        $asignacionPersonalTarea = $this->asignacionPersonalTareaRepository->find($id);

        if (empty($asignacionPersonalTarea)) {
            Flash::error('Asignacion Personal Tarea not found');

            return redirect(route('asignacionPersonalTareas.index'));
        }

        return view('asignacion_personal_tareas.edit')->with('asignacionPersonalTarea', $asignacionPersonalTarea);
    }

    public function update($id, UpdateAsignacionPersonalTareaRequest $request)
    {
        $asignacionPersonalTarea = $this->asignacionPersonalTareaRepository->find($id);

        if (empty($asignacionPersonalTarea)) {
            Flash::error('Asignacion Personal Tarea not found');

            return redirect(route('asignacionPersonalTareas.index'));
        }

        $asignacionPersonalTarea = $this->asignacionPersonalTareaRepository->update($request->all(), $id);

        Flash::success('Asignacion Personal Tarea updated successfully.');

        return redirect(route('asignacionPersonalTareas.index'));
    }

    public function destroy($id)
    {

        $asignacionPersonalTarea = $this->asignacionPersonalTareaRepository->find($id);

        if (empty($asignacionPersonalTarea)) {
            Flash::error('Asignacion Personal Tarea not found');

            return redirect()->back();
        }

        $this->asignacionPersonalTareaRepository->delete($id);

        Flash::success('Se ha eliminado la asignación con éxito.');

        return redirect()->back();
    }
}
