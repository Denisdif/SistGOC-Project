<?php

namespace App\Models;

use App\Models\Tarea;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Estado_tarea
 * @package App\Models
 * @version October 10, 2020, 12:35 pm UTC
 *
 * @property string $Nombre_estado_tarea
 * @property string $Descripcion
 */
class Estado_tarea extends Model
{
    use SoftDeletes;

    public $table = 'estado_tareas';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'Nombre_estado_tarea',
        'Descripcion'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'Nombre_estado_tarea' => 'string',
        'Descripcion' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'Nombre_estado_tarea' => 'required',
        'Descripcion' => 'required'
    ];

    public function Tarea()
    {
        return $this->hasMany(Tarea::class);
    }
}
