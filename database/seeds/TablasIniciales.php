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
use App\Models\Tarea;
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
        $rol = new RolPersonal;
        $rol->NombreRol = "Administrador";
        $rol->save();

        $rol = new RolPersonal;
        $rol->NombreRol = "Director de proyectos";
        $rol->save();

        $rol = new RolPersonal;
        $rol->NombreRol = "Desarrollador";
        $rol->save();

        $rol = new RolPersonal;
        $rol->NombreRol = "Auditor";
        $rol->save();



        $sexo = new Sexo;
        $sexo->Nombre_sexo = "Hombre";
        $sexo->save();

        $sexo = new Sexo;
        $sexo->Nombre_sexo = "Mujer";
        $sexo->save();

        $sexo = new Sexo;
        $sexo->Nombre_sexo = "Indefinido";
        $sexo->save();



        $personal = new Personal;
        $personal->NombrePersonal = "Denis Iván";
        $personal->ApellidoPersonal = "Ferreira";
        $personal->FechaNac = "1998-07-28";
        $personal->DNI = 41303635;
        $personal->Telefono = "3754524949";
        $personal->Sexo_id = 1;
        $personal->save();

        $personal = new Personal;
        $personal->NombrePersonal = "Leandro";
        $personal->ApellidoPersonal = "Somoza";
        $personal->FechaNac = "1980-08-28";
        $personal->DNI = 35303635;
        $personal->Telefono = "3755858588";
        $personal->Sexo_id = 1;
        $personal->save();

        $personal = new Personal;
        $personal->NombrePersonal = "Walter";
        $personal->ApellidoPersonal = "Erviti";
        $personal->FechaNac = "1978-07-01";
        $personal->DNI = 33303635;
        $personal->Telefono = "1758524949";
        $personal->Sexo_id = 1;
        $personal->save();

        $personal = new Personal;
        $personal->NombrePersonal = "Mariana";
        $personal->ApellidoPersonal = "Araujo";
        $personal->FechaNac = "1996-01-01";
        $personal->DNI = 40315635;
        $personal->Telefono = "1737524949";
        $personal->Sexo_id = 2;
        $personal->save();

        $personal = new Personal;
        $personal->NombrePersonal = "Luciana";
        $personal->ApellidoPersonal = "Flores";
        $personal->FechaNac = "1998-06-17";
        $personal->DNI = 40303635;
        $personal->Telefono = "3754528049";
        $personal->Sexo_id = 2;
        $personal->save();

        $personal = new Personal;
        $personal->NombrePersonal = "Tamara";
        $personal->ApellidoPersonal = "Moreira";
        $personal->FechaNac = "1979-07-01";
        $personal->DNI = 34303635;
        $personal->Telefono = "2758524949";
        $personal->Sexo_id = 2;
        $personal->save();



        $user = new User;
        $user->name = "Denisdif";
        $user->email = "stalkerdif@gmail.com";
        $user->password = Hash::make(12345678);
        $user->Rol_id = 1;
        $user->Personal_id = 1;
        $user->save();

        $user = new User;
        $user->name = "Lean";
        $user->email = "leandro@gmail.com";
        $user->password = Hash::make(12345678);
        $user->Rol_id = 2;
        $user->Personal_id = 2;
        $user->save();

        $user = new User;
        $user->name = "Ervwalter";
        $user->email = "walter@gmail.com";
        $user->password = Hash::make(12345678);
        $user->Rol_id = 3;
        $user->Personal_id = 3;
        $user->save();

        $user = new User;
        $user->name = "Mary";
        $user->email = "mararaujo@gmail.com";
        $user->password = Hash::make(12345678);
        $user->Rol_id = 3;
        $user->Personal_id = 4;
        $user->save();

        $user = new User;
        $user->name = "Lucha";
        $user->email = "lucha@gmail.com";
        $user->password = Hash::make(12345678);
        $user->Rol_id = 3;
        $user->Personal_id = 5;
        $user->save();

        $user = new User;
        $user->name = "Tamy";
        $user->email = "tamara@gmail.com";
        $user->password = Hash::make(12345678);
        $user->Rol_id = 4;
        $user->Personal_id = 6;
        $user->save();



        $estado_tarea = new Estado_tarea;
        $estado_tarea->Nombre_estado_tarea = "Creada";
        $estado_tarea->Descripcion = "La tarea fue creada y espera ser asignada al personal";
        $estado_tarea->save();

        $estado_tarea = new Estado_tarea;
        $estado_tarea->Nombre_estado_tarea = "Asignada";
        $estado_tarea->Descripcion = "La tarea ya fue asignada al personal correspondiente";
        $estado_tarea->save();

        $estado_tarea = new Estado_tarea;
        $estado_tarea->Nombre_estado_tarea = "En desarrollo";
        $estado_tarea->Descripcion = "La tarea actualmente está en desarrollo";
        $estado_tarea->save();

        $estado_tarea = new Estado_tarea;
        $estado_tarea->Nombre_estado_tarea = "Esperando revisión";
        $estado_tarea->Descripcion = "La tarea completó su desarrollo y espera la revisión del personal asignado";
        $estado_tarea->save();

        $estado_tarea = new Estado_tarea;
        $estado_tarea->Nombre_estado_tarea = "Esperando correcciones";
        $estado_tarea->Descripcion = "La tarea fue revisada y necesita correcciones";
        $estado_tarea->save();

        $estado_tarea = new Estado_tarea;
        $estado_tarea->Nombre_estado_tarea = "Aprobada";
        $estado_tarea->Descripcion = "La tarea fue creada y espera ser asignada al personal";
        $estado_tarea->save();


        $tipo_tarea = new Tipo_tarea;
        $tipo_tarea->Nombre_tipo_tarea = "Diseño y disposición";
        $tipo_tarea->Descripcion = "Por definir";
        $tipo_tarea->save();

        $tipo_tarea = new Tipo_tarea;
        $tipo_tarea->Nombre_tipo_tarea = "Cálculo";
        $tipo_tarea->Descripcion = "Por definir";
        $tipo_tarea->save();

        $tipo_tarea = new Tipo_tarea;
        $tipo_tarea->Nombre_tipo_tarea = "Instalaciones";
        $tipo_tarea->Descripcion = "Por definir";
        $tipo_tarea->save();

        $tipo_tarea = new Tipo_tarea;
        $tipo_tarea->Nombre_tipo_tarea = "Detalles";
        $tipo_tarea->Descripcion = "Por definir";
        $tipo_tarea->save();

        $tipo_tarea = new Tipo_tarea;
        $tipo_tarea->Nombre_tipo_tarea = "Análisis";
        $tipo_tarea->Descripcion = "Por definir";
        $tipo_tarea->save();

        $tipo_tarea = new Tipo_tarea;
        $tipo_tarea->Nombre_tipo_tarea = "Maquetado";
        $tipo_tarea->Descripcion = "Por definir";
        $tipo_tarea->save();


        $tipo_proyecto = new Tipo_proyecto;
        $tipo_proyecto->Nombre = "Obra nueva";
        $tipo_proyecto->save();

        $tipo_proyecto = new Tipo_proyecto;
        $tipo_proyecto->Nombre = "Regularización de obra";
        $tipo_proyecto->save();

        $tipo_proyecto = new Tipo_proyecto;
        $tipo_proyecto->Nombre = "Modificación";
        $tipo_proyecto->save();

        $tipo_proyecto = new Tipo_proyecto;
        $tipo_proyecto->Nombre = "Ampliación";
        $tipo_proyecto->save();

        $tipo_proyecto = new Tipo_proyecto;
        $tipo_proyecto->Nombre = "Demolición parcial";
        $tipo_proyecto->save();

        $tipo_proyecto = new Tipo_proyecto;
        $tipo_proyecto->Nombre = "Demolición total";
        $tipo_proyecto->save();

        $ambiente = new ambiente;
        $ambiente->Nombre_ambiente = "Hall de entrada";
        $ambiente->save();

        $ambiente = new ambiente;
        $ambiente->Nombre_ambiente = "Sala de estar";
        $ambiente->save();

        $ambiente = new ambiente;
        $ambiente->Nombre_ambiente = "Cocina";
        $ambiente->save();

        $ambiente = new ambiente;
        $ambiente->Nombre_ambiente = "Comedor";
        $ambiente->save();

        $ambiente = new ambiente;
        $ambiente->Nombre_ambiente = "Dormitorio matrimonial";
        $ambiente->save();

        $ambiente = new ambiente;
        $ambiente->Nombre_ambiente = "Dormitorio individual";
        $ambiente->save();

        $ambiente = new ambiente;
        $ambiente->Nombre_ambiente = "Toilette";
        $ambiente->save();

        $ambiente = new ambiente;
        $ambiente->Nombre_ambiente = "Cuarto de baño";
        $ambiente->save();

        $ambiente = new ambiente;
        $ambiente->Nombre_ambiente = "Garaje";
        $ambiente->save();

        $comitente = new Comitente;
        $comitente->NombreComitente = "Willam";
        $comitente->ApellidoComitente = "Gomes";
        $comitente->Email = "willam@gmail.com";
        $comitente->Telefono = "3754865984";
        $comitente->Cuit = "11425865958";
        $comitente->Sexo_id = 1;
        $comitente->save();

        $comitente = new Comitente;
        $comitente->NombreComitente = "Gonzalo";
        $comitente->ApellidoComitente = "Heredia";
        $comitente->Email = "gonzalo@gmail.com";
        $comitente->Telefono = "3754865900";
        $comitente->Cuit = "08415865958";
        $comitente->Sexo_id = 1;
        $comitente->save();

        $comitente = new Comitente;
        $comitente->NombreComitente = "Mesita SRL";
        $comitente->ApellidoComitente = "";
        $comitente->Email = "nico@gmail.com";
        $comitente->Telefono = "3755860000";
        $comitente->Cuit = "01415865238";
        $comitente->Sexo_id = "3";
        $comitente->save();

        $comitente = new Comitente;
        $comitente->NombreComitente = "Laura";
        $comitente->ApellidoComitente = "Valle";
        $comitente->Email = "lau89@gmail.com";
        $comitente->Telefono = "2255860000";
        $comitente->Cuit = "13415865200";
        $comitente->Sexo_id = "2";
        $comitente->save();




        $proyecto = new Proyecto;
        $proyecto->Nombre_proyecto = "Proyecto 1";
        $proyecto->Codigo_catastral = "01232102156321032010";
        $proyecto->Tipo_proyecto_id = "1";
        $proyecto->Fecha_inicio_Proy = new Carbon('2020-01-31 15:32:45.654321');
        $proyecto->Fecha_fin_Proy = new Carbon('2020-02-14 15:32:45.654321');
        $proyecto->Descripcion = "Proyecto desarrollado antes de la implementación del sistema";
        $proyecto->Comitente_id = 1;
        $proyecto->Director_id = 1;
        $proyecto->save();

        $proyecto = new Proyecto;
        $proyecto->Nombre_proyecto = "Proyecto 2";
        $proyecto->Codigo_catastral = "01232102156321032010";
        $proyecto->Tipo_proyecto_id = "1";
        $proyecto->Fecha_inicio_Proy = new Carbon('2020-02-31 15:32:45.654321');
        $proyecto->Fecha_fin_Proy = new Carbon('2020-03-14 15:32:45.654321');
        $proyecto->Descripcion = "Proyecto desarrollado antes de la implementación del sistema";
        $proyecto->Comitente_id = 2;
        $proyecto->Director_id = 1;
        $proyecto->save();

        $proyecto = new Proyecto;
        $proyecto->Nombre_proyecto = "Proyecto 3";
        $proyecto->Codigo_catastral = "01232102156321032010";
        $proyecto->Tipo_proyecto_id = "1";
        $proyecto->Fecha_inicio_Proy = new Carbon('2020-03-31 15:32:45.654321');
        $proyecto->Fecha_fin_Proy = new Carbon('2020-04-14 15:32:45.654321');
        $proyecto->Descripcion = "Proyecto desarrollado antes de la implementación del sistema";
        $proyecto->Comitente_id = 3;
        $proyecto->Director_id = 1;
        $proyecto->save();

        $proyecto = new Proyecto;
        $proyecto->Nombre_proyecto = "Proyecto 4";
        $proyecto->Codigo_catastral = "01232102156321032010";
        $proyecto->Tipo_proyecto_id = "1";
        $proyecto->Fecha_inicio_Proy = new Carbon('2020-04-31 15:32:45.654321');
        $proyecto->Fecha_fin_Proy = new Carbon('2020-05-14 15:32:45.654321');
        $proyecto->Descripcion = "Proyecto desarrollado antes de la implementación del sistema";
        $proyecto->Comitente_id = 4;
        $proyecto->Director_id = 1;
        $proyecto->save();

        $proyecto = new Proyecto;
        $proyecto->Nombre_proyecto = "Proyecto 5";
        $proyecto->Codigo_catastral = "01232102156321032010";
        $proyecto->Tipo_proyecto_id = "1";
        $proyecto->Fecha_inicio_Proy = new Carbon('2020-02-15 15:32:45.654321');
        $proyecto->Fecha_fin_Proy = new Carbon('2020-03-01 15:32:45.654321');
        $proyecto->Descripcion = "Proyecto desarrollado antes de la implementación del sistema";
        $proyecto->Comitente_id = 1;
        $proyecto->Director_id = 1;
        $proyecto->save();


        //Tareas del proyecto 1


        $tarea = new Tarea;
        $tarea->Nombre_tarea = "Diseñar planta general";
        $tarea->Tipo_tarea_id = 1;
        $tarea->Fecha_inicio = new Carbon('2020-02-15 15:32:45.654321');
        $tarea->Fecha_limite = new Carbon('2020-02-15 15:32:45.654321');
        $tarea->Fecha_fin = new Carbon('2020-02-16 15:32:45.654321');
        $tarea->Prioridad = "Media";
        $tarea->Correcciones = 'false';
        $tarea->Proyecto_id = 1;
        $tarea->Estado_tarea_id = 6;
        $tarea->save();

        $tarea = new Tarea;
        $tarea->Nombre_tarea = "Diseñar vistas";
        $tarea->Tipo_tarea_id = 1;
        $tarea->Fecha_inicio = new Carbon('2020-02-15 15:32:45.654321');
        $tarea->Fecha_limite = new Carbon('2020-02-15 15:32:45.654321');
        $tarea->Fecha_fin = new Carbon('2020-02-16 15:32:45.654321');
        $tarea->Prioridad = "Media";
        $tarea->Correcciones = 'false';
        $tarea->Proyecto_id = 1;
        $tarea->Estado_tarea_id = 6;
        $tarea->save();

        $tarea = new Tarea;
        $tarea->Nombre_tarea = "Diseñar cortes";
        $tarea->Tipo_tarea_id = 1;
        $tarea->Fecha_inicio = new Carbon('2020-02-15 15:32:45.654321');
        $tarea->Fecha_limite = new Carbon('2020-02-15 15:32:45.654321');
        $tarea->Fecha_fin = new Carbon('2020-02-16 15:32:45.654321');
        $tarea->Prioridad = "Media";
        $tarea->Correcciones = 'false';
        $tarea->Proyecto_id = 1;
        $tarea->Estado_tarea_id = 6;
        $tarea->save();

        $tarea = new Tarea;
        $tarea->Nombre_tarea = "Diseñar planta de techos";
        $tarea->Tipo_tarea_id = 1;
        $tarea->Fecha_inicio = new Carbon('2020-02-15 15:32:45.654321');
        $tarea->Fecha_limite = new Carbon('2020-02-15 15:32:45.654321');
        $tarea->Fecha_fin = new Carbon('2020-02-16 15:32:45.654321');
        $tarea->Prioridad = "Media";
        $tarea->Correcciones = 'false';
        $tarea->Proyecto_id = 1;
        $tarea->Estado_tarea_id = 6;
        $tarea->save();

        $tarea = new Tarea;
        $tarea->Nombre_tarea = "Realizar memoria descriptiva";
        $tarea->Tipo_tarea_id = 5;
        $tarea->Fecha_inicio = new Carbon('2020-02-15 15:32:45.654321');
        $tarea->Fecha_limite = new Carbon('2020-02-15 15:32:45.654321');
        $tarea->Fecha_fin = new Carbon('2020-02-16 15:32:45.654321');
        $tarea->Prioridad = "Media";
        $tarea->Correcciones = 'false';
        $tarea->Proyecto_id = 1;
        $tarea->Estado_tarea_id = 6;
        $tarea->save();

        $tarea = new Tarea;
        $tarea->Nombre_tarea = "Presentación al cliente";
        $tarea->Tipo_tarea_id = 1;
        $tarea->Fecha_inicio = new Carbon('2020-02-15 15:32:45.654321');
        $tarea->Fecha_limite = new Carbon('2020-02-15 15:32:45.654321');
        $tarea->Fecha_fin = new Carbon('2020-02-16 15:32:45.654321');
        $tarea->Prioridad = "Media";
        $tarea->Correcciones = 'false';
        $tarea->Proyecto_id = 1;
        $tarea->Estado_tarea_id = 6;
        $tarea->save();

        $tarea = new Tarea;
        $tarea->Nombre_tarea = "Silueta y balance de superficies";
        $tarea->Tipo_tarea_id = 5;
        $tarea->Fecha_inicio = new Carbon('2020-02-15 15:32:45.654321');
        $tarea->Fecha_limite = new Carbon('2020-02-15 15:32:45.654321');
        $tarea->Fecha_fin = new Carbon('2020-02-16 15:32:45.654321');
        $tarea->Prioridad = "Media";
        $tarea->Correcciones = 'false';
        $tarea->Proyecto_id = 1;
        $tarea->Estado_tarea_id = 6;
        $tarea->save();

        $tarea = new Tarea;
        $tarea->Nombre_tarea = "Realizar planilla de iluminación y ventilación";
        $tarea->Tipo_tarea_id = 5;
        $tarea->Fecha_inicio = new Carbon('2020-02-15 15:32:45.654321');
        $tarea->Fecha_limite = new Carbon('2020-02-15 15:32:45.654321');
        $tarea->Fecha_fin = new Carbon('2020-02-16 15:32:45.654321');
        $tarea->Prioridad = "Media";
        $tarea->Correcciones = 'false';
        $tarea->Proyecto_id = 1;
        $tarea->Estado_tarea_id = 6;
        $tarea->save();

        $tarea = new Tarea;
        $tarea->Nombre_tarea = "Realizar cálculo de estructuras";
        $tarea->Tipo_tarea_id = 2;
        $tarea->Fecha_inicio = new Carbon('2020-02-15 15:32:45.654321');
        $tarea->Fecha_limite = new Carbon('2020-02-15 15:32:45.654321');
        $tarea->Fecha_fin = new Carbon('2020-02-16 15:32:45.654321');
        $tarea->Prioridad = "Media";
        $tarea->Correcciones = 'false';
        $tarea->Proyecto_id = 1;
        $tarea->Estado_tarea_id = 6;
        $tarea->save();

        $tarea = new Tarea;
        $tarea->Nombre_tarea = "Diseñar planta de estructuras";
        $tarea->Tipo_tarea_id = 1;
        $tarea->Fecha_inicio = new Carbon('2020-02-15 15:32:45.654321');
        $tarea->Fecha_limite = new Carbon('2020-02-15 15:32:45.654321');
        $tarea->Fecha_fin = new Carbon('2020-02-16 15:32:45.654321');
        $tarea->Prioridad = "Media";
        $tarea->Correcciones = 'false';
        $tarea->Proyecto_id = 1;
        $tarea->Estado_tarea_id = 6;
        $tarea->save();

        $tarea = new Tarea;
        $tarea->Nombre_tarea = "Diseñar instalación eléctrica";
        $tarea->Tipo_tarea_id = 3;
        $tarea->Fecha_inicio = new Carbon('2020-02-15 15:32:45.654321');
        $tarea->Fecha_limite = new Carbon('2020-02-15 15:32:45.654321');
        $tarea->Fecha_fin = new Carbon('2020-02-16 15:32:45.654321');
        $tarea->Prioridad = "Media";
        $tarea->Correcciones = 'false';
        $tarea->Proyecto_id = 1;
        $tarea->Estado_tarea_id = 6;
        $tarea->save();

        $tarea = new Tarea;
        $tarea->Nombre_tarea = "Diseñar instalación de agua";
        $tarea->Tipo_tarea_id = 3;
        $tarea->Fecha_inicio = new Carbon('2020-02-15 15:32:45.654321');
        $tarea->Fecha_limite = new Carbon('2020-02-15 15:32:45.654321');
        $tarea->Fecha_fin = new Carbon('2020-02-16 15:32:45.654321');
        $tarea->Prioridad = "Media";
        $tarea->Correcciones = 'false';
        $tarea->Proyecto_id = 1;
        $tarea->Estado_tarea_id = 6;
        $tarea->save();

        $tarea = new Tarea;
        $tarea->Nombre_tarea = "Diseñar instalación sanitaria";
        $tarea->Tipo_tarea_id = 3;
        $tarea->Fecha_inicio = new Carbon('2020-02-15 15:32:45.654321');
        $tarea->Fecha_limite = new Carbon('2020-02-15 15:32:45.654321');
        $tarea->Fecha_fin = new Carbon('2020-02-16 15:32:45.654321');
        $tarea->Prioridad = "Media";
        $tarea->Correcciones = 'false';
        $tarea->Proyecto_id = 1;
        $tarea->Estado_tarea_id = 6;
        $tarea->save();

        $tarea = new Tarea;
        $tarea->Nombre_tarea = "Realizar detalles";
        $tarea->Tipo_tarea_id = 4;
        $tarea->Fecha_inicio = new Carbon('2020-02-15 15:32:45.654321');
        $tarea->Fecha_limite = new Carbon('2020-02-15 15:32:45.654321');
        $tarea->Fecha_fin = new Carbon('2020-02-16 15:32:45.654321');
        $tarea->Prioridad = "Media";
        $tarea->Correcciones = 'false';
        $tarea->Proyecto_id = 1;
        $tarea->Estado_tarea_id = 6;
        $tarea->save();

        $tarea = new Tarea;
        $tarea->Nombre_tarea = "Realizar cómputo y presupuesto";
        $tarea->Tipo_tarea_id = 2;
        $tarea->Fecha_inicio = new Carbon('2020-02-15 15:32:45.654321');
        $tarea->Fecha_limite = new Carbon('2020-02-15 15:32:45.654321');
        $tarea->Fecha_fin = new Carbon('2020-02-16 15:32:45.654321');
        $tarea->Prioridad = "Media";
        $tarea->Correcciones = 'false';
        $tarea->Proyecto_id = 1;
        $tarea->Estado_tarea_id = 6;
        $tarea->save();

        //Fin de tareas del proyecto 1

        //Tareas del proyecto 2


        $tarea = new Tarea;
        $tarea->Nombre_tarea = "Diseñar planta general";
        $tarea->Tipo_tarea_id = 1;
        $tarea->Fecha_inicio = new Carbon('2020-02-15 15:32:45.654321');
        $tarea->Fecha_limite = new Carbon('2020-02-15 15:32:45.654321');
        $tarea->Fecha_fin = new Carbon('2020-02-16 15:32:45.654321');
        $tarea->Prioridad = "Media";
        $tarea->Correcciones = 'false';
        $tarea->Proyecto_id = 2;
        $tarea->Estado_tarea_id = 6;
        $tarea->save();

        $tarea = new Tarea;
        $tarea->Nombre_tarea = "Diseñar vistas";
        $tarea->Tipo_tarea_id = 1;
        $tarea->Fecha_inicio = new Carbon('2020-02-15 15:32:45.654321');
        $tarea->Fecha_limite = new Carbon('2020-02-15 15:32:45.654321');
        $tarea->Fecha_fin = new Carbon('2020-02-16 15:32:45.654321');
        $tarea->Prioridad = "Media";
        $tarea->Correcciones = 'false';
        $tarea->Proyecto_id = 2;
        $tarea->Estado_tarea_id = 6;
        $tarea->save();

        $tarea = new Tarea;
        $tarea->Nombre_tarea = "Diseñar cortes";
        $tarea->Tipo_tarea_id = 1;
        $tarea->Fecha_inicio = new Carbon('2020-02-15 15:32:45.654321');
        $tarea->Fecha_limite = new Carbon('2020-02-15 15:32:45.654321');
        $tarea->Fecha_fin = new Carbon('2020-02-16 15:32:45.654321');
        $tarea->Prioridad = "Media";
        $tarea->Correcciones = 'false';
        $tarea->Proyecto_id = 2;
        $tarea->Estado_tarea_id = 6;
        $tarea->save();

        $tarea = new Tarea;
        $tarea->Nombre_tarea = "Diseñar planta de techos";
        $tarea->Tipo_tarea_id = 1;
        $tarea->Fecha_inicio = new Carbon('2020-02-15 15:32:45.654321');
        $tarea->Fecha_limite = new Carbon('2020-02-15 15:32:45.654321');
        $tarea->Fecha_fin = new Carbon('2020-02-16 15:32:45.654321');
        $tarea->Prioridad = "Media";
        $tarea->Correcciones = 'false';
        $tarea->Proyecto_id = 2;
        $tarea->Estado_tarea_id = 6;
        $tarea->save();

        $tarea = new Tarea;
        $tarea->Nombre_tarea = "Realizar memoria descriptiva";
        $tarea->Tipo_tarea_id = 5;
        $tarea->Fecha_inicio = new Carbon('2020-02-15 15:32:45.654321');
        $tarea->Fecha_limite = new Carbon('2020-02-15 15:32:45.654321');
        $tarea->Fecha_fin = new Carbon('2020-02-16 15:32:45.654321');
        $tarea->Prioridad = "Media";
        $tarea->Correcciones = 'false';
        $tarea->Proyecto_id = 2;
        $tarea->Estado_tarea_id = 6;
        $tarea->save();

        $tarea = new Tarea;
        $tarea->Nombre_tarea = "Presentación al cliente";
        $tarea->Tipo_tarea_id = 1;
        $tarea->Fecha_inicio = new Carbon('2020-02-15 15:32:45.654321');
        $tarea->Fecha_limite = new Carbon('2020-02-15 15:32:45.654321');
        $tarea->Fecha_fin = new Carbon('2020-02-16 15:32:45.654321');
        $tarea->Prioridad = "Media";
        $tarea->Correcciones = 'false';
        $tarea->Proyecto_id = 2;
        $tarea->Estado_tarea_id = 6;
        $tarea->save();

        $tarea = new Tarea;
        $tarea->Nombre_tarea = "Silueta y balance de superficies";
        $tarea->Tipo_tarea_id = 5;
        $tarea->Fecha_inicio = new Carbon('2020-02-15 15:32:45.654321');
        $tarea->Fecha_limite = new Carbon('2020-02-15 15:32:45.654321');
        $tarea->Fecha_fin = new Carbon('2020-02-16 15:32:45.654321');
        $tarea->Prioridad = "Media";
        $tarea->Correcciones = 'false';
        $tarea->Proyecto_id = 2;
        $tarea->Estado_tarea_id = 6;
        $tarea->save();

        $tarea = new Tarea;
        $tarea->Nombre_tarea = "Realizar planilla de iluminación y ventilación";
        $tarea->Tipo_tarea_id = 5;
        $tarea->Fecha_inicio = new Carbon('2020-02-15 15:32:45.654321');
        $tarea->Fecha_limite = new Carbon('2020-02-15 15:32:45.654321');
        $tarea->Fecha_fin = new Carbon('2020-02-16 15:32:45.654321');
        $tarea->Prioridad = "Media";
        $tarea->Correcciones = 'false';
        $tarea->Proyecto_id = 2;
        $tarea->Estado_tarea_id = 6;
        $tarea->save();

        $tarea = new Tarea;
        $tarea->Nombre_tarea = "Realizar cálculo de estructuras";
        $tarea->Tipo_tarea_id = 2;
        $tarea->Fecha_inicio = new Carbon('2020-02-15 15:32:45.654321');
        $tarea->Fecha_limite = new Carbon('2020-02-15 15:32:45.654321');
        $tarea->Fecha_fin = new Carbon('2020-02-16 15:32:45.654321');
        $tarea->Prioridad = "Media";
        $tarea->Correcciones = 'false';
        $tarea->Proyecto_id = 2;
        $tarea->Estado_tarea_id = 6;
        $tarea->save();

        $tarea = new Tarea;
        $tarea->Nombre_tarea = "Diseñar planta de estructuras";
        $tarea->Tipo_tarea_id = 1;
        $tarea->Fecha_inicio = new Carbon('2020-02-15 15:32:45.654321');
        $tarea->Fecha_limite = new Carbon('2020-02-15 15:32:45.654321');
        $tarea->Fecha_fin = new Carbon('2020-02-16 15:32:45.654321');
        $tarea->Prioridad = "Media";
        $tarea->Correcciones = 'false';
        $tarea->Proyecto_id = 2;
        $tarea->Estado_tarea_id = 6;
        $tarea->save();

        $tarea = new Tarea;
        $tarea->Nombre_tarea = "Diseñar instalación eléctrica";
        $tarea->Tipo_tarea_id = 3;
        $tarea->Fecha_inicio = new Carbon('2020-02-15 15:32:45.654321');
        $tarea->Fecha_limite = new Carbon('2020-02-15 15:32:45.654321');
        $tarea->Fecha_fin = new Carbon('2020-02-16 15:32:45.654321');
        $tarea->Prioridad = "Media";
        $tarea->Correcciones = 'false';
        $tarea->Proyecto_id = 2;
        $tarea->Estado_tarea_id = 6;
        $tarea->save();

        $tarea = new Tarea;
        $tarea->Nombre_tarea = "Diseñar instalación de agua";
        $tarea->Tipo_tarea_id = 3;
        $tarea->Fecha_inicio = new Carbon('2020-02-15 15:32:45.654321');
        $tarea->Fecha_limite = new Carbon('2020-02-15 15:32:45.654321');
        $tarea->Fecha_fin = new Carbon('2020-02-16 15:32:45.654321');
        $tarea->Prioridad = "Media";
        $tarea->Correcciones = 'false';
        $tarea->Proyecto_id = 2;
        $tarea->Estado_tarea_id = 6;
        $tarea->save();

        $tarea = new Tarea;
        $tarea->Nombre_tarea = "Diseñar instalación sanitaria";
        $tarea->Tipo_tarea_id = 3;
        $tarea->Fecha_inicio = new Carbon('2020-02-15 15:32:45.654321');
        $tarea->Fecha_limite = new Carbon('2020-02-15 15:32:45.654321');
        $tarea->Fecha_fin = new Carbon('2020-02-16 15:32:45.654321');
        $tarea->Prioridad = "Media";
        $tarea->Correcciones = 'false';
        $tarea->Proyecto_id = 2;
        $tarea->Estado_tarea_id = 6;
        $tarea->save();

        $tarea = new Tarea;
        $tarea->Nombre_tarea = "Realizar detalles";
        $tarea->Tipo_tarea_id = 4;
        $tarea->Fecha_inicio = new Carbon('2020-02-15 15:32:45.654321');
        $tarea->Fecha_limite = new Carbon('2020-02-15 15:32:45.654321');
        $tarea->Fecha_fin = new Carbon('2020-02-16 15:32:45.654321');
        $tarea->Prioridad = "Media";
        $tarea->Correcciones = 'false';
        $tarea->Proyecto_id = 2;
        $tarea->Estado_tarea_id = 6;
        $tarea->save();

        $tarea = new Tarea;
        $tarea->Nombre_tarea = "Realizar cómputo y presupuesto";
        $tarea->Tipo_tarea_id = 2;
        $tarea->Fecha_inicio = new Carbon('2020-02-15 15:32:45.654321');
        $tarea->Fecha_limite = new Carbon('2020-02-15 15:32:45.654321');
        $tarea->Fecha_fin = new Carbon('2020-02-16 15:32:45.654321');
        $tarea->Prioridad = "Media";
        $tarea->Correcciones = 'false';
        $tarea->Proyecto_id = 2;
        $tarea->Estado_tarea_id = 6;
        $tarea->save();

        //Fin de tareas del proyecto 2

        //Tareas del proyecto 3


        $tarea = new Tarea;
        $tarea->Nombre_tarea = "Diseñar planta general";
        $tarea->Tipo_tarea_id = 1;
        $tarea->Fecha_inicio = new Carbon('2020-02-15 15:32:45.654321');
        $tarea->Fecha_limite = new Carbon('2020-02-15 15:32:45.654321');
        $tarea->Fecha_fin = new Carbon('2020-02-16 15:32:45.654321');
        $tarea->Prioridad = "Media";
        $tarea->Correcciones = 'false';
        $tarea->Proyecto_id = 3;
        $tarea->Estado_tarea_id = 6;
        $tarea->save();

        $tarea = new Tarea;
        $tarea->Nombre_tarea = "Diseñar vistas";
        $tarea->Tipo_tarea_id = 1;
        $tarea->Fecha_inicio = new Carbon('2020-02-15 15:32:45.654321');
        $tarea->Fecha_limite = new Carbon('2020-02-15 15:32:45.654321');
        $tarea->Fecha_fin = new Carbon('2020-02-16 15:32:45.654321');
        $tarea->Prioridad = "Media";
        $tarea->Correcciones = 'false';
        $tarea->Proyecto_id = 3;
        $tarea->Estado_tarea_id = 6;
        $tarea->save();

        $tarea = new Tarea;
        $tarea->Nombre_tarea = "Diseñar cortes";
        $tarea->Tipo_tarea_id = 1;
        $tarea->Fecha_inicio = new Carbon('2020-02-15 15:32:45.654321');
        $tarea->Fecha_limite = new Carbon('2020-02-15 15:32:45.654321');
        $tarea->Fecha_fin = new Carbon('2020-02-16 15:32:45.654321');
        $tarea->Prioridad = "Media";
        $tarea->Correcciones = 'false';
        $tarea->Proyecto_id = 3;
        $tarea->Estado_tarea_id = 6;
        $tarea->save();

        $tarea = new Tarea;
        $tarea->Nombre_tarea = "Diseñar planta de techos";
        $tarea->Tipo_tarea_id = 1;
        $tarea->Fecha_inicio = new Carbon('2020-02-15 15:32:45.654321');
        $tarea->Fecha_limite = new Carbon('2020-02-15 15:32:45.654321');
        $tarea->Fecha_fin = new Carbon('2020-02-16 15:32:45.654321');
        $tarea->Prioridad = "Media";
        $tarea->Correcciones = 'false';
        $tarea->Proyecto_id = 3;
        $tarea->Estado_tarea_id = 6;
        $tarea->save();

        $tarea = new Tarea;
        $tarea->Nombre_tarea = "Realizar memoria descriptiva";
        $tarea->Tipo_tarea_id = 5;
        $tarea->Fecha_inicio = new Carbon('2020-02-15 15:32:45.654321');
        $tarea->Fecha_limite = new Carbon('2020-02-15 15:32:45.654321');
        $tarea->Fecha_fin = new Carbon('2020-02-16 15:32:45.654321');
        $tarea->Prioridad = "Media";
        $tarea->Correcciones = 'false';
        $tarea->Proyecto_id = 3;
        $tarea->Estado_tarea_id = 6;
        $tarea->save();

        $tarea = new Tarea;
        $tarea->Nombre_tarea = "Presentación al cliente";
        $tarea->Tipo_tarea_id = 1;
        $tarea->Fecha_inicio = new Carbon('2020-02-15 15:32:45.654321');
        $tarea->Fecha_limite = new Carbon('2020-02-15 15:32:45.654321');
        $tarea->Fecha_fin = new Carbon('2020-02-16 15:32:45.654321');
        $tarea->Prioridad = "Media";
        $tarea->Correcciones = 'false';
        $tarea->Proyecto_id = 3;
        $tarea->Estado_tarea_id = 6;
        $tarea->save();

        $tarea = new Tarea;
        $tarea->Nombre_tarea = "Silueta y balance de superficies";
        $tarea->Tipo_tarea_id = 5;
        $tarea->Fecha_inicio = new Carbon('2020-02-15 15:32:45.654321');
        $tarea->Fecha_limite = new Carbon('2020-02-15 15:32:45.654321');
        $tarea->Fecha_fin = new Carbon('2020-02-16 15:32:45.654321');
        $tarea->Prioridad = "Media";
        $tarea->Correcciones = 'false';
        $tarea->Proyecto_id = 3;
        $tarea->Estado_tarea_id = 6;
        $tarea->save();

        $tarea = new Tarea;
        $tarea->Nombre_tarea = "Realizar planilla de iluminación y ventilación";
        $tarea->Tipo_tarea_id = 5;
        $tarea->Fecha_inicio = new Carbon('2020-02-15 15:32:45.654321');
        $tarea->Fecha_limite = new Carbon('2020-02-15 15:32:45.654321');
        $tarea->Fecha_fin = new Carbon('2020-02-16 15:32:45.654321');
        $tarea->Prioridad = "Media";
        $tarea->Correcciones = 'false';
        $tarea->Proyecto_id = 3;
        $tarea->Estado_tarea_id = 6;
        $tarea->save();

        $tarea = new Tarea;
        $tarea->Nombre_tarea = "Realizar cálculo de estructuras";
        $tarea->Tipo_tarea_id = 2;
        $tarea->Fecha_inicio = new Carbon('2020-02-15 15:32:45.654321');
        $tarea->Fecha_limite = new Carbon('2020-02-15 15:32:45.654321');
        $tarea->Fecha_fin = new Carbon('2020-02-16 15:32:45.654321');
        $tarea->Prioridad = "Media";
        $tarea->Correcciones = 'false';
        $tarea->Proyecto_id = 3;
        $tarea->Estado_tarea_id = 6;
        $tarea->save();

        $tarea = new Tarea;
        $tarea->Nombre_tarea = "Diseñar planta de estructuras";
        $tarea->Tipo_tarea_id = 1;
        $tarea->Fecha_inicio = new Carbon('2020-02-15 15:32:45.654321');
        $tarea->Fecha_limite = new Carbon('2020-02-15 15:32:45.654321');
        $tarea->Fecha_fin = new Carbon('2020-02-16 15:32:45.654321');
        $tarea->Prioridad = "Media";
        $tarea->Correcciones = 'false';
        $tarea->Proyecto_id = 3;
        $tarea->Estado_tarea_id = 6;
        $tarea->save();

        $tarea = new Tarea;
        $tarea->Nombre_tarea = "Diseñar instalación eléctrica";
        $tarea->Tipo_tarea_id = 3;
        $tarea->Fecha_inicio = new Carbon('2020-02-15 15:32:45.654321');
        $tarea->Fecha_limite = new Carbon('2020-02-15 15:32:45.654321');
        $tarea->Fecha_fin = new Carbon('2020-02-16 15:32:45.654321');
        $tarea->Prioridad = "Media";
        $tarea->Correcciones = 'false';
        $tarea->Proyecto_id = 3;
        $tarea->Estado_tarea_id = 6;
        $tarea->save();

        $tarea = new Tarea;
        $tarea->Nombre_tarea = "Diseñar instalación de agua";
        $tarea->Tipo_tarea_id = 3;
        $tarea->Fecha_inicio = new Carbon('2020-02-15 15:32:45.654321');
        $tarea->Fecha_limite = new Carbon('2020-02-15 15:32:45.654321');
        $tarea->Fecha_fin = new Carbon('2020-02-16 15:32:45.654321');
        $tarea->Prioridad = "Media";
        $tarea->Correcciones = 'false';
        $tarea->Proyecto_id = 3;
        $tarea->Estado_tarea_id = 6;
        $tarea->save();

        $tarea = new Tarea;
        $tarea->Nombre_tarea = "Diseñar instalación sanitaria";
        $tarea->Tipo_tarea_id = 3;
        $tarea->Fecha_inicio = new Carbon('2020-02-15 15:32:45.654321');
        $tarea->Fecha_limite = new Carbon('2020-02-15 15:32:45.654321');
        $tarea->Fecha_fin = new Carbon('2020-02-16 15:32:45.654321');
        $tarea->Prioridad = "Media";
        $tarea->Correcciones = 'false';
        $tarea->Proyecto_id = 3;
        $tarea->Estado_tarea_id = 6;
        $tarea->save();

        $tarea = new Tarea;
        $tarea->Nombre_tarea = "Realizar detalles";
        $tarea->Tipo_tarea_id = 4;
        $tarea->Fecha_inicio = new Carbon('2020-02-15 15:32:45.654321');
        $tarea->Fecha_limite = new Carbon('2020-02-15 15:32:45.654321');
        $tarea->Fecha_fin = new Carbon('2020-02-16 15:32:45.654321');
        $tarea->Prioridad = "Media";
        $tarea->Correcciones = 'false';
        $tarea->Proyecto_id = 3;
        $tarea->Estado_tarea_id = 6;
        $tarea->save();

        $tarea = new Tarea;
        $tarea->Nombre_tarea = "Realizar cómputo y presupuesto";
        $tarea->Tipo_tarea_id = 2;
        $tarea->Fecha_inicio = new Carbon('2020-02-15 15:32:45.654321');
        $tarea->Fecha_limite = new Carbon('2020-02-15 15:32:45.654321');
        $tarea->Fecha_fin = new Carbon('2020-02-16 15:32:45.654321');
        $tarea->Prioridad = "Media";
        $tarea->Correcciones = 'false';
        $tarea->Proyecto_id = 3;
        $tarea->Estado_tarea_id = 6;
        $tarea->save();

        //Fin de tareas del proyecto 3

        //Tareas del proyecto 4


        $tarea = new Tarea;
        $tarea->Nombre_tarea = "Diseñar planta general";
        $tarea->Tipo_tarea_id = 1;
        $tarea->Fecha_inicio = new Carbon('2020-02-15 15:32:45.654321');
        $tarea->Fecha_limite = new Carbon('2020-02-15 15:32:45.654321');
        $tarea->Fecha_fin = new Carbon('2020-02-16 15:32:45.654321');
        $tarea->Prioridad = "Media";
        $tarea->Correcciones = 'false';
        $tarea->Proyecto_id = 4;
        $tarea->Estado_tarea_id = 6;
        $tarea->save();

        $tarea = new Tarea;
        $tarea->Nombre_tarea = "Diseñar vistas";
        $tarea->Tipo_tarea_id = 1;
        $tarea->Fecha_inicio = new Carbon('2020-02-15 15:32:45.654321');
        $tarea->Fecha_limite = new Carbon('2020-02-15 15:32:45.654321');
        $tarea->Fecha_fin = new Carbon('2020-02-16 15:32:45.654321');
        $tarea->Prioridad = "Media";
        $tarea->Correcciones = 'false';
        $tarea->Proyecto_id = 4;
        $tarea->Estado_tarea_id = 6;
        $tarea->save();

        $tarea = new Tarea;
        $tarea->Nombre_tarea = "Diseñar cortes";
        $tarea->Tipo_tarea_id = 1;
        $tarea->Fecha_inicio = new Carbon('2020-02-15 15:32:45.654321');
        $tarea->Fecha_limite = new Carbon('2020-02-15 15:32:45.654321');
        $tarea->Fecha_fin = new Carbon('2020-02-16 15:32:45.654321');
        $tarea->Prioridad = "Media";
        $tarea->Correcciones = 'false';
        $tarea->Proyecto_id = 4;
        $tarea->Estado_tarea_id = 6;
        $tarea->save();

        $tarea = new Tarea;
        $tarea->Nombre_tarea = "Diseñar planta de techos";
        $tarea->Tipo_tarea_id = 1;
        $tarea->Fecha_inicio = new Carbon('2020-02-15 15:32:45.654321');
        $tarea->Fecha_limite = new Carbon('2020-02-15 15:32:45.654321');
        $tarea->Fecha_fin = new Carbon('2020-02-16 15:32:45.654321');
        $tarea->Prioridad = "Media";
        $tarea->Correcciones = 'false';
        $tarea->Proyecto_id = 4;
        $tarea->Estado_tarea_id = 6;
        $tarea->save();

        $tarea = new Tarea;
        $tarea->Nombre_tarea = "Realizar memoria descriptiva";
        $tarea->Tipo_tarea_id = 5;
        $tarea->Fecha_inicio = new Carbon('2020-02-15 15:32:45.654321');
        $tarea->Fecha_limite = new Carbon('2020-02-15 15:32:45.654321');
        $tarea->Fecha_fin = new Carbon('2020-02-16 15:32:45.654321');
        $tarea->Prioridad = "Media";
        $tarea->Correcciones = 'false';
        $tarea->Proyecto_id = 4;
        $tarea->Estado_tarea_id = 6;
        $tarea->save();

        $tarea = new Tarea;
        $tarea->Nombre_tarea = "Presentación al cliente";
        $tarea->Tipo_tarea_id = 1;
        $tarea->Fecha_inicio = new Carbon('2020-02-15 15:32:45.654321');
        $tarea->Fecha_limite = new Carbon('2020-02-15 15:32:45.654321');
        $tarea->Fecha_fin = new Carbon('2020-02-16 15:32:45.654321');
        $tarea->Prioridad = "Media";
        $tarea->Correcciones = 'false';
        $tarea->Proyecto_id = 4;
        $tarea->Estado_tarea_id = 6;
        $tarea->save();

        $tarea = new Tarea;
        $tarea->Nombre_tarea = "Silueta y balance de superficies";
        $tarea->Tipo_tarea_id = 5;
        $tarea->Fecha_inicio = new Carbon('2020-02-15 15:32:45.654321');
        $tarea->Fecha_limite = new Carbon('2020-02-15 15:32:45.654321');
        $tarea->Fecha_fin = new Carbon('2020-02-16 15:32:45.654321');
        $tarea->Prioridad = "Media";
        $tarea->Correcciones = 'false';
        $tarea->Proyecto_id = 4;
        $tarea->Estado_tarea_id = 6;
        $tarea->save();

        $tarea = new Tarea;
        $tarea->Nombre_tarea = "Realizar planilla de iluminación y ventilación";
        $tarea->Tipo_tarea_id = 5;
        $tarea->Fecha_inicio = new Carbon('2020-02-15 15:32:45.654321');
        $tarea->Fecha_limite = new Carbon('2020-02-15 15:32:45.654321');
        $tarea->Fecha_fin = new Carbon('2020-02-16 15:32:45.654321');
        $tarea->Prioridad = "Media";
        $tarea->Correcciones = 'false';
        $tarea->Proyecto_id = 4;
        $tarea->Estado_tarea_id = 6;
        $tarea->save();

        $tarea = new Tarea;
        $tarea->Nombre_tarea = "Realizar cálculo de estructuras";
        $tarea->Tipo_tarea_id = 2;
        $tarea->Fecha_inicio = new Carbon('2020-02-15 15:32:45.654321');
        $tarea->Fecha_limite = new Carbon('2020-02-15 15:32:45.654321');
        $tarea->Fecha_fin = new Carbon('2020-02-16 15:32:45.654321');
        $tarea->Prioridad = "Media";
        $tarea->Correcciones = 'false';
        $tarea->Proyecto_id = 4;
        $tarea->Estado_tarea_id = 6;
        $tarea->save();

        $tarea = new Tarea;
        $tarea->Nombre_tarea = "Diseñar planta de estructuras";
        $tarea->Tipo_tarea_id = 1;
        $tarea->Fecha_inicio = new Carbon('2020-02-15 15:32:45.654321');
        $tarea->Fecha_limite = new Carbon('2020-02-15 15:32:45.654321');
        $tarea->Fecha_fin = new Carbon('2020-02-16 15:32:45.654321');
        $tarea->Prioridad = "Media";
        $tarea->Correcciones = 'false';
        $tarea->Proyecto_id = 4;
        $tarea->Estado_tarea_id = 6;
        $tarea->save();

        $tarea = new Tarea;
        $tarea->Nombre_tarea = "Diseñar instalación eléctrica";
        $tarea->Tipo_tarea_id = 3;
        $tarea->Fecha_inicio = new Carbon('2020-02-15 15:32:45.654321');
        $tarea->Fecha_limite = new Carbon('2020-02-15 15:32:45.654321');
        $tarea->Fecha_fin = new Carbon('2020-02-16 15:32:45.654321');
        $tarea->Prioridad = "Media";
        $tarea->Correcciones = 'false';
        $tarea->Proyecto_id = 4;
        $tarea->Estado_tarea_id = 6;
        $tarea->save();

        $tarea = new Tarea;
        $tarea->Nombre_tarea = "Diseñar instalación de agua";
        $tarea->Tipo_tarea_id = 3;
        $tarea->Fecha_inicio = new Carbon('2020-02-15 15:32:45.654321');
        $tarea->Fecha_limite = new Carbon('2020-02-15 15:32:45.654321');
        $tarea->Fecha_fin = new Carbon('2020-02-16 15:32:45.654321');
        $tarea->Prioridad = "Media";
        $tarea->Correcciones = 'false';
        $tarea->Proyecto_id = 4;
        $tarea->Estado_tarea_id = 6;
        $tarea->save();

        $tarea = new Tarea;
        $tarea->Nombre_tarea = "Diseñar instalación sanitaria";
        $tarea->Tipo_tarea_id = 3;
        $tarea->Fecha_inicio = new Carbon('2020-02-15 15:32:45.654321');
        $tarea->Fecha_limite = new Carbon('2020-02-15 15:32:45.654321');
        $tarea->Fecha_fin = new Carbon('2020-02-16 15:32:45.654321');
        $tarea->Prioridad = "Media";
        $tarea->Correcciones = 'false';
        $tarea->Proyecto_id = 4;
        $tarea->Estado_tarea_id = 6;
        $tarea->save();

        $tarea = new Tarea;
        $tarea->Nombre_tarea = "Realizar detalles";
        $tarea->Tipo_tarea_id = 4;
        $tarea->Fecha_inicio = new Carbon('2020-02-15 15:32:45.654321');
        $tarea->Fecha_limite = new Carbon('2020-02-15 15:32:45.654321');
        $tarea->Fecha_fin = new Carbon('2020-02-16 15:32:45.654321');
        $tarea->Prioridad = "Media";
        $tarea->Correcciones = 'false';
        $tarea->Proyecto_id = 4;
        $tarea->Estado_tarea_id = 6;
        $tarea->save();

        $tarea = new Tarea;
        $tarea->Nombre_tarea = "Realizar cómputo y presupuesto";
        $tarea->Tipo_tarea_id = 2;
        $tarea->Fecha_inicio = new Carbon('2020-02-15 15:32:45.654321');
        $tarea->Fecha_limite = new Carbon('2020-02-15 15:32:45.654321');
        $tarea->Fecha_fin = new Carbon('2020-02-16 15:32:45.654321');
        $tarea->Prioridad = "Media";
        $tarea->Correcciones = 'false';
        $tarea->Proyecto_id = 4;
        $tarea->Estado_tarea_id = 6;
        $tarea->save();

        //Fin de tareas del proyecto 4

        //Tareas del proyecto 5


        $tarea = new Tarea;
        $tarea->Nombre_tarea = "Diseñar planta general";
        $tarea->Tipo_tarea_id = 1;
        $tarea->Fecha_inicio = new Carbon('2020-02-15 15:32:45.654321');
        $tarea->Fecha_limite = new Carbon('2020-02-15 15:32:45.654321');
        $tarea->Fecha_fin = new Carbon('2020-02-16 15:32:45.654321');
        $tarea->Prioridad = "Media";
        $tarea->Correcciones = 'false';
        $tarea->Proyecto_id = 5;
        $tarea->Estado_tarea_id = 6;
        $tarea->save();

        $tarea = new Tarea;
        $tarea->Nombre_tarea = "Diseñar vistas";
        $tarea->Tipo_tarea_id = 1;
        $tarea->Fecha_inicio = new Carbon('2020-02-15 15:32:45.654321');
        $tarea->Fecha_limite = new Carbon('2020-02-15 15:32:45.654321');
        $tarea->Fecha_fin = new Carbon('2020-02-16 15:32:45.654321');
        $tarea->Prioridad = "Media";
        $tarea->Correcciones = 'false';
        $tarea->Proyecto_id = 5;
        $tarea->Estado_tarea_id = 6;
        $tarea->save();

        $tarea = new Tarea;
        $tarea->Nombre_tarea = "Diseñar cortes";
        $tarea->Tipo_tarea_id = 1;
        $tarea->Fecha_inicio = new Carbon('2020-02-15 15:32:45.654321');
        $tarea->Fecha_limite = new Carbon('2020-02-15 15:32:45.654321');
        $tarea->Fecha_fin = new Carbon('2020-02-16 15:32:45.654321');
        $tarea->Prioridad = "Media";
        $tarea->Correcciones = 'false';
        $tarea->Proyecto_id = 5;
        $tarea->Estado_tarea_id = 6;
        $tarea->save();

        $tarea = new Tarea;
        $tarea->Nombre_tarea = "Diseñar planta de techos";
        $tarea->Tipo_tarea_id = 1;
        $tarea->Fecha_inicio = new Carbon('2020-02-15 15:32:45.654321');
        $tarea->Fecha_limite = new Carbon('2020-02-15 15:32:45.654321');
        $tarea->Fecha_fin = new Carbon('2020-02-16 15:32:45.654321');
        $tarea->Prioridad = "Media";
        $tarea->Correcciones = 'false';
        $tarea->Proyecto_id = 5;
        $tarea->Estado_tarea_id = 6;
        $tarea->save();

        $tarea = new Tarea;
        $tarea->Nombre_tarea = "Realizar memoria descriptiva";
        $tarea->Tipo_tarea_id = 5;
        $tarea->Fecha_inicio = new Carbon('2020-02-15 15:32:45.654321');
        $tarea->Fecha_limite = new Carbon('2020-02-15 15:32:45.654321');
        $tarea->Fecha_fin = new Carbon('2020-02-16 15:32:45.654321');
        $tarea->Prioridad = "Media";
        $tarea->Correcciones = 'false';
        $tarea->Proyecto_id = 5;
        $tarea->Estado_tarea_id = 6;
        $tarea->save();

        $tarea = new Tarea;
        $tarea->Nombre_tarea = "Presentación al cliente";
        $tarea->Tipo_tarea_id = 1;
        $tarea->Fecha_inicio = new Carbon('2020-02-15 15:32:45.654321');
        $tarea->Fecha_limite = new Carbon('2020-02-15 15:32:45.654321');
        $tarea->Fecha_fin = new Carbon('2020-02-16 15:32:45.654321');
        $tarea->Prioridad = "Media";
        $tarea->Correcciones = 'false';
        $tarea->Proyecto_id = 5;
        $tarea->Estado_tarea_id = 6;
        $tarea->save();

        $tarea = new Tarea;
        $tarea->Nombre_tarea = "Silueta y balance de superficies";
        $tarea->Tipo_tarea_id = 5;
        $tarea->Fecha_inicio = new Carbon('2020-02-15 15:32:45.654321');
        $tarea->Fecha_limite = new Carbon('2020-02-15 15:32:45.654321');
        $tarea->Fecha_fin = new Carbon('2020-02-16 15:32:45.654321');
        $tarea->Prioridad = "Media";
        $tarea->Correcciones = 'false';
        $tarea->Proyecto_id = 5;
        $tarea->Estado_tarea_id = 6;
        $tarea->save();

        $tarea = new Tarea;
        $tarea->Nombre_tarea = "Realizar planilla de iluminación y ventilación";
        $tarea->Tipo_tarea_id = 5;
        $tarea->Fecha_inicio = new Carbon('2020-02-15 15:32:45.654321');
        $tarea->Fecha_limite = new Carbon('2020-02-15 15:32:45.654321');
        $tarea->Fecha_fin = new Carbon('2020-02-16 15:32:45.654321');
        $tarea->Prioridad = "Media";
        $tarea->Correcciones = 'false';
        $tarea->Proyecto_id = 5;
        $tarea->Estado_tarea_id = 6;
        $tarea->save();

        $tarea = new Tarea;
        $tarea->Nombre_tarea = "Realizar cálculo de estructuras";
        $tarea->Tipo_tarea_id = 2;
        $tarea->Fecha_inicio = new Carbon('2020-02-15 15:32:45.654321');
        $tarea->Fecha_limite = new Carbon('2020-02-15 15:32:45.654321');
        $tarea->Fecha_fin = new Carbon('2020-02-16 15:32:45.654321');
        $tarea->Prioridad = "Media";
        $tarea->Correcciones = 'false';
        $tarea->Proyecto_id = 5;
        $tarea->Estado_tarea_id = 6;
        $tarea->save();

        $tarea = new Tarea;
        $tarea->Nombre_tarea = "Diseñar planta de estructuras";
        $tarea->Tipo_tarea_id = 1;
        $tarea->Fecha_inicio = new Carbon('2020-02-15 15:32:45.654321');
        $tarea->Fecha_limite = new Carbon('2020-02-15 15:32:45.654321');
        $tarea->Fecha_fin = new Carbon('2020-02-16 15:32:45.654321');
        $tarea->Prioridad = "Media";
        $tarea->Correcciones = 'false';
        $tarea->Proyecto_id = 5;
        $tarea->Estado_tarea_id = 6;
        $tarea->save();

        $tarea = new Tarea;
        $tarea->Nombre_tarea = "Diseñar instalación eléctrica";
        $tarea->Tipo_tarea_id = 3;
        $tarea->Fecha_inicio = new Carbon('2020-02-15 15:32:45.654321');
        $tarea->Fecha_limite = new Carbon('2020-02-15 15:32:45.654321');
        $tarea->Fecha_fin = new Carbon('2020-02-16 15:32:45.654321');
        $tarea->Prioridad = "Media";
        $tarea->Correcciones = 'false';
        $tarea->Proyecto_id = 5;
        $tarea->Estado_tarea_id = 6;
        $tarea->save();

        $tarea = new Tarea;
        $tarea->Nombre_tarea = "Diseñar instalación de agua";
        $tarea->Tipo_tarea_id = 3;
        $tarea->Fecha_inicio = new Carbon('2020-02-15 15:32:45.654321');
        $tarea->Fecha_limite = new Carbon('2020-02-15 15:32:45.654321');
        $tarea->Fecha_fin = new Carbon('2020-02-16 15:32:45.654321');
        $tarea->Prioridad = "Media";
        $tarea->Correcciones = 'false';
        $tarea->Proyecto_id = 5;
        $tarea->Estado_tarea_id = 6;
        $tarea->save();

        $tarea = new Tarea;
        $tarea->Nombre_tarea = "Diseñar instalación sanitaria";
        $tarea->Tipo_tarea_id = 3;
        $tarea->Fecha_inicio = new Carbon('2020-02-15 15:32:45.654321');
        $tarea->Fecha_limite = new Carbon('2020-02-15 15:32:45.654321');
        $tarea->Fecha_fin = new Carbon('2020-02-16 15:32:45.654321');
        $tarea->Prioridad = "Media";
        $tarea->Correcciones = 'false';
        $tarea->Proyecto_id = 5;
        $tarea->Estado_tarea_id = 6;
        $tarea->save();

        $tarea = new Tarea;
        $tarea->Nombre_tarea = "Realizar detalles";
        $tarea->Tipo_tarea_id = 4;
        $tarea->Fecha_inicio = new Carbon('2020-02-15 15:32:45.654321');
        $tarea->Fecha_limite = new Carbon('2020-02-15 15:32:45.654321');
        $tarea->Fecha_fin = new Carbon('2020-02-16 15:32:45.654321');
        $tarea->Prioridad = "Media";
        $tarea->Correcciones = 'false';
        $tarea->Proyecto_id = 5;
        $tarea->Estado_tarea_id = 6;
        $tarea->save();

        $tarea = new Tarea;
        $tarea->Nombre_tarea = "Realizar cómputo y presupuesto";
        $tarea->Tipo_tarea_id = 2;
        $tarea->Fecha_inicio = new Carbon('2020-02-15 15:32:45.654321');
        $tarea->Fecha_limite = new Carbon('2020-02-15 15:32:45.654321');
        $tarea->Fecha_fin = new Carbon('2020-02-16 15:32:45.654321');
        $tarea->Prioridad = "Media";
        $tarea->Correcciones = 'false';
        $tarea->Proyecto_id = 5;
        $tarea->Estado_tarea_id = 6;
        $tarea->save();

        //Fin de tareas del proyecto 5

        //Asignaciones de tareas del proyecto 1

        $asignacionPersonalTarea = new AsignacionPersonalTarea;
        $asignacionPersonalTarea->Personal_id = 3;
        $asignacionPersonalTarea->Responsabilidad = "Desarrollador";
        $asignacionPersonalTarea->Tarea_id = 1;
        $asignacionPersonalTarea->save();

        $asignacionPersonalTarea = new AsignacionPersonalTarea;
        $asignacionPersonalTarea->Personal_id = 4;
        $asignacionPersonalTarea->Responsabilidad = "Desarrollador";
        $asignacionPersonalTarea->Tarea_id = 2;
        $asignacionPersonalTarea->save();

        $asignacionPersonalTarea = new AsignacionPersonalTarea;
        $asignacionPersonalTarea->Personal_id = 5;
        $asignacionPersonalTarea->Responsabilidad = "Desarrollador";
        $asignacionPersonalTarea->Tarea_id = 3;
        $asignacionPersonalTarea->save();

        $asignacionPersonalTarea = new AsignacionPersonalTarea;
        $asignacionPersonalTarea->Personal_id = 3;
        $asignacionPersonalTarea->Responsabilidad = "Desarrollador";
        $asignacionPersonalTarea->Tarea_id = 4;
        $asignacionPersonalTarea->save();

        $asignacionPersonalTarea = new AsignacionPersonalTarea;
        $asignacionPersonalTarea->Personal_id = 4;
        $asignacionPersonalTarea->Responsabilidad = "Desarrollador";
        $asignacionPersonalTarea->Tarea_id = 5;
        $asignacionPersonalTarea->save();

        $asignacionPersonalTarea = new AsignacionPersonalTarea;
        $asignacionPersonalTarea->Personal_id = 5;
        $asignacionPersonalTarea->Responsabilidad = "Desarrollador";
        $asignacionPersonalTarea->Tarea_id = 6;
        $asignacionPersonalTarea->save();

        $asignacionPersonalTarea = new AsignacionPersonalTarea;
        $asignacionPersonalTarea->Personal_id = 3;
        $asignacionPersonalTarea->Responsabilidad = "Desarrollador";
        $asignacionPersonalTarea->Tarea_id = 7;
        $asignacionPersonalTarea->save();

        $asignacionPersonalTarea = new AsignacionPersonalTarea;
        $asignacionPersonalTarea->Personal_id = 4;
        $asignacionPersonalTarea->Responsabilidad = "Desarrollador";
        $asignacionPersonalTarea->Tarea_id = 8;
        $asignacionPersonalTarea->save();

        $asignacionPersonalTarea = new AsignacionPersonalTarea;
        $asignacionPersonalTarea->Personal_id = 5;
        $asignacionPersonalTarea->Responsabilidad = "Desarrollador";
        $asignacionPersonalTarea->Tarea_id = 9;
        $asignacionPersonalTarea->save();

        $asignacionPersonalTarea = new AsignacionPersonalTarea;
        $asignacionPersonalTarea->Personal_id = 3;
        $asignacionPersonalTarea->Responsabilidad = "Desarrollador";
        $asignacionPersonalTarea->Tarea_id = 10;
        $asignacionPersonalTarea->save();

        $asignacionPersonalTarea = new AsignacionPersonalTarea;
        $asignacionPersonalTarea->Personal_id = 4;
        $asignacionPersonalTarea->Responsabilidad = "Desarrollador";
        $asignacionPersonalTarea->Tarea_id = 11;
        $asignacionPersonalTarea->save();

        $asignacionPersonalTarea = new AsignacionPersonalTarea;
        $asignacionPersonalTarea->Personal_id = 5;
        $asignacionPersonalTarea->Responsabilidad = "Desarrollador";
        $asignacionPersonalTarea->Tarea_id = 12;
        $asignacionPersonalTarea->save();

        $asignacionPersonalTarea = new AsignacionPersonalTarea;
        $asignacionPersonalTarea->Personal_id = 3;
        $asignacionPersonalTarea->Responsabilidad = "Desarrollador";
        $asignacionPersonalTarea->Tarea_id = 13;
        $asignacionPersonalTarea->save();

        $asignacionPersonalTarea = new AsignacionPersonalTarea;
        $asignacionPersonalTarea->Personal_id = 4;
        $asignacionPersonalTarea->Responsabilidad = "Desarrollador";
        $asignacionPersonalTarea->Tarea_id = 14;
        $asignacionPersonalTarea->save();

        $asignacionPersonalTarea = new AsignacionPersonalTarea;
        $asignacionPersonalTarea->Personal_id = 5;
        $asignacionPersonalTarea->Responsabilidad = "Desarrollador";
        $asignacionPersonalTarea->Tarea_id = 15;
        $asignacionPersonalTarea->save();

        //Fin asignaciones de tareas del proyecto 1

        //Asignaciones de tareas del proyecto 2

        $asignacionPersonalTarea = new AsignacionPersonalTarea;
        $asignacionPersonalTarea->Personal_id = 3;
        $asignacionPersonalTarea->Responsabilidad = "Desarrollador";
        $asignacionPersonalTarea->Tarea_id = 16;
        $asignacionPersonalTarea->save();

        $asignacionPersonalTarea = new AsignacionPersonalTarea;
        $asignacionPersonalTarea->Personal_id = 4;
        $asignacionPersonalTarea->Responsabilidad = "Desarrollador";
        $asignacionPersonalTarea->Tarea_id = 17;
        $asignacionPersonalTarea->save();

        $asignacionPersonalTarea = new AsignacionPersonalTarea;
        $asignacionPersonalTarea->Personal_id = 5;
        $asignacionPersonalTarea->Responsabilidad = "Desarrollador";
        $asignacionPersonalTarea->Tarea_id = 18;
        $asignacionPersonalTarea->save();

        $asignacionPersonalTarea = new AsignacionPersonalTarea;
        $asignacionPersonalTarea->Personal_id = 3;
        $asignacionPersonalTarea->Responsabilidad = "Desarrollador";
        $asignacionPersonalTarea->Tarea_id = 19;
        $asignacionPersonalTarea->save();

        $asignacionPersonalTarea = new AsignacionPersonalTarea;
        $asignacionPersonalTarea->Personal_id = 4;
        $asignacionPersonalTarea->Responsabilidad = "Desarrollador";
        $asignacionPersonalTarea->Tarea_id = 20;
        $asignacionPersonalTarea->save();

        $asignacionPersonalTarea = new AsignacionPersonalTarea;
        $asignacionPersonalTarea->Personal_id = 5;
        $asignacionPersonalTarea->Responsabilidad = "Desarrollador";
        $asignacionPersonalTarea->Tarea_id = 21;
        $asignacionPersonalTarea->save();

        $asignacionPersonalTarea = new AsignacionPersonalTarea;
        $asignacionPersonalTarea->Personal_id = 3;
        $asignacionPersonalTarea->Responsabilidad = "Desarrollador";
        $asignacionPersonalTarea->Tarea_id = 22;
        $asignacionPersonalTarea->save();

        $asignacionPersonalTarea = new AsignacionPersonalTarea;
        $asignacionPersonalTarea->Personal_id = 4;
        $asignacionPersonalTarea->Responsabilidad = "Desarrollador";
        $asignacionPersonalTarea->Tarea_id = 23;
        $asignacionPersonalTarea->save();

        $asignacionPersonalTarea = new AsignacionPersonalTarea;
        $asignacionPersonalTarea->Personal_id = 5;
        $asignacionPersonalTarea->Responsabilidad = "Desarrollador";
        $asignacionPersonalTarea->Tarea_id = 24;
        $asignacionPersonalTarea->save();

        $asignacionPersonalTarea = new AsignacionPersonalTarea;
        $asignacionPersonalTarea->Personal_id = 3;
        $asignacionPersonalTarea->Responsabilidad = "Desarrollador";
        $asignacionPersonalTarea->Tarea_id = 25;
        $asignacionPersonalTarea->save();

        $asignacionPersonalTarea = new AsignacionPersonalTarea;
        $asignacionPersonalTarea->Personal_id = 4;
        $asignacionPersonalTarea->Responsabilidad = "Desarrollador";
        $asignacionPersonalTarea->Tarea_id = 26;
        $asignacionPersonalTarea->save();

        $asignacionPersonalTarea = new AsignacionPersonalTarea;
        $asignacionPersonalTarea->Personal_id = 5;
        $asignacionPersonalTarea->Responsabilidad = "Desarrollador";
        $asignacionPersonalTarea->Tarea_id = 27;
        $asignacionPersonalTarea->save();

        $asignacionPersonalTarea = new AsignacionPersonalTarea;
        $asignacionPersonalTarea->Personal_id = 3;
        $asignacionPersonalTarea->Responsabilidad = "Desarrollador";
        $asignacionPersonalTarea->Tarea_id = 28;
        $asignacionPersonalTarea->save();

        $asignacionPersonalTarea = new AsignacionPersonalTarea;
        $asignacionPersonalTarea->Personal_id = 4;
        $asignacionPersonalTarea->Responsabilidad = "Desarrollador";
        $asignacionPersonalTarea->Tarea_id = 29;
        $asignacionPersonalTarea->save();

        $asignacionPersonalTarea = new AsignacionPersonalTarea;
        $asignacionPersonalTarea->Personal_id = 5;
        $asignacionPersonalTarea->Responsabilidad = "Desarrollador";
        $asignacionPersonalTarea->Tarea_id = 30;
        $asignacionPersonalTarea->save();

        //Fin asignaciones de tareas del proyecto 2

        //Asignaciones de tareas del proyecto 3

        $asignacionPersonalTarea = new AsignacionPersonalTarea;
        $asignacionPersonalTarea->Personal_id = 3;
        $asignacionPersonalTarea->Responsabilidad = "Desarrollador";
        $asignacionPersonalTarea->Tarea_id = 31;
        $asignacionPersonalTarea->save();

        $asignacionPersonalTarea = new AsignacionPersonalTarea;
        $asignacionPersonalTarea->Personal_id = 4;
        $asignacionPersonalTarea->Responsabilidad = "Desarrollador";
        $asignacionPersonalTarea->Tarea_id = 32;
        $asignacionPersonalTarea->save();

        $asignacionPersonalTarea = new AsignacionPersonalTarea;
        $asignacionPersonalTarea->Personal_id = 5;
        $asignacionPersonalTarea->Responsabilidad = "Desarrollador";
        $asignacionPersonalTarea->Tarea_id = 33;
        $asignacionPersonalTarea->save();

        $asignacionPersonalTarea = new AsignacionPersonalTarea;
        $asignacionPersonalTarea->Personal_id = 3;
        $asignacionPersonalTarea->Responsabilidad = "Desarrollador";
        $asignacionPersonalTarea->Tarea_id = 34;
        $asignacionPersonalTarea->save();

        $asignacionPersonalTarea = new AsignacionPersonalTarea;
        $asignacionPersonalTarea->Personal_id = 4;
        $asignacionPersonalTarea->Responsabilidad = "Desarrollador";
        $asignacionPersonalTarea->Tarea_id = 35;
        $asignacionPersonalTarea->save();

        $asignacionPersonalTarea = new AsignacionPersonalTarea;
        $asignacionPersonalTarea->Personal_id = 5;
        $asignacionPersonalTarea->Responsabilidad = "Desarrollador";
        $asignacionPersonalTarea->Tarea_id = 36;
        $asignacionPersonalTarea->save();

        $asignacionPersonalTarea = new AsignacionPersonalTarea;
        $asignacionPersonalTarea->Personal_id = 3;
        $asignacionPersonalTarea->Responsabilidad = "Desarrollador";
        $asignacionPersonalTarea->Tarea_id = 37;
        $asignacionPersonalTarea->save();

        $asignacionPersonalTarea = new AsignacionPersonalTarea;
        $asignacionPersonalTarea->Personal_id = 4;
        $asignacionPersonalTarea->Responsabilidad = "Desarrollador";
        $asignacionPersonalTarea->Tarea_id = 38;
        $asignacionPersonalTarea->save();

        $asignacionPersonalTarea = new AsignacionPersonalTarea;
        $asignacionPersonalTarea->Personal_id = 5;
        $asignacionPersonalTarea->Responsabilidad = "Desarrollador";
        $asignacionPersonalTarea->Tarea_id = 39;
        $asignacionPersonalTarea->save();

        $asignacionPersonalTarea = new AsignacionPersonalTarea;
        $asignacionPersonalTarea->Personal_id = 3;
        $asignacionPersonalTarea->Responsabilidad = "Desarrollador";
        $asignacionPersonalTarea->Tarea_id = 40;
        $asignacionPersonalTarea->save();

        $asignacionPersonalTarea = new AsignacionPersonalTarea;
        $asignacionPersonalTarea->Personal_id = 4;
        $asignacionPersonalTarea->Responsabilidad = "Desarrollador";
        $asignacionPersonalTarea->Tarea_id = 41;
        $asignacionPersonalTarea->save();

        $asignacionPersonalTarea = new AsignacionPersonalTarea;
        $asignacionPersonalTarea->Personal_id = 5;
        $asignacionPersonalTarea->Responsabilidad = "Desarrollador";
        $asignacionPersonalTarea->Tarea_id = 42;
        $asignacionPersonalTarea->save();

        $asignacionPersonalTarea = new AsignacionPersonalTarea;
        $asignacionPersonalTarea->Personal_id = 3;
        $asignacionPersonalTarea->Responsabilidad = "Desarrollador";
        $asignacionPersonalTarea->Tarea_id = 43;
        $asignacionPersonalTarea->save();

        $asignacionPersonalTarea = new AsignacionPersonalTarea;
        $asignacionPersonalTarea->Personal_id = 4;
        $asignacionPersonalTarea->Responsabilidad = "Desarrollador";
        $asignacionPersonalTarea->Tarea_id = 44;
        $asignacionPersonalTarea->save();

        $asignacionPersonalTarea = new AsignacionPersonalTarea;
        $asignacionPersonalTarea->Personal_id = 5;
        $asignacionPersonalTarea->Responsabilidad = "Desarrollador";
        $asignacionPersonalTarea->Tarea_id = 45;
        $asignacionPersonalTarea->save();

        //Fin asignaciones de tareas del proyecto 3

        //Asignaciones de tareas del proyecto 4

        $asignacionPersonalTarea = new AsignacionPersonalTarea;
        $asignacionPersonalTarea->Personal_id = 3;
        $asignacionPersonalTarea->Responsabilidad = "Desarrollador";
        $asignacionPersonalTarea->Tarea_id = 46;
        $asignacionPersonalTarea->save();

        $asignacionPersonalTarea = new AsignacionPersonalTarea;
        $asignacionPersonalTarea->Personal_id = 4;
        $asignacionPersonalTarea->Responsabilidad = "Desarrollador";
        $asignacionPersonalTarea->Tarea_id = 47;
        $asignacionPersonalTarea->save();

        $asignacionPersonalTarea = new AsignacionPersonalTarea;
        $asignacionPersonalTarea->Personal_id = 5;
        $asignacionPersonalTarea->Responsabilidad = "Desarrollador";
        $asignacionPersonalTarea->Tarea_id = 48;
        $asignacionPersonalTarea->save();

        $asignacionPersonalTarea = new AsignacionPersonalTarea;
        $asignacionPersonalTarea->Personal_id = 3;
        $asignacionPersonalTarea->Responsabilidad = "Desarrollador";
        $asignacionPersonalTarea->Tarea_id = 49;
        $asignacionPersonalTarea->save();

        $asignacionPersonalTarea = new AsignacionPersonalTarea;
        $asignacionPersonalTarea->Personal_id = 4;
        $asignacionPersonalTarea->Responsabilidad = "Desarrollador";
        $asignacionPersonalTarea->Tarea_id = 50;
        $asignacionPersonalTarea->save();

        $asignacionPersonalTarea = new AsignacionPersonalTarea;
        $asignacionPersonalTarea->Personal_id = 5;
        $asignacionPersonalTarea->Responsabilidad = "Desarrollador";
        $asignacionPersonalTarea->Tarea_id = 51;
        $asignacionPersonalTarea->save();

        $asignacionPersonalTarea = new AsignacionPersonalTarea;
        $asignacionPersonalTarea->Personal_id = 3;
        $asignacionPersonalTarea->Responsabilidad = "Desarrollador";
        $asignacionPersonalTarea->Tarea_id = 52;
        $asignacionPersonalTarea->save();

        $asignacionPersonalTarea = new AsignacionPersonalTarea;
        $asignacionPersonalTarea->Personal_id = 4;
        $asignacionPersonalTarea->Responsabilidad = "Desarrollador";
        $asignacionPersonalTarea->Tarea_id = 53;
        $asignacionPersonalTarea->save();

        $asignacionPersonalTarea = new AsignacionPersonalTarea;
        $asignacionPersonalTarea->Personal_id = 5;
        $asignacionPersonalTarea->Responsabilidad = "Desarrollador";
        $asignacionPersonalTarea->Tarea_id = 54;
        $asignacionPersonalTarea->save();

        $asignacionPersonalTarea = new AsignacionPersonalTarea;
        $asignacionPersonalTarea->Personal_id = 3;
        $asignacionPersonalTarea->Responsabilidad = "Desarrollador";
        $asignacionPersonalTarea->Tarea_id = 55;
        $asignacionPersonalTarea->save();

        $asignacionPersonalTarea = new AsignacionPersonalTarea;
        $asignacionPersonalTarea->Personal_id = 4;
        $asignacionPersonalTarea->Responsabilidad = "Desarrollador";
        $asignacionPersonalTarea->Tarea_id = 56;
        $asignacionPersonalTarea->save();

        $asignacionPersonalTarea = new AsignacionPersonalTarea;
        $asignacionPersonalTarea->Personal_id = 5;
        $asignacionPersonalTarea->Responsabilidad = "Desarrollador";
        $asignacionPersonalTarea->Tarea_id = 57;
        $asignacionPersonalTarea->save();

        $asignacionPersonalTarea = new AsignacionPersonalTarea;
        $asignacionPersonalTarea->Personal_id = 3;
        $asignacionPersonalTarea->Responsabilidad = "Desarrollador";
        $asignacionPersonalTarea->Tarea_id = 58;
        $asignacionPersonalTarea->save();

        $asignacionPersonalTarea = new AsignacionPersonalTarea;
        $asignacionPersonalTarea->Personal_id = 4;
        $asignacionPersonalTarea->Responsabilidad = "Desarrollador";
        $asignacionPersonalTarea->Tarea_id = 59;
        $asignacionPersonalTarea->save();

        $asignacionPersonalTarea = new AsignacionPersonalTarea;
        $asignacionPersonalTarea->Personal_id = 5;
        $asignacionPersonalTarea->Responsabilidad = "Desarrollador";
        $asignacionPersonalTarea->Tarea_id = 60;
        $asignacionPersonalTarea->save();

        //Fin asignaciones de tareas del proyecto 4

        //Asignaciones de tareas del proyecto 5

        $asignacionPersonalTarea = new AsignacionPersonalTarea;
        $asignacionPersonalTarea->Personal_id = 3;
        $asignacionPersonalTarea->Responsabilidad = "Desarrollador";
        $asignacionPersonalTarea->Tarea_id = 61;
        $asignacionPersonalTarea->save();

        $asignacionPersonalTarea = new AsignacionPersonalTarea;
        $asignacionPersonalTarea->Personal_id = 4;
        $asignacionPersonalTarea->Responsabilidad = "Desarrollador";
        $asignacionPersonalTarea->Tarea_id = 62;
        $asignacionPersonalTarea->save();

        $asignacionPersonalTarea = new AsignacionPersonalTarea;
        $asignacionPersonalTarea->Personal_id = 5;
        $asignacionPersonalTarea->Responsabilidad = "Desarrollador";
        $asignacionPersonalTarea->Tarea_id = 63;
        $asignacionPersonalTarea->save();

        $asignacionPersonalTarea = new AsignacionPersonalTarea;
        $asignacionPersonalTarea->Personal_id = 3;
        $asignacionPersonalTarea->Responsabilidad = "Desarrollador";
        $asignacionPersonalTarea->Tarea_id = 64;
        $asignacionPersonalTarea->save();

        $asignacionPersonalTarea = new AsignacionPersonalTarea;
        $asignacionPersonalTarea->Personal_id = 4;
        $asignacionPersonalTarea->Responsabilidad = "Desarrollador";
        $asignacionPersonalTarea->Tarea_id = 65;
        $asignacionPersonalTarea->save();

        $asignacionPersonalTarea = new AsignacionPersonalTarea;
        $asignacionPersonalTarea->Personal_id = 5;
        $asignacionPersonalTarea->Responsabilidad = "Desarrollador";
        $asignacionPersonalTarea->Tarea_id = 66;
        $asignacionPersonalTarea->save();

        $asignacionPersonalTarea = new AsignacionPersonalTarea;
        $asignacionPersonalTarea->Personal_id = 3;
        $asignacionPersonalTarea->Responsabilidad = "Desarrollador";
        $asignacionPersonalTarea->Tarea_id = 67;
        $asignacionPersonalTarea->save();

        $asignacionPersonalTarea = new AsignacionPersonalTarea;
        $asignacionPersonalTarea->Personal_id = 4;
        $asignacionPersonalTarea->Responsabilidad = "Desarrollador";
        $asignacionPersonalTarea->Tarea_id = 68;
        $asignacionPersonalTarea->save();

        $asignacionPersonalTarea = new AsignacionPersonalTarea;
        $asignacionPersonalTarea->Personal_id = 5;
        $asignacionPersonalTarea->Responsabilidad = "Desarrollador";
        $asignacionPersonalTarea->Tarea_id = 69;
        $asignacionPersonalTarea->save();

        $asignacionPersonalTarea = new AsignacionPersonalTarea;
        $asignacionPersonalTarea->Personal_id = 3;
        $asignacionPersonalTarea->Responsabilidad = "Desarrollador";
        $asignacionPersonalTarea->Tarea_id = 70;
        $asignacionPersonalTarea->save();

        $asignacionPersonalTarea = new AsignacionPersonalTarea;
        $asignacionPersonalTarea->Personal_id = 4;
        $asignacionPersonalTarea->Responsabilidad = "Desarrollador";
        $asignacionPersonalTarea->Tarea_id = 71;
        $asignacionPersonalTarea->save();

        $asignacionPersonalTarea = new AsignacionPersonalTarea;
        $asignacionPersonalTarea->Personal_id = 5;
        $asignacionPersonalTarea->Responsabilidad = "Desarrollador";
        $asignacionPersonalTarea->Tarea_id = 72;
        $asignacionPersonalTarea->save();

        $asignacionPersonalTarea = new AsignacionPersonalTarea;
        $asignacionPersonalTarea->Personal_id = 3;
        $asignacionPersonalTarea->Responsabilidad = "Desarrollador";
        $asignacionPersonalTarea->Tarea_id = 73;
        $asignacionPersonalTarea->save();

        $asignacionPersonalTarea = new AsignacionPersonalTarea;
        $asignacionPersonalTarea->Personal_id = 4;
        $asignacionPersonalTarea->Responsabilidad = "Desarrollador";
        $asignacionPersonalTarea->Tarea_id = 74;
        $asignacionPersonalTarea->save();

        $asignacionPersonalTarea = new AsignacionPersonalTarea;
        $asignacionPersonalTarea->Personal_id = 5;
        $asignacionPersonalTarea->Responsabilidad = "Desarrollador";
        $asignacionPersonalTarea->Tarea_id = 75;
        $asignacionPersonalTarea->save();

        //Fin asignaciones de tareas del proyecto 5

    }
}
