<?php

use Illuminate\Database\Seeder;
use App\Models\Estado_tarea;
use App\Models\Tipo_tarea;
use App\Models\Tipo_proyecto;
use App\Models\RolPersonal;
use App\Models\Personal;
use App\Models\ambiente;
use App\Models\Comitente;
use App\Models\Sexo;
use App\User;
use Illuminate\Support\Facades\Hash;


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
        $user->name = "Lucha";
        $user->email = "lucha@gmail.com";
        $user->password = Hash::make(12345678);
        $user->Rol_id = 3;
        $user->Personal_id = 4;
        $user->save();

        $user = new User;
        $user->name = "Tamy";
        $user->email = "tamara@gmail.com";
        $user->password = Hash::make(12345678);
        $user->Rol_id = 4;
        $user->Personal_id = 5;
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
        $tipo_tarea->Nombre_tipo_tarea = "Diseño de plantas";
        $tipo_tarea->Descripcion = "Por definir";
        $tipo_tarea->save();

        $tipo_tarea = new Tipo_tarea;
        $tipo_tarea->Nombre_tipo_tarea = "Cálculo";
        $tipo_tarea->Descripcion = "Por definir";
        $tipo_tarea->save();

        $tipo_tarea = new Tipo_tarea;
        $tipo_tarea->Nombre_tipo_tarea = "Instalacion eléctrica";
        $tipo_tarea->Descripcion = "Por definir";
        $tipo_tarea->save();

        $tipo_tarea = new Tipo_tarea;
        $tipo_tarea->Nombre_tipo_tarea = "Instalacion sanitaria";
        $tipo_tarea->Descripcion = "Por definir";
        $tipo_tarea->save();

        $tipo_tarea = new Tipo_tarea;
        $tipo_tarea->Nombre_tipo_tarea = "Instalacion de agua";
        $tipo_tarea->Descripcion = "Por definir";
        $tipo_tarea->save();

        $tipo_tarea = new Tipo_tarea;
        $tipo_tarea->Nombre_tipo_tarea = "Preentación";
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
    }
}
