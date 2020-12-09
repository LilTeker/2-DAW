
function videoIn() {

    console.log("Prueba");

    $(document).mouseover(function(e){
        console.log($(e.target).attr('id')); // i just retrieved the id for a demo
    });

    /*
    let video = document.getElementById("video");
    video.play();
    */
}


function listeners() {
    let elements = document.getElementsByClassName("videoElement");
    
    for (var i = 0; i < elements.length; i++) {
        elements[i].addEventListener('mouseenter', videoIn, false);
    }/*
    document.getElementsByClassName("videoElement").addEventListener('mouseenter', videoIn, false);
    document.getElementsByClassName("videoElement").addEventListener('mouseleave', clear, false);
    document.getElementsByClassName("videoElement").addEventListener('click', videoReset, false);*/
}

window.addEventListener('load', listeners, false);