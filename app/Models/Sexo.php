<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Sexo
 * @package App\Models
 * @version October 19, 2020, 1:52 am UTC
 *
 * @property string $Nombre_sexo
 */
class Sexo extends Model
{
    use SoftDeletes;

    public $table = 'sexos';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'Nombre_sexo'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'Nombre_sexo' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];


}
