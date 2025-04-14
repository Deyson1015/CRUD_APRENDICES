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
        
                if ($id !== false and is_numeric($id)) {
                    header("Location:show.php?id_aprendiz=" . $id);
                    exit();
                } else {
                    exit(); 
                }
            } catch (Exception $e) {
                return "Error general: " . $e->getMessage();
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
                if ($this->aprendizModel->delete($id)) {
                    header("Location: /CRUD_APRENDICES/view/aprendices/show.php");
                    exit;
                } else {
                    header("Location: /CRUD_APRENDICES/view/aprendices/show.php?error=1");
                    exit;
                }
            } catch (Exception $e) {
                return "Error: " . $e->getMessage();  
                exit;
            }
        }
        
    }
?>