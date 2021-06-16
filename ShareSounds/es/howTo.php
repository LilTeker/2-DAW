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
    <div class="container-fluid fix-for-footer fix-overflow" id="howto-container">
        <?php
        $site->print_navbar();
        ?>
        <div class="row mt-5 text-center" id="container-intro">

            <div class="col-sm-12 mt-5">
                <h2>Tus Primeros Pasos con ShareSounds</h2>
            </div>
            <div class="col-sm-12">
                <p class="p-howTo">Si te encuentras algo perdido y te gustaría saber como utilizar nuestra aplicación
                has llegado al lugar perfecto, ¡Aquí te explicamos como utilizar ShareSounds al completo!</p>
            </div>

        </div>
        <div class="row py-5">
            <div class="col-sm-12 col-lg-8 text-container-howTo order-1">
                <h3><span class="number-howTo">1.</span> Si es la primera vez que utilizas la aplicación</h3>
                <p class="p-howTo">¡El primer paso sería hacerte una cuenta en nuestra aplicación! Para ello puedes 
                    acceder al formulario de registro haciendo click al boton "Registrarse" en la esquina superior derecha de nuestra página de inicio. <br>
                    Una vez dentro, simplemente escribe los datos que te solicitamos y en menos de 1 minuto tendrás tu cuenta
                    registrada en nuestra aplicación.
                </p>
            </div>
            <div class="col-sm-12 col-lg-4 order-2">
                <img class="img-howto" src="/img/howto1.png" alt="step 1">
            </div>
            <div class="col-sm-12 mt-5 col-lg-8  order-3">
                <hr class="line-container-howTo">
            </div>
        </div>
        <div class="row  py-5">
            <div class="col-sm-12 col-lg-4 order-2 order-lg-1">
                <img class="img-howto" src="/img/howto2.png" alt="step 2">
            </div>
            <div class="col-sm-12 col-lg-8 order-1 order-lg-2">
                <h3><span class="number-howTo">2.</span> Una vez registrado...</h3>
                <p class="p-howTo">Ahora que ya tienes una cuenta de usuario registrado en nuestra aplicación, es el momento
                    de identificarte para poder empezar a utilizar la aplicación, simplemente haz click en el 
                    boton "Identifícate", y una vez en el formulario de identificación, utiliza los datos que
                    acabas de usar para registrarse y acceder por primera vez a tu cuenta de SoundShare.
                </p>
            </div>
            <div class="col-sm-12 mt-5 offset-md-4 col-lg-8 order-3">
                <hr class="line-container-howTo">
            </div>
        </div>
        <div class="row py-5">
            <div class="col-sm-12 col-lg-8 text-container-howTo order-1">
                <h3><span class="number-howTo">3.</span> Tras identificarte</h3>
                <p class="p-howTo">Ahora que ya tienes una cuenta de usuario registrado en nuestra aplicación, y te has 
                    identificado correctamente, es el momento de comenzar a aprender a utilizar la aplicación 
                    de verdad, verás que los botones "Identificate" y "Registrarse" habrán desaparecido, si esto 
                    es así es que vas por buen camino pequeño padawan, ahora tendrás en su lugar los botones "Mis Playlists" 
                    y "Cerrar Sesión", y seguramente te encuentres en una página en blanco que te anima a crear tus propias listas... 
                    Así que... ¡Eso es lo que vamos a hacer ahora mismo! <br> <br> Para crear tu primera Playlist, dale click al botón 
                    "Nueva Playlist", posicionado en la esquina superior derecha de la pantalla, una vez hecho esto se te 
                    mostrará un formulario en el que podrás elegir el nombre de tu playlist, la privacidad de la misma y una 
                    imagen para identificarla en tu lista de Playlists, cuando hayas terminado de decidirte, dale click 
                    al botón "Crear" posicionado al final del formulario y... ¡Voilà! Ya tienes tu primera lista creada.
                </p>
            </div>
            <div class="col-sm-12 col-lg-4 order-2">
                <img class="img-howto" src="/img/howto3.png" alt="step 3">
            </div>
            <div class="col-sm-12 mt-5 col-lg-8 order-3">
                <hr class="line-container-howTo">
            </div>
        </div>
        <div class="row  py-5">
            <div class="col-sm-12 col-lg-4 order-2 order-lg-1">
                <img class="img-howto" src="/img/howto4.png" alt="step 4">
            </div>
            <div class="col-sm-12 col-lg-8 order-1 order-lg-2">
                <h3><span class="number-howTo">4.</span> A por la música</h3>
                <p class="p-howTo">Ya que has trasteado un poco con como funcionan las playlist, ¿Estaría bien llenarlas de algo que no sea 
                    aire no crees? Nosotros pensamos igual, así que vamos a darles un poco de vida añadiendo nuestra música. 
                    Para empezar entra en la pantalla del reproductor haciendo click al nombre de tu lista, una vez en la ventana 
                    del reproductor seguramente lo primero que veas es que no tienes ninguna canción añadida, y que hay un botón 
                    enorme pidiendote que le hagas click para añadir tus canciones, hay que dejarse llevar... así que ¡date prisa y 
                    dale click al botón! <br> <br>
                    Tendrás una ventana delante pidiendote que elijas la fuente de tu música, dale click al rectangulo blanco de 
                    debajo para elegir de donde quieres añadir tus pistas, al elegir cualquiera de las fuentes te pediremos los 
                    datos de la canción que necesitemos para añadirla a tu Playlist, así que rellena lo que te pidamos y dale click a añadir.
                    <br> <br> Así de simple puedes añadir tu música a las listas de reproducción.
                </p>
            </div>
            <div class="col-sm-12 mt-5 offset-md-4 col-lg-8 order-3">
                <hr class="line-container-howTo">
            </div>
        </div>
        <div class="row py-5">
            <div class="col-sm-12 col-lg-8 text-container-howTo">
                <h3><span class="number-howTo">5.</span> Por último, a disfrutar</h3>
                <p class="p-howTo">
                    Ya estaría, así de simple es crear tus listas de música en ShareSounds, y además puedes tener 
                    toda tu música de distintos sitios en una misma aplicación, ¿A que es una maravilla? <br><br>
                    Esperamos que disfrutes usando ShareSounds, y te facilitemos el día a día a tí y a tu música. <br><br>
                    ¡A disfrutar! 
                </p>
            </div>
            <div class="col-sm-12 col-lg-4">
                <img class="img-howto" src="/img/howto5.png" alt="step 5">
            </div>
            <div class="col-sm-12 mt-5 col-lg-8">
                <hr class="line-container-howTo">
            </div>
        </div>

    </div>
    <?php
    $site->printFooter();
    ?>
</body>

</html>