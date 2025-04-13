<?php
    class AprendizController
    {
        private $aprendizModel;

        public function __construct()
        {
            require_once("C://laragon/www/CRUD_APRENDICES/model/aprendizmodel.php");
            $this->aprendizModel = new AprendizModel();
        }

        public function guardarAprendiz($data) {
            try{
                $id = $this->aprendizModel->crearAprendiz($data);
                return($id!=false) ? header("Location:show.php?id_aprendiz=". $id) : header("Location:crear.php"); 

                if ($id) {  
                    $this->aprendizModel->asignarPrograma(
                    $id_aprendiz, 
                    $data['programa'],
                    $data['fecha_inicio'],
                    $data['fecha_fin']
                );
                    
                }
            header("Location: index.php"); // Redirigir a la página principal después de crear el aprendiz
            } catch (Exception $e) {
                return "Error: " . $e->getMessage();        
            }
        }


        public function show($id) {
            try {
                return ($this->aprendizModel->show($id) != false) ? $this->aprendizModel->show($id) : header("Location: index.php");
            } catch (Exception $e) {
                return "Error: " . $e->getMessage();        
            }
        }

        public function index() {
            try {
                return ($this->aprendizModel->index()) ? $this->aprendizModel->index() : false;
            } catch (Exception $e) {
                return "Error: " . $e->getMessage();
            }

            
    
        }
    }
      

?>