<?php
    require_once('models/conexion.model.php');
    class Alumno extends Conexion{
        private $stmt;

        public function __construct(){
            parent::__construct();
        }

        public function getAlumnos(){
            $query = "SELECT iCodigoAlumno FROM cat_alumnos";
            $this->stmt = $this->conexion->query($query);
            $this->stmt->execute();
            return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function buscarAlumno($id){
            $query = "SELECT * FROM cat_alumnos WHERE iCodigoAlumno = ?";
            $this->stmt = $this->conexion->prepare($query);
            $this->stmt->bindParam(1, $id, PDO::PARAM_INT);
            $this->stmt->execute();
            $result = $this->stmt->fetch(PDO::FETCH_ASSOC);
            die(json_encode($result));
        }
    }