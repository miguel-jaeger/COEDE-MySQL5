<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Revistas</title>
</head>
<body>
    <h1>Listado de Revistas</h1>
    <a href="index.php?accion=registrar">Registrar Nueva Revista</a>
    <br><br>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Editorial</th>
                <th>Fecha de Publicación</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($revistas as $revista): ?>
            <tr>
                <td><?php echo htmlspecialchars($revista['id']); ?></td>
                <td><?php echo htmlspecialchars($revista['titulo']); ?></td>
                <td><?php echo htmlspecialchars($revista['editorial']); ?></td>
                <td><?php echo htmlspecialchars($revista['fechaPublicacion']); ?></td>
                <td>
                    <a href="index.php?accion=editar&id=<?php echo htmlspecialchars($revista['id']); ?>">Editar</a>
                    <a href="index.php?accion=eliminar&id=<?php echo htmlspecialchars($revista['id']); ?>" onclick="return confirm('¿Estás seguro de que quieres eliminar esta revista?');">Eliminar</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>