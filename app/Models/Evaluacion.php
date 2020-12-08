<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Personal;
use OwenIt\Auditing\Contracts\Auditable;

/**
 * Class Evaluacion
 * @package App\Models
 * @version October 23, 2020, 3:19 am UTC
 *
 * @property integer $Evaluador_id
 * @property integer $Personal_id
 * @property string $Fecha_inicio
 * @property string $Fecha_fin
 */
class Evaluacion extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    use SoftDeletes;
    protected $guarded = [];

    public $table = 'evaluacions';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'Evaluador_id',
        'Personal_id',
        'Fecha_inicio',
        'Fecha_fin'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'Evaluador_id' => 'integer',
        'Personal_id' => 'integer',
        'Fecha_inicio' => 'date',
        'Fecha_fin' => 'date'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];

    public function personal()
    {
        return $this->belongsTo( Personal::class ,'Personal_id');
    }

    public function evaluador()
    {
        return $this->belongsTo( Personal::class ,'Evaluador_id');
    }

}
