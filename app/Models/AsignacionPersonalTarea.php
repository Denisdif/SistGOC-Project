<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Personal;
use App\Models\Tarea;
use App\Models\Proyecto;

/**
 * Class AsignacionPersonalTarea
 * @package App\Models
 * @version October 13, 2020, 3:46 am UTC
 *
 * @property string $Responsabilidad
 * @property integer $Personal_id
 * @property integer $Tarea_id
 */
class AsignacionPersonalTarea extends Model
{
    use SoftDeletes;

    public $table = 'asignacion_personal_tareas';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'Responsabilidad',
        'Personal_id',
        'Tarea_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'Responsabilidad' => 'string',
        'Personal_id' => 'integer',
        'Tarea_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
    ];

    public function tarea()
    {
        return $this->belongsTo( Tarea::class ,'Tarea_id');
    }

    public function Personal()
    {
        return $this->belongsTo( Personal::class ,'Personal_id');
    }
}
