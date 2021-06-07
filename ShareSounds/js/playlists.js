let pl = []; //Array of playlists, its filled with loadPlaylists();


function printPl(pl) {

    let container = $("#container-list-playlists");
    let completeHtml = ``;

    pl.forEach(playlist => {

        html = `
        <div class="col-sm-12 item-pl">
            <a href="playlist.php?pl_id=${playlist.pl_id}">
                <div class="row ">
                    <div class="col-md-2">
                        <img src="../img/${playlist.img_name}" class="img-pl" alt="${playlist.img_name}" />
                    </div>
                    <div class="col-md-8">
                        <p class="text-pl">${playlist.pl_name}</p>
                    </div>
                    <div class="col-md-1">
                        <i class="fas fa-trash-alt pl-crud-icon"></i>
                    </div>
                    <div class="col-md-1">
                        <i class="fas fa-pen-square pl-crud-icon"></i>
                    </div>
                </div>
            </a>
        </div>
        `;
        completeHtml = completeHtml + html;
    });

    container.html(completeHtml);

}


async function loadPlaylists() {
    /*Add id for playlists to use when redirecting in php GET*/



    try {
        /*
        await $.ajax({
            type: "POST",
            url: window.location.origin + "/php_scripts/getPlaylists.php",
            data: "data",
            dataType: "dataType",
            success: function (response) {
                
            }
        });
        */
        await $.getJSON(window.location.origin + "/php_scripts/getPlaylists.php", function (data, textStatus, jqXHR) {

            data.forEach(element => {
                pl.push(element);
            });

            printPl(pl);

        }
        );

    } catch (e) {
        console.log(e);
    }

}




function newPl(e) {
    e.preventDefault(e);

    let formData = new FormData(document.getElementById('newPlForm'));

    
    $.ajax({
        url: window.location.origin + "/php_scripts/newPlaylist.php",
        type: "POST",
        data: formData,
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function () {
            //$("#preview").fadeOut();
            $("#err").fadeOut();
        },
        success: function (data) {
            if (data == 'invalid') {
                console.log("inválido baby");
                // invalid file format.
                $("#err").html("Invalid File !").fadeIn();
            }
            else {
                console.log(data);
                // view uploaded file.
                $("#preview").html(data).fadeIn();
                $("#newPlForm")[0].reset();
            }
        },
        error: function (e) {
            $("#err").html(e).fadeIn();
        }
    });
    
}







$(document).ready(function () {
    loadPlaylists();

    $("#newPlForm").on('submit', (e) => {newPl(e)});

});