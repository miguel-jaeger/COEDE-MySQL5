<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Revista</title>
</head>
<body>
    <h1>Editar Revista</h1>
    <form action="index.php?accion=editar" method="POST">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($revista['id']); ?>">
        
        <label for="titulo">Título:</label><br>
        <input type="text" id="titulo" name="titulo" value="<?php echo htmlspecialchars($revista['titulo']); ?>" required><br><br>

        <label for="editorial">Editorial:</label><br>
        <input type="text" id="editorial" name="editorial" value="<?php echo htmlspecialchars($revista['editorial']); ?>" required><br><br>

        <label for="fechaPublicacion">Fecha de Publicación:</label><br>
        <input type="date" id="fechaPublicacion" name="fechaPublicacion" value="<?php echo htmlspecialchars($revista['fechaPublicacion']); ?>" required><br><br>

        <button type="submit">Actualizar Revista</button>
    </form>
    <br>
    <a href="index.php?accion=listar">Volver al listado</a>
</body>
</html>