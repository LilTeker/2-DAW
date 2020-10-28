let disco = {};

const vaciar = (idElement) => {                                        //Vaciar
    document.getElementById(idElement).value = "";
}



const guardar = () => {
    disco["disco"] = document.getElementById("disco").value;
    disco["cantante"] = document.getElementById("cantante").value;
    disco["año"] = document.getElementById("año").value;
    disco["tipoMusica"] = document.getElementById("tipoMusica").value;
    disco["localizacion"] = document.getElementById("localizacion").value;
    disco["prestado"] = document.getElementById("prestado").value;
}

const mostrar = () => {
    document.getElementById("contenido").innerHTML = disco["disco"] + ", " + disco["cantante"] + ", " + disco ["año"] + ", " + disco["tipoMusica"] + ", " + disco["localizacion"] + ", " + disco["prestado"];
}










document.addEventListener("DOMContentLoaded", () => {
    console.log("prueba");
    document.addEventListener("click", evento => {
        if (evento.target.matches("#disco")) vaciar("disco");
        else if (evento.target.matches("#cantante")) vaciar("cantante");
        else if (evento.target.matches("#año")) vaciar("año");
        else if (evento.target.matches("#tipoMusica")) vaciar("tipoMusica");
        else if (evento.target.matches("#localizacion")) vaciar("localizacion");
        else if (evento.target.matches("#guardar")) guardar();
        else if (evento.target.matches("#mostrar")) mostrar();
    });

});