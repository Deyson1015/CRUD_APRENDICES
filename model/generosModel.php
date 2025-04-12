<?php
require_once __DIR__ . '/../database/conexion.php';

class Genero
{
    private PDO $conn;

    public function __construct()
    {
        $this->conn = (new Database())->getConnection();
    }

    public function verGeneros()
    {   
        try {
            $query = "SELECT * FROM generos"; 

            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            throw new Exception("Error al obtener los generos: " . $e->getMessage());
        }
    }
}





