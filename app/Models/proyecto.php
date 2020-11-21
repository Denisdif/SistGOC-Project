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
Carbon::setUTF8(true);
setlocale(LC_TIME, 'es_ES');
Carbon::setLocale('es');

/**
 * Class Proyecto
 * @package App\Models
 * @version October 9, 2020, 1:03 am UTC
 *
 * @property string $Nombre_proyecto
 * @property integer $Tipo_proyecto_id
 * @property integer $Nro_plantas
 * @property string $Fecha_inicio_Proy
 * @property string $Fecha_fin_Proy
 * @property integer $Director_id
 * @property integer $Comitente_id
 * @property string $Descripcion
 */
class Proyecto extends Model
{
    use SoftDeletes;

    public $table = 'proyectos';


    protected $dates = ['deleted_at'];



    public $fillable = [
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
}
