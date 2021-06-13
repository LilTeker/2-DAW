<?php
session_start();

require_once '../vendor/autoload.php';
require_once '../php_scripts/connection.php';
require_once '../php_scripts/Web_html.php';

$site = new Web_html();



if (isset($_SESSION["user_login"]) && isset($_GET["pl_id"])) {


    $pl_name = "";
    $access_type = "";
    $owner = "";
    $pl_id = $_GET["pl_id"];



    /*Get playlist name*/
    //$id = $_SESSION['user_login'];
    $stmt_plname = $db->prepare("SELECT * FROM playlist WHERE pl_id = :pl_id");




    if ($stmt_plname->execute(array(":pl_id" => $_GET['pl_id']))) {

        $row = $stmt_plname->fetch(PDO::FETCH_ASSOC);
        $pl_name = $row['pl_name'];
        $access_type = $row['access_type'];
        $owner = $row["user_id"];

        $access_type_text = ($access_type == 0 ? "Pública" : "Privada");

        if ($access_type == 1 && ($owner != $_SESSION["user_login"])) {
            die("You are not the owner of this playlist and its private");
        } else {
            $hiddenClass = ($owner != $_SESSION["user_login"] ? "hide" : "nohide");
?>

            <!DOCTYPE html>
            <html>

            <head>
                <?php
                $site->print_head($pl_name);
                ?>
                <!--<script src="../js/jquery.serializeToJSON.js"></script>-->
                <script src="https://www.youtube.com/iframe_api"></script>
                <script src="https://w.soundcloud.com/player/api.js"></script>
                <!--<script src="../js/tests.js"></script>-->
                <script src="../js/Song.js"></script>
                <script src="../js/music.js"></script>
            </head>

            <body>

                <div class="container-fluid" id="container-identificator" data-plid="<?= $pl_id ?>">
                    <?php
                    $site->print_navbar();
                    ?>
                    <div class="row" id="container-navbar-playlists">
                        <div class="col-sm-12 col-md-8">
                            <h3 class="header-pl-text"><?= $pl_name ?></h3>
                        </div>
                        <div class="col-sm-12 col-md-4 text-right">
                            <h3 class="header-pl-text"><?=$access_type_text?></h3>
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col-sm-12 col-lg-7">
                            <div class="row">
                                <div class="col-sm-12" id="player-container">
                                    <h3 id="text-start-music">Haz click en alguna de tus canciones para comenzar la reproducción</h3>
                                    <!--here should be div id="player" for the youtube iframe api when needed-->
                                    <div id="player"></div>
                                    <!--<iframe width="100%" height="100%" src="https://www.youtube.com/embed/2ikms80DTPg" title="SHINOVA - Solo Ruido (Lyric Video Oficial)" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>-->
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-5">
                            <div class="row" id="music-container">
                                <div class="col-sm-12">
                                    <ul id="container-music-list">
                                        <li class="song-element" data-listid="0">
                                            <p><i class="fab fa-youtube"></i> No tienes ninguna canción en tu lista, ¡Añádela ahora!</p>
                                        </li>
                                    </ul>
                                    <div id="add-song" class="<?=$hiddenClass?>">
                                        <button type="button" data-toggle="modal" data-target="#newSongModal" id="new-song-button" class="mx-2"><i class="fas fa-plus"></i> Añade tu Música</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="error-msg"></div>

                    <div class="modal fade" id="newSongModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <form id="newSongForm">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Añadir Canciones</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="form-group col-sm-12">
                                                <label for="source">Elije la fuente de tu música:</label>
                                                <select class="form-control" name="source" id="source">
                                                    <option value="null"></option>
                                                    <option value="0">Youtube</option>
                                                    <option value="1">Soundcloud</option>
                                                </select>
                                            </div>
                                            <div id="form-container" class="col-sm-12"></div>
                                            <div class="col-sm-12 success" id="success-song"></div>
                                            <div class="col-sm-12 err" id="err-song"></div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                        <button type="submit" class="btn btn-primary">Añadir</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>

            </body>

            </html>
<?php
        }
    }
} else {
    die("You MUST be identified and need to access throught the website to the playlist");
}

?>