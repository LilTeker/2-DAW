const vaciar = (idElement) => {                                        //Vaciar
    document.getElementById(idElement).value = "";
}













document.addEventListener("DOMContentLoaded", () => {
    console.log("prueba");
    document.addEventListener("click", evento => {
        if (evento.target.matches("#disco")) vaciar("disco");
        else if (evento.target.matches("#cantante")) vaciar("cantante");
        else if (evento.target.matches("#año")) vaciar("año");
        else if (evento.target.matches("#tipoMusica")) vaciar("tipoMusica");
        else if (evento.target.matches("#localizacion")) vaciar("localizacion");
    });

});