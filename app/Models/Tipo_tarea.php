<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Tipo_tarea
 * @package App\Models
 * @version October 10, 2020, 12:37 pm UTC
 *
 * @property string $Nombre_tipo_tarea
 * @property string $Descripcion
 */
class Tipo_tarea extends Model
{
    use SoftDeletes;

    public $table = 'tipo_tareas';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'Nombre_tipo_tarea',
        'Descripcion'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'Nombre_tipo_tarea' => 'string',
        'Descripcion' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'Nombre_tipo_tarea' => 'required',
        'Descripcion' => 'required'
    ];

    public function Tarea()
    {
        return $this->hasMany(Tarea::class);
    }
}
