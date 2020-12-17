let ejer1 = 0;
let ejer2 = 0;
let ejer3 = 0;
let ejer4 = 0;
let ejer5 = 0;
let ejer6 = 0;
let ejer7 = 0;

function numberParagraph() {
    let parrafos = document.getElementsByTagName("p");

    for (let index = 0; index < parrafos.length; index++) {
        ejer1 += 1;
    }
}

function getTextParagraph(n) {
    let parrafos = document.getElementsByTagName("p");

    ejer2 = parrafos[n].innerHTML;
}

function numberLinks() {
    let links = document.getElementsByTagName("a");

    for (let index = 0; index < links.length; index++) {
        ejer3 += 1;
    }
}

function getFirstLink() {
    let link = document.getElementsByTagName("a");
    ejer4 = link[0].href;
}

function getPenultimateLink() {
    let link = document.getElementsByTagName("a");
    ejer5 = link[link.length - 2].href;
}

function numberLinksTo(href) {
    let link = document.getElementsByTagName("a");

    for (let index = 0; index < link.length; index++) {
        
        if (link[index].href == href) {
            ejer6 += 1;
        }
        
    }
}

function numberLinksOfxParagraph(x) {

    let links = document.getElementsByTagName("p")[x].getElementsByTagName("a");

    for (let index = 0; index < links.length; index++) {
        ejer7 += 1;        
    }

}

function printResults() {

    let div = document.createElement("div");
    div.setAttribute("id", "info");
    document.body.appendChild(div);

    let info = document.getElementById("info");
    info.innerHTML = `<p>El número de párrafos de la página es ${ejer1}</p>
    <p>El texto del segundo párrafo es ${ejer2}</p>
    <p>El número de enlaces de la página es ${ejer3}</p>
    <p>La dirección del primer enlace es ${ejer4}</p>
    <p>La dirección del penúltimo enlace es ${ejer5}</p>
    <p>El número de enlaces que apuntan a /wiki/Municipio es ${ejer6}</p>
    <p>El número de enlaces del primer párrafo. es ${ejer7}</p>`;

}

window.onload = function() {
    
    numberParagraph();
    getTextParagraph(1);
    numberLinks();
    getFirstLink();
    getPenultimateLink();
    numberLinksTo("http://wiki/Municipio");
    numberLinksOfxParagraph(0);

    printResults();
    
}