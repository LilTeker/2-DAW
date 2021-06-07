let pl = []; //Array of playlists, its filled with loadPlaylists();


async function deletePl(e,element) {
    let plId = element.attr("data-plid");


    try {
        await $.ajax({
            type: "POST",
            url: window.location.origin + "/php_scripts/deletePlaylist.php",
            data: {pl_id: plId},
            success: function (response) {
                if (response.includes("deleted")) {
                    console.log(response)
                    console.log("deleted");

                    loadPlaylists();

                } else if (response.includes("forbidden")) {
                    console.log(response)
                    console.log("Users are not allowed to delete other's playlists");
                } else {
                    console.log(response)
                    console.log("Could not process the request now, try again later");
                }
            },
            error: function (e) {
                $("#err").html("No se ha podido completar la solicitud ahora mismo, inténtelo más tarde").fadeIn();
            }
        });
    } catch (error) {
        console.log(e);
    }

}


function printPl(pl) {

    let container = $("#container-list-playlists");
    let completeHtml = ``;

    pl.forEach(playlist => {

        html = `
        <div class="col-sm-12 item-pl">
            <div class="row ">
                
                    <div class="col-md-2">
                        <img src="../users_img/${playlist.img_name}" class="img-pl" alt="${playlist.img_name}" />
                    </div>
                    <div class="col-md-8">
                    <a href="playlist.php?pl_id=${playlist.pl_id}"><p class="text-pl">${playlist.pl_name}</p></a>
                    </div>
                    <div class="col-md-2 ">
                        <i data-plid="${playlist.pl_id}" class="fas fa-trash-alt pl-crud-icon delete-pl"></i>
                    </div>
                </div>
        </div>
        `;
        completeHtml = completeHtml + html;
    });

    container.html("");
    container.html(completeHtml);

    $(".delete-pl").click(function (e) {deletePl(e,$(this))});

}


async function loadPlaylists() {
    /*Clean playlist array to load them all again after CRUD*/

    pl = [];

    try {

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

    if ($("#pl_name").val() == "" || ($("#access_type").val() != "1" && $("#access_type").val() != "0")) {
        console.log("vacio");
        $("#err").html("<p class='error-message'>Por favor rellene todos los campos correctamente</p>");
    } else {

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
                if (data.includes('invalid')) {
                    console.log("No se ha podido completar la solicitud ahora mismo, inténtelo más tarde");
                    // invalid file format.
                    $("#err").html("El formato de imagen no es válido o no se ha podido completar la solicitud ahora mismo, inténtelo más tarde").fadeIn();
                }
                else {
                    console.log(data);
                    // view uploaded file.
                    $("#preview").html(data).fadeIn();
                    $("#newPlForm")[0].reset();
                    loadPlaylists();
                }
            },
            error: function (e) {
                $("#err").html("No se ha podido completar la solicitud ahora mismo, inténtelo más tarde").fadeIn();
            }
        });

    }

}







$(document).ready(function () {
    loadPlaylists();

    $("#newPlForm").on('submit', (e) => { newPl(e) });

});