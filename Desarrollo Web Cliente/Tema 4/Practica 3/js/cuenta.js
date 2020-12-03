class Cuenta {
    
    constructor(numero, titular, saldo, interesAnual) {
        this.numero = numero;
        this.titular = titular;
        this.saldo = saldo;
        this.interesAnual = interesAnual;
        this.movimientos = [];
    }

    ingreso(cantidad) {
        this.saldo += cantidad;

        this.registra("ingreso", cantidad);
    }
    
    reintegro(cantidad) {
        this.saldo -= cantidad;

        this.registra("reintegro", cantidad);
    }

    ingresoInteresMes() { //REVISAR COMO FUNCIONA ESTA FUNCION
        let interes = (this.interesAnual * this.saldo) / 12;
        this.saldo += interes;

        this.registra("ingresoInteres", interes);

        return interes;
    }

    enRojos() {
        if (this.saldo < 0) {
            return true;
        }
        return false;
    }

    leerSaldo() {
        return this.saldo;
    }

    leerTitular() {
        return this.titular.nombreCompleto();
    }

    salvar() {
        let dataArray = [this.numero, this.titular.nombre, this.saldo, this.interesAnual];

        localStorage.setItem(`cuenta${this.numero}`, JSON.stringify(dataArray));
    }

    registra(tipo, importe) {
        let registro = new Movimiento(new Date(), tipo, importe, this.saldo);

        this.movimientos.push(registro);
    }

}