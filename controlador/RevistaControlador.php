<?php

require_once './modelo/Modelo.php';

class RevistaControlador {
    private $modelo;

    public function __construct() {
        $this->modelo = new Modelo();
    }

    public function manejarPeticion() {
        $accion = isset($_GET['accion']) ? $_GET['accion'] : 'listar';
        
        switch ($accion) {
            case 'listar':
                $this->listarRevistas();
                break;
            case 'registrar':
                $this->registrarRevista();
                break;
            case 'editar':
                $this->editarRevista();
                break;
            case 'eliminar':
                $this->eliminarRevista();
                break;
            default:
                $this->listarRevistas();
                break;
        }
    }

    public function listarRevistas() {
        $revistas = $this->modelo->obtenerRevistas();
        include './vista/listar.php';
    }

    public function registrarRevista() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $titulo = $_POST['titulo'];
            $editorial = $_POST['editorial'];
            $fechaPublicacion = $_POST['fechaPublicacion'];
            $this->modelo->crearRevista($titulo, $editorial, $fechaPublicacion);
            header("Location: index.php?accion=listar");
            exit();
        }
        include './vista/registro.php';
    }

    public function editarRevista() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $titulo = $_POST['titulo'];
            $editorial = $_POST['editorial'];
            $fechaPublicacion = $_POST['fechaPublicacion'];
            $this->modelo->actualizarRevista($id, $titulo, $editorial, $fechaPublicacion);
            header("Location: index.php?accion=listar");
            exit();
        }
        $id = $_GET['id'];
        $revista = $this->modelo->obtenerRevistaPorId($id);
        include './vista/editar.php';
    }

    public function eliminarRevista() {
        $id = $_GET['id'];
        $this->modelo->eliminarRevista($id);
        header("Location: index.php?accion=listar");
        exit();
    }
}
?>