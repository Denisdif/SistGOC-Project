<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Tarea;

/**
 * Class Comentario
 * @package App\Models
 * @version October 22, 2020, 9:46 pm UTC
 *
 * @property string $Contenido
 * @property integer $Tarea_id
 */
class Comentario extends Model
{
    use SoftDeletes;

    public $table = 'comentarios';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'Contenido',
        'Tarea_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'Contenido' => 'string',
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
}
