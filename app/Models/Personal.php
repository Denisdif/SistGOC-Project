<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
use App\Models\AsignacionPersonalTarea;
use App\Models\Sexo;
use App\Models\Evaluacion;
use App\Models\Proyecto;
use App\Models\Comentario;
use App\User;
use App\Models\Direccion;
use Illuminate\Support\Carbon;
use OwenIt\Auditing\Contracts\Auditable;

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
class Personal extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    use SoftDeletes;
    protected $guarded = [];


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

    public function scopeName($query, $name){

        if($name)
            return $query->where('NombrePersonal', 'LIKE', "%$name%");
    }

    public function scopeApellido($query, $apellido){

        if($apellido)
            return $query->where('ApellidoPersonal', 'LIKE', "%$apellido%");
    }

    public function scopeFechaNac($query, $desde, $hasta){

        if($desde and $hasta)
            return $query->whereBetween('FechaNac', [$desde,$hasta]);
        if($desde and $hasta == null)
            return $query->where('FechaNac', '>=' ,$desde);
        if($desde == null and $hasta)
            return $query->where('FechaNac', '<=' ,$hasta);
    }

    public function scopeRol($query, $rol){

        if($rol)
            return $query   ->join('users','users.Personal_id','=','personals.id')
                            ->join('roles_usuario','users.Rol_id','=','roles_usuario.id')
                            ->select('personals.*','roles_usuario.NombreRol')
                            ->where('roles_usuario.NombreRol', 'LIKE', "%$rol%");

    }

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

    public function proyectos()
    {
        return $this->hasMany(Proyecto::class, 'Director_id');
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

    public function get_rol(){
        $rol = $this->User;
        $rol = $rol->rol;
        return $rol;
    }

    public function tareas_corregir(){
        $tareas_por_corregir = [];
        $proyectos = $this->proyectos;
        foreach ($proyectos as $proyecto) {
            $tareas = $proyecto->tarea;
            foreach ($tareas as $item) {
                if ($item->Estado_tarea_id == 4) {
                    $tareas_por_corregir[] = $item;
                }
            }
        }
        return $tareas_por_corregir;
    }

    //Obtener un array con las asignaciones de tareas en estado asignada o desarrollo con responsabilidad de Desarrollador

    public function tareasEnDesarrollo(){

        $listaAsignaciones = $this->asignacion;
        $Tareas = [];
        foreach ($listaAsignaciones as $asignacion) {
            if (strtolower($asignacion->tarea->estado_tarea->Nombre_estado_tarea) != strtolower('Aprobada')) {
                if (strtolower($asignacion->Responsabilidad) == strtolower('Responsable')) {
                    $Tareas[] = $asignacion;
                }
            }
        }
        return $Tareas; //Todas las tareas que estan en estado asignada o en desarrollo que fueron asignadas a este personal
    }

    //Todas las tareas asignadas a este personal en un proyecto

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

    //Obtener un array con las asignaciones de tareas que aun no han sido aprobadas

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

    //Obtener lista de todas las tareas desarrolladas

    public function tareas_desarrolladas(){
        $tareas = $this->asignacion;
        $tareasFiltradas = [];
        foreach ($tareas as $item) {
            if (($item->Responsabilidad == "Responsable")) {
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
            if (($item->tarea->tipo_tarea->Nombre_tipo_tarea == $tipoTarea) and ($item->Responsabilidad == "Responsable")) {
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
            if (($item->Responsabilidad == "Responsable") and ($item->tarea->Fecha_fin > $inicio) and ($item->tarea->Fecha_fin < $fin)) {

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
            if (($item->tarea->tipo_tarea->Nombre_tipo_tarea == $tipoTarea) and ($item->Responsabilidad == "Responsable") and
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

    //Obtener cantidad de tareas asignadas que aun no han sido aprobadas

    public function carga_de_trabajo(){

        $listaAsignaciones = $this->asignacion;
        $Tareas = [];
        foreach ($listaAsignaciones as $asignacion) {
            if (strtolower($asignacion->tarea->estado_tarea->Nombre_estado_tarea) != strtolower('Aprobada')) {

                $Tareas[] = $asignacion;

            }
        }
        return $Tareas; //Todas las tareas que estan en estado asignada o en desarrollo que fueron asignadas a este personal
    }

    //Obtener carga de trabajo del personal en horas

    public function carga_de_trabajo_horas(){

        $listaAsignaciones = $this->asignacion;
        $horas = 0;
        foreach ($listaAsignaciones as $asignacion) {
            if (strtolower($asignacion->tarea->estado_tarea->Nombre_estado_tarea) != strtolower('Aprobada')) {
                if ($asignacion->Responsabilidad == "Responsable") {
                    $horas += $asignacion->tarea->duracionEstimadaReal();
                }
            }
        }
        return $horas;
    }

    //Obtener carga de trabajo del personal en horas

    public function menor_carga_de_trabajo_horas(){

        $desarrolladores = [];
        $empleado = Personal::all();
        foreach ($empleado as $item) {
            if (($item->get_rol()->NombreRol == "Desarrollador") and ($item->Activo == NULL)){
                $desarrolladores[] = $item;
            }
        }
        $empleado = $desarrolladores[0];
        $lista_personal = $desarrolladores;
        foreach ($lista_personal as $item) {
            if ($item->carga_de_trabajo_horas() < $empleado->carga_de_trabajo_horas()) {
                $empleado = $item;
            }
        }
        $empleado = Personal::find($empleado->id);
        return $empleado;
    }


}
