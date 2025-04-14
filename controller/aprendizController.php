<?php
    class AprendizController
    {
        private $aprendizModel;

        public function __construct()
        {
            require_once("C://xampp/htdocs/CRUD_APRENDICES/model/aprendizmodel.php");
            $this->aprendizModel = new AprendizModel();
        }

        public function guardarAprendiz($data) {
            try {
                $id = $this->aprendizModel->crearAprendiz($data);
        
                if ($id !== false && is_numeric($id)) {
                    header("Location:show.php?id_aprendiz=" . $id);
                    exit();
                } else {
                    echo "<pre>";
                    print_r($id); // Si es un string con mensaje de error, lo mostrará
                    echo "</pre>";
                    exit(); // Detiene para que no redirija a crear.php
                }
            } catch (Exception $e) {
                echo "Error general: " . $e->getMessage();
                exit();
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
                $rows = $this->aprendizModel->index();
                return $rows ? $rows : false;
            } catch (Exception $e) {
                return "Error: " . $e->getMessage();
            }
        }

        public function update($id, $data) {
            try {
                return ($this->aprendizModel->update($id, $data)) ? header("Location: show.php?id=". $id) : header("Location: index.php");
            } catch (Exception $e) {
                return "Error: " . $e->getMessage();        
            }
        }

        public function delete($id) {
            try {
                return ($this->aprendizModel->delete($id)) ? header("Location: index.php") : header("Location: show.php?id=". $id);
            } catch (Exception $e) {
                return "Error: " . $e->getMessage();        
            }
        }
    }
?>