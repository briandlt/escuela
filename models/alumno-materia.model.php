<?php
    require_once('models/conexion.model.php');
    class AlumnoMateria extends Conexion{
        private $stmt;

        public function __construct(){
            parent::__construct();
        }

        public function alumnosConMaterias(){
            $query = "SELECT DISTINCT iCodigoAlumno FROM cat_rel_alumno_materia";
            $this->stmt = $this->conexion->query($query);
            $this->stmt->execute();
            return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function inscripcionMateria($idAlumno, $idMateria){
            $query = "SELECT * FROM cat_rel_alumno_materia WHERE iCodigoAlumno = ? AND vchCodigoMateria = ?";
            $this->stmt = $this->conexion->prepare($query);
            $this->stmt->bindParam(1, $idAlumno, PDO::PARAM_INT);
            $this->stmt->bindParam(2, $idMateria, PDO::PARAM_STR);
            $this->stmt->execute();
            if(!$this->stmt->fetch()){
                $query = "INSERT INTO cat_rel_alumno_materia (iCodigoAlumno, vchCodigoMateria)VALUES (?,?)";
                $this->stmt = $this->conexion->prepare($query);
                $this->stmt->bindParam(1, $idAlumno, PDO::PARAM_INT);
                $this->stmt->bindParam(2, $idMateria, PDO::PARAM_STR);
                if($this->stmt->execute()){
                    die("Alumno inscrito satisfactoriamente");
                }
            }else{
                die("El alumno ya está registrado en esta materia");
            }
        }

        public function consultaMateriasInscritas($idAlumno){
            $query = "SELECT cat_alumnos.iCodigoAlumno, cat_alumnos.vchNombres, cat_alumnos.vchApellidos, cat_alumnos.dtFechaNac, cat_materias.vchCodigoMateria, cat_materias.vchMateria, cat_rel_alumno_materia.fCalificacion
            FROM cat_rel_alumno_materia
            JOIN cat_alumnos ON cat_rel_alumno_materia.iCodigoAlumno = cat_alumnos.iCodigoAlumno
            JOIN cat_materias ON cat_rel_alumno_materia.vchCodigoMateria = cat_materias.vchCodigoMateria
            WHERE cat_rel_alumno_materia.iCodigoAlumno = ?";
            $this->stmt = $this->conexion->prepare($query);
            $this->stmt->bindParam(1, $idAlumno, PDO::PARAM_INT);
            $this->stmt->execute();
            $result = $this->stmt->fetchAll(PDO::FETCH_ASSOC);
            die(json_encode($result));
        }

        public function guardarCalificacion($idAlumno, $idMateria, $calificacion){
            $query = "UPDATE cat_rel_alumno_materia SET fCalificacion = ? WHERE iCodigoAlumno = ? AND vchCodigoMateria = ?";
            $this->stmt = $this->conexion->prepare($query);
            $this->stmt->bindParam(1, $calificacion, PDO::PARAM_STR);
            $this->stmt->bindParam(2, $idAlumno, PDO::PARAM_INT);
            $this->stmt->bindParam(3, $idMateria, PDO::PARAM_STR);
            $result = $this->stmt->execute();
            die("Calificación almacenada satisfactoriamente");
        }

        public function bajaMateria($idAlumno, $idMateria){
            $query =  "DELETE FROM cat_rel_alumno_materia WHERE iCodigoAlumno = ? AND vchCodigoMateria = ?";
            $this->stmt = $this->conexion->prepare($query);
            $this->stmt->bindParam(1, $idAlumno, PDO::PARAM_INT);
            $this->stmt->bindParam(2, $idMateria, PDO::PARAM_STR);
            $result = $this->stmt->execute();
            if($result){
                die("Materia dada de bája satisfactoriamente");
            }
        }

        public function validaGuardarCalificacion($idAlumno){
            $query = "SELECT vchCodigoMateria FROM cat_rel_alumno_materia WHERE iCodigoAlumno = ?";
            $this->stmt = $this->conexion->prepare($query);
            $this->stmt->bindParam(1, $idAlumno, PDO::PARAM_INT);
            $this->stmt->execute();
            $result = $this->stmt->fetchAll(PDO::FETCH_ASSOC);
            die(json_encode($result));
        }
    }