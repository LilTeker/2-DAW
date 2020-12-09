function indicator(path) {
    document.getElementById("indicator").innerHTML = `<img src="img/${path}" alt="${path}">`;
}


function listeners() {
    document.getElementById("imgContainer").addEventListener('mouseenter', () => {indicator("img.svg")}, false);
    document.getElementById("videoContainer").addEventListener('mouseenter', () => {indicator("videos.svg")}, false);
    document.getElementById("songsContainer").addEventListener('mouseenter', () => {indicator("songs.svg")}, false);
}


window.addEventListener('load', listeners, false);