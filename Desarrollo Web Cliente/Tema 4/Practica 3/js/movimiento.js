//MODELO

//CONTROLADOR

class movimiento {
    
    constructor(fecha, tipo, importe, saldo) {
        this.fecha = fecha;
        this.tipo = tipo;
        this.importe = importe;
        this.saldo = saldo;
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