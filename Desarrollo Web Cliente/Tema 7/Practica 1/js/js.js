let num = Math.round(Math.random());
let text;

try {
    
    if (num == 0) {
        text = "No hay excepcion";
        document.getElementById("data").innerHTML = `<p>${text}</p>`;
    } else {
        throw "Hay excepción";
    }


} catch (error) {
    text = error;
    document.getElementById("data").innerHTML = `<p>${text}</p>`;
} finally {
    document.getElementById("fin").innerHTML = `<p>Fin del programa</p>`;
}