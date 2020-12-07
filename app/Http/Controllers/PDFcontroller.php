<?php

namespace App\Http\Controllers;

use App\Models\Personal;
use App\Models\Proyecto;
use Illuminate\Http\Request;
use App\PDFconfig;
use Carbon\Carbon;
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

}
