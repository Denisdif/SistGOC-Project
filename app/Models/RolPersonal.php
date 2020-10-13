<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class RolPersonal
 * @package App\Models
 * @version October 13, 2020, 1:13 am UTC
 *
 * @property string $NombreRol
 * @property string $Descripcion
 */
class RolPersonal extends Model
{
    use SoftDeletes;

    public $table = 'rol_personals';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'NombreRol',
        'Descripcion'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'NombreRol' => 'string',
        'Descripcion' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'NombreRol' => 'required',
        'Descripcion' => 'required'
    ];


}
