<?php



class Web_html
{

    public function print_head($title)
    {
    ?>

            <meta charset="utf-8">
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
            <meta name="viewport" content="initial-scale=1.0, maximum-scale=2.0">
            <title><?= $title ?> - ShareSounds</title>

            <link rel='icon' href='../favicon.ico' type='image/x-icon'/ >
            <script src="https://kit.fontawesome.com/18ffbc96ae.js" crossorigin="anonymous"></script>
            <link rel="preconnect" href="https://fonts.gstatic.com">
            <link href="https://fonts.googleapis.com/css2?family=Pattaya&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
            <link rel="stylesheet" href="../styles/general.css">

    <?php
    }





    public function print_navbar()
    {

    ?>

        <div class="row">
            <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="index.php"><img src="/img/logo.png" id="logo-img" alt="logo_sharesounds"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Sobre ShareSounds</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Cómo Usar ShareSounds</a>
                        </li>
                    </ul>
                    <form class="form-inline my-2 my-lg-0">

                        <?php
                        if (isset($_SESSION["user_login"])) {
                            ?>
                            <a class="btn btn-outline-success m-2 my-sm-0" href="playlists.php">Mis Playlists</a>
                            <a class="btn btn-outline-success m-2 my-sm-0" href="logout.php">Cerrar Sesión</a>
                            <?php
                        } else {
                            ?>
                            <a class="btn btn-outline-success m-2 my-sm-0" href="login.php">Identifícate</a>
                            <a class="btn btn-outline-success m-2 my-sm-0" href="register.php">Registrarse</a>
                            <?php
                        }
                        ?>
                        


                    </form>
                </div>
            </nav>
        </div>

    <?php

    }
}


?>