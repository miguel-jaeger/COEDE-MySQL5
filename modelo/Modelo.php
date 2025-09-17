<?php

require_once 'Conexion.php';

class Modelo {
    private $conexion;
    private $table_name = "revistas";

    public function __construct() {
        $this->conexion = (new Conexion())->conectar();
    }

    public function crearRevista($titulo, $editorial, $fechaPublicacion) {
        $sql = "INSERT INTO {$this->table_name} (titulo, editorial, fechaPublicacion) VALUES (?, ?, ?)";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute([$titulo, $editorial, $fechaPublicacion]);
    }

    public function obtenerRevistas() {
        $sql = "SELECT * FROM {$this->table_name}";
        $stmt = $this->conexion->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function obtenerRevistaPorId($id) {
        $sql = "SELECT * FROM {$this->table_name} WHERE id = ?";
        $stmt = $this->conexion->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function actualizarRevista($id, $titulo, $editorial, $fechaPublicacion) {
        $sql = "UPDATE {$this->table_name} SET titulo = ?, editorial = ?, fechaPublicacion = ? WHERE id = ?";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute([$titulo, $editorial, $fechaPublicacion, $id]);
    }

    public function eliminarRevista($id) {
        $sql = "DELETE FROM {$this->table_name} WHERE id = ?";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute([$id]);
    }
}
?>