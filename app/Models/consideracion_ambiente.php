<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class consideracion_ambiente
 * @package App\Models
 * @version October 3, 2020, 6:39 am UTC
 *
 * @property string $Complejidad
 * @property integer $Ambiente_id
 * @property integer $Consideracion_id
 */
class consideracion_ambiente extends Model
{
    use SoftDeletes;

    public $table = 'consideracion_ambientes';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'Complejidad',
        'Ambiente_id',
        'Consideracion_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'Complejidad' => 'string',
        'Ambiente_id' => 'integer',
        'Consideracion_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'Complejidad' => 'required'
    ];

    public function consideracion()
    {
        return $this->belongsTo('App\Models\consideracion',  'Consideracion_id');
    }

    public function ambiente()
    {
        return $this->belongsTo('App\Models\ambiente',  'Ambiente_id');
    }
}
