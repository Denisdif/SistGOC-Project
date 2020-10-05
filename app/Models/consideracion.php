<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class consideracion
 * @package App\Models
 * @version October 3, 2020, 6:27 am UTC
 *
 * @property string $Nombre_Consideracion
 * @property string $Descripcion
 */
class consideracion extends Model
{
    use SoftDeletes;

    public $table = 'consideracions';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'Nombre_Consideracion',
        'Descripcion'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'Nombre_Consideracion' => 'string',
        'Descripcion' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'Nombre_Consideracion' => 'required',
        'Descripcion' => 'required'
    ];

    public function consideracion_ambiente()
    {
        return $this->hasMany('App\Models\consideracion_ambiente');
    }
}
