let pl = []; //Array of playlists, its filled with loadPlaylists();
let selectedPl = 0;


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
                    <div class="col-md-1">
                        <i data-plid="${playlist.pl_id}" class="fas fa-trash-alt pl-crud-icon delete-pl"></i>
                    </div>
                    <div class="col-md-1">
                        <button data-plid="${playlist.pl_id}" data-toggle="modal" data-target="#editPl" class="fas fa-edit pl-crud-icon edit-pl"></button>
                    </div>
                </div>
        </div>
        `;
        completeHtml = completeHtml + html;
    });

    container.html("");
    container.html(completeHtml);

    $(".delete-pl").click(function (e) {deletePl(e,$(this))});        
    $(".edit-pl").click(function (e) {selectedPl = $(this).data("plid")});

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

function printSearchResults(plData) {


    let completeHtml = "";

    plData["pl"].forEach(pl => {
        
        let owner = "";

        plData["users"].forEach(user => {
            if (user["user_id"] == pl["user_id"]) {
                owner = user["username"];
            }
        });

        let html = `<li class="searchItem">
                        <a href="playlist.php?pl_id=${pl["pl_id"]}">
                            <div class="row searchElement">
                                <div class="col-sm-4">
                                    <img class="img-pl" src="../users_img/${pl["img_name"]}" alt="${pl["img_name"]}">
                                </div>
                                <div class="col-sm-8">
                                    <h4>${pl["pl_name"]}</h4>
                                    <p>Autor: ${owner}</p>
                                </div>
                            </div>
                        </a>
                    </li>
                    <hr class="searchSeparator">
        `
        completeHtml = completeHtml + html;

    });

    $("#shareResults").html(completeHtml);

}

async function searchPl(e) {
    e.preventDefault();

    let pl_name = $("#search_pl_name").val();
    let user_pl = $("#search_user_pl").val();

    try {
        if (pl_name != "" || user_pl != "") {
            $("#err_shareForm").text("");
            
            await $.ajax({
                type: "POST",
                url: window.location.origin + "/php_scripts/searchPlaylists.php",
                data: {pl_name: pl_name, user_name: user_pl},
                success: function (response) {
                    if (response != "") {
                        let plData = JSON.parse(response);

                        printSearchResults(plData);
                        
                    } else {
                        $("#err_shareForm").text("No se han podido encontrar listas con estas características");
                    }
                },
                error: function (e) {
                    $("#err_shareForm").text("No se han podido encontrar listas con estas características");
                }
            });
            
        } else {
            $("#err_shareForm").text("Debe rellenar uno de los dos campos para encontrar playlists");
        }
    } catch (e) {}    

}

async function editPl(e, element) {
    e.preventDefault();

    $("#err_editForm").text("");
    $("#success_editForm").text("");

    let access_type = $("#editPlPrivacity").val();
    let pl_name = $("#editPlName").val();
    let pl_id = selectedPl;


    if (access_type != 1 && access_type != 0) {
        $("#err_editForm").text("Inserte valores válidos por favor");
    } else {

        try {
            await $.ajax({
                type: "POST",
                url: window.location.origin + "/php_scripts/editPlaylist.php",
                data: {access_type: access_type, pl_name: pl_name, pl_id: pl_id},
                success: function (response) {
                    $("#success_editForm").text("Se han cambiado los datos de la lista correctamente");
                    loadPlaylists();
                }
            });
        } catch (error) {
            $("#err_editForm").text("No se ha podido completar la solicitud, inténtelo de nuevo más tarde");
        }
    }
}







$(document).ready(function () {
    loadPlaylists();

    $("#newPlForm").on('submit', (e) => { newPl(e) });
    $("#shareForm").on('submit', (e) => { searchPl(e) });
    $("#editPlForm").on('submit', (e) => { editPl(e)});
   

});