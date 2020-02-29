let url = window.location.pathname.split("/")[2];

// MODAL
let modal = document.getElementById("myModal");
let x = document.getElementById("snackbar");
let z = document.getElementById("contentAlert");

// MOSTRAMOS EL FORMULARIO DEPENDIENDO DE LA PAGINA SELACCIONADA
switch (url) {
    case "busquedaAlumno":
        document.getElementById("buscarAlumno").style.display = "block";
        break;
    case "busquedaMateria":
        document.getElementById("buscarMateria").style.display = "block";
        break;
    case "inscripcionMateria":
        document.getElementById("inscripcionMateria").style.display = "block";
        break;
    case "consultaMateriasInscritas":
        document.getElementById("consultarMateriasInscritas").style.display = "block";
        break;
    case "guardarCalificacion":
        document.getElementById("guardarCali").style.display = "block";
        break;
    case "bajaMateria":
        document.getElementById("bajaMateri").style.display = "block";
        break;
    default:
        document.getElementById("buscarAlumno").style.display = "block";
        break;
}


let formBuscarAlumno = document.getElementById("formBuscarAlumno");
formBuscarAlumno.addEventListener("submit", (e)=>{
    e.preventDefault();
    dataform = new FormData(formBuscarAlumno); // DATOS DEL FORMULARIO
    let xhr = new XMLHttpRequest();
    xhr.open('POST', 'ajax.php?go=home', true); // ENVIAMOS LA PETICION AJAX A UN MANEJADOR DE PETICIONES AJAX
    xhr.onreadystatechange = function(){
        if (this.readyState == 4 && this.status == 200) {
            let alumno = JSON.parse(this.responseText);
            let tbody = document.getElementById("tableAlumno").children[1];
            if(alumno != false){ // EN CASO DE ENCONTRAR DATOS CON ESE CODIGO DE ALUMNO
                // CARGAMOS LA INFORMACION DEL ALUMNO EN UNA TABLA
                tbody.innerHTML = "<tr><td>"+ alumno.iCodigoAlumno +"</td><td>"+ alumno.vchNombres +"</td><td>"+ alumno.vchApellidos +"</td><td>"+ alumno.dtFechaNac +"</td></tr>";
            }else{
                // NOTIFICAMOS QUE NO SE ENCONTARON RESULTADOS CON ESE CODIGO DE ALUMNO
                tbody.innerHTML = "<tr><td colspan='4'>No se encontraron resultados</td></tr>"
            }
            formBuscarAlumno.reset(); // LIMPIAMOS EL FORMULARIO
        }
    }
    xhr.send(dataform); // ENVIAMOS LOS DATOS DEL FORMULARIO
});

let formBuscarMateria = document.getElementById("formBuscarMateria");
formBuscarMateria.addEventListener("submit", (e)=>{
    e.preventDefault();
    dataform = new FormData(formBuscarMateria);
    let xhr = new XMLHttpRequest();
    xhr.open('POST', 'ajax.php?go=home', true);
    xhr.onreadystatechange = function(){
        if (this.readyState == 4 && this.status == 200) {
            let materia = JSON.parse(this.responseText);
            let tbody = document.getElementById("tableMateria").children[1];
            if(materia != false){
                tbody.innerHTML = "<tr><td>"+ materia.vchCodigoMateria +"</td><td>"+ materia.vchMateria +"</td></tr>";
            }else{
                tbody.innerHTML = "<tr><td colspan='4'>No se encontraron resultados</td></tr>"
            }
            formBuscarMateria.reset();
        }
    }
    xhr.send(dataform);
});

let inscripcionMaterias = document.getElementById("inscripcionMaterias");
inscripcionMaterias.addEventListener("submit", (e)=>{
    e.preventDefault();
    dataform = new FormData(inscripcionMaterias);
    let xhr = new XMLHttpRequest();
    xhr.open('POST', 'ajax.php?go=home', true);
    xhr.onreadystatechange = function(){
        if (this.readyState == 4 && this.status == 200) {
            if(this.responseText == "El alumno ya está registrado en esta materia"){
                x.style.backgroundColor = "rgba(24, 68, 163, 0.849)";
                
            }else{
                x.style.backgroundColor = "rgba(25, 168, 6, 0.849)";
            }
            x.className = "show";
            z.innerHTML = this.responseText;
            setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
            inscripcionMaterias.reset();
        }
    }
    xhr.send(dataform);
});

let consultaMateriasInscritas = document.getElementById("consultaMateriasInscritas");
consultaMateriasInscritas.addEventListener("submit", (e)=>{
    e.preventDefault();
    dataform = new FormData(consultaMateriasInscritas);
    let xhr = new XMLHttpRequest();
    xhr.open('POST', 'ajax.php?go=home', true);
    xhr.onreadystatechange = function(){
        if (this.readyState == 4 && this.status == 200) {
            let matInsc = JSON.parse(this.responseText);
            let tbody = document.getElementById("tableConsultMateriasInscritas").children[1];
            if(matInsc != false){
                let rows = "";
                matInsc.forEach(mi => {
                    rows +="<tr><td>"+ mi.iCodigoAlumno +"</td><td>"+ mi.vchNombres +"</td><td>"+ mi.vchApellidos +"</td><td>"+ mi.dtFechaNac +"</td><td>"+ mi.vchCodigoMateria +"</td><td>"+ mi.vchMateria +"</td><td>"+ mi.fCalificacion +"</td></tr>";
                });
                tbody.innerHTML = rows;
            }else{
                tbody.innerHTML = "<tr><td colspan='7'>El alumno no está inscrito en ninguna materia</td></tr>"
            }
            consultaMateriasInscritas.reset();
        }
    }
    xhr.send(dataform);
});

let guardarCalificacion = document.getElementById("guardarCalificacion");
guardarCalificacion.addEventListener("submit", (e)=>{
    e.preventDefault();
    dataform = new FormData(guardarCalificacion);
    let xhr = new XMLHttpRequest();
    xhr.open('POST', 'ajax.php?go=home', true);
    xhr.onreadystatechange = function(){
        if (this.readyState == 4 && this.status == 200) {
            x.style.backgroundColor = "rgba(25, 168, 6, 0.849)";
            x.className = "show";
            z.innerHTML = this.responseText;
            setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
            guardarCalificacion.reset();
        }
    }
    xhr.send(dataform);
});

let bajaMateria = document.getElementById("bajaMateria");
bajaMateria.addEventListener("submit", (e)=>{
    e.preventDefault();
    dataform = new FormData(bajaMateria);
    let xhr = new XMLHttpRequest();
    xhr.open('POST', 'ajax.php?go=home', true);
    xhr.onreadystatechange = function(){
        if (this.readyState == 4 && this.status == 200) {
            bajaMateria.reset();
            x.style.backgroundColor = "rgba(25, 168, 6, 0.849)";
            x.className = "show";
            z.innerHTML = this.responseText;
            setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
        }
    }
    xhr.send(dataform);
});

// VALIDA QUE AL GUARDAR CALIFICACION EL ALUMNO ELEGIDO TENGA INSCRITAS LA MATERIA PREVIAMENTE
// VALIDA QUE AL DAR DE BAJA UNA MATERIA EL ALUMNO TENGA INSCRITA LA MATERIA PREVIAMENTE
function validarAlumnoMateria(codAlum, formulario){
    let xhr = new XMLHttpRequest();
    xhr.open('POST', 'ajax.php?go=home', true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function(){
        if (this.readyState == 4 && this.status == 200) {
            let materias = JSON.parse(this.responseText);
            let options = "<option value=''>Elige un código de materia</option>";
            materias.forEach(m => {
                options += "<option value='"+m.vchCodigoMateria+"'>"+ m.vchCodigoMateria +"</option>"
            });
            formulario.children[1].children[1].innerHTML = options;
        }
    }
    xhr.send('codAlum='+codAlum);
}

// AL SELECCIONAR UN CODIGO DE ALUMNO EN LA OPCION DE "GUARDAR CALIFICACION" CARGA EL SELECT DE CODIGO DE MATERIA CON LAS MATERIAS QUE TIENE EL ALUMNO PREVIAMENTE REGISTRADAS
let codigoAlumno = document.getElementById('codigoAlumno');
codigoAlumno.addEventListener("change", ()=>{
    if(codigoAlumno.value != ""){
        validarAlumnoMateria(codigoAlumno.value, guardarCalificacion);
    }else{
        guardarCalificacion.children[1].children[1].innerHTML = "<option value=''>Elige un código de materia</option>";
    }
});

// AL SELECCIONAR UN CODIGO DE ALUMNO EN LA OPCION DE "DAR DE BAJA MATERIA" CARGA EL SELECT DE CODIGO DE MATERIA CON LAS MATERIAS QUE TIENE EL ALUMNO PREVIAMENTE REGISTRADAS
let codiAlumn =  document.getElementById("codiAlumn");
codiAlumn.addEventListener("change", ()=>{
    if(codiAlumn.value != ""){
        validarAlumnoMateria(codiAlumn.value, bajaMateria);
    }else{
        bajaMateria.children[1].children[1].innerHTML = "<option value=''>Elige un código de materia</option>";
    }
});

