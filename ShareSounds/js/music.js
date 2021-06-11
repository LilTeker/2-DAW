let songs_arr = [];

let now_playing = 0;

function selectSong(e, element) {
    console.log("select" + element.data("listid"));
}

async function deleteSong(e, element) {

    let listId = element.data("listid");
    let songId = songs_arr[listId].getSong_id();
    let pl_id = songs_arr[listId].getPl_id();

    try {
        await $.ajax({
            type: "POST",
            url: window.location.origin + "/php_scripts/deleteSongFromPl.php",
            data: { song_id: songId, pl_id: pl_id },
            success: function (response) {
                if (response.includes("deleted")) {
                    songs_arr.splice(listId, 1);
                    fillSongList(songs_arr);
                } else if (response.includes("forbidden")) {
                    console.log("Los usuarios no tienen permitido borrar musia de playlist de otros usuarios.");
                } else {
                    console.log("No se ha podido procesar la solicitud, inténtelo de nuevo más tarde");
                }
            },
            error: function (err) {
                let errHtml = `
                <div class="alert alert-warning alert-dismissible fade show fixed-bottom" role="alert">
                    <strong style="color:red;">Error:</strong> No se ha podido borrar la canción, inténtalo de nuevo más tarde y, si el problema persiste, contáctanos por email.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                `;
                $("#error-msg").html(errHtml);
            }
        });
    } catch (error) {
        console.log(error);
    }
}

function addSongListListeners() {
    $(".song-element").click(function (e) { selectSong(e, $(this)) });
    $(".delete-song").click(function (e) {
        e.stopPropagation();
        deleteSong(e, $(this))
    });

}

function fillSongList(songs_list) {
    let container = $("#container-music-list");

    container.html("");

    let completeHtml = "";

    for (let index = 0; index < songs_list.length; index++) {
        let element = songs_list[index];

        html = element.getHtml(index);

        htmlSeparator = `<hr class="song-separator">`;

        if (index == songs_list.length - 1) {
            completeHtml = completeHtml + html;
        } else {
            completeHtml = completeHtml + html + htmlSeparator;
        }
    }

    container.html(completeHtml);

    addSongListListeners();

}

async function getSongsList() {

    let pl_id = $("#container-identificator").data("plid");
    songs_arr = [];

    try {

        await $.ajax({
            type: "POST",
            url: window.location.origin + "/php_scripts/getSongsFromPl.php",
            data: { pl_id: pl_id },
            success: function (response) {

                if (!response.includes("empty")) {
                    let responseParsed = JSON.parse(response);
                    let newSong;
                    responseParsed.forEach(element => {
    
                        newSong = new Song(element["song_id"], element["name"], element["link"], element["type"], element["pl_id"]);
                        songs_arr.push(newSong);
                    });
                    console.log(songs_arr);
                    fillSongList(songs_arr);
                }

            },
            error: function (e) {
                let errHtml = `
                <div class="alert alert-warning alert-dismissible fade show fixed-bottom" role="alert">
                    <strong style="color:red;">Error:</strong> No se han podido cargar las canciones, inténtalo de nuevo más tarde y, si el problema persiste, contáctanos por email.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                `;
                $("#error-msg").html(errHtml);
            }
        });

    } catch (e) {
        let errHtml = `
                <div class="alert alert-warning alert-dismissible fade show fixed-bottom" role="alert">
                    <strong style="color:red;">Error:</strong> No se han podido cargar las canciones, inténtalo de nuevo más tarde y, si el problema persiste, contáctanos por email.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                `;
        $("#error-msg").html(errHtml);
    }

}

async function newSong(e) {
    e.preventDefault(e);

    let formData = new FormData(document.getElementById('newSongForm'));
    let source = $("#source").val();
    

    if (source != 0 && source != 1) {
        $("#err-song").text("Debes elegir una fuente desde la que añadir la música");
    } else {
        switch (source) {
            case "0":
                //youtube
                let song_url_yt = $("#song_url").val();

                if (song_url_yt != "") {
                    if (Song.validateUrl(song_url_yt, "youtube")) {

                        $("#err-song").text("");
                        
                        try {

                            let videoId = Song.getDataFrame(song_url_yt, "youtube");

                            await fetch(`https://youtube.googleapis.com/youtube/v3/videos?part=snippet&id=${videoId}&key=AIzaSyDJr9IEaJPNdBVcJHTsYSWUaxYA5OaO_yk`)
                            .then(response => {
                                return response.json();
                            })
                            .then(async data => {
                                let videoTitle = data.items[0].snippet.title;
                                
                                await $.ajax({
                                    type: "POST",
                                    url: window.location.origin + "/php_scripts/newSong.php",
                                    data: {name: videoTitle, link: song_url_yt, type: "youtube", pl_id: $("#container-identificator").data("plid"), data_frame: videoId},
                                    success: function (response) {
                                        getSongsList();                        
                                    },
                                    error: function (e) {
                                        let errHtml = `
                                        <div class="alert alert-warning alert-dismissible fade show fixed-bottom" role="alert">
                                            <strong style="color:red;">Error:</strong> No se han podido añadir tu canción, inténtalo de nuevo más tarde y, si el problema persiste, contáctanos por email.
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        `;
                                        $("#error-msg").html(errHtml);
                                    }
                                });

                            });

                            

                            
                        } catch (error) {
                            let errHtml = `
                                    <div class="alert alert-warning alert-dismissible fade show fixed-bottom" role="alert">
                                        <strong style="color:red;">Error:</strong> No se ha podido añadir tu cancíon, inténtalo de nuevo más tarde y, si el problema persiste, contáctanos por email.
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    `;
                            $("#error-msg").html(errHtml);
                        }                       

                    } else {
                        $("#err-song").text("Por favor inserta una url válida");
                    }
                } else {
                    $("#err-song").text("Por favor rellena los datos");
                }                

                break;
            case "1":
                //soundcloud
                let song_url_sc = $("#song_url").val();
                let song_name_sc = $("#song_name").val();

                if (song_url_sc != "" && song_name_sc != "") {
                    $("#err-song").text("");
                    if (Song.validateUrl(song_url_sc, "soundcloud")) {
                        $("#err-song").text("");

                        try {

                            await $.ajax({
                                type: "POST",
                                url: window.location.origin + "/php_scripts/newSong.php",
                                data: {name: song_name_sc, link: song_url_sc, type: "soundcloud", pl_id: $("#container-identificator").data("plid")},
                                success: function (response) {

                                    console.log(response);
                                    getSongsList();
                    
                                },
                                error: function (e) {
                                    let errHtml = `
                                    <div class="alert alert-warning alert-dismissible fade show fixed-bottom" role="alert">
                                        <strong style="color:red;">Error:</strong> No se ha podido añadir tu cancíon, inténtalo de nuevo más tarde y, si el problema persiste, contáctanos por email.
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    `;
                                    $("#error-msg").html(errHtml);
                                }
                            });

                            
                        } catch (error) {
                            let errHtml = `
                                    <div class="alert alert-warning alert-dismissible fade show fixed-bottom" role="alert">
                                        <strong style="color:red;">Error:</strong> No se ha podido añadir tu cancíon, inténtalo de nuevo más tarde y, si el problema persiste, contáctanos por email.
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    `;
                            $("#error-msg").html(errHtml);
                        }        
                        
                    } else {
                        $("#err-song").text("Por favor inserta una url válida");
                    }

                } else {
                    $("#err-song").text("Por favor rellena los datos");
                }

                

                break;
            default:
                break;
        }
    }
}

function loadNewSongForm(e, element) {
    /*
    0 = youtube
    1 = soundcloud
    the we add more sources we just have to make the form for it here, and the code to add the song.
    */
    let value = element.value;
    let html = "";

    if (value == 0) {

        html = `<div class="form-group col-sm-12">
                    <label for="song_url">Url de tu Canción</label>
                    <input type="text" class="form-control" id="song_url" name="song_url" placeholder="https://www.youtube.com/watch?v=2ikms80DTPg">
                </div>`;


    } else if (value == 1) {
        html = `<div class="form-group col-sm-12">
                        <label for="song_name">Nombre de tu Canción</label>
                        <input type="text" class="form-control" id="song_name" name="song_name" placeholder="The Illusion of Free Will, with Sam Harris - StarTalk Radio">
                    </div>
                    <div class="form-group col-sm-12">
                        <label for="song_url">Url de tu Canción</label>
                        <input type="text" class="form-control" id="song_url" name="song_url" placeholder="https://soundcloud.com/startalk/the-illusion-of-free-will-with">
                    </div>`
    }
    $("#form-container").html(" ");
    $("#form-container").html(html);

}


$(document).ready(function () {

    getSongsList();

    $("#newSongForm").on('submit', (e) => { newSong(e) });
    $("#source").on("change", function (e) { loadNewSongForm(e, this) });

});