<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <title>Llamado de emergencia</title>
</head>
<body>
    <p>Hola {{ $asignacion->Personal->NombrePersonal }}! Se le ha asignado una nueva tarea el dia {{ $asignacion->get_Fecha_Creacion() }}.</p>
    <p>Datos de la asigación:</p>
    <ul>
        <li>Rol: {{ $asignacion->Responsabilidad }}</li>
        <li>Usuario: {{ $asignacion->Personal->ApellidoPersonal }} {{ $asignacion->Personal->NombrePersonal }}</li>
        <li>Tarea: {{ $asignacion->tarea->Nombre_tarea }}</li>
    </ul>
    <a href="{{ route('asignacionPersonalTareas.indexPersonal') }}"><span>Ver mi lista de tareas</span></a>
</body>
</html>
