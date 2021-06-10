let songs_arr = [];

let now_playing = 0;

function selectSong(e, element) {
    console.log("select" + element.data("listid"));
}

function deleteSong(e, element) {
    console.log("delete" + element.data("listid"));
}

function addSongListListeners() {
    $(".song-element").click(function (e) {selectSong(e, $(this))});
    $(".delete-song").click(function (e) {
        e.stopPropagation();
        deleteSong(e, $(this))
    });

}

function fillSongList(songs_list) {
    let container = $("#container-music-list");

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


    try {

        await $.ajax({
            type: "POST",
            url: window.location.origin + "/php_scripts/getSongsFromPl.php",
            data: { pl_id: pl_id },
            success: function (response) {
                let responseParsed = JSON.parse(response);
                let newSong;
                responseParsed.forEach(element => {

                    newSong = new Song(element["song_id"], element["name"], element["link"], element["type"], element["pl_id"]);
                    songs_arr.push(newSong);
                });
                console.log(songs_arr);
                fillSongList(songs_arr);

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



$(document).ready(function () {

    getSongsList();

});