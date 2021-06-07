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
                <script src="../js/music.js"></script>
            </head>

            <body>

                <div class="container-fluid">

                    <?php
                    $site->print_navbar();
                    ?>
                    <div class="row" id="container-navbar-playlists">
                        <div class="col-sm-12 col-md-4">
                            <h3 class="header-pl-text"><?=$pl_name?></h3>
                        </div>
                        <div class="col-sm-12 col-md-8 d-flex justify-content-end">
                            <a href="playlists.php" class="btn btn-outline-warning mx-2">Volver a Playlists</a>
                            <button type="button" class="btn btn-outline-warning mx-2">Exportar</button>
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