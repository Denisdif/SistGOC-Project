<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cardumen\ArgentinaProvinciasLocalidades\Models\Localidad;
use Cardumen\ArgentinaProvinciasLocalidades\Models\Pais;
use Cardumen\ArgentinaProvinciasLocalidades\Models\Provincia;

/**
 * Class Direccion
 * @package App\Models
 * @version October 19, 2020, 1:09 am UTC
 *
 * @property string $Calle
 * @property integer $Altura
 * @property integer $Pais_id
 * @property integer $Provincia_id
 * @property integer $Localidad_id
 */
class Direccion extends Model
{
    use SoftDeletes;

    public $table = 'direccions';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'Calle',
        'Altura',
        'Pais_id',
        'Provincia_id',
        'Localidad_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'Calle' => 'string',
        'Altura' => 'integer',
        'Pais_id' => 'integer',
        'Provincia_id' => 'integer',
        'Localidad_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'Altura' => 'numeric'
    ];

    public function cliente(){
        return $this->hasOne(Personal::class);
    }

    public function pais(){
        return $this->belongsTo(Pais::class);
    }

    public function provincia(){
        return $this->belongsTo(Provincia::class);
    }

    public function localidad(){
        return $this->belongsTo(Localidad::class);
    }
}
