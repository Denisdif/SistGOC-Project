<?php

use Illuminate\Database\Seeder;
use App\Models\Estado_tarea;
use App\Models\Tipo_tarea;
use App\Models\Tipo_proyecto;
use App\Models\RolPersonal;
use App\Models\Personal;
use App\Models\Evaluacion;
use App\Models\Proyecto;
use App\Models\ambiente;
use App\Models\Comitente;
use App\Models\Direccion;
use App\Models\Tarea;
use App\Models\Proyecto_ambiente;
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

        //Rol

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

        //fin de rol

        //sexo

            $sexo = new Sexo;
            $sexo->Nombre_sexo = "Hombre";
            $sexo->save();

            $sexo = new Sexo;
            $sexo->Nombre_sexo = "Mujer";
            $sexo->save();

            $sexo = new Sexo;
            $sexo->Nombre_sexo = "Indefinido";
            $sexo->save();

        //fin de sexo

        //direccion

            $direccion = new Direccion();
            $direccion->Calle = "M.M.Guemes" ;
            $direccion->Altura = 125 ;
            $direccion->Codigo_postal = 3357 ;
            $direccion->Pais_id = 1 ;
            $direccion->Provincia_id = 15 ;
            $direccion->Localidad_id = 814 ;
            $direccion->save();

            $direccion = new Direccion();
            $direccion->Calle = "Los Álamos" ;
            $direccion->Altura = 540 ;
            $direccion->Codigo_postal = 3370 ;
            $direccion->Pais_id = 1 ;
            $direccion->Provincia_id = 15 ;
            $direccion->Localidad_id = 1530 ;
            $direccion->save();

            $direccion = new Direccion();
            $direccion->Calle = "Los Pinos" ;
            $direccion->Altura = 112 ;
            $direccion->Codigo_postal = 3370 ;
            $direccion->Pais_id = 1 ;
            $direccion->Provincia_id = 15 ;
            $direccion->Localidad_id = 1532 ;
            $direccion->save();

            $direccion = new Direccion();
            $direccion->Calle = "Los Palmeras" ;
            $direccion->Altura = 235 ;
            $direccion->Codigo_postal = 3370 ;
            $direccion->Pais_id = 1 ;
            $direccion->Provincia_id = 15 ;
            $direccion->Localidad_id = 1537 ;
            $direccion->save();

            $direccion = new Direccion();
            $direccion->Calle = "Los Lapachos" ;
            $direccion->Altura = 225 ;
            $direccion->Codigo_postal = 3370 ;
            $direccion->Pais_id = 1 ;
            $direccion->Provincia_id = 15 ;
            $direccion->Localidad_id = 1529 ;
            $direccion->save();

            $direccion = new Direccion();
            $direccion->Calle = "Las Tunas" ;
            $direccion->Altura = 325 ;
            $direccion->Codigo_postal = 3370 ;
            $direccion->Pais_id = 1 ;
            $direccion->Provincia_id = 15 ;
            $direccion->Localidad_id = 1529 ;
            $direccion->save();

            $direccion = new Direccion();
            $direccion->Calle = "Los Cedros" ;
            $direccion->Altura = 325 ;
            $direccion->Codigo_postal = 3370 ;
            $direccion->Pais_id = 1 ;
            $direccion->Provincia_id = 15 ;
            $direccion->Localidad_id = 1529 ;
            $direccion->save();

        //fin direccion

        //personal

            $personal = new Personal;
            $personal->NombrePersonal = "Denis Iván";
            $personal->ApellidoPersonal = "Ferreira";
            $personal->FechaNac = "1998-07-28";
            $personal->DNI = 41303635;
            $personal->Telefono = "3754524949";
            $personal->Sexo_id = 1;
            $personal->direccion_id = 1;
            $personal->save();

            $personal = new Personal;
            $personal->NombrePersonal = "Leandro";
            $personal->ApellidoPersonal = "Somoza";
            $personal->FechaNac = "1980-08-28";
            $personal->DNI = 35303635;
            $personal->Telefono = "3755858588";
            $personal->Sexo_id = 1;
            $personal->direccion_id = 1;
            $personal->save();

            $personal = new Personal;
            $personal->NombrePersonal = "Walter";
            $personal->ApellidoPersonal = "Erviti";
            $personal->FechaNac = "1978-07-01";
            $personal->DNI = 33303635;
            $personal->Telefono = "1758524949";
            $personal->Sexo_id = 1;
            $personal->direccion_id = 1;
            $personal->save();

            $personal = new Personal;
            $personal->NombrePersonal = "Mariana";
            $personal->ApellidoPersonal = "Araujo";
            $personal->FechaNac = "1996-01-01";
            $personal->DNI = 40315635;
            $personal->Telefono = "1737524949";
            $personal->Sexo_id = 2;
            $personal->direccion_id = 1;
            $personal->save();

            $personal = new Personal;
            $personal->NombrePersonal = "Luciana";
            $personal->ApellidoPersonal = "Flores";
            $personal->FechaNac = "1998-06-17";
            $personal->DNI = 40303635;
            $personal->Telefono = "3754528049";
            $personal->Sexo_id = 2;
            $personal->direccion_id = 1;
            $personal->save();

            $personal = new Personal;
            $personal->NombrePersonal = "Tamara";
            $personal->ApellidoPersonal = "Moreira";
            $personal->FechaNac = "1979-07-01";
            $personal->DNI = 34303635;
            $personal->Telefono = "2758524949";
            $personal->Sexo_id = 2;
            $personal->direccion_id = 1;
            $personal->save();

        //fin personal

        //user

            $user = new User;
            $user->name = "Denis";
            $user->email = "stalkerdif@gmail.com";
            $user->password = Hash::make(12345678);
            $user->Rol_id = 1;
            $user->Personal_id = 1;
            $user->save();

            $user = new User;
            $user->name = "Leandro";
            $user->email = "leandro@gmail.com";
            $user->password = Hash::make(12345678);
            $user->Rol_id = 2;
            $user->Personal_id = 2;
            $user->save();

            $user = new User;
            $user->name = "Walter";
            $user->email = "walter@gmail.com";
            $user->password = Hash::make(12345678);
            $user->Rol_id = 3;
            $user->Personal_id = 3;
            $user->save();

            $user = new User;
            $user->name = "Mariana";
            $user->email = "mararaujo@gmail.com";
            $user->password = Hash::make(12345678);
            $user->Rol_id = 3;
            $user->Personal_id = 4;
            $user->save();

            $user = new User;
            $user->name = "Luciana";
            $user->email = "lucha@gmail.com";
            $user->password = Hash::make(12345678);
            $user->Rol_id = 3;
            $user->Personal_id = 5;
            $user->save();

            $user = new User;
            $user->name = "Tamara";
            $user->email = "tamara@gmail.com";
            $user->password = Hash::make(12345678);
            $user->Rol_id = 4;
            $user->Personal_id = 6;
            $user->save();

        //fin user

        //estado tarea

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

        //fin estado tarea

        //tipos tarea

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

        //fin tipos tarea

        //ambientes

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
            $ambiente->Nombre_ambiente = "Lavadero";
            $ambiente->save();

            $ambiente = new ambiente;
            $ambiente->Nombre_ambiente = "Ático";
            $ambiente->save();

            $ambiente = new ambiente;
            $ambiente->Nombre_ambiente = "Biblioteca";
            $ambiente->save();

            $ambiente = new ambiente;
            $ambiente->Nombre_ambiente = "Jardín interior";
            $ambiente->save();

            $ambiente = new ambiente;
            $ambiente->Nombre_ambiente = "Sótano";
            $ambiente->save();

            $ambiente = new ambiente;
            $ambiente->Nombre_ambiente = "Vestidor";
            $ambiente->save();

            $ambiente = new ambiente;
            $ambiente->Nombre_ambiente = "Garaje";
            $ambiente->save();

        //fin ambientes

        //comitentes
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

            $comitente = new Comitente;
            $comitente->NombreComitente = "Norma";
            $comitente->ApellidoComitente = "Lopez";
            $comitente->Email = "lau90@gmail.com";
            $comitente->Telefono = "2255860200";
            $comitente->Cuit = "13415865201";
            $comitente->Sexo_id = "2";
            $comitente->save();

            $comitente = new Comitente;
            $comitente->NombreComitente = "Laura";
            $comitente->ApellidoComitente = "Perez";
            $comitente->Email = "lau91@gmail.com";
            $comitente->Telefono = "2255860002";
            $comitente->Cuit = "13415865202";
            $comitente->Sexo_id = "2";
            $comitente->save();

            $comitente = new Comitente;
            $comitente->NombreComitente = "Carolina";
            $comitente->ApellidoComitente = "Villar";
            $comitente->Email = "lau92@gmail.com";
            $comitente->Telefono = "2255860003";
            $comitente->Cuit = "13415865203";
            $comitente->Sexo_id = "2";
            $comitente->save();

            $comitente = new Comitente;
            $comitente->NombreComitente = "Tatiana";
            $comitente->ApellidoComitente = "Vallejos";
            $comitente->Email = "lau93gmail.com";
            $comitente->Telefono = "2255860004";
            $comitente->Cuit = "13415865204";
            $comitente->Sexo_id = "2";
            $comitente->save();

            $comitente = new Comitente;
            $comitente->NombreComitente = "Laura";
            $comitente->ApellidoComitente = "Marquez";
            $comitente->Email = "lau94@gmail.com";
            $comitente->Telefono = "2255860005";
            $comitente->Cuit = "13415865205";
            $comitente->Sexo_id = "2";
            $comitente->save();

            $comitente = new Comitente;
            $comitente->NombreComitente = "Matias";
            $comitente->ApellidoComitente = "Dutra";
            $comitente->Email = "lau95@gmail.com";
            $comitente->Telefono = "2255860006";
            $comitente->Cuit = "13415865206";
            $comitente->Sexo_id = "2";
            $comitente->save();

            $comitente = new Comitente;
            $comitente->NombreComitente = "Laura";
            $comitente->ApellidoComitente = "Nuñez";
            $comitente->Email = "lau96@gmail.com";
            $comitente->Telefono = "2255860007";
            $comitente->Cuit = "13415865207";
            $comitente->Sexo_id = "2";
            $comitente->save();

            $comitente = new Comitente;
            $comitente->NombreComitente = "Horacio";
            $comitente->ApellidoComitente = "Fernandez";
            $comitente->Email = "lau97@gmail.com";
            $comitente->Telefono = "2255860008";
            $comitente->Cuit = "13415865208";
            $comitente->Sexo_id = "2";
            $comitente->save();

            $comitente = new Comitente;
            $comitente->NombreComitente = "Laura";
            $comitente->ApellidoComitente = "Insaurralde";
            $comitente->Email = "lau98@gmail.com";
            $comitente->Telefono = "2255860009";
            $comitente->Cuit = "13415865209";
            $comitente->Sexo_id = "2";
            $comitente->save();

        //fin comitentes

        //proyectos

            $proyecto = new Proyecto;
            $proyecto->Nombre_proyecto = "Proyecto 1";
            $proyecto->Estado_proyecto = "Finalizado";
            $proyecto->Codigo_catastral = "01232102156321032010";
            $proyecto->Tipo_proyecto_id = "1";
            $proyecto->Fecha_inicio_Proy = new Carbon('2020-10-31 15:32:45.654321');
            $proyecto->Fecha_fin_Proy = new Carbon('2020-11-14 15:32:45.654321');
            $proyecto->Descripcion = "Proyecto desarrollado antes de la implementación del sistema";
            $proyecto->Comitente_id = 1;
            $proyecto->Director_id = 2;
            $proyecto->direccion_id = 1;
            $proyecto->save();

            $proyecto = new Proyecto;
            $proyecto->Nombre_proyecto = "Proyecto 2";
            $proyecto->Estado_proyecto = "Finalizado";
            $proyecto->Codigo_catastral = "01232102156321032010";
            $proyecto->Tipo_proyecto_id = "1";
            $proyecto->Fecha_inicio_Proy = new Carbon('2020-11-01 15:32:45.654321');
            $proyecto->Fecha_fin_Proy = new Carbon('2020-11-17 15:32:45.654321');
            $proyecto->Descripcion = "Proyecto desarrollado antes de la implementación del sistema";
            $proyecto->Comitente_id = 2;
            $proyecto->Director_id = 2;
            $proyecto->direccion_id = 2;
            $proyecto->save();

            $proyecto = new Proyecto;
            $proyecto->Nombre_proyecto = "Proyecto 3";
            $proyecto->Estado_proyecto = "Finalizado";
            $proyecto->Codigo_catastral = "01232102156321032010";
            $proyecto->Tipo_proyecto_id = "1";
            $proyecto->Fecha_inicio_Proy = new Carbon('2020-11-07 15:32:45.654321');
            $proyecto->Fecha_fin_Proy = new Carbon('2020-11-21 15:32:45.654321');
            $proyecto->Descripcion = "Proyecto desarrollado antes de la implementación del sistema";
            $proyecto->Comitente_id = 3;
            $proyecto->Director_id = 2;
            $proyecto->direccion_id = 3;
            $proyecto->save();

            $proyecto = new Proyecto;
            $proyecto->Nombre_proyecto = "Proyecto 4";
            $proyecto->Estado_proyecto = "Finalizado";
            $proyecto->Codigo_catastral = "01232102156321032010";
            $proyecto->Tipo_proyecto_id = "2";
            $proyecto->Fecha_inicio_Proy = new Carbon('2020-10-05 15:32:45.654321');
            $proyecto->Fecha_fin_Proy = new Carbon('2020-10-15 15:32:45.654321');
            $proyecto->Descripcion = "Proyecto desarrollado antes de la implementación del sistema";
            $proyecto->Comitente_id = 4;
            $proyecto->Director_id = 1;
            $proyecto->direccion_id = 4;
            $proyecto->save();

            $proyecto = new Proyecto;
            $proyecto->Nombre_proyecto = "Proyecto 5";
            $proyecto->Estado_proyecto = "Finalizado";
            $proyecto->Codigo_catastral = "01232102156321032010";
            $proyecto->Tipo_proyecto_id = "3";
            $proyecto->Fecha_inicio_Proy = new Carbon('2020-10-15 15:32:45.654321');
            $proyecto->Fecha_fin_Proy = new Carbon('2020-11-05 15:32:45.654321');
            $proyecto->Descripcion = "Proyecto desarrollado antes de la implementación del sistema";
            $proyecto->Comitente_id = 1;
            $proyecto->Director_id = 1;
            $proyecto->direccion_id = 5;
            $proyecto->save();

            $proyecto = new Proyecto;
            $proyecto->Nombre_proyecto = "Proyecto 6";
            $proyecto->Estado_proyecto = "En desarrollo";
            $proyecto->Codigo_catastral = "01232102156321032564";
            $proyecto->Tipo_proyecto_id = "1";
            $proyecto->Fecha_inicio_Proy = new Carbon('2021-02-27 15:32:45.654321');
            $proyecto->Fecha_fin_Proy = new Carbon('2021-03-20 15:32:45.654321');
            $proyecto->Descripcion = "Proyecto en desarrollo";
            $proyecto->Comitente_id = 1;
            $proyecto->Director_id = 2;
            $proyecto->direccion_id = 6;
            $proyecto->save();

            $proyecto = new Proyecto;
            $proyecto->Nombre_proyecto = "Proyecto 7";
            $proyecto->Estado_proyecto = "En desarrollo";
            $proyecto->Codigo_catastral = "54232102156321032564";
            $proyecto->Tipo_proyecto_id = "1";
            $proyecto->Fecha_inicio_Proy = new Carbon('2021-02-27 15:32:45.654321');
            $proyecto->Fecha_fin_Proy = new Carbon('2021-03-20 15:32:45.654321');
            $proyecto->Descripcion = "Proyecto en desarrollo";
            $proyecto->Comitente_id = 5;
            $proyecto->Director_id = 2;
            $proyecto->direccion_id = 7;
            $proyecto->save();

            $proyecto = new Proyecto;
            $proyecto->Nombre_proyecto = "Proyecto 1";
            $proyecto->Estado_proyecto = "Finalizado";
            $proyecto->Codigo_catastral = "01232102156321032010";
            $proyecto->Tipo_proyecto_id = "1";
            $proyecto->Fecha_inicio_Proy = new Carbon('2020-12-31 15:32:45.654321');
            $proyecto->Fecha_fin_Proy = new Carbon('2021-01-14 15:32:45.654321');
            $proyecto->Descripcion = "Proyecto desarrollado antes de la implementación del sistema";
            $proyecto->Comitente_id = 1;
            $proyecto->Director_id = 2;
            $proyecto->direccion_id = 1;
            $proyecto->save();

            $proyecto = new Proyecto;
            $proyecto->Nombre_proyecto = "Proyecto 1";
            $proyecto->Estado_proyecto = "Finalizado";
            $proyecto->Codigo_catastral = "01232102156321032010";
            $proyecto->Tipo_proyecto_id = "2";
            $proyecto->Fecha_inicio_Proy = new Carbon('2020-12-31 15:32:45.654321');
            $proyecto->Fecha_fin_Proy = new Carbon('2021-01-14 15:32:45.654321');
            $proyecto->Descripcion = "Proyecto desarrollado antes de la implementación del sistema";
            $proyecto->Comitente_id = 1;
            $proyecto->Director_id = 2;
            $proyecto->direccion_id = 1;
            $proyecto->save();

            $proyecto = new Proyecto;
            $proyecto->Nombre_proyecto = "Proyecto 1";
            $proyecto->Estado_proyecto = "Finalizado";
            $proyecto->Codigo_catastral = "01232102156321032010";
            $proyecto->Tipo_proyecto_id = "1";
            $proyecto->Fecha_inicio_Proy = new Carbon('2020-12-31 15:32:45.654321');
            $proyecto->Fecha_fin_Proy = new Carbon('2021-01-14 15:32:45.654321');
            $proyecto->Descripcion = "Proyecto desarrollado antes de la implementación del sistema";
            $proyecto->Comitente_id = 1;
            $proyecto->Director_id = 2;
            $proyecto->direccion_id = 1;
            $proyecto->save();

            $proyecto = new Proyecto;
            $proyecto->Nombre_proyecto = "Proyecto 1";
            $proyecto->Estado_proyecto = "Finalizado";
            $proyecto->Codigo_catastral = "01232102156321032010";
            $proyecto->Tipo_proyecto_id = "2";
            $proyecto->Fecha_inicio_Proy = new Carbon('2021-01-31 15:32:45.654321');
            $proyecto->Fecha_fin_Proy = new Carbon('2021-02-14 15:32:45.654321');
            $proyecto->Descripcion = "Proyecto desarrollado antes de la implementación del sistema";
            $proyecto->Comitente_id = 1;
            $proyecto->Director_id = 2;
            $proyecto->direccion_id = 1;
            $proyecto->save();

            $proyecto = new Proyecto;
            $proyecto->Nombre_proyecto = "Proyecto 1";
            $proyecto->Estado_proyecto = "Finalizado";
            $proyecto->Codigo_catastral = "01232102156321032010";
            $proyecto->Tipo_proyecto_id = "4";
            $proyecto->Fecha_inicio_Proy = new Carbon('2020-12-01 15:32:45.654321');
            $proyecto->Fecha_fin_Proy = new Carbon('2020-12-14 15:32:45.654321');
            $proyecto->Descripcion = "Proyecto desarrollado antes de la implementación del sistema";
            $proyecto->Comitente_id = 1;
            $proyecto->Director_id = 2;
            $proyecto->direccion_id = 1;
            $proyecto->save();

            $proyecto = new Proyecto;
            $proyecto->Nombre_proyecto = "Proyecto 1";
            $proyecto->Estado_proyecto = "Finalizado";
            $proyecto->Codigo_catastral = "01232102156321032010";
            $proyecto->Tipo_proyecto_id = "4";
            $proyecto->Fecha_inicio_Proy = new Carbon('2020-12-01 15:32:45.654321');
            $proyecto->Fecha_fin_Proy = new Carbon('2020-12-14 15:32:45.654321');
            $proyecto->Descripcion = "Proyecto desarrollado antes de la implementación del sistema";
            $proyecto->Comitente_id = 1;
            $proyecto->Director_id = 2;
            $proyecto->direccion_id = 1;
            $proyecto->save();

            $proyecto = new Proyecto;
            $proyecto->Nombre_proyecto = "Proyecto 1";
            $proyecto->Estado_proyecto = "En desarrollo";
            $proyecto->Codigo_catastral = "01232102156321032010";
            $proyecto->Tipo_proyecto_id = "4";
            $proyecto->Fecha_inicio_Proy = new Carbon('2020-12-01 15:32:45.654321');
            $proyecto->Fecha_fin_Proy = new Carbon('2020-12-14 15:32:45.654321');
            $proyecto->Descripcion = "Proyecto desarrollado antes de la implementación del sistema";
            $proyecto->Comitente_id = 1;
            $proyecto->Director_id = 2;
            $proyecto->direccion_id = 1;
            $proyecto->save();

        //fin proyectos

        //Tareas del proyecto 1

            $tarea = new Tarea;
            $tarea->Nombre_tarea = "Diseñar planta general";
            $tarea->Tipo_tarea_id = 1;
            $tarea->Fecha_inicio = new Carbon('2020-11-01 15:32:45.654321');
            $tarea->Fecha_limite = new Carbon('2020-11-02 09:32:45.654321');
            $tarea->Fecha_fin = new Carbon('2020-11-02 09:32:45.654321');
            $tarea->Prioridad = "Media";
            $tarea->Correcciones = 'false';
            $tarea->Proyecto_id = 1;
            $tarea->Estado_tarea_id = 6;
            $tarea->save();

            $tarea = new Tarea;
            $tarea->Nombre_tarea = "Diseñar vistas";
            $tarea->Tipo_tarea_id = 1;
            $tarea->Fecha_inicio = new Carbon('2020-11-02 15:32:45.654321');
            $tarea->Fecha_limite = new Carbon('2020-11-03 07:32:45.654321');
            $tarea->Fecha_fin = new Carbon('2020-11-03 09:32:45.654321');
            $tarea->Prioridad = "Media";
            $tarea->Correcciones = 'false';
            $tarea->Proyecto_id = 1;
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
            $tarea->Proyecto_id = 1;
            $tarea->Estado_tarea_id = 6;
            $tarea->save();

            $tarea = new Tarea;
            $tarea->Nombre_tarea = "Diseñar planta de techos";
            $tarea->Tipo_tarea_id = 1;
            $tarea->Fecha_inicio = new Carbon('2020-11-02 15:32:45.654321');
            $tarea->Fecha_limite = new Carbon('2020-11-02 23:32:45.654321');
            $tarea->Fecha_fin = new Carbon('2020-11-02 23:32:45.654321');
            $tarea->Prioridad = "Media";
            $tarea->Correcciones = 'false';
            $tarea->Proyecto_id = 1;
            $tarea->Estado_tarea_id = 6;
            $tarea->save();

            $tarea = new Tarea;
            $tarea->Nombre_tarea = "Realizar memoria descriptiva";
            $tarea->Tipo_tarea_id = 5;
            $tarea->Fecha_inicio = new Carbon('2020-11-02 15:32:45.654321');
            $tarea->Fecha_limite = new Carbon('2020-11-03 23:32:45.654321');
            $tarea->Fecha_fin = new Carbon('2020-11-02 18:32:45.654321');
            $tarea->Prioridad = "Media";
            $tarea->Correcciones = 'false';
            $tarea->Proyecto_id = 1;
            $tarea->Estado_tarea_id = 6;
            $tarea->save();

            $tarea = new Tarea;
            $tarea->Nombre_tarea = "Presentación al cliente";
            $tarea->Tipo_tarea_id = 1;
            $tarea->Fecha_inicio = new Carbon('2020-11-02 15:32:45.654321');
            $tarea->Fecha_limite = new Carbon('2020-11-03 23:32:45.654321');
            $tarea->Fecha_fin = new Carbon('2020-11-02 18:32:45.654321');
            $tarea->Prioridad = "Media";
            $tarea->Correcciones = 'false';
            $tarea->Proyecto_id = 1;
            $tarea->Estado_tarea_id = 6;
            $tarea->save();

            $tarea = new Tarea;
            $tarea->Nombre_tarea = "Silueta y balance de superficies";
            $tarea->Tipo_tarea_id = 5;
            $tarea->Fecha_inicio = new Carbon('2020-11-02 15:32:45.654321');
            $tarea->Fecha_limite = new Carbon('2020-11-03 23:32:45.654321');
            $tarea->Fecha_fin = new Carbon('2020-11-02 18:32:45.654321');
            $tarea->Prioridad = "Media";
            $tarea->Correcciones = 'false';
            $tarea->Proyecto_id = 1;
            $tarea->Estado_tarea_id = 6;
            $tarea->save();

            $tarea = new Tarea;
            $tarea->Nombre_tarea = "Realizar planilla de iluminación y ventilación";
            $tarea->Tipo_tarea_id = 5;
            $tarea->Fecha_inicio = new Carbon('2020-11-02 15:32:45.654321');
            $tarea->Fecha_limite = new Carbon('2020-11-03 23:32:45.654321');
            $tarea->Fecha_fin = new Carbon('2020-11-02 18:32:45.654321');
            $tarea->Prioridad = "Media";
            $tarea->Correcciones = 'false';
            $tarea->Proyecto_id = 1;
            $tarea->Estado_tarea_id = 6;
            $tarea->save();

            $tarea = new Tarea;
            $tarea->Nombre_tarea = "Realizar cálculo de estructuras";
            $tarea->Tipo_tarea_id = 2;
            $tarea->Fecha_inicio = new Carbon('2020-11-05 15:32:45.654321');
            $tarea->Fecha_limite = new Carbon('2020-11-07 23:32:45.654321');
            $tarea->Fecha_fin = new Carbon('2020-11-05 18:32:45.654321');
            $tarea->Prioridad = "Media";
            $tarea->Correcciones = 'false';
            $tarea->Proyecto_id = 1;
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
            $tarea->Proyecto_id = 1;
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
            $tarea->Proyecto_id = 1;
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
            $tarea->Proyecto_id = 1;
            $tarea->Estado_tarea_id = 6;
            $tarea->save();

            $tarea = new Tarea;
            $tarea->Nombre_tarea = "Diseñar instalación sanitaria";
            $tarea->Tipo_tarea_id = 3;
            $tarea->Fecha_inicio = new Carbon('2020-11-05 15:32:45.654321');
            $tarea->Fecha_limite = new Carbon('2020-11-07 23:32:45.654321');
            $tarea->Fecha_fin = new Carbon('2020-11-06 08:32:45.654321');
            $tarea->Prioridad = "Media";
            $tarea->Correcciones = 'false';
            $tarea->Proyecto_id = 1;
            $tarea->Estado_tarea_id = 6;
            $tarea->save();

            $tarea = new Tarea;
            $tarea->Nombre_tarea = "Realizar detalles";
            $tarea->Tipo_tarea_id = 4;
            $tarea->Fecha_inicio = new Carbon('2020-11-05 15:32:45.654321');
            $tarea->Fecha_limite = new Carbon('2020-11-07 23:32:45.654321');
            $tarea->Fecha_fin = new Carbon('2020-11-05 23:32:45.654321');
            $tarea->Prioridad = "Media";
            $tarea->Correcciones = 'false';
            $tarea->Proyecto_id = 1;
            $tarea->Estado_tarea_id = 6;
            $tarea->save();

            $tarea = new Tarea;
            $tarea->Nombre_tarea = "Realizar cómputo y presupuesto";
            $tarea->Tipo_tarea_id = 2;
            $tarea->Fecha_inicio = new Carbon('2020-11-05 16:32:45.654321');
            $tarea->Fecha_limite = new Carbon('2020-11-07 23:32:45.654321');
            $tarea->Fecha_fin = new Carbon('2020-11-05 23:32:45.654321');
            $tarea->Prioridad = "Media";
            $tarea->Correcciones = 'true';
            $tarea->Proyecto_id = 1;
            $tarea->Estado_tarea_id = 6;
            $tarea->save();

        //Fin de tareas del proyecto 1

        //Tareas del proyecto 2

            $tarea = new Tarea;
            $tarea->Nombre_tarea = "Diseñar planta general";
            $tarea->Tipo_tarea_id = 1;
            $tarea->Fecha_inicio = new Carbon('2020-11-01 16:32:45.654321');
            $tarea->Fecha_limite = new Carbon('2020-11-02 09:32:45.654321');
            $tarea->Fecha_fin = new Carbon('2020-11-02 09:32:45.654321');
            $tarea->Prioridad = "Media";
            $tarea->Correcciones = 'false';
            $tarea->Proyecto_id = 2;
            $tarea->Estado_tarea_id = 6;
            $tarea->save();

            $tarea = new Tarea;
            $tarea->Nombre_tarea = "Diseñar vistas";
            $tarea->Tipo_tarea_id = 1;
            $tarea->Fecha_inicio = new Carbon('2020-11-02 16:32:45.654321');
            $tarea->Fecha_limite = new Carbon('2020-11-03 07:32:45.654321');
            $tarea->Fecha_fin = new Carbon('2020-11-03 09:32:45.654321');
            $tarea->Prioridad = "Media";
            $tarea->Correcciones = 'false';
            $tarea->Proyecto_id = 2;
            $tarea->Estado_tarea_id = 6;
            $tarea->save();

            $tarea = new Tarea;
            $tarea->Nombre_tarea = "Diseñar cortes";
            $tarea->Tipo_tarea_id = 1;
            $tarea->Fecha_inicio = new Carbon('2020-11-02 16:32:45.654321');
            $tarea->Fecha_limite = new Carbon('2020-11-03 07:32:45.654321');
            $tarea->Fecha_fin = new Carbon('2020-11-03 09:32:45.654321');
            $tarea->Prioridad = "Media";
            $tarea->Correcciones = 'false';
            $tarea->Proyecto_id = 2;
            $tarea->Estado_tarea_id = 6;
            $tarea->save();

            $tarea = new Tarea;
            $tarea->Nombre_tarea = "Diseñar planta de techos";
            $tarea->Tipo_tarea_id = 1;
            $tarea->Fecha_inicio = new Carbon('2020-11-02 16:32:45.654321');
            $tarea->Fecha_limite = new Carbon('2020-11-03 07:32:45.654321');
            $tarea->Fecha_fin = new Carbon('2020-11-03 09:32:45.654321');
            $tarea->Prioridad = "Media";
            $tarea->Correcciones = 'false';
            $tarea->Proyecto_id = 2;
            $tarea->Estado_tarea_id = 6;
            $tarea->save();

            $tarea = new Tarea;
            $tarea->Nombre_tarea = "Realizar memoria descriptiva";
            $tarea->Tipo_tarea_id = 5;
            $tarea->Fecha_inicio = new Carbon('2020-11-02 16:32:45.654321');
            $tarea->Fecha_limite = new Carbon('2020-11-03 07:32:45.654321');
            $tarea->Fecha_fin = new Carbon('2020-11-02 20:32:45.654321');
            $tarea->Prioridad = "Media";
            $tarea->Correcciones = 'false';
            $tarea->Proyecto_id = 2;
            $tarea->Estado_tarea_id = 6;
            $tarea->save();

            $tarea = new Tarea;
            $tarea->Nombre_tarea = "Presentación al cliente";
            $tarea->Tipo_tarea_id = 1;
            $tarea->Fecha_inicio = new Carbon('2020-11-02 16:32:45.654321');
            $tarea->Fecha_limite = new Carbon('2020-11-03 07:32:45.654321');
            $tarea->Fecha_fin = new Carbon('2020-11-02 20:32:45.654321');
            $tarea->Prioridad = "Media";
            $tarea->Correcciones = 'false';
            $tarea->Proyecto_id = 2;
            $tarea->Estado_tarea_id = 6;
            $tarea->save();

            $tarea = new Tarea;
            $tarea->Nombre_tarea = "Silueta y balance de superficies";
            $tarea->Tipo_tarea_id = 5;
            $tarea->Fecha_inicio = new Carbon('2020-11-02 16:32:45.654321');
            $tarea->Fecha_limite = new Carbon('2020-11-03 07:32:45.654321');
            $tarea->Fecha_fin = new Carbon('2020-11-02 20:32:45.654321');
            $tarea->Prioridad = "Media";
            $tarea->Correcciones = 'false';
            $tarea->Proyecto_id = 2;
            $tarea->Estado_tarea_id = 6;
            $tarea->save();

            $tarea = new Tarea;
            $tarea->Nombre_tarea = "Realizar planilla de iluminación y ventilación";
            $tarea->Tipo_tarea_id = 5;
            $tarea->Fecha_inicio = new Carbon('2020-11-02 16:32:45.654321');
            $tarea->Fecha_limite = new Carbon('2020-11-03 07:32:45.654321');
            $tarea->Fecha_fin = new Carbon('2020-11-02 20:32:45.654321');
            $tarea->Prioridad = "Media";
            $tarea->Correcciones = 'false';
            $tarea->Proyecto_id = 2;
            $tarea->Estado_tarea_id = 6;
            $tarea->save();

            $tarea = new Tarea;
            $tarea->Nombre_tarea = "Realizar cálculo de estructuras";
            $tarea->Tipo_tarea_id = 2;
            $tarea->Fecha_inicio = new Carbon('2020-11-02 16:32:45.654321');
            $tarea->Fecha_limite = new Carbon('2020-11-03 07:32:45.654321');
            $tarea->Fecha_fin = new Carbon('2020-11-02 20:32:45.654321');
            $tarea->Prioridad = "Media";
            $tarea->Correcciones = 'false';
            $tarea->Proyecto_id = 2;
            $tarea->Estado_tarea_id = 6;
            $tarea->save();

            $tarea = new Tarea;
            $tarea->Nombre_tarea = "Diseñar planta de estructuras";
            $tarea->Tipo_tarea_id = 1;
            $tarea->Fecha_inicio = new Carbon('2020-11-02 16:32:45.654321');
            $tarea->Fecha_limite = new Carbon('2020-11-03 07:32:45.654321');
            $tarea->Fecha_fin = new Carbon('2020-11-02 20:32:45.654321');
            $tarea->Prioridad = "Media";
            $tarea->Correcciones = 'false';
            $tarea->Proyecto_id = 2;
            $tarea->Estado_tarea_id = 6;
            $tarea->save();

            $tarea = new Tarea;
            $tarea->Nombre_tarea = "Diseñar instalación eléctrica";
            $tarea->Tipo_tarea_id = 3;
            $tarea->Fecha_inicio = new Carbon('2020-11-02 16:32:45.654321');
            $tarea->Fecha_limite = new Carbon('2020-11-03 07:32:45.654321');
            $tarea->Fecha_fin = new Carbon('2020-11-03 09:32:45.654321');
            $tarea->Prioridad = "Media";
            $tarea->Correcciones = 'false';
            $tarea->Proyecto_id = 2;
            $tarea->Estado_tarea_id = 6;
            $tarea->save();

            $tarea = new Tarea;
            $tarea->Nombre_tarea = "Diseñar instalación de agua";
            $tarea->Tipo_tarea_id = 3;
            $tarea->Fecha_inicio = new Carbon('2020-11-02 16:32:45.654321');
            $tarea->Fecha_limite = new Carbon('2020-11-03 07:32:45.654321');
            $tarea->Fecha_fin = new Carbon('2020-11-03 09:32:45.654321');
            $tarea->Prioridad = "Media";
            $tarea->Correcciones = 'false';
            $tarea->Proyecto_id = 2;
            $tarea->Estado_tarea_id = 6;
            $tarea->save();

            $tarea = new Tarea;
            $tarea->Nombre_tarea = "Diseñar instalación sanitaria";
            $tarea->Tipo_tarea_id = 3;
            $tarea->Fecha_inicio = new Carbon('2020-11-02 16:32:45.654321');
            $tarea->Fecha_limite = new Carbon('2020-11-03 07:32:45.654321');
            $tarea->Fecha_fin = new Carbon('2020-11-03 09:32:45.654321');
            $tarea->Prioridad = "Media";
            $tarea->Correcciones = 'false';
            $tarea->Proyecto_id = 2;
            $tarea->Estado_tarea_id = 6;
            $tarea->save();

            $tarea = new Tarea;
            $tarea->Nombre_tarea = "Realizar detalles";
            $tarea->Tipo_tarea_id = 4;
            $tarea->Fecha_inicio = new Carbon('2020-11-02 16:32:45.654321');
            $tarea->Fecha_limite = new Carbon('2020-11-03 07:32:45.654321');
            $tarea->Fecha_fin = new Carbon('2020-11-02 20:32:45.654321');
            $tarea->Prioridad = "Media";
            $tarea->Correcciones = 'false';
            $tarea->Proyecto_id = 2;
            $tarea->Estado_tarea_id = 6;
            $tarea->save();

            $tarea = new Tarea;
            $tarea->Nombre_tarea = "Realizar cómputo y presupuesto";
            $tarea->Tipo_tarea_id = 2;
            $tarea->Fecha_inicio = new Carbon('2020-11-02 16:32:45.654321');
            $tarea->Fecha_limite = new Carbon('2020-11-03 07:32:45.654321');
            $tarea->Fecha_fin = new Carbon('2020-11-02 20:32:45.654321');
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
            $tarea->Fecha_inicio = new Carbon('2020-11-01 15:32:45.654321');
            $tarea->Fecha_limite = new Carbon('2020-11-02 09:32:45.654321');
            $tarea->Fecha_fin = new Carbon('2020-11-02 09:32:45.654321');
            $tarea->Prioridad = "Media";
            $tarea->Correcciones = 'false';
            $tarea->Proyecto_id = 3;
            $tarea->Estado_tarea_id = 6;
            $tarea->save();

            $tarea = new Tarea;
            $tarea->Nombre_tarea = "Diseñar vistas";
            $tarea->Tipo_tarea_id = 1;
            $tarea->Fecha_inicio = new Carbon('2020-11-02 16:32:45.654321');
            $tarea->Fecha_limite = new Carbon('2020-11-03 07:32:45.654321');
            $tarea->Fecha_fin = new Carbon('2020-11-02 20:32:45.654321');
            $tarea->Prioridad = "Media";
            $tarea->Correcciones = 'false';
            $tarea->Proyecto_id = 3;
            $tarea->Estado_tarea_id = 6;
            $tarea->save();

            $tarea = new Tarea;
            $tarea->Nombre_tarea = "Diseñar cortes";
            $tarea->Tipo_tarea_id = 1;
            $tarea->Fecha_inicio = new Carbon('2020-11-01 15:32:45.654321');
            $tarea->Fecha_limite = new Carbon('2020-11-02 09:32:45.654321');
            $tarea->Fecha_fin = new Carbon('2020-11-02 09:32:45.654321');
            $tarea->Prioridad = "Media";
            $tarea->Correcciones = 'false';
            $tarea->Proyecto_id = 3;
            $tarea->Estado_tarea_id = 6;
            $tarea->save();

            $tarea = new Tarea;
            $tarea->Nombre_tarea = "Diseñar planta de techos";
            $tarea->Tipo_tarea_id = 1;
            $tarea->Fecha_inicio = new Carbon('2020-11-02 16:32:45.654321');
            $tarea->Fecha_limite = new Carbon('2020-11-03 07:32:45.654321');
            $tarea->Fecha_fin = new Carbon('2020-11-02 20:32:45.654321');
            $tarea->Prioridad = "Media";
            $tarea->Correcciones = 'false';
            $tarea->Proyecto_id = 3;
            $tarea->Estado_tarea_id = 6;
            $tarea->save();

            $tarea = new Tarea;
            $tarea->Nombre_tarea = "Realizar memoria descriptiva";
            $tarea->Tipo_tarea_id = 5;
            $tarea->Fecha_inicio = new Carbon('2020-11-02 16:32:45.654321');
            $tarea->Fecha_limite = new Carbon('2020-11-03 07:32:45.654321');
            $tarea->Fecha_fin = new Carbon('2020-11-02 20:32:45.654321');
            $tarea->Prioridad = "Media";
            $tarea->Correcciones = 'false';
            $tarea->Proyecto_id = 3;
            $tarea->Estado_tarea_id = 6;
            $tarea->save();

            $tarea = new Tarea;
            $tarea->Nombre_tarea = "Presentación al cliente";
            $tarea->Tipo_tarea_id = 1;
            $tarea->Fecha_inicio = new Carbon('2020-11-02 16:32:45.654321');
            $tarea->Fecha_limite = new Carbon('2020-11-03 07:32:45.654321');
            $tarea->Fecha_fin = new Carbon('2020-11-02 20:32:45.654321');
            $tarea->Prioridad = "Media";
            $tarea->Correcciones = 'false';
            $tarea->Proyecto_id = 3;
            $tarea->Estado_tarea_id = 6;
            $tarea->save();

            $tarea = new Tarea;
            $tarea->Nombre_tarea = "Silueta y balance de superficies";
            $tarea->Tipo_tarea_id = 5;
            $tarea->Fecha_inicio = new Carbon('2020-11-02 16:32:45.654321');
            $tarea->Fecha_limite = new Carbon('2020-11-03 07:32:45.654321');
            $tarea->Fecha_fin = new Carbon('2020-11-02 20:32:45.654321');
            $tarea->Prioridad = "Media";
            $tarea->Correcciones = 'false';
            $tarea->Proyecto_id = 3;
            $tarea->Estado_tarea_id = 6;
            $tarea->save();

            $tarea = new Tarea;
            $tarea->Nombre_tarea = "Realizar planilla de iluminación y ventilación";
            $tarea->Tipo_tarea_id = 5;
            $tarea->Fecha_inicio = new Carbon('2020-11-02 16:32:45.654321');
            $tarea->Fecha_limite = new Carbon('2020-11-03 07:32:45.654321');
            $tarea->Fecha_fin = new Carbon('2020-11-02 20:32:45.654321');
            $tarea->Prioridad = "Media";
            $tarea->Correcciones = 'false';
            $tarea->Proyecto_id = 3;
            $tarea->Estado_tarea_id = 6;
            $tarea->save();

            $tarea = new Tarea;
            $tarea->Nombre_tarea = "Realizar cálculo de estructuras";
            $tarea->Tipo_tarea_id = 2;
            $tarea->Fecha_inicio = new Carbon('2020-11-02 16:32:45.654321');
            $tarea->Fecha_limite = new Carbon('2020-11-03 07:32:45.654321');
            $tarea->Fecha_fin = new Carbon('2020-11-02 20:32:45.654321');
            $tarea->Prioridad = "Media";
            $tarea->Correcciones = 'false';
            $tarea->Proyecto_id = 3;
            $tarea->Estado_tarea_id = 6;
            $tarea->save();

            $tarea = new Tarea;
            $tarea->Nombre_tarea = "Diseñar planta de estructuras";
            $tarea->Tipo_tarea_id = 1;
            $tarea->Fecha_inicio = new Carbon('2020-11-02 16:32:45.654321');
            $tarea->Fecha_limite = new Carbon('2020-11-03 07:32:45.654321');
            $tarea->Fecha_fin = new Carbon('2020-11-02 20:32:45.654321');
            $tarea->Prioridad = "Media";
            $tarea->Correcciones = 'false';
            $tarea->Proyecto_id = 3;
            $tarea->Estado_tarea_id = 6;
            $tarea->save();

            $tarea = new Tarea;
            $tarea->Nombre_tarea = "Diseñar instalación eléctrica";
            $tarea->Tipo_tarea_id = 3;
            $tarea->Fecha_inicio = new Carbon('2020-11-01 15:32:45.654321');
            $tarea->Fecha_limite = new Carbon('2020-11-02 09:32:45.654321');
            $tarea->Fecha_fin = new Carbon('2020-11-02 09:32:45.654321');
            $tarea->Prioridad = "Media";
            $tarea->Correcciones = 'false';
            $tarea->Proyecto_id = 3;
            $tarea->Estado_tarea_id = 6;
            $tarea->save();

            $tarea = new Tarea;
            $tarea->Nombre_tarea = "Diseñar instalación de agua";
            $tarea->Tipo_tarea_id = 3;
            $tarea->Fecha_inicio = new Carbon('2020-11-01 15:32:45.654321');
            $tarea->Fecha_limite = new Carbon('2020-11-02 09:32:45.654321');
            $tarea->Fecha_fin = new Carbon('2020-11-02 09:32:45.654321');
            $tarea->Prioridad = "Media";
            $tarea->Correcciones = 'false';
            $tarea->Proyecto_id = 3;
            $tarea->Estado_tarea_id = 6;
            $tarea->save();

            $tarea = new Tarea;
            $tarea->Nombre_tarea = "Diseñar instalación sanitaria";
            $tarea->Tipo_tarea_id = 3;
            $tarea->Fecha_inicio = new Carbon('2020-11-01 15:32:45.654321');
            $tarea->Fecha_limite = new Carbon('2020-11-02 09:32:45.654321');
            $tarea->Fecha_fin = new Carbon('2020-11-02 09:32:45.654321');
            $tarea->Prioridad = "Media";
            $tarea->Correcciones = 'false';
            $tarea->Proyecto_id = 3;
            $tarea->Estado_tarea_id = 6;
            $tarea->save();

            $tarea = new Tarea;
            $tarea->Nombre_tarea = "Realizar detalles";
            $tarea->Tipo_tarea_id = 4;
            $tarea->Fecha_inicio = new Carbon('2020-11-02 16:32:45.654321');
            $tarea->Fecha_limite = new Carbon('2020-11-03 07:32:45.654321');
            $tarea->Fecha_fin = new Carbon('2020-11-02 20:32:45.654321');
            $tarea->Prioridad = "Media";
            $tarea->Correcciones = 'false';
            $tarea->Proyecto_id = 3;
            $tarea->Estado_tarea_id = 6;
            $tarea->save();

            $tarea = new Tarea;
            $tarea->Nombre_tarea = "Realizar cómputo y presupuesto";
            $tarea->Tipo_tarea_id = 2;
            $tarea->Fecha_inicio = new Carbon('2020-11-01 15:32:45.654321');
            $tarea->Fecha_limite = new Carbon('2020-11-02 09:32:45.654321');
            $tarea->Fecha_fin = new Carbon('2020-11-02 09:32:45.654321');
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
            $tarea->Fecha_inicio = new Carbon('2020-10-01 15:32:45.654321');
            $tarea->Fecha_limite = new Carbon('2020-10-03 22:32:45.654321');
            $tarea->Fecha_fin = new Carbon('2020-10-02 09:32:45.654321');
            $tarea->Prioridad = "Media";
            $tarea->Correcciones = 'false';
            $tarea->Proyecto_id = 4;
            $tarea->Estado_tarea_id = 6;
            $tarea->save();

            $tarea = new Tarea;
            $tarea->Nombre_tarea = "Diseñar vistas";
            $tarea->Tipo_tarea_id = 1;
            $tarea->Fecha_inicio = new Carbon('2020-10-02 15:32:45.654321');
            $tarea->Fecha_limite = new Carbon('2020-10-04 22:32:45.654321');
            $tarea->Fecha_fin = new Carbon('2020-10-02 20:32:45.654321');
            $tarea->Prioridad = "Media";
            $tarea->Correcciones = 'false';
            $tarea->Proyecto_id = 4;
            $tarea->Estado_tarea_id = 6;
            $tarea->save();

            $tarea = new Tarea;
            $tarea->Nombre_tarea = "Diseñar cortes";
            $tarea->Tipo_tarea_id = 1;
            $tarea->Fecha_inicio = new Carbon('2020-10-02 15:32:45.654321');
            $tarea->Fecha_limite = new Carbon('2020-10-04 22:32:45.654321');
            $tarea->Fecha_fin = new Carbon('2020-10-02 20:32:45.654321');
            $tarea->Prioridad = "Media";
            $tarea->Correcciones = 'false';
            $tarea->Proyecto_id = 4;
            $tarea->Estado_tarea_id = 6;
            $tarea->save();

            $tarea = new Tarea;
            $tarea->Nombre_tarea = "Diseñar planta de techos";
            $tarea->Tipo_tarea_id = 1;
            $tarea->Fecha_inicio = new Carbon('2020-10-02 15:32:45.654321');
            $tarea->Fecha_limite = new Carbon('2020-10-04 22:32:45.654321');
            $tarea->Fecha_fin = new Carbon('2020-10-02 20:32:45.654321');
            $tarea->Prioridad = "Media";
            $tarea->Correcciones = 'false';
            $tarea->Proyecto_id = 4;
            $tarea->Estado_tarea_id = 6;
            $tarea->save();

            $tarea = new Tarea;
            $tarea->Nombre_tarea = "Realizar memoria descriptiva";
            $tarea->Tipo_tarea_id = 5;
            $tarea->Fecha_inicio = new Carbon('2020-10-02 15:32:45.654321');
            $tarea->Fecha_limite = new Carbon('2020-10-04 22:32:45.654321');
            $tarea->Fecha_fin = new Carbon('2020-10-02 20:32:45.654321');
            $tarea->Prioridad = "Media";
            $tarea->Correcciones = 'false';
            $tarea->Proyecto_id = 4;
            $tarea->Estado_tarea_id = 6;
            $tarea->save();

            $tarea = new Tarea;
            $tarea->Nombre_tarea = "Presentación al cliente";
            $tarea->Tipo_tarea_id = 1;
            $tarea->Fecha_inicio = new Carbon('2020-10-02 15:32:45.654321');
            $tarea->Fecha_limite = new Carbon('2020-10-04 22:32:45.654321');
            $tarea->Fecha_fin = new Carbon('2020-10-02 20:32:45.654321');
            $tarea->Prioridad = "Media";
            $tarea->Correcciones = 'false';
            $tarea->Proyecto_id = 4;
            $tarea->Estado_tarea_id = 6;
            $tarea->save();

            $tarea = new Tarea;
            $tarea->Nombre_tarea = "Silueta y balance de superficies";
            $tarea->Tipo_tarea_id = 5;
            $tarea->Fecha_inicio = new Carbon('2020-10-02 15:32:45.654321');
            $tarea->Fecha_limite = new Carbon('2020-10-04 22:32:45.654321');
            $tarea->Fecha_fin = new Carbon('2020-10-02 20:32:45.654321');
            $tarea->Prioridad = "Media";
            $tarea->Correcciones = 'false';
            $tarea->Proyecto_id = 4;
            $tarea->Estado_tarea_id = 6;
            $tarea->save();

            $tarea = new Tarea;
            $tarea->Nombre_tarea = "Realizar planilla de iluminación y ventilación";
            $tarea->Tipo_tarea_id = 5;
            $tarea->Fecha_inicio = new Carbon('2020-10-02 15:32:45.654321');
            $tarea->Fecha_limite = new Carbon('2020-10-04 22:32:45.654321');
            $tarea->Fecha_fin = new Carbon('2020-10-02 20:32:45.654321');
            $tarea->Prioridad = "Media";
            $tarea->Correcciones = 'false';
            $tarea->Proyecto_id = 4;
            $tarea->Estado_tarea_id = 6;
            $tarea->save();

            $tarea = new Tarea;
            $tarea->Nombre_tarea = "Realizar cálculo de estructuras";
            $tarea->Tipo_tarea_id = 2;
            $tarea->Fecha_inicio = new Carbon('2020-10-01 15:32:45.654321');
            $tarea->Fecha_limite = new Carbon('2020-10-03 22:32:45.654321');
            $tarea->Fecha_fin = new Carbon('2020-10-02 09:32:45.654321');
            $tarea->Prioridad = "Media";
            $tarea->Correcciones = 'false';
            $tarea->Proyecto_id = 4;
            $tarea->Estado_tarea_id = 6;
            $tarea->save();

            $tarea = new Tarea;
            $tarea->Nombre_tarea = "Diseñar planta de estructuras";
            $tarea->Tipo_tarea_id = 1;
            $tarea->Fecha_inicio = new Carbon('2020-10-01 15:32:45.654321');
            $tarea->Fecha_limite = new Carbon('2020-10-03 22:32:45.654321');
            $tarea->Fecha_fin = new Carbon('2020-10-02 09:32:45.654321');
            $tarea->Prioridad = "Media";
            $tarea->Correcciones = 'false';
            $tarea->Proyecto_id = 4;
            $tarea->Estado_tarea_id = 6;
            $tarea->save();

            $tarea = new Tarea;
            $tarea->Nombre_tarea = "Diseñar instalación eléctrica";
            $tarea->Tipo_tarea_id = 3;
            $tarea->Fecha_inicio = new Carbon('2020-10-01 15:32:45.654321');
            $tarea->Fecha_limite = new Carbon('2020-10-03 22:32:45.654321');
            $tarea->Fecha_fin = new Carbon('2020-10-02 09:32:45.654321');
            $tarea->Prioridad = "Media";
            $tarea->Correcciones = 'false';
            $tarea->Proyecto_id = 4;
            $tarea->Estado_tarea_id = 6;
            $tarea->save();

            $tarea = new Tarea;
            $tarea->Nombre_tarea = "Diseñar instalación de agua";
            $tarea->Tipo_tarea_id = 3;
            $tarea->Fecha_inicio = new Carbon('2020-10-01 15:32:45.654321');
            $tarea->Fecha_limite = new Carbon('2020-10-03 22:32:45.654321');
            $tarea->Fecha_fin = new Carbon('2020-10-02 09:32:45.654321');
            $tarea->Prioridad = "Media";
            $tarea->Correcciones = 'false';
            $tarea->Proyecto_id = 4;
            $tarea->Estado_tarea_id = 6;
            $tarea->save();

            $tarea = new Tarea;
            $tarea->Nombre_tarea = "Diseñar instalación sanitaria";
            $tarea->Tipo_tarea_id = 3;
            $tarea->Fecha_inicio = new Carbon('2020-10-01 15:32:45.654321');
            $tarea->Fecha_limite = new Carbon('2020-10-03 22:32:45.654321');
            $tarea->Fecha_fin = new Carbon('2020-10-02 09:32:45.654321');
            $tarea->Prioridad = "Media";
            $tarea->Correcciones = 'false';
            $tarea->Proyecto_id = 4;
            $tarea->Estado_tarea_id = 6;
            $tarea->save();

            $tarea = new Tarea;
            $tarea->Nombre_tarea = "Realizar detalles";
            $tarea->Tipo_tarea_id = 4;
            $tarea->Fecha_inicio = new Carbon('2020-10-02 15:32:45.654321');
            $tarea->Fecha_limite = new Carbon('2020-10-04 22:32:45.654321');
            $tarea->Fecha_fin = new Carbon('2020-10-02 20:32:45.654321');
            $tarea->Prioridad = "Media";
            $tarea->Correcciones = 'false';
            $tarea->Proyecto_id = 4;
            $tarea->Estado_tarea_id = 6;
            $tarea->save();

            $tarea = new Tarea;
            $tarea->Nombre_tarea = "Realizar cómputo y presupuesto";
            $tarea->Tipo_tarea_id = 2;
            $tarea->Fecha_inicio = new Carbon('2020-10-01 15:32:45.654321');
            $tarea->Fecha_limite = new Carbon('2020-10-03 22:32:45.654321');
            $tarea->Fecha_fin = new Carbon('2020-10-02 09:32:45.654321');
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
            $tarea->Fecha_inicio = new Carbon('2020-10-01 15:32:45.654321');
            $tarea->Fecha_limite = new Carbon('2020-10-03 22:32:45.654321');
            $tarea->Fecha_fin = new Carbon('2020-10-02 09:32:45.654321');
            $tarea->Prioridad = "Media";
            $tarea->Correcciones = 'false';
            $tarea->Proyecto_id = 5;
            $tarea->Estado_tarea_id = 6;
            $tarea->save();

            $tarea = new Tarea;
            $tarea->Nombre_tarea = "Diseñar vistas";
            $tarea->Tipo_tarea_id = 1;
            $tarea->Fecha_inicio = new Carbon('2020-10-02 15:32:45.654321');
            $tarea->Fecha_limite = new Carbon('2020-10-04 22:32:45.654321');
            $tarea->Fecha_fin = new Carbon('2020-10-02 20:32:45.654321');
            $tarea->Prioridad = "Media";
            $tarea->Correcciones = 'false';
            $tarea->Proyecto_id = 5;
            $tarea->Estado_tarea_id = 6;
            $tarea->save();

            $tarea = new Tarea;
            $tarea->Nombre_tarea = "Diseñar cortes";
            $tarea->Tipo_tarea_id = 1;
            $tarea->Fecha_inicio = new Carbon('2020-10-02 15:32:45.654321');
            $tarea->Fecha_limite = new Carbon('2020-10-04 22:32:45.654321');
            $tarea->Fecha_fin = new Carbon('2020-10-02 20:32:45.654321');
            $tarea->Prioridad = "Media";
            $tarea->Correcciones = 'false';
            $tarea->Proyecto_id = 5;
            $tarea->Estado_tarea_id = 6;
            $tarea->save();

            $tarea = new Tarea;
            $tarea->Nombre_tarea = "Diseñar planta de techos";
            $tarea->Tipo_tarea_id = 1;
            $tarea->Fecha_inicio = new Carbon('2020-10-02 15:32:45.654321');
            $tarea->Fecha_limite = new Carbon('2020-10-04 22:32:45.654321');
            $tarea->Fecha_fin = new Carbon('2020-10-02 20:32:45.654321');
            $tarea->Prioridad = "Media";
            $tarea->Correcciones = 'false';
            $tarea->Proyecto_id = 5;
            $tarea->Estado_tarea_id = 6;
            $tarea->save();

            $tarea = new Tarea;
            $tarea->Nombre_tarea = "Realizar memoria descriptiva";
            $tarea->Tipo_tarea_id = 5;
            $tarea->Fecha_inicio = new Carbon('2020-10-02 15:32:45.654321');
            $tarea->Fecha_limite = new Carbon('2020-10-04 22:32:45.654321');
            $tarea->Fecha_fin = new Carbon('2020-10-02 20:32:45.654321');
            $tarea->Prioridad = "Media";
            $tarea->Correcciones = 'false';
            $tarea->Proyecto_id = 5;
            $tarea->Estado_tarea_id = 6;
            $tarea->save();

            $tarea = new Tarea;
            $tarea->Nombre_tarea = "Presentación al cliente";
            $tarea->Tipo_tarea_id = 1;
            $tarea->Fecha_inicio = new Carbon('2020-10-02 15:32:45.654321');
            $tarea->Fecha_limite = new Carbon('2020-10-04 22:32:45.654321');
            $tarea->Fecha_fin = new Carbon('2020-10-02 20:32:45.654321');
            $tarea->Prioridad = "Media";
            $tarea->Correcciones = 'false';
            $tarea->Proyecto_id = 5;
            $tarea->Estado_tarea_id = 6;
            $tarea->save();

            $tarea = new Tarea;
            $tarea->Nombre_tarea = "Silueta y balance de superficies";
            $tarea->Tipo_tarea_id = 5;
            $tarea->Fecha_inicio = new Carbon('2020-10-02 15:32:45.654321');
            $tarea->Fecha_limite = new Carbon('2020-10-04 22:32:45.654321');
            $tarea->Fecha_fin = new Carbon('2020-10-02 20:32:45.654321');
            $tarea->Prioridad = "Media";
            $tarea->Correcciones = 'false';
            $tarea->Proyecto_id = 5;
            $tarea->Estado_tarea_id = 6;
            $tarea->save();

            $tarea = new Tarea;
            $tarea->Nombre_tarea = "Realizar planilla de iluminación y ventilación";
            $tarea->Tipo_tarea_id = 5;
            $tarea->Fecha_inicio = new Carbon('2020-10-02 15:32:45.654321');
            $tarea->Fecha_limite = new Carbon('2020-10-04 22:32:45.654321');
            $tarea->Fecha_fin = new Carbon('2020-10-02 20:32:45.654321');
            $tarea->Prioridad = "Media";
            $tarea->Correcciones = 'false';
            $tarea->Proyecto_id = 5;
            $tarea->Estado_tarea_id = 6;
            $tarea->save();

            $tarea = new Tarea;
            $tarea->Nombre_tarea = "Realizar cálculo de estructuras";
            $tarea->Tipo_tarea_id = 2;
            $tarea->Fecha_inicio = new Carbon('2020-10-02 15:32:45.654321');
            $tarea->Fecha_limite = new Carbon('2020-10-04 22:32:45.654321');
            $tarea->Fecha_fin = new Carbon('2020-10-02 20:32:45.654321');
            $tarea->Prioridad = "Media";
            $tarea->Correcciones = 'false';
            $tarea->Proyecto_id = 5;
            $tarea->Estado_tarea_id = 6;
            $tarea->save();

            $tarea = new Tarea;
            $tarea->Nombre_tarea = "Diseñar planta de estructuras";
            $tarea->Tipo_tarea_id = 1;
            $tarea->Fecha_inicio = new Carbon('2020-10-02 15:32:45.654321');
            $tarea->Fecha_limite = new Carbon('2020-10-04 22:32:45.654321');
            $tarea->Fecha_fin = new Carbon('2020-10-02 20:32:45.654321');
            $tarea->Prioridad = "Media";
            $tarea->Correcciones = 'false';
            $tarea->Proyecto_id = 5;
            $tarea->Estado_tarea_id = 6;
            $tarea->save();

            $tarea = new Tarea;
            $tarea->Nombre_tarea = "Diseñar instalación eléctrica";
            $tarea->Tipo_tarea_id = 3;
            $tarea->Fecha_inicio = new Carbon('2020-10-01 15:32:45.654321');
            $tarea->Fecha_limite = new Carbon('2020-10-03 22:32:45.654321');
            $tarea->Fecha_fin = new Carbon('2020-10-02 09:32:45.654321');
            $tarea->Prioridad = "Media";
            $tarea->Correcciones = 'false';
            $tarea->Proyecto_id = 5;
            $tarea->Estado_tarea_id = 6;
            $tarea->save();

            $tarea = new Tarea;
            $tarea->Nombre_tarea = "Diseñar instalación de agua";
            $tarea->Tipo_tarea_id = 3;
            $tarea->Fecha_inicio = new Carbon('2020-10-01 15:32:45.654321');
            $tarea->Fecha_limite = new Carbon('2020-10-03 22:32:45.654321');
            $tarea->Fecha_fin = new Carbon('2020-10-02 09:32:45.654321');
            $tarea->Prioridad = "Media";
            $tarea->Correcciones = 'false';
            $tarea->Proyecto_id = 5;
            $tarea->Estado_tarea_id = 6;
            $tarea->save();

            $tarea = new Tarea;
            $tarea->Nombre_tarea = "Diseñar instalación sanitaria";
            $tarea->Tipo_tarea_id = 3;
            $tarea->Fecha_inicio = new Carbon('2020-10-01 15:32:45.654321');
            $tarea->Fecha_limite = new Carbon('2020-10-03 22:32:45.654321');
            $tarea->Fecha_fin = new Carbon('2020-10-02 09:32:45.654321');
            $tarea->Prioridad = "Media";
            $tarea->Correcciones = 'false';
            $tarea->Proyecto_id = 5;
            $tarea->Estado_tarea_id = 6;
            $tarea->save();

            $tarea = new Tarea;
            $tarea->Nombre_tarea = "Realizar detalles";
            $tarea->Tipo_tarea_id = 4;
            $tarea->Fecha_inicio = new Carbon('2020-10-02 15:32:45.654321');
            $tarea->Fecha_limite = new Carbon('2020-10-04 22:32:45.654321');
            $tarea->Fecha_fin = new Carbon('2020-10-02 20:32:45.654321');
            $tarea->Prioridad = "Media";
            $tarea->Correcciones = 'false';
            $tarea->Proyecto_id = 5;
            $tarea->Estado_tarea_id = 6;
            $tarea->save();

            $tarea = new Tarea;
            $tarea->Nombre_tarea = "Realizar cómputo y presupuesto";
            $tarea->Tipo_tarea_id = 2;
            $tarea->Fecha_inicio = new Carbon('2020-10-01 15:32:45.654321');
            $tarea->Fecha_limite = new Carbon('2020-10-03 22:32:45.654321');
            $tarea->Fecha_fin = new Carbon('2020-10-02 09:32:45.654321');
            $tarea->Prioridad = "Media";
            $tarea->Correcciones = 'false';
            $tarea->Proyecto_id = 5;
            $tarea->Estado_tarea_id = 6;
            $tarea->save();

        //Fin de tareas del proyecto 5

        //Tareas del proyecto 6

            $tarea = new Tarea;
            $tarea->Nombre_tarea = "Diseñar planta general";
            $tarea->Tipo_tarea_id = 1;
            $tarea->Fecha_inicio = new Carbon('2021-03-01 15:32:45.654321');
            $tarea->Fecha_limite = new Carbon('2021-03-02 10:32:45.654321');
            $tarea->Fecha_fin = new Carbon('2021-03-02 10:32:45.654321');
            $tarea->Prioridad = "Media";
            $tarea->Correcciones = 'false';
            $tarea->Proyecto_id = 6;
            $tarea->Estado_tarea_id = 6;
            $tarea->save();

            $tarea = new Tarea;
            $tarea->Nombre_tarea = "Diseñar vistas";
            $tarea->Tipo_tarea_id = 1;
            $tarea->Fecha_inicio = new Carbon('2021-03-01 15:32:45.654321');
            $tarea->Fecha_limite = new Carbon('2021-03-02 10:32:45.654321');
            $tarea->Fecha_fin = new Carbon('2021-03-02 10:32:45.654321');
            $tarea->Prioridad = "Media";
            $tarea->Correcciones = 'false';
            $tarea->Proyecto_id = 6;
            $tarea->Estado_tarea_id = 6;
            $tarea->save();

            $tarea = new Tarea;
            $tarea->Nombre_tarea = "Diseñar cortes";
            $tarea->Tipo_tarea_id = 1;
            $tarea->Fecha_inicio = new Carbon('2021-03-01 15:32:45.654321');
            $tarea->Fecha_limite = new Carbon('2021-03-02 10:32:45.654321');
            $tarea->Fecha_fin = new Carbon('2021-03-02 10:32:45.654321');
            $tarea->Prioridad = "Media";
            $tarea->Correcciones = 'false';
            $tarea->Proyecto_id = 6;
            $tarea->Estado_tarea_id = 6;
            $tarea->save();

            $tarea = new Tarea;
            $tarea->Nombre_tarea = "Diseñar planta de techos";
            $tarea->Tipo_tarea_id = 1;
            $tarea->Fecha_inicio = new Carbon('2021-03-01 15:32:45.654321');
            $tarea->Fecha_limite = new Carbon('2021-03-05 10:32:45.654321');
            $tarea->Fecha_fin = new Carbon('2021-03-05 10:32:45.654321');
            $tarea->Prioridad = "Media";
            $tarea->Correcciones = 'false';
            $tarea->Proyecto_id = 6;
            $tarea->Estado_tarea_id = 3;
            $tarea->save();

            $tarea = new Tarea;
            $tarea->Nombre_tarea = "Silueta y balance de superficies";
            $tarea->Tipo_tarea_id = 5;
            $tarea->Fecha_inicio = new Carbon('2021-03-01 15:32:45.654321');
            $tarea->Fecha_limite = new Carbon('2021-03-05 10:32:45.654321');
            $tarea->Fecha_fin = new Carbon('2021-03-05 10:32:45.654321');
            $tarea->Prioridad = "Media";
            $tarea->Correcciones = 'false';
            $tarea->Proyecto_id = 6;
            $tarea->Estado_tarea_id = 3;
            $tarea->save();

            $tarea = new Tarea;
            $tarea->Nombre_tarea = "Realizar cálculo de estructuras";
            $tarea->Tipo_tarea_id = 2;
            $tarea->Fecha_inicio = new Carbon('2021-03-01 15:32:45.654321');
            $tarea->Fecha_limite = new Carbon('2021-03-02 10:32:45.654321');
            $tarea->Fecha_fin = new Carbon('2021-03-02 10:32:45.654321');
            $tarea->Prioridad = "Media";
            $tarea->Correcciones = 'false';
            $tarea->Proyecto_id = 6;
            $tarea->Estado_tarea_id = 1;
            $tarea->save();

            $tarea = new Tarea;
            $tarea->Nombre_tarea = "Diseñar instalación eléctrica";
            $tarea->Tipo_tarea_id = 3;
            $tarea->Fecha_inicio = new Carbon('2021-03-01 15:32:45.654321');
            $tarea->Fecha_limite = new Carbon('2021-03-10 10:32:45.654321');
            $tarea->Fecha_fin = new Carbon('2021-03-10 10:32:45.654321');
            $tarea->Prioridad = "Media";
            $tarea->Correcciones = 'false';
            $tarea->Proyecto_id = 6;
            $tarea->Estado_tarea_id = 1;
            $tarea->save();

            $tarea = new Tarea;
            $tarea->Nombre_tarea = "Diseñar instalación de agua";
            $tarea->Tipo_tarea_id = 3;
            $tarea->Fecha_inicio = new Carbon('2021-03-01 15:32:45.654321');
            $tarea->Fecha_limite = new Carbon('2021-03-10 10:32:45.654321');
            $tarea->Fecha_fin = new Carbon('2021-03-10 10:32:45.654321');
            $tarea->Prioridad = "Media";
            $tarea->Correcciones = 'false';
            $tarea->Proyecto_id = 6;
            $tarea->Estado_tarea_id = 1;
            $tarea->save();

            $tarea = new Tarea;
            $tarea->Nombre_tarea = "Diseñar instalación sanitaria";
            $tarea->Tipo_tarea_id = 3;
            $tarea->Fecha_inicio = new Carbon('2021-03-01 15:32:45.654321');
            $tarea->Fecha_limite = new Carbon('2021-03-10 10:32:45.654321');
            $tarea->Fecha_fin = new Carbon('2021-03-10 10:32:45.654321');
            $tarea->Prioridad = "Media";
            $tarea->Correcciones = 'false';
            $tarea->Proyecto_id = 6;
            $tarea->Estado_tarea_id = 1;
            $tarea->save();

            $tarea = new Tarea;
            $tarea->Nombre_tarea = "Realizar cómputo y presupuesto";
            $tarea->Tipo_tarea_id = 2;
            $tarea->Fecha_inicio = new Carbon('2021-03-01 15:32:45.654321');
            $tarea->Fecha_limite = new Carbon('2021-03-12 10:32:45.654321');
            $tarea->Fecha_fin = new Carbon('2021-03-12 10:32:45.654321');
            $tarea->Prioridad = "Media";
            $tarea->Correcciones = 'false';
            $tarea->Proyecto_id = 6;
            $tarea->Estado_tarea_id = 1;
            $tarea->save();

        //Fin de tareas del proyecto 6

        //Tareas del proyecto 7

            $tarea = new Tarea;
            $tarea->Nombre_tarea = "Diseñar planta general";
            $tarea->Tipo_tarea_id = 1;
            $tarea->Fecha_inicio = new Carbon('2021-03-01 15:32:45.654321');
            $tarea->Fecha_limite = new Carbon('2021-03-02 10:32:45.654321');
            $tarea->Fecha_fin = new Carbon('2021-03-02 10:32:45.654321');
            $tarea->Prioridad = "Media";
            $tarea->Correcciones = 'false';
            $tarea->Proyecto_id = 7;
            $tarea->Estado_tarea_id = 6;
            $tarea->save();

            $tarea = new Tarea;
            $tarea->Nombre_tarea = "Diseñar vistas";
            $tarea->Tipo_tarea_id = 1;
            $tarea->Fecha_inicio = new Carbon('2021-03-01 15:32:45.654321');
            $tarea->Fecha_limite = new Carbon('2021-03-02 10:32:45.654321');
            $tarea->Fecha_fin = new Carbon('2021-03-02 10:32:45.654321');
            $tarea->Prioridad = "Media";
            $tarea->Correcciones = 'false';
            $tarea->Proyecto_id = 7;
            $tarea->Estado_tarea_id = 6;
            $tarea->save();

            $tarea = new Tarea;
            $tarea->Nombre_tarea = "Diseñar cortes";
            $tarea->Tipo_tarea_id = 1;
            $tarea->Fecha_inicio = new Carbon('2021-03-01 15:32:45.654321');
            $tarea->Fecha_limite = new Carbon('2021-03-02 10:32:45.654321');
            $tarea->Fecha_fin = new Carbon('2021-03-02 10:32:45.654321');
            $tarea->Prioridad = "Media";
            $tarea->Correcciones = 'false';
            $tarea->Proyecto_id = 7;
            $tarea->Estado_tarea_id = 6;
            $tarea->save();

            $tarea = new Tarea;
            $tarea->Nombre_tarea = "Diseñar planta de techos";
            $tarea->Tipo_tarea_id = 1;
            $tarea->Fecha_inicio = new Carbon('2021-03-01 15:32:45.654321');
            $tarea->Fecha_limite = new Carbon('2021-03-02 10:32:45.654321');
            $tarea->Fecha_fin = new Carbon('2021-03-02 10:32:45.654321');
            $tarea->Prioridad = "Media";
            $tarea->Correcciones = 'false';
            $tarea->Proyecto_id = 7;
            $tarea->Estado_tarea_id = 6;
            $tarea->save();

            $tarea = new Tarea;
            $tarea->Nombre_tarea = "Silueta y balance de superficies";
            $tarea->Tipo_tarea_id = 5;
            $tarea->Fecha_inicio = new Carbon('2021-03-01 15:32:45.654321');
            $tarea->Fecha_limite = new Carbon('2021-03-05 10:32:45.654321');
            $tarea->Fecha_fin = new Carbon('2021-03-05 10:32:45.654321');
            $tarea->Prioridad = "Media";
            $tarea->Correcciones = 'false';
            $tarea->Proyecto_id = 7;
            $tarea->Estado_tarea_id = 1;
            $tarea->save();

            $tarea = new Tarea;
            $tarea->Nombre_tarea = "Realizar cálculo de estructuras";
            $tarea->Tipo_tarea_id = 2;
            $tarea->Fecha_inicio = new Carbon('2021-03-01 15:32:45.654321');
            $tarea->Fecha_limite = new Carbon('2021-03-02 10:32:45.654321');
            $tarea->Fecha_fin = new Carbon('2021-03-02 10:32:45.654321');
            $tarea->Prioridad = "Media";
            $tarea->Correcciones = 'false';
            $tarea->Proyecto_id = 7;
            $tarea->Estado_tarea_id = 6;
            $tarea->save();

            $tarea = new Tarea;
            $tarea->Nombre_tarea = "Diseñar instalación eléctrica";
            $tarea->Tipo_tarea_id = 3;
            $tarea->Fecha_inicio = new Carbon('2021-03-01 15:32:45.654321');
            $tarea->Fecha_limite = new Carbon('2021-03-02 10:32:45.654321');
            $tarea->Fecha_fin = new Carbon('2021-03-02 10:32:45.654321');
            $tarea->Prioridad = "Media";
            $tarea->Correcciones = 'false';
            $tarea->Proyecto_id = 7;
            $tarea->Estado_tarea_id = 6;
            $tarea->save();

            $tarea = new Tarea;
            $tarea->Nombre_tarea = "Diseñar instalación de agua";
            $tarea->Tipo_tarea_id = 3;
            $tarea->Fecha_inicio = new Carbon('2021-03-01 15:32:45.654321');
            $tarea->Fecha_limite = new Carbon('2021-03-02 10:32:45.654321');
            $tarea->Fecha_fin = new Carbon('2021-03-02 10:32:45.654321');
            $tarea->Prioridad = "Media";
            $tarea->Correcciones = 'false';
            $tarea->Proyecto_id = 7;
            $tarea->Estado_tarea_id = 6;
            $tarea->save();

            $tarea = new Tarea;
            $tarea->Nombre_tarea = "Diseñar instalación sanitaria";
            $tarea->Tipo_tarea_id = 3;
            $tarea->Fecha_inicio = new Carbon('2021-03-01 15:32:45.654321');
            $tarea->Fecha_limite = new Carbon('2021-03-02 10:32:45.654321');
            $tarea->Fecha_fin = new Carbon('2021-03-02 10:32:45.654321');
            $tarea->Prioridad = "Media";
            $tarea->Correcciones = 'false';
            $tarea->Proyecto_id = 7;
            $tarea->Estado_tarea_id = 6;
            $tarea->save();

            $tarea = new Tarea;
            $tarea->Nombre_tarea = "Realizar cómputo y presupuesto";
            $tarea->Tipo_tarea_id = 2;
            $tarea->Fecha_inicio = new Carbon('2021-03-01 15:32:45.654321');
            $tarea->Fecha_limite = new Carbon('2021-03-02 10:32:45.654321');
            $tarea->Fecha_fin = new Carbon('2021-03-02 10:32:45.654321');
            $tarea->Prioridad = "Media";
            $tarea->Correcciones = 'false';
            $tarea->Proyecto_id = 7;
            $tarea->Estado_tarea_id = 6;
            $tarea->save();

        //Fin de tareas del proyecto 7

        //Asignaciones de tareas del proyecto 1

            $asignacionPersonalTarea = new AsignacionPersonalTarea;
            $asignacionPersonalTarea->Personal_id = 3;
            $asignacionPersonalTarea->Responsabilidad = "Responsable";
            $asignacionPersonalTarea->Tarea_id = 1;
            $asignacionPersonalTarea->save();

            $asignacionPersonalTarea = new AsignacionPersonalTarea;
            $asignacionPersonalTarea->Personal_id = 4;
            $asignacionPersonalTarea->Responsabilidad = "Responsable";
            $asignacionPersonalTarea->Tarea_id = 2;
            $asignacionPersonalTarea->save();

            $asignacionPersonalTarea = new AsignacionPersonalTarea;
            $asignacionPersonalTarea->Personal_id = 5;
            $asignacionPersonalTarea->Responsabilidad = "Responsable";
            $asignacionPersonalTarea->Tarea_id = 3;
            $asignacionPersonalTarea->save();

            $asignacionPersonalTarea = new AsignacionPersonalTarea;
            $asignacionPersonalTarea->Personal_id = 3;
            $asignacionPersonalTarea->Responsabilidad = "Responsable";
            $asignacionPersonalTarea->Tarea_id = 4;
            $asignacionPersonalTarea->save();

            $asignacionPersonalTarea = new AsignacionPersonalTarea;
            $asignacionPersonalTarea->Personal_id = 4;
            $asignacionPersonalTarea->Responsabilidad = "Responsable";
            $asignacionPersonalTarea->Tarea_id = 5;
            $asignacionPersonalTarea->save();

            $asignacionPersonalTarea = new AsignacionPersonalTarea;
            $asignacionPersonalTarea->Personal_id = 5;
            $asignacionPersonalTarea->Responsabilidad = "Responsable";
            $asignacionPersonalTarea->Tarea_id = 6;
            $asignacionPersonalTarea->save();

            $asignacionPersonalTarea = new AsignacionPersonalTarea;
            $asignacionPersonalTarea->Personal_id = 3;
            $asignacionPersonalTarea->Responsabilidad = "Responsable";
            $asignacionPersonalTarea->Tarea_id = 7;
            $asignacionPersonalTarea->save();

            $asignacionPersonalTarea = new AsignacionPersonalTarea;
            $asignacionPersonalTarea->Personal_id = 4;
            $asignacionPersonalTarea->Responsabilidad = "Responsable";
            $asignacionPersonalTarea->Tarea_id = 8;
            $asignacionPersonalTarea->save();

            $asignacionPersonalTarea = new AsignacionPersonalTarea;
            $asignacionPersonalTarea->Personal_id = 5;
            $asignacionPersonalTarea->Responsabilidad = "Responsable";
            $asignacionPersonalTarea->Tarea_id = 9;
            $asignacionPersonalTarea->save();

            $asignacionPersonalTarea = new AsignacionPersonalTarea;
            $asignacionPersonalTarea->Personal_id = 3;
            $asignacionPersonalTarea->Responsabilidad = "Responsable";
            $asignacionPersonalTarea->Tarea_id = 10;
            $asignacionPersonalTarea->save();

            $asignacionPersonalTarea = new AsignacionPersonalTarea;
            $asignacionPersonalTarea->Personal_id = 4;
            $asignacionPersonalTarea->Responsabilidad = "Responsable";
            $asignacionPersonalTarea->Tarea_id = 11;
            $asignacionPersonalTarea->save();

            $asignacionPersonalTarea = new AsignacionPersonalTarea;
            $asignacionPersonalTarea->Personal_id = 5;
            $asignacionPersonalTarea->Responsabilidad = "Responsable";
            $asignacionPersonalTarea->Tarea_id = 12;
            $asignacionPersonalTarea->save();

            $asignacionPersonalTarea = new AsignacionPersonalTarea;
            $asignacionPersonalTarea->Personal_id = 3;
            $asignacionPersonalTarea->Responsabilidad = "Responsable";
            $asignacionPersonalTarea->Tarea_id = 13;
            $asignacionPersonalTarea->save();

            $asignacionPersonalTarea = new AsignacionPersonalTarea;
            $asignacionPersonalTarea->Personal_id = 4;
            $asignacionPersonalTarea->Responsabilidad = "Responsable";
            $asignacionPersonalTarea->Tarea_id = 14;
            $asignacionPersonalTarea->save();

            $asignacionPersonalTarea = new AsignacionPersonalTarea;
            $asignacionPersonalTarea->Personal_id = 5;
            $asignacionPersonalTarea->Responsabilidad = "Responsable";
            $asignacionPersonalTarea->Tarea_id = 15;
            $asignacionPersonalTarea->save();

        //Fin asignaciones de tareas del proyecto 1

        //Asignaciones de tareas del proyecto 2

            $asignacionPersonalTarea = new AsignacionPersonalTarea;
            $asignacionPersonalTarea->Personal_id = 3;
            $asignacionPersonalTarea->Responsabilidad = "Responsable";
            $asignacionPersonalTarea->Tarea_id = 16;
            $asignacionPersonalTarea->save();

            $asignacionPersonalTarea = new AsignacionPersonalTarea;
            $asignacionPersonalTarea->Personal_id = 4;
            $asignacionPersonalTarea->Responsabilidad = "Responsable";
            $asignacionPersonalTarea->Tarea_id = 17;
            $asignacionPersonalTarea->save();

            $asignacionPersonalTarea = new AsignacionPersonalTarea;
            $asignacionPersonalTarea->Personal_id = 5;
            $asignacionPersonalTarea->Responsabilidad = "Responsable";
            $asignacionPersonalTarea->Tarea_id = 18;
            $asignacionPersonalTarea->save();

            $asignacionPersonalTarea = new AsignacionPersonalTarea;
            $asignacionPersonalTarea->Personal_id = 3;
            $asignacionPersonalTarea->Responsabilidad = "Responsable";
            $asignacionPersonalTarea->Tarea_id = 19;
            $asignacionPersonalTarea->save();

            $asignacionPersonalTarea = new AsignacionPersonalTarea;
            $asignacionPersonalTarea->Personal_id = 4;
            $asignacionPersonalTarea->Responsabilidad = "Responsable";
            $asignacionPersonalTarea->Tarea_id = 20;
            $asignacionPersonalTarea->save();

            $asignacionPersonalTarea = new AsignacionPersonalTarea;
            $asignacionPersonalTarea->Personal_id = 5;
            $asignacionPersonalTarea->Responsabilidad = "Responsable";
            $asignacionPersonalTarea->Tarea_id = 21;
            $asignacionPersonalTarea->save();

            $asignacionPersonalTarea = new AsignacionPersonalTarea;
            $asignacionPersonalTarea->Personal_id = 3;
            $asignacionPersonalTarea->Responsabilidad = "Responsable";
            $asignacionPersonalTarea->Tarea_id = 22;
            $asignacionPersonalTarea->save();

            $asignacionPersonalTarea = new AsignacionPersonalTarea;
            $asignacionPersonalTarea->Personal_id = 4;
            $asignacionPersonalTarea->Responsabilidad = "Responsable";
            $asignacionPersonalTarea->Tarea_id = 23;
            $asignacionPersonalTarea->save();

            $asignacionPersonalTarea = new AsignacionPersonalTarea;
            $asignacionPersonalTarea->Personal_id = 5;
            $asignacionPersonalTarea->Responsabilidad = "Responsable";
            $asignacionPersonalTarea->Tarea_id = 24;
            $asignacionPersonalTarea->save();

            $asignacionPersonalTarea = new AsignacionPersonalTarea;
            $asignacionPersonalTarea->Personal_id = 3;
            $asignacionPersonalTarea->Responsabilidad = "Responsable";
            $asignacionPersonalTarea->Tarea_id = 25;
            $asignacionPersonalTarea->save();

            $asignacionPersonalTarea = new AsignacionPersonalTarea;
            $asignacionPersonalTarea->Personal_id = 4;
            $asignacionPersonalTarea->Responsabilidad = "Responsable";
            $asignacionPersonalTarea->Tarea_id = 26;
            $asignacionPersonalTarea->save();

            $asignacionPersonalTarea = new AsignacionPersonalTarea;
            $asignacionPersonalTarea->Personal_id = 5;
            $asignacionPersonalTarea->Responsabilidad = "Responsable";
            $asignacionPersonalTarea->Tarea_id = 27;
            $asignacionPersonalTarea->save();

            $asignacionPersonalTarea = new AsignacionPersonalTarea;
            $asignacionPersonalTarea->Personal_id = 3;
            $asignacionPersonalTarea->Responsabilidad = "Responsable";
            $asignacionPersonalTarea->Tarea_id = 28;
            $asignacionPersonalTarea->save();

            $asignacionPersonalTarea = new AsignacionPersonalTarea;
            $asignacionPersonalTarea->Personal_id = 4;
            $asignacionPersonalTarea->Responsabilidad = "Responsable";
            $asignacionPersonalTarea->Tarea_id = 29;
            $asignacionPersonalTarea->save();

            $asignacionPersonalTarea = new AsignacionPersonalTarea;
            $asignacionPersonalTarea->Personal_id = 5;
            $asignacionPersonalTarea->Responsabilidad = "Responsable";
            $asignacionPersonalTarea->Tarea_id = 30;
            $asignacionPersonalTarea->save();

        //Fin asignaciones de tareas del proyecto 2

        //Asignaciones de tareas del proyecto 3

            $asignacionPersonalTarea = new AsignacionPersonalTarea;
            $asignacionPersonalTarea->Personal_id = 3;
            $asignacionPersonalTarea->Responsabilidad = "Responsable";
            $asignacionPersonalTarea->Tarea_id = 31;
            $asignacionPersonalTarea->save();

            $asignacionPersonalTarea = new AsignacionPersonalTarea;
            $asignacionPersonalTarea->Personal_id = 4;
            $asignacionPersonalTarea->Responsabilidad = "Responsable";
            $asignacionPersonalTarea->Tarea_id = 32;
            $asignacionPersonalTarea->save();

            $asignacionPersonalTarea = new AsignacionPersonalTarea;
            $asignacionPersonalTarea->Personal_id = 5;
            $asignacionPersonalTarea->Responsabilidad = "Responsable";
            $asignacionPersonalTarea->Tarea_id = 33;
            $asignacionPersonalTarea->save();

            $asignacionPersonalTarea = new AsignacionPersonalTarea;
            $asignacionPersonalTarea->Personal_id = 3;
            $asignacionPersonalTarea->Responsabilidad = "Responsable";
            $asignacionPersonalTarea->Tarea_id = 34;
            $asignacionPersonalTarea->save();

            $asignacionPersonalTarea = new AsignacionPersonalTarea;
            $asignacionPersonalTarea->Personal_id = 4;
            $asignacionPersonalTarea->Responsabilidad = "Responsable";
            $asignacionPersonalTarea->Tarea_id = 35;
            $asignacionPersonalTarea->save();

            $asignacionPersonalTarea = new AsignacionPersonalTarea;
            $asignacionPersonalTarea->Personal_id = 5;
            $asignacionPersonalTarea->Responsabilidad = "Responsable";
            $asignacionPersonalTarea->Tarea_id = 36;
            $asignacionPersonalTarea->save();

            $asignacionPersonalTarea = new AsignacionPersonalTarea;
            $asignacionPersonalTarea->Personal_id = 3;
            $asignacionPersonalTarea->Responsabilidad = "Responsable";
            $asignacionPersonalTarea->Tarea_id = 37;
            $asignacionPersonalTarea->save();

            $asignacionPersonalTarea = new AsignacionPersonalTarea;
            $asignacionPersonalTarea->Personal_id = 4;
            $asignacionPersonalTarea->Responsabilidad = "Responsable";
            $asignacionPersonalTarea->Tarea_id = 38;
            $asignacionPersonalTarea->save();

            $asignacionPersonalTarea = new AsignacionPersonalTarea;
            $asignacionPersonalTarea->Personal_id = 5;
            $asignacionPersonalTarea->Responsabilidad = "Responsable";
            $asignacionPersonalTarea->Tarea_id = 39;
            $asignacionPersonalTarea->save();

            $asignacionPersonalTarea = new AsignacionPersonalTarea;
            $asignacionPersonalTarea->Personal_id = 3;
            $asignacionPersonalTarea->Responsabilidad = "Responsable";
            $asignacionPersonalTarea->Tarea_id = 40;
            $asignacionPersonalTarea->save();

            $asignacionPersonalTarea = new AsignacionPersonalTarea;
            $asignacionPersonalTarea->Personal_id = 4;
            $asignacionPersonalTarea->Responsabilidad = "Responsable";
            $asignacionPersonalTarea->Tarea_id = 41;
            $asignacionPersonalTarea->save();

            $asignacionPersonalTarea = new AsignacionPersonalTarea;
            $asignacionPersonalTarea->Personal_id = 5;
            $asignacionPersonalTarea->Responsabilidad = "Responsable";
            $asignacionPersonalTarea->Tarea_id = 42;
            $asignacionPersonalTarea->save();

            $asignacionPersonalTarea = new AsignacionPersonalTarea;
            $asignacionPersonalTarea->Personal_id = 3;
            $asignacionPersonalTarea->Responsabilidad = "Responsable";
            $asignacionPersonalTarea->Tarea_id = 43;
            $asignacionPersonalTarea->save();

            $asignacionPersonalTarea = new AsignacionPersonalTarea;
            $asignacionPersonalTarea->Personal_id = 4;
            $asignacionPersonalTarea->Responsabilidad = "Responsable";
            $asignacionPersonalTarea->Tarea_id = 44;
            $asignacionPersonalTarea->save();

            $asignacionPersonalTarea = new AsignacionPersonalTarea;
            $asignacionPersonalTarea->Personal_id = 5;
            $asignacionPersonalTarea->Responsabilidad = "Responsable";
            $asignacionPersonalTarea->Tarea_id = 45;
            $asignacionPersonalTarea->save();

        //Fin asignaciones de tareas del proyecto 3

        //Asignaciones de tareas del proyecto 4

            $asignacionPersonalTarea = new AsignacionPersonalTarea;
            $asignacionPersonalTarea->Personal_id = 3;
            $asignacionPersonalTarea->Responsabilidad = "Responsable";
            $asignacionPersonalTarea->Tarea_id = 46;
            $asignacionPersonalTarea->save();

            $asignacionPersonalTarea = new AsignacionPersonalTarea;
            $asignacionPersonalTarea->Personal_id = 4;
            $asignacionPersonalTarea->Responsabilidad = "Responsable";
            $asignacionPersonalTarea->Tarea_id = 47;
            $asignacionPersonalTarea->save();

            $asignacionPersonalTarea = new AsignacionPersonalTarea;
            $asignacionPersonalTarea->Personal_id = 5;
            $asignacionPersonalTarea->Responsabilidad = "Responsable";
            $asignacionPersonalTarea->Tarea_id = 48;
            $asignacionPersonalTarea->save();

            $asignacionPersonalTarea = new AsignacionPersonalTarea;
            $asignacionPersonalTarea->Personal_id = 3;
            $asignacionPersonalTarea->Responsabilidad = "Responsable";
            $asignacionPersonalTarea->Tarea_id = 49;
            $asignacionPersonalTarea->save();

            $asignacionPersonalTarea = new AsignacionPersonalTarea;
            $asignacionPersonalTarea->Personal_id = 4;
            $asignacionPersonalTarea->Responsabilidad = "Responsable";
            $asignacionPersonalTarea->Tarea_id = 50;
            $asignacionPersonalTarea->save();

            $asignacionPersonalTarea = new AsignacionPersonalTarea;
            $asignacionPersonalTarea->Personal_id = 5;
            $asignacionPersonalTarea->Responsabilidad = "Responsable";
            $asignacionPersonalTarea->Tarea_id = 51;
            $asignacionPersonalTarea->save();

            $asignacionPersonalTarea = new AsignacionPersonalTarea;
            $asignacionPersonalTarea->Personal_id = 3;
            $asignacionPersonalTarea->Responsabilidad = "Responsable";
            $asignacionPersonalTarea->Tarea_id = 52;
            $asignacionPersonalTarea->save();

            $asignacionPersonalTarea = new AsignacionPersonalTarea;
            $asignacionPersonalTarea->Personal_id = 4;
            $asignacionPersonalTarea->Responsabilidad = "Responsable";
            $asignacionPersonalTarea->Tarea_id = 53;
            $asignacionPersonalTarea->save();

            $asignacionPersonalTarea = new AsignacionPersonalTarea;
            $asignacionPersonalTarea->Personal_id = 5;
            $asignacionPersonalTarea->Responsabilidad = "Responsable";
            $asignacionPersonalTarea->Tarea_id = 54;
            $asignacionPersonalTarea->save();

            $asignacionPersonalTarea = new AsignacionPersonalTarea;
            $asignacionPersonalTarea->Personal_id = 3;
            $asignacionPersonalTarea->Responsabilidad = "Responsable";
            $asignacionPersonalTarea->Tarea_id = 55;
            $asignacionPersonalTarea->save();

            $asignacionPersonalTarea = new AsignacionPersonalTarea;
            $asignacionPersonalTarea->Personal_id = 4;
            $asignacionPersonalTarea->Responsabilidad = "Responsable";
            $asignacionPersonalTarea->Tarea_id = 56;
            $asignacionPersonalTarea->save();

            $asignacionPersonalTarea = new AsignacionPersonalTarea;
            $asignacionPersonalTarea->Personal_id = 5;
            $asignacionPersonalTarea->Responsabilidad = "Responsable";
            $asignacionPersonalTarea->Tarea_id = 57;
            $asignacionPersonalTarea->save();

            $asignacionPersonalTarea = new AsignacionPersonalTarea;
            $asignacionPersonalTarea->Personal_id = 3;
            $asignacionPersonalTarea->Responsabilidad = "Responsable";
            $asignacionPersonalTarea->Tarea_id = 58;
            $asignacionPersonalTarea->save();

            $asignacionPersonalTarea = new AsignacionPersonalTarea;
            $asignacionPersonalTarea->Personal_id = 4;
            $asignacionPersonalTarea->Responsabilidad = "Responsable";
            $asignacionPersonalTarea->Tarea_id = 59;
            $asignacionPersonalTarea->save();

            $asignacionPersonalTarea = new AsignacionPersonalTarea;
            $asignacionPersonalTarea->Personal_id = 5;
            $asignacionPersonalTarea->Responsabilidad = "Responsable";
            $asignacionPersonalTarea->Tarea_id = 60;
            $asignacionPersonalTarea->save();

        //Fin asignaciones de tareas del proyecto 4

        //Asignaciones de tareas del proyecto 5

            $asignacionPersonalTarea = new AsignacionPersonalTarea;
            $asignacionPersonalTarea->Personal_id = 4;
            $asignacionPersonalTarea->Responsabilidad = "Responsable";
            $asignacionPersonalTarea->Tarea_id = 61;
            $asignacionPersonalTarea->save();

            $asignacionPersonalTarea = new AsignacionPersonalTarea;
            $asignacionPersonalTarea->Personal_id = 3;
            $asignacionPersonalTarea->Responsabilidad = "Responsable";
            $asignacionPersonalTarea->Tarea_id = 62;
            $asignacionPersonalTarea->save();

            $asignacionPersonalTarea = new AsignacionPersonalTarea;
            $asignacionPersonalTarea->Personal_id = 5;
            $asignacionPersonalTarea->Responsabilidad = "Responsable";
            $asignacionPersonalTarea->Tarea_id = 63;
            $asignacionPersonalTarea->save();

            $asignacionPersonalTarea = new AsignacionPersonalTarea;
            $asignacionPersonalTarea->Personal_id = 5;
            $asignacionPersonalTarea->Responsabilidad = "Responsable";
            $asignacionPersonalTarea->Tarea_id = 64;
            $asignacionPersonalTarea->save();

            $asignacionPersonalTarea = new AsignacionPersonalTarea;
            $asignacionPersonalTarea->Personal_id = 4;
            $asignacionPersonalTarea->Responsabilidad = "Responsable";
            $asignacionPersonalTarea->Tarea_id = 65;
            $asignacionPersonalTarea->save();

            $asignacionPersonalTarea = new AsignacionPersonalTarea;
            $asignacionPersonalTarea->Personal_id = 3;
            $asignacionPersonalTarea->Responsabilidad = "Responsable";
            $asignacionPersonalTarea->Tarea_id = 66;
            $asignacionPersonalTarea->save();

            $asignacionPersonalTarea = new AsignacionPersonalTarea;
            $asignacionPersonalTarea->Personal_id = 4;
            $asignacionPersonalTarea->Responsabilidad = "Responsable";
            $asignacionPersonalTarea->Tarea_id = 67;
            $asignacionPersonalTarea->save();

            $asignacionPersonalTarea = new AsignacionPersonalTarea;
            $asignacionPersonalTarea->Personal_id = 4;
            $asignacionPersonalTarea->Responsabilidad = "Responsable";
            $asignacionPersonalTarea->Tarea_id = 68;
            $asignacionPersonalTarea->save();

            $asignacionPersonalTarea = new AsignacionPersonalTarea;
            $asignacionPersonalTarea->Personal_id = 5;
            $asignacionPersonalTarea->Responsabilidad = "Responsable";
            $asignacionPersonalTarea->Tarea_id = 69;
            $asignacionPersonalTarea->save();

            $asignacionPersonalTarea = new AsignacionPersonalTarea;
            $asignacionPersonalTarea->Personal_id = 3;
            $asignacionPersonalTarea->Responsabilidad = "Responsable";
            $asignacionPersonalTarea->Tarea_id = 70;
            $asignacionPersonalTarea->save();

            $asignacionPersonalTarea = new AsignacionPersonalTarea;
            $asignacionPersonalTarea->Personal_id = 5;
            $asignacionPersonalTarea->Responsabilidad = "Responsable";
            $asignacionPersonalTarea->Tarea_id = 71;
            $asignacionPersonalTarea->save();

            $asignacionPersonalTarea = new AsignacionPersonalTarea;
            $asignacionPersonalTarea->Personal_id = 4;
            $asignacionPersonalTarea->Responsabilidad = "Responsable";
            $asignacionPersonalTarea->Tarea_id = 72;
            $asignacionPersonalTarea->save();

            $asignacionPersonalTarea = new AsignacionPersonalTarea;
            $asignacionPersonalTarea->Personal_id = 5;
            $asignacionPersonalTarea->Responsabilidad = "Responsable";
            $asignacionPersonalTarea->Tarea_id = 73;
            $asignacionPersonalTarea->save();

            $asignacionPersonalTarea = new AsignacionPersonalTarea;
            $asignacionPersonalTarea->Personal_id = 3;
            $asignacionPersonalTarea->Responsabilidad = "Responsable";
            $asignacionPersonalTarea->Tarea_id = 74;
            $asignacionPersonalTarea->save();

            $asignacionPersonalTarea = new AsignacionPersonalTarea;
            $asignacionPersonalTarea->Personal_id = 4;
            $asignacionPersonalTarea->Responsabilidad = "Responsable";
            $asignacionPersonalTarea->Tarea_id = 75;
            $asignacionPersonalTarea->save();

        //Fin asignaciones de tareas del proyecto 5

        //Asignaciones de tareas del proyecto 6

            $asignacionPersonalTarea = new AsignacionPersonalTarea;
            $asignacionPersonalTarea->Personal_id = 4;
            $asignacionPersonalTarea->Responsabilidad = "Responsable";
            $asignacionPersonalTarea->Tarea_id = 76;
            $asignacionPersonalTarea->save();

            $asignacionPersonalTarea = new AsignacionPersonalTarea;
            $asignacionPersonalTarea->Personal_id = 3;
            $asignacionPersonalTarea->Responsabilidad = "Responsable";
            $asignacionPersonalTarea->Tarea_id = 77;
            $asignacionPersonalTarea->save();

            $asignacionPersonalTarea = new AsignacionPersonalTarea;
            $asignacionPersonalTarea->Personal_id = 5;
            $asignacionPersonalTarea->Responsabilidad = "Responsable";
            $asignacionPersonalTarea->Tarea_id = 78;
            $asignacionPersonalTarea->save();

            $asignacionPersonalTarea = new AsignacionPersonalTarea;
            $asignacionPersonalTarea->Personal_id = 5;
            $asignacionPersonalTarea->Responsabilidad = "Responsable";
            $asignacionPersonalTarea->Tarea_id = 79;
            $asignacionPersonalTarea->save();

            $asignacionPersonalTarea = new AsignacionPersonalTarea;
            $asignacionPersonalTarea->Personal_id = 4;
            $asignacionPersonalTarea->Responsabilidad = "Responsable";
            $asignacionPersonalTarea->Tarea_id = 80;
            $asignacionPersonalTarea->save();

        //Fin asignaciones de tareas del proyecto 6

        //Cargar configuraciones

            $Config = new PDFconfig;
            $Config->logo = "Logo.jpg";
            $Config->nombre = "Racevi";
            $Config->direccion = "Avenida 25 de Mayo 125";
            $Config->telefono = 3754524949;
            $Config->email = "racevi@gmail.com";
            $Config->save();

        //Fin de carga de configuraciones

        //Cargar evaluaciones

            $evaluacion = new Evaluacion();
            $evaluacion->Fecha_inicio = new Carbon('2020-12-01 00:00:00');
            $evaluacion->Fecha_fin = new Carbon('2020-12-31 23:59:59');
            $evaluacion->Personal_id = 3;
            $evaluacion->Evaluador_id = 1;
            $evaluacion->save();

            $evaluacion = new Evaluacion();
            $evaluacion->Fecha_inicio = new Carbon('2020-12-01 00:00:00');
            $evaluacion->Fecha_fin = new Carbon('2020-12-31 23:59:59');
            $evaluacion->Personal_id = 4;
            $evaluacion->Evaluador_id = 1;
            $evaluacion->save();

            $evaluacion = new Evaluacion();
            $evaluacion->Fecha_inicio = new Carbon('2020-12-01 00:00:00');
            $evaluacion->Fecha_fin = new Carbon('2020-12-31 23:59:59');
            $evaluacion->Personal_id = 5;
            $evaluacion->Evaluador_id = 1;
            $evaluacion->save();

            $evaluacion = new Evaluacion();
            $evaluacion->Fecha_inicio = new Carbon('2020-11-01 00:00:00');
            $evaluacion->Fecha_fin = new Carbon('2020-11-30 23:59:59');
            $evaluacion->Personal_id = 3;
            $evaluacion->Evaluador_id = 1;
            $evaluacion->save();

            $evaluacion = new Evaluacion();
            $evaluacion->Fecha_inicio = new Carbon('2020-11-01 00:00:00');
            $evaluacion->Fecha_fin = new Carbon('2020-11-30 23:59:59');
            $evaluacion->Personal_id = 4;
            $evaluacion->Evaluador_id = 1;
            $evaluacion->save();

            $evaluacion = new Evaluacion();
            $evaluacion->Fecha_inicio = new Carbon('2020-11-01 00:00:00');
            $evaluacion->Fecha_fin = new Carbon('2020-11-30 23:59:59');
            $evaluacion->Personal_id = 5;
            $evaluacion->Evaluador_id = 1;
            $evaluacion->save();

            $evaluacion = new Evaluacion();
            $evaluacion->Fecha_inicio = new Carbon('2021-01-01 00:00:00');
            $evaluacion->Fecha_fin = new Carbon('2021-01-31 23:59:59');
            $evaluacion->Personal_id = 3;
            $evaluacion->Evaluador_id = 1;
            $evaluacion->save();

            $evaluacion = new Evaluacion();
            $evaluacion->Fecha_inicio = new Carbon('2021-01-01 00:00:00');
            $evaluacion->Fecha_fin = new Carbon('2021-01-31 23:59:59');
            $evaluacion->Personal_id = 4;
            $evaluacion->Evaluador_id = 1;
            $evaluacion->save();

            $evaluacion = new Evaluacion();
            $evaluacion->Fecha_inicio = new Carbon('2021-01-01 00:00:00');
            $evaluacion->Fecha_fin = new Carbon('2021-01-31 23:59:59');
            $evaluacion->Personal_id = 5;
            $evaluacion->Evaluador_id = 1;
            $evaluacion->save();

        //Fin de carga de evaluaciones

        //Ambientes del proyecto 6

            $proyectoAmbiente = new Proyecto_ambiente;
            $proyectoAmbiente->Ambiente_id = 1;
            $proyectoAmbiente->Cantidad = 1;
            $proyectoAmbiente->Proyecto_id = 6;
            $proyectoAmbiente->save();

            $proyectoAmbiente = new Proyecto_ambiente;
            $proyectoAmbiente->Ambiente_id = 2;
            $proyectoAmbiente->Cantidad = 1;
            $proyectoAmbiente->Proyecto_id = 6;
            $proyectoAmbiente->save();

            $proyectoAmbiente = new Proyecto_ambiente;
            $proyectoAmbiente->Ambiente_id = 3;
            $proyectoAmbiente->Cantidad = 1;
            $proyectoAmbiente->Proyecto_id = 6;
            $proyectoAmbiente->save();

            $proyectoAmbiente = new Proyecto_ambiente;
            $proyectoAmbiente->Ambiente_id = 4;
            $proyectoAmbiente->Cantidad = 1;
            $proyectoAmbiente->Proyecto_id = 6;
            $proyectoAmbiente->save();

            $proyectoAmbiente = new Proyecto_ambiente;
            $proyectoAmbiente->Ambiente_id = 5;
            $proyectoAmbiente->Cantidad = 1;
            $proyectoAmbiente->Proyecto_id = 6;
            $proyectoAmbiente->save();

            $proyectoAmbiente = new Proyecto_ambiente;
            $proyectoAmbiente->Ambiente_id = 6;
            $proyectoAmbiente->Cantidad = 1;
            $proyectoAmbiente->Proyecto_id = 6;
            $proyectoAmbiente->save();

            $proyectoAmbiente = new Proyecto_ambiente;
            $proyectoAmbiente->Ambiente_id = 8;
            $proyectoAmbiente->Cantidad = 1;
            $proyectoAmbiente->Proyecto_id = 6;
            $proyectoAmbiente->save();

        //Fin de ambientes del proyecto 6

        //Ambientes del proyecto 7

            $proyectoAmbiente = new Proyecto_ambiente;
            $proyectoAmbiente->Ambiente_id = 1;
            $proyectoAmbiente->Cantidad = 1;
            $proyectoAmbiente->Proyecto_id = 7;
            $proyectoAmbiente->save();

            $proyectoAmbiente = new Proyecto_ambiente;
            $proyectoAmbiente->Ambiente_id = 2;
            $proyectoAmbiente->Cantidad = 1;
            $proyectoAmbiente->Proyecto_id = 7;
            $proyectoAmbiente->save();

            $proyectoAmbiente = new Proyecto_ambiente;
            $proyectoAmbiente->Ambiente_id = 3;
            $proyectoAmbiente->Cantidad = 1;
            $proyectoAmbiente->Proyecto_id = 7;
            $proyectoAmbiente->save();

            $proyectoAmbiente = new Proyecto_ambiente;
            $proyectoAmbiente->Ambiente_id = 4;
            $proyectoAmbiente->Cantidad = 1;
            $proyectoAmbiente->Proyecto_id = 7;
            $proyectoAmbiente->save();

            $proyectoAmbiente = new Proyecto_ambiente;
            $proyectoAmbiente->Ambiente_id = 5;
            $proyectoAmbiente->Cantidad = 1;
            $proyectoAmbiente->Proyecto_id = 7;
            $proyectoAmbiente->save();

            $proyectoAmbiente = new Proyecto_ambiente;
            $proyectoAmbiente->Ambiente_id = 6;
            $proyectoAmbiente->Cantidad = 1;
            $proyectoAmbiente->Proyecto_id = 7;
            $proyectoAmbiente->save();

            $proyectoAmbiente = new Proyecto_ambiente;
            $proyectoAmbiente->Ambiente_id = 8;
            $proyectoAmbiente->Cantidad = 1;
            $proyectoAmbiente->Proyecto_id = 7;
            $proyectoAmbiente->save();

        //Fin de ambientes del proyecto 7
    }
}
