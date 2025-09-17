<?php

class Conexion {
    private $servidor = "localhost";
    private $usuario = "root";
    private $contraseña = "";
    private $nombre_bd = "revistas"; // Reemplaza con el nombre de tu base de datos

    public function conectar() {
        try {
            $dsn = "mysql:host={$this->servidor};dbname={$this->nombre_bd}";
            $pdo = new PDO($dsn, $this->usuario, $this->contraseña);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (PDOException $e) {
            echo "Error de conexión: " . $e->getMessage();
            die();
        }
    }
}
?>