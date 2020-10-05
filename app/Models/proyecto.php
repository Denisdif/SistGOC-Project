<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class proyecto
 * @package App\Models
 * @version October 5, 2020, 3:19 pm UTC
 *
 * @property string $Nombre_proyecto
 * @property string $Tipo
 * @property string $Fecha_inicio
 * @property string $Fecha_fin
 * @property string $Descripcion
 */
class proyecto extends Model
{
    use SoftDeletes;

    public $table = 'proyectos';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'Nombre_proyecto',
        'Tipo',
        'Fecha_inicio',
        'Fecha_fin',
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
        'Tipo' => 'string',
        'Fecha_inicio' => 'date',
        'Fecha_fin' => 'date',
        'Descripcion' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'Nombre_proyecto' => 'required',
        'Tipo' => 'required'
    ];

    
}
