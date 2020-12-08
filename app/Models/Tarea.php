<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Estado_tarea;
use App\Models\Tipo_tarea;
use App\Models\Comentario;
use App\Models\Entrega;
use App\Models\Proyecto;
use App\Models\AsignacionPersonalTarea;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;
use OwenIt\Auditing\Contracts\Auditable;
Carbon::setUTF8(true);
setlocale(LC_TIME, 'es_ES');
Carbon::setLocale('es');

/**
 * Class Tarea
 * @package App\Models
 * @version October 12, 2020, 3:47 pm UTC
 *
 * @property string $Nombre_tarea
 * @property string $Fecha_inicio
 * @property string $Fecha_fin
 * @property number $Valor
 * @property string $Correcciones
 * @property string $Descripcion_tarea
 * @property integer $Proyecto_id
 * @property integer $Tipo_tarea_id
 * @property integer $Estado_tarea_id
 */


class Tarea extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    use SoftDeletes;
    protected $guarded = [];

    public $table = 'tareas';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'Nombre_tarea',
        'Fecha_inicio',
        'Fecha_fin',
        'Fecha_limite',
        'Valor',
        'Correcciones',
        'Descripcion_tarea',
        'Proyecto_id',
        'Tipo_tarea_id',
        'Estado_tarea_id',
        'prioridad'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'Nombre_tarea' => 'string',
        'Fecha_inicio' => 'date',
        'Fecha_fin' => 'date',
        'Fecha_limite' => 'date',
        'Valor' => 'double',
        'Correcciones' => 'string',
        'Descripcion_tarea' => 'string',
        'Proyecto_id' => 'integer',
        'Tipo_tarea_id' => 'integer',
        'Estado_tarea_id' => 'integer',
        'prioridad' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];

    public function proyecto()
    {
        return $this->belongsTo( Proyecto::class ,'Proyecto_id');
    }

    public function tipo_tarea()
    {
        return $this->belongsTo( Tipo_tarea::class ,'Tipo_tarea_id');
    }

    public function estado_tarea()
    {
        return $this->belongsTo( Estado_tarea::class ,'Estado_tarea_id');
    }

    public function Asignacion()
    {
        return $this->hasMany(AsignacionPersonalTarea::class);
    }

    public function entregas()
    {
        return $this->hasMany(Entrega::class);
    }

    public function comentarios()
    {
        return $this->hasMany(Comentario::class);
    }

    //Devuelve la cantidad de horas de desarrollo estimadas, en base al tipo de tarea

    public function estimar_con_nombre(){
        $tareas = Tarea::all();
        $suma = 0;
        $div = 0;
        foreach ($tareas as $tarea) {
            if ($tarea->Nombre_tarea==$this->Nombre_tarea) {
                if ($tarea->Fecha_fin != null) {
                    $inicio = new Carbon($tarea->Fecha_inicio);
                    $fin = new Carbon($tarea->Fecha_fin);
                    $suma += ($inicio->diffInMinutes($fin));

                    $div += 1;
                  }
            }
        }
        if ($div != 0) {
            $resul = $suma / $div;
            $resul = $resul / 60;
            $resul = round ( $resul, 0 );
            return $resul;
        } else {
            return 0;
        }
    }

    //Devuelve la cantidad de horas de desarrollo estimadas, en base al tipo de tarea

    public function estimar_con_tipo(){
        $tareas = Tarea::all();
        $suma = 0;
        $div = 0;
        foreach ($tareas as $tarea) {
            if ($tarea->Tipo_tarea_id==$this->Tipo_tarea_id) {
                if ($tarea->Fecha_fin != null) {
                    $inicio = new Carbon($tarea->Fecha_inicio);
                    $fin = new Carbon($tarea->Fecha_fin);
                    $suma += ($inicio->diffInMinutes($fin));

                    $div += 1;
                  }
            }
        }
        if ($div != 0) {
            $resul = $suma / $div;
            $resul = $resul / 60;
            $resul = round ( $resul, 0 );
            return $resul;
        } else {
            return 5;
        }
    }

    //Devuelve la cantidad de horas de desarrollo estimadas, en base al tipo de tarea

    public function duracionEstimadaReal(){

        $result = $this->estimar_con_nombre();
        if ($result==0) {
            $result = $this->estimar_con_tipo();
        }

        return $result;
    }

    //Devuelve la cantidad de horas de desarrollo de una tarea aprobada

    public function duracionReal(){
        $inicio = new Carbon($this->Fecha_inicio);
        $fin = new Carbon($this->Fecha_fin);
        $resul = ($inicio->diffInMinutes($fin));
        return $resul;
    }

    //Formatea fecha inicio

    public function getFechaInicio(){
        $date = new Carbon($this->Fecha_inicio);
        $date = $date->formatLocalized('%A %d %B %Y');
        return $date;
    }

    //Formatea fecha fin

    public function getFechaFin(){
        $date = new Carbon($this->Fecha_fin);
        $date = $date->formatLocalized('%A %d %B %Y');
        return $date;
    }

    //Formatea fecha limite

    public function getFechaLimite(){
        $date = new Carbon($this->Fecha_limite);
        $date = $date->formatLocalized('%A %d %B %Y');
        return $date;
    }

    //Califica una tarea aprobada, devuelve un entero entre 0 y 10

    public function calificacion(){

        $puntos = 100000000;

        //if ($this->Estado_tarea_id == 6) {

            if (($this->Correcciones == "true")) {
                $puntos = 1;
            }

            if (($this->Correcciones == "false")) {
                $puntos = 4;
            }

            if (($this->Correcciones == "true") and ($this->Fecha_fin < $this->Fecha_limite)) {
                $puntos = 7;
            }

            if (($this->Correcciones == "false") and ($this->Fecha_fin < $this->Fecha_limite)) {
                $puntos = 10;
            }

            /*if (($this->duracionReal() < $this->duracionEstimadaReal()) and ($this->Correcciones == "false") and ($this->Fecha_fin < $this->Fecha_limite)) {
                $puntos = 10;
            }*/
        //}
        return $puntos;
    }

    //Retorna todos los responsables de la tarea

    public function responsables(){

        $responsables = [];
        foreach ($this->asignacion as $item) {
            $responsables[] = $item->Personal;
        } ;

        return $responsables;
    }

    //Retorna todos los ids de los responsables de la tarea

    public function idResponsables(){

        $responsables = [];
        foreach ($this->asignacion as $item) {
            $responsables[] = $item->Personal_id;
        } ;

        return $responsables;
    }

    //Retorna al personal con menor carga de trabajo a ser asignado a esta tarea, tomando como parametro una lista de excepcion

    public function menor_carga_de_trabajo_horas($personal_exceptuado){

        $desarrolladores = [];
        $lista_personal = Personal::all()->except($personal_exceptuado);

        foreach ($lista_personal as $item) {
            if ($item->get_rol()->NombreRol == "Desarrollador") {
                $desarrolladores[] = $item;
            }
        }

        $empleado = $desarrolladores[0];

        foreach ( $desarrolladores as $item) {
            if ($item->carga_de_trabajo_horas()< $empleado->carga_de_trabajo_horas()) {
                $empleado = $item;
            }
        }
        $empleado = Personal::find($empleado->id);
        return $empleado->id;
    }


    //En caso de que no tenga asignado personal responsable, asigna al personal con menor carga de trabajo
    public function asignacion_inteligente(){

        $responsables = [];

        if (sizeof($this->asignacion) == 0) {

            $mejorPersonal = $this->menor_carga_de_trabajo_horas($responsables);

            $asignacionPersonalTarea = new AsignacionPersonalTarea;
            $asignacionPersonalTarea->Personal_id = $mejorPersonal;
            $asignacionPersonalTarea->Responsabilidad = "Responsable";
            $asignacionPersonalTarea->Tarea_id = $this->id;
            $asignacionPersonalTarea->save();

            /*Codigo para mas responsabilidades {
                {$responsables[] = $mejorPersonal;
                $mejorPersonal = $this->menor_carga_de_trabajo_horas($responsables);

                $asignacionPersonalTarea = new AsignacionPersonalTarea;
                $asignacionPersonalTarea->Personal_id = $mejorPersonal;
                $asignacionPersonalTarea->Responsabilidad = "Aprobador";
                $asignacionPersonalTarea->Tarea_id = $this->id;
                $asignacionPersonalTarea->save();

                $responsables[] = $mejorPersonal;
                $mejorPersonal = $this->menor_carga_de_trabajo_horas($responsables);

                $asignacionPersonalTarea = new AsignacionPersonalTarea;
                $asignacionPersonalTarea->Personal_id = $mejorPersonal;
                $asignacionPersonalTarea->Responsabilidad = "Supervisor";
                $asignacionPersonalTarea->Tarea_id = $this->id;
                $asignacionPersonalTarea->save();
            }*/

            $this->Estado_tarea_id = 2;
            $this->save();
        }
        return true;
    }

    //Retorna true si la tarea ya tiene un responsable asignado

    public function has_responsable(){

        $existe = false;

        foreach ($this->Asignacion as $item) {
            if ($item->Responsabilidad == "Responsable") {
                $existe = true;
            }
        }
        return $existe;
    }
}
