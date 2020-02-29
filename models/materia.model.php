<?php
    require_once('models/conexion.model.php');
    class Materia extends Conexion{
        private $stmt;

        public function __construct(){
            parent::__construct();
        }

        public function getMaterias(){
            $query = "SELECT vchCodigoMateria FROM cat_materias";
            $this->stmt = $this->conexion->query($query);
            $this->stmt->execute();
            return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function buscarMateria($id){
            $query = "SELECT * FROM cat_materias WHERE vchCodigoMateria = ?";
            $this->stmt = $this->conexion->prepare($query);
            $this->stmt->bindParam(1, $id, PDO::PARAM_STR);
            $this->stmt->execute();
            $result = $this->stmt->fetch(PDO::FETCH_ASSOC);
            die(json_encode($result));
        }
    }