<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Personal;
use App\Models\Tarea;
use App\Models\Proyecto;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Support\Carbon;

Carbon::setUTF8(true);
setlocale(LC_TIME, 'es_ES');
Carbon::setLocale('es');


/**
 * Class AsignacionPersonalTarea
 * @package App\Models
 * @version October 13, 2020, 3:46 am UTC
 *
 * @property string $Responsabilidad
 * @property integer $Personal_id
 * @property integer $Tarea_id
 */
class AsignacionPersonalTarea extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    protected $guarded = [];

    public $table = 'asignacion_personal_tareas';



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

    public function get_Fecha_Creacion(){
        $date = new Carbon($this->created_at);
        $date = $date->formatLocalized('%A %d %B %Y');
        return $date;
    }
}
