<?php require_once('./views/templates/navbar.php'); ?>

<div class="container contenido">

    <!-- BUSCAR ALUMNO -->
    <div id="buscarAlumno">
        <h3 class="text-center">Buscar alumno</h3>
        <form class="form-inline" id="formBuscarAlumno">
            <div class="form-group m-auto">
                <label class="mr-2" for="codigoAlum">Código de alumno:</label>
                <input type="text" name="codigoAlum" class="form-control" id="codigoAlum" placeholder="Código de alumno" required>
            </div>
            <div class="form-group col-12 d-flex justify-content-center">
                <button type="submit" class="btn btn-primary my-3">Buscar</button>
            </div>
        </form>
        <table class="table text-center table-responsive-md" id="tableAlumno">
            <thead class="thead-dark">
                <tr>
                    <th>Código</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Fecha de nacimiento</th>
                </tr>
            </thead>
            <tbody>
    
            </tbody>
        </table>
    </div>

    <!-- BUSCAR MATERIA -->
    <div id="buscarMateria">
        <h3 class="text-center">Buscar materia</h3>
        <form class="form-inline" id="formBuscarMateria">
            <div class="form-group m-auto">
                <label class="mr-2" for="codigoMateria">Código de materia:</label>
                <input type="text" name="codigoMateria" class="form-control" placeholder="Código de materia" required>
            </div>
            <div class="form-group col-12 d-flex justify-content-center">
                <button type="submit" class="btn btn-primary my-3">Buscar</button>
            </div>
        </form>
        <table class="table text-center table-responsive-md" id="tableMateria">
            <thead class="thead-dark">
                <tr>
                    <th>Código</th>
                    <th>Materia</th>
                </tr>
            </thead>
            <tbody>
    
            </tbody>
        </table>
    </div>

    <!-- INSCRIPCION DE MATERIAS -->
    <div id="inscripcionMateria">
        <h3 class="text-center">Inscripción de materias</h3>
        <form class="form-inline" id="inscripcionMaterias">
            <div class="form-group m-auto">
                <label class="mr-2" for="codigoAlumno">Código de alumno:</label>
                <select name="codigoAlum" required>
                    <option value="">Elige un código de alumno</option>
                    <?php foreach($getAlumnos AS $a):?>
                    <option value="<?php echo $a['iCodigoAlumno']; ?>"><?php echo $a['iCodigoAlumno']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group mx-auto my-2">
                <label class="mr-2" for="codigoMat">Código de materia:</label>
                <select name="codigoMateria" id="codigoMat" required>
                    <option value="">Elige un código de materia</option>
                    <?php foreach($getMaterias AS $m): ?>
                    <option value="<?php echo $m['vchCodigoMateria']; ?>"><?php echo $m['vchCodigoMateria']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group col-12 d-flex justify-content-center">
                <button type="submit" class="btn btn-primary my-3">Agregar</button>
            </div>
        </form>
    </div>

    <!-- CONSULTAR MATERIAS INSCRITAS -->
    <div id="consultarMateriasInscritas">
        <h3 class="text-center">Consultar materias inscritas</h3>
        <form class="form-inline" id="consultaMateriasInscritas">
            <div class="form-group m-auto">
                <label class="mr-2" for="codigoAlumn">Código de alumno:</label>
                <select name="codigoAlumno" required>
                    <option value="">Elige un código de alumno</option>
                    <?php foreach($getAlumnos AS $a):?>
                    <option value="<?php echo $a['iCodigoAlumno']; ?>"><?php echo $a['iCodigoAlumno']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group col-12 d-flex justify-content-center">
                <button type="submit" class="btn btn-primary my-3">Consultar</button>
            </div>
        </form>
        <table class="table text-center table-responsive-md" id="tableConsultMateriasInscritas">
            <thead class="thead-dark">
                <tr>
                    <th>Código alumno</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Fecha de nacimiento</th>
                    <th>Código materia</th>
                    <th>Materia</th>
                    <th>Calificación obtenida</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>

    <!-- GUARDAR CALIFICACION -->
    <div id="guardarCali">
        <h3 class="text-center">Guardar calificación</h3>
        <form class="form-inline" id="guardarCalificacion">
            <div class="form-group m-auto">
                <label class="mr-2" for="codAlum">Código de alumno:</label>
                <select name="codigoAlum" id="codigoAlumno" required>
                    <option value="">Elige un código de alumno</option>
                    <?php foreach($alumnosConMaterias AS $a):?>
                    <option value="<?php echo $a['iCodigoAlumno']; ?>"><?php echo $a['iCodigoAlumno']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group mx-auto my-2">
                <label class="mr-2" for="codMate">Código de materia:</label>
                <select name="codigoMateria" id="codigoMateria" required>
                    <option value="">Elige un código de materia</option>
                </select>
            </div>
            <div class="form-group mx-auto my-2">
                <label class="mr-2" for="calificacion">Calificación:</label>
                <input type="text" name="calificacion" id="calificacion" placeholder="Calificación" required>
            </div>
            <div class="form-group col-12 d-flex justify-content-center">
                <button type="submit" class="btn btn-primary my-3">Guardar</button>
            </div>
        </form>
    </div>

    <!-- DAR DE BAJA MATERIA -->
    <div id="bajaMateri">
        <h3 class="text-center">Dar de baja materia</h3>
        <form class="form-inline" id="bajaMateria">
            <div class="form-group m-auto">
                <label class="mr-2" for="codAlumn">Código de alumno:</label>
                <select name="codigoAlumno" id="codiAlumn" required>
                    <option value="">Elige un código de alumno</option>
                    <?php foreach($alumnosConMaterias AS $a):?>
                    <option value="<?php echo $a['iCodigoAlumno']; ?>"><?php echo $a['iCodigoAlumno']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group mx-auto my-2">
                <label class="mr-2" for="codMate">Código de materia:</label>

                <select name="codigoMate" id="codMate" required>
                    <option value="">Elige un código de materia</option>
                </select>
            </div>
            <div class="form-group col-12 d-flex justify-content-center">
                <button type="submit" class="btn btn-danger my-3">Eliminar</button>
            </div>
        </form>
    </div>
    <div id="snackbar"><p id="contentAlert"></p></div>
</div>

<script src="./html/js/js.js"></script>
<?php require_once('./views/templates/footer.php'); ?>