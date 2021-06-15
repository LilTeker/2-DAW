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
                            <a class="btn btn-outline-warning border-dark m-2 my-sm-0" href="playlists.php">Mis Playlists</a>
                            <a class="btn btn-outline-warning border-dark m-2 my-sm-0" href="logout.php">Cerrar Sesión</a>
                            <?php
                        } else {
                            ?>
                            <a class="btn btn-outline-warning border-dark m-2 my-sm-0" href="login.php">Identifícate</a>
                            <a class="btn btn-outline-warning border-dark m-2 my-sm-0" href="register.php">Registrarse</a>
                            <?php
                        }
                        ?>
                        


                    </form>
                </div>
            </nav>
        </div>

    <?php

    }

    public function printFooter() {
        ?>
        <!--mt-5 to fix problems with empty pages-->
        <div id="footer"> 
            <div class="container-fluid">
                <div class="row" id="container-footer">
                    <div class="col-sm-12 col-md-4 order-2 order-md-1 text-right">
                        <h3 class="header-footer">Contáctanos</h3>
                        <p>+34 620 11 80 16 <i class="fas fa-mobile-alt" style="font-size: 20px;"></i></p>
                        <p>sharesounds@contacto.com <i class="fas fa-envelope" style="font-size: 20px;"></i></p>
                        <h3 class="header-footer">Dónde encontrarnos</h3>
                        <p>Calle de los Milaneses <i class="fas fa-map-marked-alt" style="font-size: 20px;"></i><br>Número 6, <br> 28013 Madrid</p>
                    </div>
                    <div class="col-sm-12 col-md-4 order-1 order-md-2">
                        <img id="img-footer" src="/img/default_ss.png" alt="logo">
                        <p>
                            <a href="https://www.facebook.com"><i class="fab fa-facebook-square icon-footer m-3"></i></a>
                            <a href="https://www.instagram.com"><i class="fab fa-instagram icon-footer m-3"></i></a>
                            <a href="https://www.twitter.com"><i class="fab fa-twitter-square icon-footer m-3"></i></a>
                        </p>
                    </div>
                    <div class="col-sm-12 col-md-4 order-3 order-md-3 text-left">
                        <h3 class="header-footer">Acceso Rápido</h3>
                        <p><i class="fas fa-chevron-circle-right m-2"></i><a href="index.php">Inicio</a></p>
                        <p><i class="fas fa-chevron-circle-right m-2"></i><a href="about.php">Sobre ShareSounds</a></p>
                        <p><i class="fas fa-chevron-circle-right m-2"></i><a href="howTo.php">Cómo Usar ShareSounds</a></p>
                        <p><i class="fas fa-chevron-circle-right m-2"></i><a href="playlists.php">Mis Playlists</a></p>
                        <p><i class="fas fa-chevron-circle-right m-2"></i><a href="logout.php">Cerrar Sesión</a></p>
                    </div>
                </div>
            </div>
        </div>

        <?php
    }
}


?>