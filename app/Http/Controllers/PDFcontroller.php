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

        $auditorias = Audit::all();
        $aux = collect();
        $filtro = "";
        if (($request->fecha1 != null && $request->fecha2 != null) && $request->tabla == null && $request->empleado_id == null) {
            foreach ($auditorias as $a) {
                $f = ($a->created_at);
                $f->setTime(0,0,0);
                $fecha1 = Carbon::create($request->input('fecha1'));
                $fecha2 = Carbon::create($request->input('fecha2'));
                if (($f->greaterThanOrEqualTo($fecha1)) && ($f->lessThanOrEqualTo($fecha2))) {
                    $aux->push($a);
                }
            }
            $filtro = "Filtros: -Fecha: desde:" . $fecha1->format('d/m/Y') . " hasta: " . $fecha2->format('d/m/Y');
        } elseif (($request->fecha1 != null && $request->fecha2 != null) && $request->tabla != null && $request->empleado_id == null) {
            if ($request->tabla == 1) {
                $tabla = 'Movimiento';
            } elseif ($request->tabla == 2) {
                $tabla = 'User';
            } elseif ($request->tabla == 3) {
                $tabla = 'Producto';
            } elseif ($request->tabla == 4) {
                $tabla = 'Reclamo';
            }
            foreach ($auditorias as $a) {
                $f = $a->created_at;
                $f->setTime(0,0,0);
                $fecha1 = Carbon::create($request->input('fecha1'));
                $fecha2 = Carbon::create($request->input('fecha2'));
                if ((($f->greaterThanOrEqualTo($fecha1)) && ($f->lessThanOrEqualTo($fecha2))) && (strpos($a->auditable_type, $tabla) !== false)) {
                    $aux->push($a);
                }
            }
            if ($request->tabla == 1) {
                $tabla2 = 'MOVIMIENTOS';
            } elseif ($request->tabla == 2) {
                $tabla2 = 'EMPLEADOS';
            } elseif ($request->tabla == 3) {
                $tabla2 = 'PRODUCTOS';
            } elseif ($request->tabla == 4) {
                $tabla2 = 'RECLAMOS';
            }
            $filtro = "Filtros: -Fecha: desde:" . $fecha1->format('d/m/Y') . " hasta: " . $fecha2->format('d/m/Y') . ' -Tabla ' . $tabla2;
        } elseif (($request->fecha1 != null && $request->fecha2 != null) && $request->tabla == null && $request->empleado_id != null) {
            foreach ($auditorias as $a) {
                $f = ($a->created_at);
                $f->setTime(0,0,0);
                $fecha1 = Carbon::create($request->input('fecha1'));
                $fecha2 = Carbon::create($request->input('fecha2'));

                if ((($f->greaterThanOrEqualTo($fecha1)) && ($f->lessThanOrEqualTo($fecha2))) && ($a->user_id == $request->empleado_id)) {
                    $aux->push($a);
                }
            }
            $empleado = User::find($request->empleado_id);
            $filtro = "Filtros: -Fecha: desde:" . $fecha1->format('d/m/Y') . " hasta: " . $fecha2->format('d/m/Y') . ' -Empleado: ' . $empleado->apellido . " " . $empleado->nombre;
        } elseif (($request->fecha1 != null && $request->fecha2 != null) && $request->tabla != null && $request->empleado_id != null) {
            if ($request->tabla == 1) {
                $tabla = 'Movimiento';
            } elseif ($request->tabla == 2) {
                $tabla = 'User';
            } elseif ($request->tabla == 3) {
                $tabla = 'Producto';
            } elseif ($request->tabla == 4) {
                $tabla = 'Reclamo';
            }
            foreach ($auditorias as $a) {
                $f = $a->created_at;
                $f->setTime(0,0,0);
                $fecha1 = Carbon::create($request->input('fecha1'));
                $fecha2 = Carbon::create($request->input('fecha2'));
                if ((($f->greaterThanOrEqualTo($fecha1)) && ($f->lessThanOrEqualTo($fecha2))) && (strpos($a->auditable_type, $tabla) !== false) && ($a->user_id == $request->empleado_id)) {
                    $aux->push($a);
                }
            }
            if ($request->tabla == 1) {
                $tabla2 = 'MOVIMIENTOS';
            } elseif ($request->tabla == 2) {
                $tabla2 = 'EMPLEADOS';
            } elseif ($request->tabla == 3) {
                $tabla2 = 'PRODUCTOS';
            } elseif ($request->tabla == 4) {
                $tabla2 = 'RECLAMOS';
            }
            $empleado = User::find($request->empleado_id);
            $filtro = "Filtros: -Fecha: desde:" . $fecha1->format('d/m/Y') . " hasta: " . $fecha2->format('d/m/Y') . ' -Tabla ' . $tabla2 . ' -Empleado: ' . $empleado->apellido  . ' ' . $empleado->name;
        } elseif (($request->fecha1 == null && $request->fecha2 == null) && $request->tabla != null && $request->empleado_id != null) {
            if ($request->tabla == 1) {
                $tabla = 'Movimiento';
            } elseif ($request->tabla == 2) {
                $tabla = 'User';
            } elseif ($request->tabla == 3) {
                $tabla = 'Producto';
            } elseif ($request->tabla == 4) {
                $tabla = 'Reclamo';
            }
            foreach ($auditorias as $a) {
                if ((strpos($a->auditable_type, $tabla) !== false) && ($a->user_id == $request->empleado_id)) {
                    $aux->push($a);
                }
            }
            if ($request->tabla == 1) {
                $tabla2 = 'MOVIMIENTOS';
            } elseif ($request->tabla == 2) {
                $tabla2 = 'EMPLEADOS';
            } elseif ($request->tabla == 3) {
                $tabla2 = 'PRODUCTOS';
            } elseif ($request->tabla == 4) {
                $tabla2 = 'RECLAMOS';
            }
            $empleado = User::find($request->empleado_id);
            $filtro = "Filtros: -Tabla " . $tabla2 . ' -Empleado: ' . $empleado->apellido  . ' ' . $empleado->name;
        } elseif (($request->fecha1 == null && $request->fecha2 == null) && $request->tabla == null && $request->empleado_id != null) {

            foreach ($auditorias as $a) {
                if (($a->user_id == $request->empleado_id)) {
                    $aux->push($a);
                }
            }

            $empleado = User::find($request->empleado_id);
            $filtro = "Filtros: -Empleado: " . $empleado->apellido  . ' ' . $empleado->name;
        } elseif (($request->fecha1 == null && $request->fecha2 == null) && $request->tabla != null && $request->empleado_id == null) {

            if ($request->tabla == 1) {
                $tabla = 'Movimiento';
            } elseif ($request->tabla == 2) {
                $tabla = 'User';
            } elseif ($request->tabla == 3) {
                $tabla = 'Producto';
            } elseif ($request->tabla == 4) {
                $tabla = 'Reclamo';
            }
            foreach ($auditorias as $a) {
                if ((strpos($a->auditable_type, $tabla) !== false)) {
                    $aux->push($a);
                }
            }
            if ($request->tabla == 1) {
                $tabla2 = 'MOVIMIENTOS';
            } elseif ($request->tabla == 2) {
                $tabla2 = 'EMPLEADOS';
            } elseif ($request->tabla == 3) {
                $tabla2 = 'PRODUCTOS';
            } elseif ($request->tabla == 4) {
                $tabla2 = 'RECLAMOS';
            }
            $filtro = "Filtros: -Tabla " . $tabla2;
        } else {
            $aux = $auditorias;
        }

        $config = PDFconfig::first();
        $cant = sizeof($aux);
        $datos = date('d/m/Y');
        $pdf = PDF::loadView('pdf.auditoria', ['auditorias' => $aux, 'datos' => $datos, 'cant' => $cant, 'filtro' => $filtro, 'config' => $config]);
        $y = $pdf->getDomPDF()->get_canvas()->get_height() - 35;
        $pdf->getDomPDF()->get_canvas()->page_text(500, $y, "Pagina {PAGE_NUM} de {PAGE_COUNT}", null, 10, array(0, 0, 0));
        return $pdf->stream('auditoria.pdf');
    }

}
