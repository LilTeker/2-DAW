function soundIn() {
    let audio = document.getElementById("cancion");
    audio.play();
    document.getElementById("play").style.display = "none";
    document.getElementById("pausa").style.display = "block";
}

function soundOut() {
    let audio = document.getElementById("cancion");
    audio.pause();
    document.getElementById("pausa").style.display = "none";
    document.getElementById("play").style.display = "block";
}


function listeners() {
    document.getElementById("play").addEventListener('click', soundIn, false);
    document.getElementById("pausa").addEventListener('click', soundOut, false);
}


window.addEventListener('load', listeners, false);