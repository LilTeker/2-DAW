let pl = []; //Array of playlists, its filled with loadPlaylists();
let selectedPl = 0;


async function deletePl(e,element) {
    let plId = element.attr("data-plid");

    if (confirm("¿Está seguro de que quiere borrar esta lista?")) {
        try {
            await $.ajax({
                type: "POST",
                url: window.location.origin + "/php_scripts/deletePlaylist.php",
                data: {pl_id: plId},
                success: function (response) {
                    if (response.includes("deleted")) {
    
                        loadPlaylists();
    
                    } else if (response.includes("forbidden")) {
                        let errHtml = `
                        <div class="alert alert-warning alert-dismissible fade show fixed-bottom" role="alert">
                            <strong style="color:red;">Error:</strong> Lo usuarios no tienen permitido borrar las listas de otros usuarios
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        `;
                            $("#error-msg").html(errHtml);
                    } else {
                        let errHtml = `
                        <div class="alert alert-warning alert-dismissible fade show fixed-bottom" role="alert">
                            <strong style="color:red;">Error:</strong> No se ha podido procesar la solicitud, inténtelo de nuevo más tarde
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        `;
                            $("#error-msg").html(errHtml);
                    }
                },
                error: function (e) {
                    $("#err").html("No se ha podido completar la solicitud ahora mismo, inténtelo más tarde").fadeIn();
                }
            });
        } catch (error) {
            let errHtml = `
                        <div class="alert alert-warning alert-dismissible fade show fixed-bottom" role="alert">
                            <strong style="color:red;">Error:</strong> No se ha podido procesar la solicitud, inténtelo de nuevo más tarde
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        `;
                            $("#error-msg").html(errHtml);
        }
    }

}


function printPl(pl) {

    let container = $("#container-list-playlists");
    let completeHtml = ``;

    if (pl.length == 0) {
        
        html = `
            <div class="col-sm-12">
                <div class="row" id="empty-pl">                    
                        <div class="col-sm-10">
                            <p>No tienes niguna Playlist creada, crea una ahora mismo desde el boton "Nueva Playlist"</p>
                        </div>
                    </div>
            </div>
            `;
            completeHtml = completeHtml + html;

    } else {
        pl.forEach(playlist => {

            html = `
            <div class="col-sm-12 item-pl">
                <div class="row ">
                    
                        <div class="col-md-2 col-sm-12">
                            <img src="../users_img/${playlist.img_name}" class="img-pl" alt="${playlist.img_name}" />
                        </div>
                        <div class="col-md-8 col-sm-6">
                        <a href="playlist.php?pl_id=${playlist.pl_id}"><p class="text-pl">${playlist.pl_name}</p></a>
                        </div>
                        <div class="col-md-1 col-sm-3">
                            <i data-plid="${playlist.pl_id}" class="fas fa-trash-alt pl-crud-icon delete-pl"></i>
                        </div>
                        <div class="col-md-1 col-sm-3">
                            <button data-plid="${playlist.pl_id}" data-toggle="modal" data-target="#editPl" class="fas fa-edit pl-crud-icon edit-pl"></button>
                        </div>
                    </div>
            </div>
            `;
            completeHtml = completeHtml + html;
        });
    }    

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

            if (data != "empty") {
                data.forEach(element => {
                    pl.push(element);
                });
            }
            
            printPl(pl);

        });

    } catch (e) {
        let errHtml = `
                        <div class="alert alert-warning alert-dismissible fade show fixed-bottom" role="alert">
                            <strong style="color:red;">Error:</strong> No se han podido cargar tus listas en este momento, inténtelo de nuevo mas tarde
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        `;
                            $("#error-msg").html(errHtml);
    }

}




function newPl(e) {
    e.preventDefault(e);

    let formData = new FormData(document.getElementById('newPlForm'));
    $("#err").html("");
    $("#success").text("");

    if ($("#pl_name").val() == "" || ($("#access_type").val() != "1" && $("#access_type").val() != "0")) {
        $("#err").text("Por favor rellene todos los campos correctamente");
    } else {
        try {
            $.ajax({
                url: window.location.origin + "/php_scripts/newPlaylist.php",
                type: "POST",
                data: formData,
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function () {
                    //$("#preview").fadeOut();
                    //$("#err").fadeOut();
                },
                success: function (data) {
                    if (data.includes('invalid')) {
                        // invalid file format.
                        $("#err").html("El formato de imagen no es válido o no se ha podido completar la solicitud ahora mismo, inténtelo más tarde");
                    }
                    else {
                        $("#success").text("Se ha creado la lista con éxito");
                        // view uploaded file.
                        $("#preview").html(data).fadeIn();
                        $("#newPlForm")[0].reset();
                        loadPlaylists();
                    }
                },
                error: function (e) {
                    $("#err").html("No se ha podido completar la solicitud ahora mismo, inténtelo más tarde");
                }
            });            
        } catch (error) {
            $("#err").html("No se ha podido completar la solicitud ahora mismo, inténtelo más tarde").fadeIn();
        }        
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