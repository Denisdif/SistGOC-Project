<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <title>Aviso de proyecto terminado</title>
</head>
<body>
    <p>Hola {{ $proyecto->comitente->NombreComitente }}!
    Tu proyecto de {{ $proyecto->Tipo_proyecto->Nombre }} en {{ $proyecto->direccion->Calle}} {{ $proyecto->direccion->Altura}},
    {{ $proyecto->direccion->localidad->localidad}}, {{ $proyecto->direccion->provincia->provincia}}, {{ $proyecto->direccion->pais->pais}}
    ya esta listo para ser retirado.</p>
</body>
</html>
