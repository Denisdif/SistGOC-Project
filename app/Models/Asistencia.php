<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Asistencia
 * @package App\Models
 * @version December 12, 2020, 12:36 am -03
 *
 * @property integer $User_id
 * @property string $Entrada
 * @property string $Salida
 */
class Asistencia extends Model
{
    use SoftDeletes;

    public $table = 'asistencias';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'User_id',
        'Entrada',
        'Salida'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'User_id' => 'integer',
        'Entrada' => 'datetime',
        'Salida' => 'datetime'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];


}
