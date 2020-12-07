<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Tipo_proyecto;
use App\Models\Personal;
use App\Models\Tarea;
use App\Models\Comitente;
use App\Models\Direccion;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;
use OwenIt\Auditing\Contracts\Auditable;
Carbon::setUTF8(true);
setlocale(LC_TIME, 'es_ES');
Carbon::setLocale('es');


class Proyecto extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    use SoftDeletes;
    protected $guarded = [];

    public $table = 'proyectos';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'id',
        'Nombre_proyecto',
        'Tipo_proyecto_id',
        'Nro_plantas',
        'Fecha_inicio_Proy',
        'Fecha_fin_Proy',
        'Director_id',
        'Comitente_id',
        'Descripcion'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'Nombre_proyecto' => 'string',
        'Tipo_proyecto_id' => 'integer',
        'Nro_plantas' => 'integer',
        'Fecha_inicio_Proy' => 'date',
        'Fecha_fin_Proy' => 'date',
        'Director_id' => 'integer',
        'Comitente_id' => 'integer',
        'Descripcion' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
    ];

    //-------------------------- Relaciones --------------------------

    public function Proyecto_ambiente()
    {
        return $this->hasMany('App\Models\Proyecto_ambiente');
    }

    public function tarea()
    {
        return $this->hasMany(Tarea::class);
    }

    public function tipo_proyecto()
    {
        return $this->belongsTo( Tipo_proyecto::class ,'Tipo_proyecto_id');
    }
    public function director()
    {
        return $this->belongsTo( Personal::class ,'Director_id');
    }

    public function comitente()
    {
        return $this->belongsTo( Comitente::class ,'Comitente_id');
    }

    public function direccion(){

        return $this->belongsTo(Direccion::class, 'Direccion_id');
    }

    //-------------------------- Filtros --------------------------

    public function scopeId($query, $id){

        if($id)
            return $query->where('id', 'LIKE', "%$id%");
    }

    public function scopeComitente($query, $comitente){

        if($comitente)

            return $query   ->join('comitentes','proyectos.Comitente_id','=','comitentes.id')
                            ->select('proyectos.*','comitentes.NombreComitente')
                            ->where('comitentes.NombreComitente', 'LIKE', "%$comitente%");
    }

    public function scopeTipo($query, $tipo){

        if($tipo)

            return $query   ->join('tipo_proyectos','proyectos.Tipo_Proyecto_id','=','tipo_proyectos.id')
                            ->select('proyectos.*','tipo_proyectos.Nombre')
                            ->where('tipo_proyectos.Nombre', 'LIKE', "%$tipo%");
    }

    public function scopeProvincia($query, $provincia, $localidad, $calle){

        if($provincia)

            return $query   ->join('direccions','proyectos.Direccion_id','=','direccions.id')
                            ->join('provincias','direccions.Provincia_id','=','provincias.id')
                            ->join('localidades','direccions.Localidad_id','=','localidades.id')
                            ->select('proyectos.*','provincias.provincia','localidades.localidad','direccions.calle')
                            ->where('provincias.provincia', 'LIKE', "%$provincia%")
                            ->where('localidades.localidad', 'LIKE', "%$localidad%")
                            ->where('direccions.calle', 'LIKE', "%$calle%");
    }

    /*public function scopeLocalidad($query){

        if($localidad)

            return $query   ->join('direccions','proyectos.Direccion_id','=','direccions.id')

                            ->select('proyectos.*')
                            ->where();
    }

    public function scopeCalle($query){

        if($calle)

            return $query   ->join('direccions','proyectos.Direccion_id','=','direccions.id')
                            ->select('proyectos.*')
                            ->where();
    }*/

    //-------------------------- Métodos --------------------------

    public function duracionEstimadaReal()
    {
        $inicio = new Carbon($this->Fecha_inicio_Proy);
        $fin = new Carbon($this->Fecha_fin_Proy);
        $suma = ($inicio->diffInMinutes($fin));
        $suma = $suma/60;
        return $suma." horas";
    }

    public function get_fecha_fin(){
        $date = new Carbon($this->Fecha_fin_Proy);
        $date = $date->formatLocalized('%A %d %B %Y');
        return $date;
    }

    public function get_fecha_inicio(){
        $date = new Carbon($this->Fecha_inicio_Proy);
        $date = $date->formatLocalized('%A %d %B %Y');
        return $date;
    }

    public function getFechaCreacion(){
        $date = new Carbon($this->created_at);
        $date = $date->formatLocalized('%A %d %B %Y');
        return $date;
    }

    public function asignacion_inteligente(){

        $tareas = Tarea::all()->where('Proyecto_id','=', $this->id);
        foreach ($tareas as $item) {
            $item->asignacion_inteligente();
        }

        return "Funciono";
    }

    public function tareas_finalizadas(){
        $tareas = [];
        foreach ($this->tarea as $item) {
            if ($item->Estado_tarea_id == 6) {
                $tareas[] = $item;
            }
        }
        return $tareas;
    }

    public function tareas_no_finalizadas(){
        $tareas = [];
        foreach ($this->tarea as $item) {
            if ($item->Estado_tarea_id != 6) {
                $tareas[] = $item;
            }
        }
        return $tareas;
    }
}
