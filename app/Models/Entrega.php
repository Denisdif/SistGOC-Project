<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Tarea;
use OwenIt\Auditing\Contracts\Auditable;

/**
 * Class Entrega
 * @package App\Models
 * @version October 22, 2020, 9:43 pm UTC
 *
 * @property string $Archivo
 * @property string $Descripcion_entrega
 * @property integer $Tarea_id
 */
class Entrega extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    use SoftDeletes;
    protected $guarded = [];

    public $table = 'entregas';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'Archivo',
        'Descripcion_entrega',
        'Tarea_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'Archivo' => 'string',
        'Descripcion_entrega' => 'string',
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
