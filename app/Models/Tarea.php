<?php

namespace App\Models;

use Eloquent as Model;
use App\Models\Estado_tarea;
use App\Models\Tipo_tarea;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Tarea
 * @package App\Models
 * @version October 12, 2020, 3:47 pm UTC
 *
 * @property string $Nombre_tarea
 * @property string $Fecha_inicio
 * @property string $Fecha_fin
 * @property number $Valor
 * @property string $Correcciones
 * @property string $Descripcion_tarea
 * @property integer $Proyecto_id
 * @property integer $Tipo_tarea_id
 * @property integer $Estado_tarea_id
 */
class Tarea extends Model
{
    use SoftDeletes;

    public $table = 'tareas';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'Nombre_tarea',
        'Fecha_inicio',
        'Fecha_fin',
        'Valor',
        'Correcciones',
        'Descripcion_tarea',
        'Proyecto_id',
        'Tipo_tarea_id',
        'Estado_tarea_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'Nombre_tarea' => 'string',
        'Fecha_inicio' => 'date',
        'Fecha_fin' => 'date',
        'Valor' => 'double',
        'Correcciones' => 'string',
        'Descripcion_tarea' => 'string',
        'Proyecto_id' => 'integer',
        'Tipo_tarea_id' => 'integer',
        'Estado_tarea_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'Nombre_tarea' => 'required',
        'Valor' => 'numeric'
    ];

    public function Proyectos()
    {
        return $this->belongsTo( 'App\Models\Proyecto' ,'Proyecto_id');
    }

    public function Estado_tarea()
    {
        return $this->belongsTo( Estado_tarea::class ,'Estado_tarea_id');
    }

    public function Tipo_tarea()
    {
        return $this->belongsTo( Tipo_tarea::class ,'Tipo_tarea_id');
    }
}
