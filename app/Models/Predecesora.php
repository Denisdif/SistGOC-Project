<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Predecesora
 * @package App\Models
 * @version November 25, 2020, 7:43 am -03
 *
 * @property integer $Tarea_id
 * @property integer $Predecesora_id
 */
class Predecesora extends Model
{
    use SoftDeletes;

    public $table = 'predecesoras';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'Tarea_id',
        'Predecesora_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'Tarea_id' => 'integer',
        'Predecesora_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];


}
