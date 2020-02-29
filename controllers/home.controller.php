<?php
    require_once('./models/alumno.model.php');
    require_once('./models/materia.model.php');
    require_once('./models/alumno-materia.model.php');

    // VARIABLE PARA guardarCalificacion, inscripcionMateria, buscarAlumno
    $codigoAlum = isset($_POST['codigoAlum'])? $_POST['codigoAlum']: null;
    // VARIABLE PARA guardarCalificacion, inscripcionMateria, buscarMateria
    $codigoMateria = isset($_POST['codigoMateria'])? $_POST['codigoMateria']: null;
    // VARIABLE PARA consultaMateriasInscritas, bajaMateria
    $codigoAlumno = isset($_POST['codigoAlumno'])? $_POST['codigoAlumno']: null;
    // VARIABLE PARA bajaMateria
    $codigoMate = isset($_POST['codigoMate'])? $_POST['codigoMate']: null;
    // VARIABLE PARA guardarCalificacion
    $calificacion = isset($_POST['calificacion'])? $_POST['calificacion']: null;
    // VARIABLE PARA validaGuardarCalificacion
    $codAlum = isset($_POST['codAlum'])? $_POST['codAlum']: null;
    
    // INSTANCIAMOS LAS CLASES QUE UTILIZAREMOS
    $alumno = new Alumno;
    $materia = new Materia;
    $alumnoMateria = new AlumnoMateria;

    // OBTENEMOS LA CLAVE DE LOS ALUMNOS EN LA BASE DE DATOS PARA MOSTARLOS EN UN SELECT
    $getAlumnos = $alumno->getAlumnos();
    // OBTENEMOS LA CLAVE DE LAS MATERIAS EN LA BASE DE DATOS PARA MOSTARLOS EN UN SELECT
    $getMaterias = $materia->getMaterias();
    // OBTENEMOS LA CLAVE DE LOS ALUMNOS QUE TENGAN MATERIAS INSCRITAS EN LA BASE DE DATOS PARA MOSTARLOS EN UN SELECT
    $alumnosConMaterias = $alumnoMateria->alumnosConMaterias();

    // PETICIONES AJAX
    if($codigoAlum != null && $codigoMateria != null && $calificacion != null){
        $guardarCalificacion = $alumnoMateria->guardarCalificacion($codigoAlum, $codigoMateria, $calificacion);
        echo $guardarCalificacion;
    }elseif($codigoAlum != null && $codigoMateria != null){
        $inscripcionMateria = $alumnoMateria->inscripcionMateria($codigoAlum,$codigoMateria);
        echo $inscripcionMateria;
    }elseif($codigoAlum != null){
        $bAlumno = $alumno->buscarAlumno($codigoAlum);
        echo json_decode($bAlumno, true);
    }elseif($codigoMateria != null){
        $bMateria = $materia->buscarMateria($codigoMateria);
        echo json_decode($bMateria, true);
    }elseif($codigoAlumno != null && $codigoMate != null){
        $bajaMateria = $alumnoMateria->bajaMateria($codigoAlumno, $codigoMate);
        echo $bajaMateria;
    }elseif($codigoAlumno != null){
        $consultaMateriasInscritas = $alumnoMateria->consultaMateriasInscritas($codigoAlumno);
        echo json_encode($consultaMateriasInscritas, true);
    }elseif($codAlum != null){
        $validaGuardarCalificacion = $alumnoMateria->validaGuardarCalificacion($codAlum);
        echo json_encode($validaGuardarCalificacion, true);
    }
    
    require_once('./views/home.view.php');
