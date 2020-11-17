//MODELO

let disco = [{disco: "nombreDisco", cantante: "cantante", año: "1990", tipoMusica: "tipoMusica", localizacion: "localizacion", prestado: "true"}];



//CONTROLADOR

function indexContr() { document.getElementById("main").innerHTML = indexView(disco); };
function newDiscCont() { 
    document.getElementById("main").innerHTML = newDiscView();
}

function guardar() {
    let nombreDisco = document.getElementById("disco").value;
    let cantante = document.getElementById("cantante").value;
    let año = document.getElementById("año").value;
    let tipoMusica = document.getElementById("tipoMusica").value;
    let localizacion = document.getElementById("localizacion").value;
    let prestado = document.getElementById("prestado").value;

    console.log(tipoMusica);

    validar(nombreDisco, cantante, año, tipoMusica, localizacion, prestado);
}

function validar(nombreDisco, cantante, año, tipoMusica, localizacion, prestado) {

    let html = "";

    console.log(tipoMusica.localeCompare("rock") == 0);

    if (nombreDisco.length > 20 || nombreDisco.length == 0) {
        html = "<p>El nombre del disco debe tener 20 caracteres como máximo y es obligatorio</p>";
    } else if (cantante.length > 20 || cantante.length == 0) {
        html = "<p>El cantante del disco debe tener 20 caracteres como máximo y es obligatorio</p>";
    } else if (año.length != 4 || isNaN(año)) {
        html = "<p>El año debe ser un número con 4 dígitos</p>";
    } else if (tipoMusica.localeCompare("rock") != 0 && tipoMusica.localeCompare("indie") != 0 && tipoMusica.localeCompare("pop") != 0 && tipoMusica.localeCompare("punk") != 0) {
        html = "<p>El tipo de musica debe ser rock, pop, indie o punk</p>";
    } else if ( isNaN(localizacion) || (isNaN(localizacion) && localizacion.length == 0)) {
        html = "<p>La localización debe de ser un numero de estantería o estar vacío</p>";
    } else {
        html = "";
        disco.push({disco: nombreDisco, cantante: cantante, año: año, tipoMusica: tipoMusica, localizacion: localizacion, prestado: prestado});
    }

    validarView(html);

}

function vaciar(idElement) {                                        //Vaciar
    document.getElementById(idElement).value = "";
}

function showContr(i) { document.getElementById("main").innerHTML = showDetails(i);};

//VISTA

function indexView(discos) {
    var i = 0, html = "<ul>";
    while (i < discos.length) {
        html = html + `<li id="show" data-my-id="${i}"> ${discos[i].disco}<button id="delete" data-my-id="${i}">Borrar</button></li>`;
        i = i + 1;
    };
    return html + `</ul> <button id="new">Crear</button>`;
};

function mostrar() {
    indexContr();
}

function newDiscView() {
    return `
    <form id="nuevoDiscoForm">
    <label for="disco">Nombre del Disco</label><input type="text" name="disco" id="disco"><br><br>
    <label for="cantante">Grupo de Música o Cantante</label><input type="text" name="cantante" id="cantante"><br><br>
    <label for="año">Año de publicación</label><input type="number" name="año" id="año"><br><br>
    <label for="tipoMusica">Tipo de Música</label><input type="text" name="tipoMusica" id="tipoMusica"><br><br>
    <label for="localizacion">Numero de estantería</label><input type="text" name="localizacion" id="localizacion"><br><br>
    <label for="prestado">Prestado</label>
    <select name="prestado" id="prestado">
        <option value="false">No</option>
        <option value="true">Si</option>
    </select><br><br>
    </form>
    <button id="guardar">Guardar</button>
    <button id="mostrar">Mostrar</button>
    <div id="validacion"></div>`
}

function showDetails (i) {
    return `
    <p>Titulo del disco ${disco[i].disco}</p>
    <p>Cantante del disco ${disco[i].cantante}</p>
    <p>Año del disco ${disco[i].año}</p>
    <p>Tipo de música del disco ${disco[i].tipoMusica}</p>
    <p>Localización del disco ${disco[i].localizacion}</p>
    <p>Prestado: ${disco[i].prestado}</p>
    <p><button id="index"> Volver </button></p>
    `
}

function validarView(html) {
    document.getElementById("validacion").innerHTML = html;
}

//EVENTO
document.addEventListener('DOMContentLoaded', evento => indexContr());
document.addEventListener("click", evento => {
    if (evento.target.matches("#disco")) vaciar("disco");
    else if (evento.target.matches("#cantante")) vaciar("cantante");
    else if (evento.target.matches("#año")) vaciar("año");
    else if (evento.target.matches("#tipoMusica")) vaciar("tipoMusica");
    else if (evento.target.matches("#localizacion")) vaciar("localizacion");
    else if (evento.target.matches("#guardar")) guardar();
    else if (evento.target.matches("#mostrar")) mostrar();
    else if (evento.target.matches('#new')) newDiscCont();
    else if (evento.target.matches('#show'))  showContr(evento.target.dataset.myId);
    else if (evento.target.matches('#index')) indexContr();
});