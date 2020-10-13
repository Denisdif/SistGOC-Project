<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Proyecto;
use App\Models\ambiente;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Proyecto_ambiente
 * @package App\Models
 * @version October 9, 2020, 2:07 am UTC
 *
 * @property integer $Cantidad
 * @property integer $Ambiente_id
 * @property integer $Proyecto_id
 */
class Proyecto_ambiente extends Model
{
    use SoftDeletes;

    public $table = 'proyecto_ambientes';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'Cantidad',
        'Ambiente_id',
        'Proyecto_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'Cantidad' => 'integer',
        'Ambiente_id' => 'integer',
        'Proyecto_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'Cantidad' => 'required',
        'Ambiente_id' => 'required'
    ];

    public function Proyectos()
    {
        return $this->belongsTo( Proyecto::class ,'Proyecto_id');
    }

    public function ambiente()
    {
        return $this->belongsTo( ambiente::class ,'Ambiente_id');
    }
}
