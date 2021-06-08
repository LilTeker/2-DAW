//CODIGO QUE CONSIGUE LA ID DE LA URL DE YOUTUBE
let url = "https://www.youtube.com/watch?v=2ikms80DTPg";

var regExp = /^https?\:\/\/(?:www\.youtube(?:\-nocookie)?\.com\/|m\.youtube\.com\/|youtube\.com\/)?(?:ytscreeningroom\?vi?=|youtu\.be\/|vi?\/|user\/.+\/u\/\w{1,2}\/|embed\/|watch\?(?:.*\&)?vi?=|\&vi?=|\?(?:.*\&)?vi?=)([^#\&\?\n\/<>"']*)/i;
var match = url.match(regExp);
//alert((match && match[1].length == 11) ? match[1] : false);





//CONSEGUIR DATOS DE VIDEO
let videoId = "2ikms80DTPg";
let youtubeKey = "AIzaSyDJr9IEaJPNdBVcJHTsYSWUaxYA5OaO_yk";

async function getVideoData(videoId) {

    await fetch(`https://youtube.googleapis.com/youtube/v3/videos?part=snippet&id=${videoId}&key=${youtubeKey}`)
        .then(response => {
            return response.json();
        })
        .then(data => {
            console.log(data);
        })

}

//getVideoData(videoId);

//FIN CONSEGUIR DATOS DE VIDEO




//CODIGO CREAR IFRAME CON API DE GOOGLE Y AUTOPLAY FIX

// 3. This function creates an <iframe> (and YouTube player)
//    after the API code downloads.

/*
var player;

function onYouTubeIframeAPIReady() {
    player = new YT.Player('player', {
        height: '390',
        width: '640',
        videoId: 'M7lc1UVf-VE',
        playerVars: {
            'playsinline': 1,
            'autoplay': 1,
            'mute': 1
        },
        events: {
            'onReady': onPlayerReady,
            'onStateChange': onPlayerStateChange
        }
    });
}

// 4. The API will call this function when the video player is ready.
function onPlayerReady(event) {
    event.target.playVideo();
    console.log("ready");
    //Fix for autoplay when player is loaded*************
    setTimeout(unMute, 3000);
    player.playVideo();
    
}

// 5. The API calls this function when the player's state changes.
//    The function indicates that when playing a video (state=1),
//    the player should play for six seconds and then stop.
var done = false;

function onPlayerStateChange(event) {
    if (event.data == YT.PlayerState.PLAYING && !done) {
        //setTimeout(stopVideo, 6000);
        done = true;
    }
}

function stopVideo() {
    player.stopVideo();
}

function unMute() {
    player.unMute();
}
*/

//TERMINA CODIGO REPRODUCTOR DE YOUTUBE



//PRUEBAS REPRODUCTOR SOUNDCLOUD

let sc_player = "";


$(document).ready(function () {

    //Care get the element when the document its ready

    let iframeElement = document.querySelector("iframe");
    sc_player = SC.Widget(iframeElement);

    //Evento para pasar a siguiente cancion.
    sc_player.bind(SC.Widget.Events.FINISH, function () {
        alert("terminado")
    })


});


