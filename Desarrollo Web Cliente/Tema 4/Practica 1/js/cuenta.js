class Cuenta {
    
    constructor(numero, titular, saldo, interesAnual) {
        this.numero = numero;
        this.titular = titular;
        this.saldo = saldo;
        this.interesAnual = interesAnual;
    }

    ingreso(cantidad) {
        this.saldo += cantidad;
    }
    
    reintegro(cantidad) {
        this.saldo -= cantidad;
    }

    ingresoInteresMes() { //REVISAR COMO FUNCIONA ESTA FUNCION
        let interes = (this.interesAnual * this.saldo) / 12;
        this.saldo += interes;

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

}