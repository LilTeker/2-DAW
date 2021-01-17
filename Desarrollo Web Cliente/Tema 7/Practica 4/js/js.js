
let date = new Date();
let timeToClick = 10000;

function calculateTime(timeMs) {
    return new Promise((resolve, reject) => {
        let newTime = new Date();
        let timeElapsed = newTime.getTime() - date.getTime();
        if (timeElapsed < timeToClick) {
            resolve(`Bien hecho hiciste click en ${timeElapsed} ms`);
        } else {
            reject(`Has tardado demasiado, hiciste click en ${timeElapsed} ms`);
        }
    });
}

document.addEventListener("click", () => {
    
    calculateTime(timeToClick)
    .then(text => {
        document.getElementById("data").innerHTML = text;
    })
    .catch(text => {
        document.getElementById("data").innerHTML = text;
    });

});