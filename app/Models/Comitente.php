<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Comitente
 * @package App\Models
 * @version October 19, 2020, 2:40 am UTC
 *
 * @property string $NombreComitente
 * @property string $Apellido
 * @property string $Email
 * @property integer $Telefono
 * @property integer $DNI
 * @property string $Sexo
 * @property integer $Direccion_id
 */
class Comitente extends Model
{
    use SoftDeletes;

    public $table = 'comitentes';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'NombreComitente',
        'Apellido',
        'Email',
        'Telefono',
        'DNI',
        'Sexo',
        'Direccion_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'NombreComitente' => 'string',
        'Apellido' => 'string',
        'Email' => 'string',
        'Telefono' => 'integer',
        'DNI' => 'integer',
        'Sexo' => 'string',
        'Direccion_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'NombreComitente' => 'required',
        'Apellido' => 'required',
        'Telefono' => 'numeric',
        'DNI' => 'numeric'
    ];

    
}
