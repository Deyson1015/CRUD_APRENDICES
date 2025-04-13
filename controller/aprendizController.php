<?php
    class AprendizController
    {
        private $aprendizModel;

        public function __construct()
        {
            require_once("C://laragon/www/CRUD_APRENDICES/model/aprendizmodel.php");
            $this->aprendizModel = new AprendizModel();
        }

        public function crearAprendiz($data) {
            $id_aprendiz = $this->aprendizModel->crearAprendiz($data);
            return($id_aprendiz!=false) ? header("Location:show.php?id_aprendiz=". $id_aprendiz) : header("Location:crear.php"); 

            if ($id_aprendiz) {  
                $this->aprendizModel->asignarPrograma(
                $id_aprendiz, 
                $data['programa'],
                $data['fecha_inicio'],
                $data['fecha_fin']
            );
                
            }
        header("Location: index.php"); // Redirigir a la página principal después de crear el aprendiz
        }


        public function verAprendices()
        {
            try {
                return $this->aprendizModel->verAprendices();
            } catch (Exception $e) {
                echo "Error: " . $e->getMessage();
            }
        }

        public function obtenerAprendiz($id)
        {
            try {
                return $this->aprendizModel->obtenerAprendiz($id);
            } catch (Exception $e) {
                echo "Error: " . $e->getMessage();
            }
        }
    }



?>