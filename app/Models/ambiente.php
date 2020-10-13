<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ambiente
 * @package App\Models
 * @version October 3, 2020, 6:32 am UTC
 *
 * @property string $Nombre_ambiente
 * @property string $Imagen
 * @property string $Descripcion
 */
class ambiente extends Model
{
    use SoftDeletes;

    public $table = 'ambientes';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'Nombre_ambiente',
        'Imagen',
        'Descripcion'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'Nombre_ambiente' => 'string',
        'Imagen' => 'string',
        'Descripcion' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'Nombre_ambiente' => 'required',
        'Descripcion' => 'required'
    ];

    public function Proyecto_ambientes()
    {
        return $this->hasMany('App\Models\Proyecto_ambientes');
    }
}
