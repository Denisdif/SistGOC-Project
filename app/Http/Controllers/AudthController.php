<?php

namespace App\Http\Controllers;

use App\Models\Proyecto;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Models\Audit;

class AudthController extends Controller
{
    public $modelosAuditoria = [
        'proyectos' => 'Proyectos'
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $modelosAuditoria = $this->modelosAuditoria;
        $usuarios = User::all();
        $auditorias = Audit::latest()->get();

        return view('auditoria.index', compact('auditorias', 'modelosAuditoria', 'usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
