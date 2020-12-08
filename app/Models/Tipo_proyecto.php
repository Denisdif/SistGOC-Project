<?php

namespace App\Models;

use App\Models\Proyecto;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;


/**
 * Class Tipo_proyecto
 * @package App\Models
 * @version October 19, 2020, 2:26 am UTC
 *
 * @property string $Nombre
 * @property string $Descripcion_tipo
 */
class Tipo_proyecto extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    use SoftDeletes;
    protected $guarded = [];

    public $table = 'tipo_proyectos';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'Nombre',
        'Descripcion_tipo'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'Nombre' => 'string',
        'Descripcion_tipo' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'Nombre' => 'required',
        'Descripcion_tipo' => 'required'
    ];

    public function Proyecto()
    {
        return $this->hasMany(Proyecto::class);
    }
}
