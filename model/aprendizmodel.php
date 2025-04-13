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
                $sql = "SELECT
                a.id, 
                a.primer_nombre, 
                a.primer_apellido, 
                td.tipo AS Tipo_documento,
                a.documento, 
                a.telefono,
                a.correo,
                TIMESTAMPDIFF(YEAR, a.fecha_nacimiento, CURDATE()) AS edad,
                g.genero, 
                gp.grupo AS Grupo_sanguineo
            FROM aprendices AS a
            JOIN generos AS g ON a.id_genero = g.id
            JOIN tipo_documento AS td ON a.id_tipo_documento = td.id
            JOIN grupo_sanguineo AS gp ON a.id_grupo_sanguineo = gp.id
            ORDER BY a.id DESC";

            $stmt = $this->conn->prepare($sql);
            return $stmt->execute() ? $stmt->fetchAll(PDO::FETCH_ASSOC) : false;
        } catch (Exception $e) {
            return "Error al obtener los aprendices: " . $e->getMessage();
        }
    }

    public function show($id)
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
                WHERE a.id = :id limit 1 ";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            return ($stmt->execute()) ? $stmt->fetch(PDO::FETCH_ASSOC) : false;
        } catch (Exception $e) {
           return "Error al obtener el aprendiz: " . $e->getMessage();
        }
          
    }
    
    public function asignarPrograma($id_aprendiz, $id_programa, $fecha_inicio, $fecha_fin)
    {
        try {
            $sql = "INSERT INTO aprendiz_programa (id_aprendiz, id_programa_formacion, fecha_inicio, fecha_fin)
            VALUES (:id_aprendiz, :id_programa, :fecha_inicio, :fecha_fin)";

            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id_aprendiz', $id_aprendiz);
            $stmt->bindParam(':id_programa', $id_programa);
            $stmt->bindParam(':fecha_inicio', $fecha_inicio);
            $stmt->bindParam(':fecha_fin', $fecha_fin);
            return ($stmt->execute()) ? true : false;
        } catch (Exception $e) {
            return "Error al asignar el programa: " . $e->getMessage();
        }
    }

    public function verGeneros()
    {
        try {
            $sql = "SELECT * FROM generos";
            $stmt = $this->conn->prepare($sql);
            return $stmt->execute() ? $stmt->fetchAll(PDO::FETCH_ASSOC) : false;
        } catch (Exception $e) {
           return "Error al obtener los géneros: " . $e->getMessage();
        }
    }

    public function verTipoDocumento()
    {
        try {
            $sql = "SELECT * FROM tipo_documento";
            $stmt = $this->conn->prepare($sql);
            return $stmt->execute() ? $stmt->fetchAll(PDO::FETCH_ASSOC) : false;
        } catch (Exception $e) {
            return "Error al obtener los tipos de documento: " . $e->getMessage();
        }
    }

    public function verGrupoSanguineo()
    {
        try {
            $sql = "SELECT * FROM grupo_sanguineo";
            $stmt = $this->conn->prepare($sql);
            return $stmt->execute() ? $stmt->fetchAll(PDO::FETCH_ASSOC) : false;
        } catch (Exception $e) {
            return "Error al obtener los grupos sanguíneos: " . $e->getMessage();
        }
    }
    
    public function verProgramaFormacion()
    {
        try {
            $sql = "SELECT * FROM programa_formacion";
            $stmt = $this->conn->prepare($sql);
            return $stmt->execute() ? $stmt->fetchAll(PDO::FETCH_ASSOC) : false;
        } catch (Exception $e) {
            return "Error al obtener los programas de formación: " . $e->getMessage();
        }
    }


    public function crearAprendiz($data)
    {
        try {
            $sql = "INSERT INTO aprendices
                (primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, id_tipo_documento, documento, telefono, correo, fecha_nacimiento, id_genero, id_grupo_sanguineo) 
                VALUES (:primer_nombre, :segundo_nombre, :primer_apellido, :segundo_apellido, :id_tipo_documento, :documento, :telefono, :correo, :fecha_nacimiento, :id_genero, :id_grupo_sanguineo)";
        
            $stmt = $this->conn->prepare($sql);
        
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
        } catch (Exception $e) {
            return "Error al crear el aprendiz: " . $e->getMessage();
        }
    }
    

    public function actualizarAprendiz( $id, $data)
    {
        try {
            $sql = "UPDATE aprendices SET
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
    
            $stmt = $this->conn->prepare($sql);
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
           return "Error al actualizar el aprendiz: " . $e->getMessage();
        }
    }

    public function eliminarAprendiz($id)
    {
        try {
            $sql = "DELETE FROM aprendices WHERE id = :id";
            $stmt = $this->conn->prepare($sql); 
            return $stmt->execute([':id' => $id]) ? true : false;
        } catch (Exception $e) {
            return "Error al eliminar el aprendiz: " . $e->getMessage();
        }
    }
}



