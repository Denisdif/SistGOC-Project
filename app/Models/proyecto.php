<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Proyecto
 * @package App\Models
 * @version October 9, 2020, 1:03 am UTC
 *
 * @property string $Nombre_proyecto
 * @property string $Tipo_proyecto
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
        'Tipo_proyecto',
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
        'Tipo_proyecto' => 'string',
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
        'Nombre_proyecto' => 'required',
        'Tipo_proyecto' => 'required',
        'Nro_plantas' => 'required'
    ];

    
}
