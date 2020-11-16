<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\AsignacionPersonalTarea;
use App\Models\Sexo;
use App\Models\Evaluacion;
use App\Models\Comentario;
use App\User;
use App\Models\Direccion;

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

    public function asignacion()
    {
        return $this->hasMany(AsignacionPersonalTarea::class);
    }

    /*public function Rol()
    {
        return $this->belongsTo( RolPersonal::class ,'Rol_id');
    }*/

    public function User()
    {
        return $this->hasOne(User::class);
    }

    public function evaluaciones()
    {
        return $this->hasMany(Evaluacion::class);
    }

    public function comentarios()
    {
        return $this->hasMany(Comentario::class);
    }

    public function direccion(){

        return $this->belongsTo(Direccion::class, 'Direccion_id');
    }

    public function sexo(){

        return $this->belongsTo(Sexo::class, 'Sexo_id');
    }

    public function tareasEnDesarrollo(){

        $listaAsignaciones = $this->asignacion;
        $Tareas = [];
        foreach ($listaAsignaciones as $asignacion) {
            if (strtolower($asignacion->tarea->estado_tarea->Nombre_estado_tarea) == strtolower('Asignada') or strtolower($asignacion->tarea->estado_tarea->Nombre_estado_tarea) == strtolower('En desarrollo')) {
                if (strtolower($asignacion->Responsabilidad) == strtolower('Desarrollador')) {
                    $Tareas[] = $asignacion;
                }
            }
        }
        return $Tareas; //Todas las tareas que estan en estado asignada o en desarrollo que fueron asignadas a este personal
    }

    public function tareasDesarrolladasProyecto($idProyecto){

        $listaAsignaciones = $this->asignacion;
        $Tareas = [];
        foreach ($listaAsignaciones as $asignacion) {
            if ( (($asignacion->tarea->Proyecto_id) == ($idProyecto))) {
                $Tareas[] = $asignacion;
            }
        }
        return $Tareas; //Todas las tareas asignadas a este personal en un proyecto
    }

    public function tareasAsignadas(){

        $listaAsignaciones = $this->asignacion;
        $Tareas = [];
        foreach ($listaAsignaciones as $asignacion) {
            if (strtolower($asignacion->tarea->estado_tarea->Nombre_estado_tarea) != strtolower('Aprobada')) {
                $Tareas[] = $asignacion;
            }
        }
        return $Tareas; //Todas las tareas asignadas a este personal en un proyecto
    }
}
