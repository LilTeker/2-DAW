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

        if ($access_type == 1 && ($owner != $_SESSION["user_login"])) {
            die("You are not the owner of this playlist and its private");
        } else {
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

                <div class="container-fluid" id="container-identificator" data-plid="<?=$pl_id?>">

                    <?php
                    $site->print_navbar();
                    ?>
                    <div class="row" id="container-navbar-playlists">
                        <div class="col-sm-12 col-md-4">
                            <h3 class="header-pl-text"><?= $pl_name ?></h3>
                        </div>
                        <div class="col-sm-12 col-md-8 d-flex justify-content-end">
                            <a href="playlists.php" class="btn btn-outline-warning mx-2">Volver a Playlists</a>
                            <button type="button" class="btn btn-outline-warning mx-2">Exportar</button>
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col-sm-12 col-lg-7">
                            <div class="row">
                                <div class="col-sm-12" id="player-container">
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
                                            <p><i class="fab fa-youtube"></i> Zapatillas - El canto del Loco</p>
                                        </li>
                                        <hr class="song-separator">
                                        <li class="song-element" data-listid="1">
                                            <p><i class="fab fa-soundcloud"></i> The Illusion of Free Will, with Sam Harris - StarTalk Radio</p>
                                        </li>
                                        <hr class="song-separator">
                                        <li class="song-element" data-listid="1">
                                            <p><i class="fab fa-soundcloud"></i> The Illusion of Free Will, with Sam Harris - StarTalk Radio</p>
                                        </li>
                                        <hr class="song-separator">
                                        <li class="song-element" data-listid="1">
                                            <p><i class="fab fa-soundcloud"></i> The Illusion of Free Will, with Sam Harris - StarTalk Radio</p>
                                        </li>
                                        <hr class="song-separator">
                                        <li class="song-element" data-listid="1">
                                            <p><i class="fab fa-soundcloud"></i> The Illusion of Free Will, with Sam Harris - StarTalk Radio</p>
                                        </li>
                                        <hr class="song-separator">
                                        <li class="song-element" data-listid="1">
                                            <p><i class="fab fa-soundcloud"></i> The Illusion of Free Will, with Sam Harris - StarTalk Radio</p>
                                        </li>
                                        <hr class="song-separator">
                                        <li class="song-element" data-listid="1">
                                            <p><i class="fab fa-soundcloud"></i> The Illusion of Free Will, with Sam Harris - StarTalk Radio</p>
                                        </li>
                                        <hr class="song-separator">
                                        <li class="song-element" data-listid="1">
                                            <p><i class="fab fa-soundcloud"></i> The Illusion of Free Will, with Sam Harris - StarTalk Radio</p>
                                        </li>
                                        <hr class="song-separator">
                                        <li class="song-element" data-listid="1">
                                            <p><i class="fab fa-soundcloud"></i> The Illusion of Free Will, with Sam Harris - StarTalk Radio</p>
                                        </li>
                                        <hr class="song-separator">
                                        <li class="song-element" data-listid="1">
                                            <p><i class="fab fa-soundcloud"></i> The Illusion of Free Will, with Sam Harris - StarTalk Radio</p>
                                        </li>
                                        <hr class="song-separator">
                                        <li class="song-element" data-listid="1">
                                            <p><i class="fab fa-soundcloud"></i> The Illusion of Free Will, with Sam Harris - StarTalk Radio</p>
                                        </li>
                                    </ul>
                                    <div id="add-song">
                                        <p><i class="fas fa-plus"></i> Añade tu Música</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="error-msg">
                    
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