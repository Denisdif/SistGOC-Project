<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\AsignacionPersonalTarea;

/**
 * Class Personal
 * @package App\Models
 * @version October 13, 2020, 2:06 am UTC
 *
 * @property string $NombrePersonal
 * @property string $Apellido
 * @property integer $Legajo
 * @property string $FechaNac
 * @property integer $DNI
 * @property integer $Rol_id
 * @property integer $User_id
 */
class Personal extends Model
{
    use SoftDeletes;

    public $table = 'personals';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'NombrePersonal',
        'Apellido',
        'Legajo',
        'FechaNac',
        'DNI',
        'User_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'NombrePersonal' => 'string',
        'Apellido' => 'string',
        'Legajo' => 'integer',
        'FechaNac' => 'date',
        'DNI' => 'integer',
        'User_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'NombrePersonal' => 'required',
        'Apellido' => 'required',
        'Legajo' => 'numeric',
        'FechaNac' => 'required|date',
        'DNI' => 'required|numeric'
    ];

    public function Asignacion()
    {
        return $this->hasMany(AsignacionPersonalTarea::class);
    }

    /*public function Rol()
    {
        return $this->belongsTo( RolPersonal::class ,'Rol_id');
    }*/

    public function User()
    {
        return $this->belongsTo(User::class, 'User_id');
    }
}
