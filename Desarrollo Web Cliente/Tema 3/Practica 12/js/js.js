let selection = prompt(`Elije una opción del menú:

1) Potencia
2) Raíz
3) Redondeo
4) Trigonometría`);

switch (selection) {
    case "1":
        let base = prompt("Escriba la base");
        let exponente = prompt("Escriba el exponente");

        let resultadoExp = Math.pow(base, exponente);

        alert(`La potencia de ${base} elevado a ${exponente} es: ${resultadoExp}`);

        break;
    case "2":
        let num = prompt("Escriba un número no negativo");

        let resultadoSqrt = Math.sqrt(num);

        alert(`La raíz de ${num} es: ${resultadoSqrt}`);
        break;
    case "3":
        let decimal = prompt("Escriba un número decimal");

        alert(`Los numeros mas cercanos a ${decimal} son ${Math.floor(decimal)} y ${Math.ceil(decimal)} `);

        break;
    case "4":
        let angulo = prompt("Escriba un ángulo de una circunferencia cualquiera");

        alert(`Seno: ${Math.sin(angulo)} 
        Coseno: ${Math.cos(angulo)}
        Tangente: ${Math.tan(angulo)}`);

        break;
}