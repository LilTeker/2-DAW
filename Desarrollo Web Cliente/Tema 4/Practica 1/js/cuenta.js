//MODELO

let cuenta1 = null;

//CONTROLADOR

class Cuenta {
    
    constructor(numero, titular, saldo, interesAnual) {
        this.numero = numero;
        this.titular = titular;
        this.saldo = saldo;
        this.interesAnual = interesAnual;
    }

    ingreso(cantidad) {
        saldo += cantidad;
    }
    
    reintegro(cantidad) {
        saldo -= cantidad;
    }

    ingresoInteresMes() {
        saldo = (interesAnual * saldo) / 12;
    }

    enRojos() {
        if (saldo < 0) {
            return true;
        }
        return false;
    }

    leerSaldo() {
        return saldo;
    }

}

function createCount() {
    let numero = document.getElementById("numero").value;
    let titular = document.getElementById("titular").value;
    let saldo = document.getElementById("saldo").value;
    let interesAnual = document.getElementById("interesAnual").value;

    var cuenta1 = new Cuenta(numero, titular, saldo, interesAnual);
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