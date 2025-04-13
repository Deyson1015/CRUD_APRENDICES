<?php

class Aprendizmodel

{ 
    private PDO $conn;

    public function __construct()
    {
        require_once("C://laragon/www/CRUD_APRENDICES/database/conexion.php");
        $this->conn = (new Database())->getConnection();
    }

    public function verAprendices()
    {   
        try {
            $query = "SELECT 
                a.id, 
                a.primer_nombre, 
                a.primer_apellido, 
                td.tipo AS Tipo_documento,
                a.documento, 
                a.telefono,
                a.correo,
                a.fecha_nacimiento,
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
            $sql = " SELECT 
                    a.id,
                    a.primer_nombre,
                    a.segundo_nombre,
                    a.primer_apellido,
                    a.segundo_apellido,
                    td.tipo AS Tipo_documento,
                    a.documento,
                    a.telefono,
                    a.correo,
                    a.fecha_nacimiento,
                    g.genero,
                    gp.grupo AS grupo_sanguineo,
                    pf.nombre AS programa_formacion,
                    pf.nivel,
                    ap.fecha_inicio,
                    ap.fecha_fin
                FROM aprendiz_programa AS ap
                JOIN aprendices AS a ON ap.id_aprendiz = a.id
                JOIN programa_formacion AS pf ON ap.id_programa_formacion = pf.id
                JOIN generos AS g ON a.id_genero = g.id
                JOIN tipo_documento AS td ON a.id_tipo_documento = td.id
                JOIN grupo_sanguineo AS gp ON a.id_grupo_sanguineo = gp.id
                WHERE a.id = :id ";
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
    
    public function asignarPrograma($id_aprendiz, $id_programa, $fecha_inicio, $fecha_fin) {
        $query = "INSERT INTO aprendiz_programa (id_aprendiz, id_programa, fecha_inicio, fecha_fin) 
        VALUES (:id_aprendiz, :id_programa, :fecha_inicio, :fecha_fin)";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id_aprendiz', $id_aprendiz);
        $stmt->bindParam(':id_programa', $id_programa);
        $stmt->bindParam(':fecha_inicio', $fecha_inicio);
        $stmt->bindParam(':fecha_fin', $fecha_fin);
        return $stmt->execute();
    }

    public function verGeneros()
    {
        try {
            $query = "SELECT * FROM generos";
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            throw new Exception("Error al obtener los géneros: " . $e->getMessage());
        }
    }

    public function verTipoDocumento()
    {
        try {
            $query = "SELECT * FROM tipo_documento";
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            throw new Exception("Error al obtener los tipos de documento: " . $e->getMessage());
        }
    }

    public function verGrupoSanguineo()
    {
        try {
            $query = "SELECT * FROM grupo_sanguineo";
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            throw new Exception("Error al obtener los grupos sanguíneos: " . $e->getMessage());
        }
    }
    
    public function verProgramaFormacion()
    {
        try {
            $query = "SELECT * FROM programa_formacion";
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            throw new Exception("Error al obtener los programas de formación: " . $e->getMessage());
        }
    }


    public function crearAprendiz($data)
    {
        $query = "INSERT INTO aprendices 
            (primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, id_tipo_documento, documento, telefono, correo, fecha_nacimiento, id_genero, id_grupo_sanguineo) 
            VALUES 
            (:primer_nombre, :segundo_nombre, :primer_apellido, :segundo_apellido, :id_tipo_documento, :documento, :telefono, :correo, :fecha_nacimiento, :id_genero, :id_grupo_sanguineo)";
    
        $stmt = $this->conn->prepare($query);
    
        $stmt->bindParam(":primer_nombre", $data['primer_nombre']);
        $stmt->bindParam(":segundo_nombre", $data['segundo_nombre']);
        $stmt->bindParam(":primer_apellido", $data['primer_apellido']);
        $stmt->bindParam(":segundo_apellido", $data['segundo_apellido']);
        $stmt->bindParam(":id_tipo_documento", $data['id_tipo_documento']);
        $stmt->bindParam(":documento", $data['documento']);
        $stmt->bindParam(":telefono", $data['telefono']);
        $stmt->bindParam(":correo", $data['correo']);
        $stmt->bindParam(":fecha_nacimiento", $data['fecha_nacimiento']);
        $stmt->bindParam(":id_genero", $data['id_genero']);
        $stmt->bindParam(":id_grupo_sanguineo", $data['id_grupo_sanguineo']);
    
        return ($stmt->execute()) ? $this->conn->lastInsertId() : false;
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
                telefono = :telefono,
                correo = :correo,
                fecha_nacimiento = :fecha_nacimiento, 
                id_genero = :id_genero, 
                id_grupo_sanguineo = :id_grupo_sanguineo 
                WHERE id = :id";
    
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(":id", $id);
            $stmt->bindParam(":primer_nombre", $data['primer_nombre']);
            $stmt->bindParam(":segundo_nombre", $data['segundo_nombre']);
            $stmt->bindParam(":primer_apellido", $data['primer_apellido']);
            $stmt->bindParam(":segundo_apellido", $data['segundo_apellido']);
            $stmt->bindParam(":id_tipo_documento", $data['id_tipo_documento']);
            $stmt->bindParam(":documento", $data['documento']);
            $stmt->bindParam(":telefono", $data['telefono']);
            $stmt->bindParam(":correo", $data['correo']);
            $stmt->bindParam(":fecha_nacimiento", $data['fecha_nacimiento']);
            $stmt->bindParam(":id_genero", $data['id_genero']);
            $stmt->bindParam(":id_grupo_sanguineo", $data['id_grupo_sanguineo']);
            return ($stmt->execute()) ? true : false;
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



