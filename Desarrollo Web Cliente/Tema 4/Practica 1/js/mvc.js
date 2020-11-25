//MODELO

let cuenta1 = new Cuenta(2341, "Miguel", 2351.65, 3);

toLocalStorage(cuenta1);

//CONTROLADOR

function createCount() {

    let numero = document.getElementById("numero").value;
    let titular = document.getElementById("titular").value;
    let saldo = document.getElementById("saldo").value;
    let interesAnual = document.getElementById("interesAnual").value;

    cuenta1 = new Cuenta(numero, titular, saldo, interesAnual);

    toLocalStorage(cuenta1);

}

function toLocalStorage(cuentaBanco) {

    let dataArray = [cuentaBanco.numero, cuentaBanco.titular, cuentaBanco.saldo, cuentaBanco.interesAnual];

    localStorage.setItem(`cuenta${cuentaBanco.numero}`, JSON.stringify(dataArray));
}

function getLocalStorage(cuentaBanco) {

    let dataArray = JSON.parse(localStorage.getItem(`cuenta${cuentaBanco.numero}`));

    cuentaBanco.numero = dataArray[0];
    cuentaBanco.titular = dataArray[1];
    cuentaBanco.saldo = dataArray[2];
    cuentaBanco.interesAnual = dataArray[3];

}

function ingresar() {

    cuenta1.ingreso(parseFloat(document.getElementById("ingresoInput").value));

    toLocalStorage(cuenta1);

}

function retirar() {

    cuenta1.reintegro(parseFloat(document.getElementById("reintegroInput").value));

    toLocalStorage(cuenta1);

}

function ingresoIntereses() {

    ingresoInteresesVista();

    toLocalStorage(cuenta1);

}

function isRojos() {

    let isRojos;

    if (cuenta1.enRojos()) {
        isRojos = "<span style='color:red'>números rojos</span>, debe dinero.";
    } else {
        isRojos = "números negros, no debe nada."
    }

    html = `<p>Su cuenta se encuentra en ${isRojos}</p>`;

    isRojosVista(html);
}

function leerSaldo() {

    leerSaldoVista();

}

//VISTA

function ingresoInteresesVista() {
    document.getElementById("info").innerHTML = `Se han añadido ${cuenta1.ingresoInteresMes()} 
    euros a tu cuenta`;
}

function isRojosVista(html) {
    document.getElementById("info").innerHTML = html;
}

function leerSaldoVista() {
    document.getElementById("info").innerHTML = `Su saldo es de: ${cuenta1.leerSaldo()}€`;
}


//EVENTO
document.addEventListener("DOMContentLoaded", () => {
    console.log("DOM fully loaded and parsed");
    document.addEventListener("click", evento => {
        if (evento.target.matches("#submit")) createCount();
        else if (evento.target.matches("#ingreso")) ingresar();
        else if (evento.target.matches("#reintegro")) retirar();
        else if (evento.target.matches("#ingresoInteresMes")) ingresoIntereses();
        else if (evento.target.matches("#rojos")) isRojos();
        else if (evento.target.matches("#leerSaldo")) leerSaldo();        
    });
});


/*
document.addEventListener('DOMContentLoaded', evento => indexContr());
document.addEventListener("click", evento => {
    
    else if (evento.target.matches('#show'))  showContr(evento.target.dataset.myId);
    else if (evento.target.matches('#index')) indexContr();
    
});
*/