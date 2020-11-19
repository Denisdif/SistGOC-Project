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
use Illuminate\Support\Carbon;
Carbon::setUTF8(true);
setlocale(LC_TIME, 'es_ES');
Carbon::setLocale('es');

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

    public function edad(){
        $date = new Carbon($this->FechaNac);
        $date = $date->diffInYears();
        return $date;
    }

    public function get_fecha_nac(){
        $date = new Carbon($this->FechaNac);
        $date = $date->formatLocalized(' %d de %B de %Y');
        return $date;
    }

    //Obtener lista de todas las tareas desarrolladas

    public function tareas_desarrolladas(){
        $tareas = $this->asignacion;
        $tareasFiltradas = [];
        foreach ($tareas as $item) {
            if (($item->Responsabilidad == "Desarrollador")) {
                $tareasFiltradas[] = $item->tarea;
            }
        }
        return $tareasFiltradas;
    }

    //Obtener lista de tareas desarrolladas filtradas por tipo

    public function get_tareas_desarrolladas($tipoTarea){
        $tareas = $this->asignacion;
        $tareasFiltradas = [];
        foreach ($tareas as $item) {
            if (($item->tarea->tipo_tarea->Nombre_tipo_tarea == $tipoTarea) and ($item->Responsabilidad == "Desarrollador")) {
                $tareasFiltradas[] = $item->tarea;
            }
        }
        return $tareasFiltradas;
    }

    //Obtener lista de tareas desarrolladas filtradas por fechas

    public function tareas_desarrolladas_por_fecha($inicio, $fin){
        $tareas = $this->asignacion;
        $tareasFiltradas = [];
        foreach ($tareas as $item) {
            if (($item->Responsabilidad == "Desarrollador") and ($item->tarea->Fecha_fin > $inicio) and ($item->tarea->Fecha_fin < $fin)) {

                $tareasFiltradas[] = $item->tarea;

            }
        }
        return $tareasFiltradas;
    }

    //Obtener lista de tareas desarrolladas filtradas por tipo y fechas

    public function get_tareas_desarrolladas_por_fecha($tipoTarea, $inicio, $fin){
        $tareas = $this->asignacion;
        $tareasFiltradas = [];
        foreach ($tareas as $item) {
            if (($item->tarea->tipo_tarea->Nombre_tipo_tarea == $tipoTarea) and ($item->Responsabilidad == "Desarrollador") and
                ($item->tarea->Fecha_fin > $inicio) and ($item->tarea->Fecha_fin < $fin)) {

                $tareasFiltradas[] = $item->tarea;
            }
        }
        return $tareasFiltradas;
    }



    //Obtener rendimiento del personal en base a una lista de tareas recibida como parametro

    public function get_rendimiento($tareas){
        $suma = 0;
        foreach ($tareas as $item) {
            $suma += $item->calificacion();
        }

        if (sizeof($tareas) != 0) {
            $suma = $suma/sizeof($tareas);
            return $suma;
        } else {
            return "No ha realizado tareas de este tipo";
        }
    }

    //Obtener rendimiento general del personal

    public function get_rendimiento_general(){
        $tareas = $this->tareas_desarrolladas();
        $suma = 0;
        foreach ($tareas as $item) {
            $suma += $item->calificacion();
        }

        if (sizeof($tareas) != 0) {
            $suma = $suma/sizeof($tareas);
            return $suma;
        } else {
            return "No ha realizado tareas";
        }
    }
}
