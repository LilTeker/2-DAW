//MODELO
let cliente1 = new Cliente("Miguel", "Robles", "C/Goya", "Mengibar", new Date("2019/05/25"));
let cuenta1 = new Cuenta(2341, cliente1, 2351.65, 3);

cuenta1.salvar();

//CONTROLADOR

function createCount() {

    let numero = document.getElementById("numero").value;
    let titular = document.getElementById("titular").value;
    let saldo = document.getElementById("saldo").value;
    let interesAnual = document.getElementById("interesAnual").value;

    cuenta1 = new Cuenta(numero, titular, saldo, interesAnual);

    cuenta1.salvar();

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

    cuenta1.salvar();

}

function retirar() {

    cuenta1.reintegro(parseFloat(document.getElementById("reintegroInput").value));

    cuenta1.salvar();

}

function ingresoIntereses() {

    ingresoInteresesVista();

    cuenta1.salvar();

}

function isRojos() {

    let isRojos;

    if (cuenta1.enRojos()) {
        isRojos = "<span style='color:red'>números rojos</span>, debe dinero.";
    } else {
        isRojos = "números negros, no debe nada."
    }

    html = `<p>Su cuenta se encuentra en ${isRojos}</p>`;

    generalVista(html);
}

function leerSaldo() {

    leerSaldoVista();

}

function nombreTitularCont() {
    let html = cuenta1.titular.nombreCompleto();

    generalVista(html);
}

function direccionTitularCont() {
    let html = cuenta1.titular.direccionCompleta();

    generalVista(html);
}

//VISTA

function ingresoInteresesVista() {
    document.getElementById("info").innerHTML = `Se han añadido ${cuenta1.ingresoInteresMes()} 
    euros a tu cuenta`;
}

function generalVista(html) {
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
        else if (evento.target.matches("#nombreTitular")) nombreTitularCont(); 
        else if (evento.target.matches("#direccionTitular")) direccionTitularCont();        
    });
});


/*
document.addEventListener('DOMContentLoaded', evento => indexContr());
document.addEventListener("click", evento => {
    
    else if (evento.target.matches('#show'))  showContr(evento.target.dataset.myId);
    else if (evento.target.matches('#index')) indexContr();
    
});
*/