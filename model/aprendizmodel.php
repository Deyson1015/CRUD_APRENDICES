<?php
require_once __DIR__ . '/../database/conexion.php';

class Aprendiz

{ 
    private PDO $conn;

    public function __construct()
    {
        $this->conn = (new Database())->getConnection();
    }

    public function verAprendices()
    {   
        try {
            $query = "SELECT 
                a.id, 
                a.primer_nombre, 
                a.segundo_nombre, 
                a.primer_apellido, 
                a.segundo_apellido, 
                td.tipo AS Tipo_documento,
                a.documento, 
                g.genero, 
                gp.grupo AS Grupo_sanguineo
            FROM aprendices AS a
            JOIN generos AS g ON a.id_genero = g.id
            JOIN tipo_documento AS td ON a.id_tipo_documento = td.id
            JOIN grupo_sanguineo AS gp ON a.id_grupo_sanguineo = gp.id"; 

            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            throw new Exception("Error al obtener los aprendices: " . $e->getMessage());
        }
    }

    public function obtenerAprendiz($id)
    {
        try {
            $sql = "SELECT * FROM aprendices WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            $aprendiz = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($aprendiz) {
                return $aprendiz;
            } else {
                throw new Exception("Aprendiz no encontrado.");
            }
        } catch (Exception $e) {
            throw new Exception("Error al obtener el aprendiz: " . $e->getMessage());
        }
          
    }
    

    public function crearAprendiz($data)
    {
        $query = "INSERT INTO aprendices (primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, id_tipo_documento, documento, id_genero, id_grupo_sanguineo) 
                  VALUES (:primer_nombre, :segundo_nombre, :primer_apellido, :segundo_apellido, :id_tipo_documento, :documento, :id_genero, :id_grupo_sanguineo)";
    
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([
            ':primer_nombre' => $data['primer_nombre'],
            ':segundo_nombre' => $data['segundo_nombre'],
            ':primer_apellido' => $data['primer_apellido'],
            ':segundo_apellido' => $data['segundo_apellido'],
            ':id_tipo_documento' => $data['id_tipo_documento'],
            ':documento' => $data['documento'],
            ':id_genero' => $data['id_genero'],
            ':id_grupo_sanguineo' => $data['id_grupo_sanguineo']
        ]);
        
    }

    public function actualizarAprendiz( $id, $data)
    {
        try {
            $query = "UPDATE aprendices SET 
                primer_nombre = :primer_nombre, 
                segundo_nombre = :segundo_nombre, 
                primer_apellido = :primer_apellido, 
                segundo_apellido = :segundo_apellido, 
                id_tipo_documento = :id_tipo_documento, 
                documento = :documento, 
                id_genero = :id_genero, 
                id_grupo_sanguineo = :id_grupo_sanguineo 
                WHERE id = :id";
    
            $stmt = $this->conn->prepare($query);
            return $stmt->execute([
                ':id' => $id,
                ':primer_nombre' => $data['primer_nombre'],
                ':segundo_nombre' => $data['segundo_nombre'],
                ':primer_apellido' => $data['primer_apellido'],
                ':segundo_apellido' => $data['segundo_apellido'],
                ':id_tipo_documento' => $data['id_tipo_documento'],
                ':documento' => $data['documento'],
                ':id_genero' => $data['id_genero'],
                ':id_grupo_sanguineo' => $data['id_grupo_sanguineo']
            ]);
        } catch (Exception $e) {
            throw new Exception("Error al actualizar el aprendiz: " . $e->getMessage());
        }
    }

    public function eliminarAprendiz($id)
    {
        try {
            $query = "DELETE FROM aprendices WHERE id = :id";
            $stmt = $this->conn->prepare($query);
            return $stmt->execute([':id' => $id]);
        } catch (Exception $e) {
            throw new Exception("Error al eliminar el aprendiz: " . $e->getMessage());
        }
    }
}



$aprendiz = new Aprendiz();
$aprendiz->eliminarAprendiz(3);
$lista = $aprendiz->verAprendices();
foreach ($lista as $aprendiz) {
    echo $aprendiz['primer_nombre'] . " " . $aprendiz['primer_apellido'] . "<br>";
}


