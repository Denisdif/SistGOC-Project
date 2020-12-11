<?php

namespace App\Http\Controllers;

use App\Models\Personal;
use App\Models\Proyecto;
use App\User;
use Illuminate\Http\Request;
use App\PDFconfig;
use Carbon\Carbon;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Models\Audit;
use PDF;

class PDFcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function proyectosPDF(Request $request)
    {
        $proyectos = Proyecto::orderBy('id', 'DESC')
                ->Id($request->codigo)
                ->Comitente($request->comitente)
                ->Tipo($request->tipo)
                ->Provincia($request->provincia, $request->localidad,$request->calle)
                ->paginate('100');
        $datos = date('d/m/Y');
        $cant = sizeof($proyectos);
        $config = PDFconfig::first();
        $pdf = PDF::loadView('pdf.proyectos', ['proyectos' => $proyectos, 'datos' => $datos, 'cant' => $cant, 'config' => $config]);
        $y = $pdf->getDomPDF()->get_canvas()->get_height() - 35;
        $pdf->getDomPDF()->get_canvas()->page_text(500, $y, "Pagina {PAGE_NUM} de {PAGE_COUNT}", null, 10, array(0, 0, 0));
        return $pdf->stream('proyectos.pdf');
    }

    public function personalsPDF(Request $request)
    {

        $hasta = Carbon::now();
            $desde = Carbon::now();
            $desde->subYears(200);

            if ($request->mayorQ) {
                $hasta = Carbon::now();
                $mayorQ = $request->mayorQ;
                $mayorQ += 1;
                $hasta = $hasta->subYears($mayorQ);
            }

            if ($request->menorQ) {
                $desde = Carbon::now();
                $menorQ = $request->menorQ;
                $desde = $desde->subYears($menorQ);
            }

        //Fin de variables para filtrar edad

        $personals = Personal::orderBy('id', 'DESC')
                ->Name($request->Nombre)
                ->Apellido($request->Apellido)
                ->FechaNac($desde, $hasta)
                ->Rol($request->rol)
                ->paginate('100');

        $datos = date('d/m/Y');
        $cant = sizeof($personals);
        $config = PDFconfig::first();
        $pdf = PDF::loadView('pdf.personals', ['personals' => $personals, 'datos' => $datos, 'cant' => $cant, 'config' => $config]);
        $y = $pdf->getDomPDF()->get_canvas()->get_height() - 35;
        $pdf->getDomPDF()->get_canvas()->page_text(500, $y, "Pagina {PAGE_NUM} de {PAGE_COUNT}", null, 10, array(0, 0, 0));
        return $pdf->stream('personals.pdf');
    }

    public function auditoriaPDF(Request $request)
    {


        if ($request->user_id) {
            if (($request->desde) and ($request->hasta)) {
                $auditorias = Audit::orderBy('id', 'DESC')
                ->where('user_id', '=', $request->user_id)
                ->where('auditable_type', 'LIKE', "%$request->tabla%")
                ->whereDate('created_at', '>=', $request->desde)
                ->whereDate('created_at', '<=', $request->hasta)
                ->paginate('100');
            }else{
                if (($request->hasta)and($request->desde == null)) {
                    $auditorias = Audit::orderBy('id', 'DESC')
                        ->where('user_id', '=', $request->user_id)
                        ->where('auditable_type', 'LIKE', "%$request->tabla%")
                        ->whereDate('created_at', '<=', $request->hasta)
                        ->paginate('100');
                }else {
                    if (($request->desde)and($request->hasta == null)) {
                        $auditorias = Audit::orderBy('id', 'DESC')
                            ->where('user_id', '=', $request->user_id)
                            ->where('auditable_type', 'LIKE', "%$request->tabla%")
                            ->whereDate('created_at', '>=', $request->desde)
                            ->paginate('100');
                    }else{
                        if (($request->desde == null) and ($request->hasta == null)) {
                            $auditorias = Audit::orderBy('id', 'DESC')
                                ->where('user_id', '=', $request->user_id)
                                ->where('auditable_type', 'LIKE', "%$request->tabla%")
                                ->paginate('100');
                        }
                    }
                }
            }
        }else {
            if (($request->desde) and ($request->hasta)) {
                $auditorias = Audit::orderBy('id', 'DESC')
                ->where('auditable_type', 'LIKE', "%$request->tabla%")
                ->whereDate('created_at', '>=', $request->desde)
                ->whereDate('created_at', '<=', $request->hasta)
                ->paginate('100');
            }else{
                if (($request->hasta)and($request->desde == null)) {
                    $auditorias = Audit::orderBy('id', 'DESC')
                        ->where('auditable_type', 'LIKE', "%$request->tabla%")
                        ->whereDate('created_at', '<=', $request->hasta)
                        ->paginate('100');
                }else {
                    if (($request->desde)and($request->hasta == null)) {
                        $auditorias = Audit::orderBy('id', 'DESC')
                            ->where('auditable_type', 'LIKE', "%$request->tabla%")
                            ->whereDate('created_at', '>=', $request->desde)
                            ->paginate('100');
                    }else{
                        if (($request->desde == null) and ($request->hasta == null)) {
                            $auditorias = Audit::orderBy('id', 'DESC')
                                ->where('auditable_type', 'LIKE', "%$request->tabla%")
                                ->paginate('100');
                        }
                    }
                }
            }
        }
        $filtro = "nada";
        $config = PDFconfig::first();
        $cant = sizeof($auditorias);
        $datos = date('d/m/Y');
        $pdf = PDF::loadView('pdf.auditoria', ['auditorias' => $auditorias, 'datos' => $datos, 'cant' => $cant, 'filtro' => $filtro, 'config' => $config]);
        $y = $pdf->getDomPDF()->get_canvas()->get_height() - 35;
        $pdf->getDomPDF()->get_canvas()->page_text(500, $y, "Pagina {PAGE_NUM} de {PAGE_COUNT}", null, 10, array(0, 0, 0));
        return $pdf->stream('auditoria.pdf');




    }

}
