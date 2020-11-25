<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PDFconfig;
use App\Models\Proyecto;
use PDF;

class PDFcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function proyectosPDF()
    {
        $proveedores = Proyecto::all();
        $datos = date('d/m/Y');
        $cant = sizeof($proveedores);
        $config = PDFconfig::first();
        $pdf = PDF::loadView('pdf.proyectos', ['proveedores' => $proveedores, 'datos' => $datos, 'cant' => $cant, 'config' => $config]);
        $y = $pdf->getDomPDF()->get_canvas()->get_height() - 35;
        $pdf->getDomPDF()->get_canvas()->page_text(500, $y, "Pagina {PAGE_NUM} de {PAGE_COUNT}", null, 10, array(0, 0, 0));
        return $pdf->stream('proyectos.pdf');
    }

}
