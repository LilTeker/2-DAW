//MODELO

//CONTROLADOR

class Cliente {
    
    constructor(nombre, apellidos, dirección, localidad, fNacimiento) {
        this.nombre = nombre;
        this.apellidos = apellidos;
        this.dirección = dirección;
        this.localidad = localidad;
        this.fNacimiento = fNacimiento;
    }

    nombreCompleto() {
        return this.nombre + this.apellidos;
    }

    direcciónCompleta() {
        return this.dirección + this.localidad;
    }

}

//VISTA



//EVENTO
//document.addEventListener('DOMContentLoaded', evento => indexContr());
document.addEventListener("click", evento => {
    if (evento.target.matches("#submit")) createCount();
    /*
    else if (evento.target.matches('#show'))  showContr(evento.target.dataset.myId);
    else if (evento.target.matches('#index')) indexContr();
    */
});