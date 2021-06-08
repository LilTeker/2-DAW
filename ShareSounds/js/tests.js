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