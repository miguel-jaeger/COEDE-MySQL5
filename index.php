<?php

// Incluye los archivos del Modelo
require_once './modelo/Conexion.php';
require_once './modelo/Modelo.php';
require_once './controlador/RevistaControlador.php';

// Conexión a la base de datos
$database = new Conexion();
$db = $database->conectar();
$revista = new RevistaControlador($db);

// Determina la acción a realizar
$action = isset($_GET['accion']) ? $_GET['accion'] : '';
$post_action = isset($_POST['accion']) ? $_POST['accion'] : '';

// Lógica del controlador

if ($post_action == 'crear') {
    // Si la acción es 'crear' (viene del formulario POST)
    $revista->titulo = $_POST['titulo'];
    $revista->editorial = $_POST['editorial'];
    $revista->fechaPublicacion = $_POST['fechaPublicacion'];

    // Llama al método del Modelo para guardar los datos

    if ($revista->registrarRevista()) {
        // Redirige a la lista de estudiantes si todo sale bien
        header("Location: index.php?action=listar&status=success");
        //exit();
    } else {
        echo "Error al crear estudiante.";
    }
} else if ($post_action == 'edita') {
    $revista->titulo = $_POST['titulo'];
    $revista->editorial = $_POST['editorial'];
    $revista->fechaPublicacion = $_POST['fechaPublicacion'];
    $revista->id = $_POST['id'];
    if ($revista->editarRevista()) {
        // Redirige a la lista de estudiantes si todo sale bien
        header("Location: index.php?action=listar&status=success");
        //exit();
    } else {
        echo "Error al crear estudiante.";
    }
} else if ($action == 'eliminar') {
    // Llama al método del Modelo para eliminar el registro
    $revista->eliminarRevista($_GET['id']);
    // Redirige a la lista para mostrar el cambio
    header('Location: ./index.php?action=listar');
} else if ($action == 'editar') {
    // Si no se especifica ninguna acción, muestra el formulario por defecto
    require_once './vista/editar.php';
}  else if ($action == 'registrar') {
    // Si no se especifica ninguna acción, muestra el formulario por defecto
    require_once './vista/Registro.php';
}else {
    // Si la acción es 'listar' (viene de una petición GET)
    // Llama al método del Modelo para obtener los datos
    $revistas = $revista->listarRevistas();
    // Carga la Vista para mostrar la lista
    require_once './vista/Listar.php';
}
?>