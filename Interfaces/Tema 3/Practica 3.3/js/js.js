function videoIn() {
    document.getElementById("videoContainer").innerHTML = `<video id="video" controls>
    <source src="video/retroarch.mp4" type="video/mp4">
    <source src="video/retroarch.webm" type="video/webm">
    </video>`;

    let video = document.getElementById("video");
    video.play();  //NO FUNCIONA EN CHROME (js.js:8 Uncaught (in promise) DOMException: play() failed because the user didn't interact with the document first.)
}

function videoReset() {
    let video = document.getElementById("video");
    video.currentTime = 0;
}

function audioIn() {
    document.getElementById("musicPlayImg").style.display = "block";
    let audio = document.getElementById("audio");
    audio.play();
}

function audioOut() {
    document.getElementById("musicPlayImg").style.display = "none";
    let audio = document.getElementById("audio");
    audio.pause();
}

function audioReset() {
    let audio = document.getElementById("audio");
    audio.currentTime = 0;
}

function clear() {
    document.getElementById("videoContainer").innerHTML = "";
}


function listeners() {
    document.getElementById("videoHover").addEventListener('mouseenter', videoIn, false);
    document.getElementById("videoHover").addEventListener('mouseleave', clear, false);
    document.getElementById("videoHover").addEventListener('click', videoReset, false);
    document.getElementById("audioHover").addEventListener('mouseenter', audioIn, false);
    document.getElementById("audioHover").addEventListener('mouseleave', audioOut, false);
    document.getElementById("audioHover").addEventListener('click', audioReset, false);
}


window.addEventListener('load', listeners, false);