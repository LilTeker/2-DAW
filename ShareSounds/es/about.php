<?php

session_start();

require_once '../php_scripts/Web_html.php';

$site = new Web_html();

?>

<!DOCTYPE html>
<html>

<head>
    <?php
    $site->print_head("Identificarse");
    ?>
</head>

<body class="d-flex flex-column min-vh-100">
    <div class="container-fluid fix-for-footer">
        <?php
        $site->print_navbar();
        ?>

        <div class="row mt-5" id="container-intro">
            <div class="col-sm-12 mt-5 text-center">
                <h2>Sobre ShareSounds</h2>
            </div>
        </div>


        <div class="container my-5">
            <div class="row my-5">
                <div class="col-sm-12" id="text-about">
                    <p>
                        Esta aplicación se ha creado como proyecto final del curso de Grado Superior de Desarrollo
                        de Aplicaciones Web, en el año 2021. <br> <br>
                        Se ha contado con un tiempo limitado para el desarrollo de la misma, además de ser desarrollada
                        únicamente por una persona, por lo que muchas caracteristicas pensadas en el desarrollo de
                        la aplicación no se han podido implementar, por lo que podrán se añadidas en un futuro, mediante
                        actualizaciones del sitio web y sus funcionalidades. <br> <br>
                        Algunas de las ideas pensadas para esta aplicación web eran las siguientes:
                    </p>


                    <ul>
                        <li>
                            <p>Ofrecerle la posibilidad a los usuarios de la aplicación de poner una foto de perfil de usuario independientemente del formato de esta, poder cambiarla cuando quisiera.</p>
                        </li>
                        <li>
                            <p>Poder bloquear a otros usuarios el acceso a tus playlist, creando asi una “blacklist” de usuarios para tus listas.</p>
                        </li>
                        <li>
                            <p>Poder denunciar el uso incorrecto de otros usuarios.</p>
                        </li>
                        <li>
                            <p>Poder crear listas conjuntas permitiendo la colaboración de otros usuarios.</p>
                        </li>
                        <li>
                            <p>Y de las más importantes: Añadir más fuentes al reproductor, cómo por ejemplo
                                spotify, vimeo, mixcloud... etc
                            </p>
                        </li>
                    </ul>

                    <br><br>
                    <p>
                        Pese a esto, la aplicación ha sido construida pensando en la posibilidad de futuras
                        actualizaciones, con el objetivo de facilitarlas y acortar el tiempo de desarrollo de estas.
                        Por lo tanto la lista mencionada anteriormente es posible que en algún momento acabe vaciándose,
                        cumpliendo un objetivo mas en el desarrollo de esta aplicación.
                    </p>
                    <p>
                        Habiendo mencionado esto, estoy contento con el resultado final, y espero que aquellos que prueben
                        la aplicación queden satisfechos, me despido por ahora. Miguel Robles Gámez.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <?php
    $site->printFooter();
    ?>
</body>

</html>