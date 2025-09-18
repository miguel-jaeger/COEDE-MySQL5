<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro de Revista</title>
</head>
<body>
    <h1>Registrar Nueva Revista</h1>
    <form action="index.php?accion=registrar" method="POST">
        <label for="titulo">Título:</label><br>
        <input type="text" id="titulo" name="titulo" required><br><br>

        <label for="editorial">Editorial:</label><br>
        <input type="text" id="editorial" name="editorial" required><br><br>

        <label for="fechaPublicacion">Fecha de Publicación:</label><br>
        <input type="date" id="fechaPublicacion" name="fechaPublicacion" required><br><br>
        <input type="text" name="accion" value="crear" hidden>

        <button type="submit">Guardar Revista</button>
    </form>
    <br>
    <a href="index.php?accion=listar">Volver al listado</a>
</body>
</html>