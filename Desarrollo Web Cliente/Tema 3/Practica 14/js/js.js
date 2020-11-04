let selection = parseInt(prompt(`Escriba un numero entero`));


let exponencial = selection.toExponential(selection);
let cuatroDecimales = selection.toFixed(4);
let binario = selection.toString(2);
let octal =  selection.toString(8);
let hex =  selection.toString(16);

alert(`${exponencial}, ${cuatroDecimales}, ${binario}, ${octal}, ${hex}`);
