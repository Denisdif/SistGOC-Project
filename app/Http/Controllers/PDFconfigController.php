<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PDFconfig;
use App\Models\Proyecto;

class PDFconfigController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proyectos = Proyecto::all();
        $config = PDFconfig::first();
        return view ('PDFconfig.parametros', compact('proyectos', 'config'));
    }


    public function update(Request $request, $id)
    {
        //
    }

}
