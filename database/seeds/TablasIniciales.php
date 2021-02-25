<?php

use Illuminate\Database\Seeder;
use App\Models\Estado_tarea;
use App\Models\Tipo_tarea;
use App\Models\Tipo_proyecto;
use App\Models\RolPersonal;
use App\Models\Personal;
use App\Models\Proyecto;
use App\Models\ambiente;
use App\Models\Comitente;
use App\Models\Direccion;
use App\Models\Tarea;
use App\PDFconfig;
use App\Models\AsignacionPersonalTarea;
use App\Models\Sexo;
use App\User;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;


class TablasIniciales extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //proyectos auxiliar
            $proyecto = new Proyecto;
            $proyecto->Nombre_proyecto = "Proyecto para presentación";
            $proyecto->Estado_proyecto = "En desarrollo";
            $proyecto->Codigo_catastral = "01232102156321032010";
            $proyecto->Tipo_proyecto_id = "1";
            $proyecto->Fecha_inicio_Proy = new Carbon('2020-10-15 15:32:45.654321');
            $proyecto->Fecha_fin_Proy = new Carbon('2021-3-02 15:32:45.654321');
            $proyecto->Descripcion = "Proyecto desarrollado antes de la implementación del sistema";
            $proyecto->Comitente_id = 1;
            $proyecto->Director_id = 2;
            $proyecto->direccion_id = 1;
            $proyecto->save();
        //fin proyectos

        //Tareas del proyecto auxiliar
            $tarea = new Tarea;
            $tarea->Nombre_tarea = "Diseñar planta general";
            $tarea->Tipo_tarea_id = 1;
            $tarea->Fecha_inicio = new Carbon('2020-11-01 15:32:45.654321');
            $tarea->Fecha_limite = new Carbon('2020-11-02 09:32:45.654321');
            $tarea->Fecha_fin = new Carbon('2020-11-02 09:32:45.654321');
            $tarea->Prioridad = "Media";
            $tarea->Correcciones = 'false';
            $tarea->Proyecto_id = 15;
            $tarea->Estado_tarea_id = 6;
            $tarea->save();

            $tarea = new Tarea;
            $tarea->Nombre_tarea = "Diseñar cortes";
            $tarea->Tipo_tarea_id = 1;
            $tarea->Fecha_inicio = new Carbon('2020-11-02 15:32:45.654321');
            $tarea->Fecha_limite = new Carbon('2020-11-03 09:32:45.654321');
            $tarea->Fecha_fin = new Carbon('2020-11-03 09:32:45.654321');
            $tarea->Prioridad = "Media";
            $tarea->Correcciones = 'false';
            $tarea->Proyecto_id = 15;
            $tarea->Estado_tarea_id = 6;
            $tarea->save();

            $tarea = new Tarea;
            $tarea->Nombre_tarea = "Diseñar planta de estructuras";
            $tarea->Tipo_tarea_id = 1;
            $tarea->Fecha_inicio = new Carbon('2020-11-05 15:32:45.654321');
            $tarea->Fecha_limite = new Carbon('2020-11-07 23:32:45.654321');
            $tarea->Fecha_fin = new Carbon('2020-11-05 18:32:45.654321');
            $tarea->Prioridad = "Media";
            $tarea->Correcciones = 'false';
            $tarea->Proyecto_id = 15;
            $tarea->Estado_tarea_id = 6;
            $tarea->save();

            $tarea = new Tarea;
            $tarea->Nombre_tarea = "Diseñar instalación eléctrica";
            $tarea->Tipo_tarea_id = 3;
            $tarea->Fecha_inicio = new Carbon('2020-11-05 15:32:45.654321');
            $tarea->Fecha_limite = new Carbon('2020-11-07 23:32:45.654321');
            $tarea->Fecha_fin = new Carbon('2020-11-05 23:32:45.654321');
            $tarea->Prioridad = "Media";
            $tarea->Correcciones = 'false';
            $tarea->Proyecto_id = 15;
            $tarea->Estado_tarea_id = 6;
            $tarea->save();

            $tarea = new Tarea;
            $tarea->Nombre_tarea = "Diseñar instalación de agua";
            $tarea->Tipo_tarea_id = 3;
            $tarea->Fecha_inicio = new Carbon('2020-11-05 15:32:45.654321');
            $tarea->Fecha_limite = new Carbon('2020-11-07 23:32:45.654321');
            $tarea->Fecha_fin = new Carbon('2020-11-05 21:32:45.654321');
            $tarea->Prioridad = "Media";
            $tarea->Correcciones = 'false';
            $tarea->Proyecto_id = 15;
            $tarea->Estado_tarea_id = 6;
            $tarea->save();

            $tarea = new Tarea;
            $tarea->Nombre_tarea = "Realizar cómputo y presupuesto";
            $tarea->Tipo_tarea_id = 2;
            $tarea->Fecha_inicio = new Carbon('2020-11-05 16:32:45.654321');
            $tarea->Fecha_limite = new Carbon('2020-11-07 23:32:45.654321');
            $tarea->Prioridad = "Media";
            $tarea->Correcciones = 'false';
            $tarea->Proyecto_id = 15;
            $tarea->Estado_tarea_id = 1;
            $tarea->save();

        //Fin de tareas del proyecto auxiliar

        //Asignaciones de tareas del proyecto 1

            $asignacionPersonalTarea = new AsignacionPersonalTarea;
            $asignacionPersonalTarea->Personal_id = 3;
            $asignacionPersonalTarea->Responsabilidad = "Responsable";
            $asignacionPersonalTarea->Tarea_id = 123;
            $asignacionPersonalTarea->save();

            $asignacionPersonalTarea = new AsignacionPersonalTarea;
            $asignacionPersonalTarea->Personal_id = 4;
            $asignacionPersonalTarea->Responsabilidad = "Responsable";
            $asignacionPersonalTarea->Tarea_id = 124;
            $asignacionPersonalTarea->save();

            $asignacionPersonalTarea = new AsignacionPersonalTarea;
            $asignacionPersonalTarea->Personal_id = 5;
            $asignacionPersonalTarea->Responsabilidad = "Responsable";
            $asignacionPersonalTarea->Tarea_id = 125;
            $asignacionPersonalTarea->save();

            $asignacionPersonalTarea = new AsignacionPersonalTarea;
            $asignacionPersonalTarea->Personal_id = 3;
            $asignacionPersonalTarea->Responsabilidad = "Responsable";
            $asignacionPersonalTarea->Tarea_id = 126;
            $asignacionPersonalTarea->save();

            $asignacionPersonalTarea = new AsignacionPersonalTarea;
            $asignacionPersonalTarea->Personal_id = 4;
            $asignacionPersonalTarea->Responsabilidad = "Responsable";
            $asignacionPersonalTarea->Tarea_id = 127;
            $asignacionPersonalTarea->save();

        //Fin asignaciones de tareas del proyecto 1


    }
}
