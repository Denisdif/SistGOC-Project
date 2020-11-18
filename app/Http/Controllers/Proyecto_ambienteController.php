<?php

namespace App\Http\Controllers;

use App\DataTables\Proyecto_ambienteDataTable;
use App\Models\Proyecto;
use App\Models\ambiente;
use App\Models\Proyecto_ambiente;
use App\Http\Requests;
use App\Http\Requests\CreateProyecto_ambienteRequest;
use App\Http\Requests\UpdateProyecto_ambienteRequest;
use App\Repositories\Proyecto_ambienteRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use Exception;
use Redirect;

class Proyecto_ambienteController extends AppBaseController
{
    /** @var  Proyecto_ambienteRepository */
    private $proyectoAmbienteRepository;

    public function __construct(Proyecto_ambienteRepository $proyectoAmbienteRepo)
    {
        $this->proyectoAmbienteRepository = $proyectoAmbienteRepo;
    }

    /**
     * Display a listing of the Proyecto_ambiente.
     *
     * @param Proyecto_ambienteDataTable $proyectoAmbienteDataTable
     * @return Response
     */
    public function index(Proyecto $proyecto, Proyecto_ambienteDataTable $proyectoAmbienteDataTable)
    {
        $ambientesDelProyecto = Proyecto_ambiente::all()->where('Proyecto_id','=', $proyecto->id);

        return $proyectoAmbienteDataTable->render('proyecto_ambientes.index',compact('proyecto','ambientesDelProyecto'));
    }

    /**
     * Show the form for creating a new Proyecto_ambiente.
     *
     * @return Response
     */
    public function create(Proyecto $proyecto)
    {
        $ambientesDelProyecto = Proyecto_ambiente::all()->where('Proyecto_id','=', $proyecto->id);
        return view('proyecto_ambientes.create',compact('proyecto','ambientesDelProyecto'));
    }

    /**
     * Store a newly created Proyecto_ambiente in storage.
     *
     * @param CreateProyecto_ambienteRequest $request
     *
     * @return Response
     */
    public function store(Proyecto $proyecto, CreateProyecto_ambienteRequest $request)
    {
        //return $request;
        try {
            for ($i=0; $i < sizeof($request->Cantidad); $i++) {
                $lista_ambientes = Proyecto_ambiente::all()->where('Proyecto_id','=', $proyecto->id);
                $existe = false;
                foreach ($lista_ambientes as $item) {
                    if (($item->Ambiente_id) == ($request->Ambiente_id[$i])) {
                        $item->Cantidad += $request->Cantidad[$i];
                        $item->save();
                        $existe = true;
                    }
                }
                if ($existe == false) {
                    $proyectoAmbiente = new Proyecto_ambiente();
                    $proyectoAmbiente->Ambiente_id = $request->Ambiente_id[$i];
                    $proyectoAmbiente->Cantidad = $request->Cantidad[$i];
                    $proyectoAmbiente->Proyecto_id = $proyecto->id;
                    $proyectoAmbiente->save();
                }
            }
            Flash::success('Se cargaron los ambientes correctamente');

            return redirect(route('proyectos.show', $proyecto->id, compact('proyecto')));
            //return redirect()->back();

        } catch (Exception $e) {
            return redirect(route('proyectos.show', $proyecto->id, compact('proyecto')));
        }

        /*$input = $request->all();
        $proyectoAmbiente = $this->proyectoAmbienteRepository->create($input);
        $proyectoAmbiente->Proyecto_id = $proyecto->id;
        $proyectoAmbiente->save();*/

        Flash::success('Proyecto Ambiente saved successfully.');

        //return ($proyecto);
    }

    /**
     * Display the specified Proyecto_ambiente.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $proyectoAmbiente = $this->proyectoAmbienteRepository->find($id);

        if (empty($proyectoAmbiente)) {
            Flash::error('Proyecto Ambiente not found');

            return redirect(route('proyectoAmbientes.index'));
        }

        return view('proyecto_ambientes.show')->with('proyectoAmbiente', $proyectoAmbiente);
    }

    /**
     * Show the form for editing the specified Proyecto_ambiente.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $proyectoAmbiente = $this->proyectoAmbienteRepository->find($id);

        if (empty($proyectoAmbiente)) {
            Flash::error('Proyecto Ambiente not found');

            return redirect(route('proyectoAmbientes.index'));
        }

        return view('proyecto_ambientes.edit')->with('proyectoAmbiente', $proyectoAmbiente);
    }

    /**
     * Update the specified Proyecto_ambiente in storage.
     *
     * @param  int              $id
     * @param UpdateProyecto_ambienteRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProyecto_ambienteRequest $request)
    {
        $proyectoAmbiente = $this->proyectoAmbienteRepository->find($id);

        if (empty($proyectoAmbiente)) {
            Flash::error('Proyecto Ambiente not found');

            return redirect(route('proyectoAmbientes.index'));
        }

        $proyectoAmbiente = $this->proyectoAmbienteRepository->update($request->all(), $id);

        Flash::success('Proyecto Ambiente updated successfully.');

        return redirect(route('proyectoAmbientes.index'));
    }

    /**
     * Remove the specified Proyecto_ambiente from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /* INICIO obtencion del id del proyecto actual*/

        $lista = Proyecto_ambiente::all();

        $idProyecto = 0;

        foreach ($lista as $item) {
            if ($item->id == $id){
                $idProyecto = $item->Proyecto_id;
            }
        }

        /* FIN obtencion del id del proyecto actual*/

        $proyectoAmbiente = $this->proyectoAmbienteRepository->find($id);

        if (empty($proyectoAmbiente)) {
            Flash::error('Proyecto Ambiente not found');

            return redirect(route('proyectos.show', $idProyecto, compact('proyecto')));
        }

        $this->proyectoAmbienteRepository->delete($id);

        Flash::success('Proyecto Ambiente deleted successfully.');

        return redirect(route('proyectos.show', $idProyecto, compact('proyecto')));
    }
}
