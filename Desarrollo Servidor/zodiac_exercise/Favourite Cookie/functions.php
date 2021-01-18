<?php
// Funciones para cookie_idioma_A.php
//                cookie_idioma_B.php
/*
   $titulo de la página etiqueta <title> en <head>
   $estilo nombre de la hoja de estilo, fichero css
   $tituloCSS nombre del estilo css
   $textoh1 texto a incluir dentro de la etiqueta <h1> al comienzo de la página
*/
function cabecera($titulo, $estilo, $tituloCSS, $textoh1)
{
print "<!DOCTYPE html>
<html lang='es'>
<head>
    <meta charset='UTF-8' />
    <title>$titulo</title>
    <meta name='viewport' content='width=device-width, initial-scale=1.0' />
    <link href='$estilo' rel='stylesheet' type='text/css' title='$tituloCSS' />
</head>
<body>
<h1>$textoh1</h1>\n";
}


function pie($fecha)
{
    $cadenaFecha = formatearFecha($fecha);
    echo <<< FINPIE
    <hr>
    <footer>
      <p class="ultmod">
        Última modificación de esta página:
        <time datetime="$fecha">$cadenaFecha</time></p>

      <p>Miguel Robles Gámez - Fruit Cookies using Cookies</p>
    </footer>
  </body>
</html>
FINPIE;
}
function formatearFecha($fecha)
{
    define('formatoFecha', '%d de %B de %Y');
    setlocale(LC_ALL, 'es_ES.UTF-8');
    return strftime(formatoFecha, strtotime($fecha));
}

function chooseFruit($fruit) {

    if ($fruit == "naranja") {
        ?>
        <img src="img/naranja.jpg">
        <h2><a href="https://okdiario.com/recetas/receta-galletas-naranja-3575452">Receta</a></h2>
        <?php
    } elseif ($fruit == "manzana") {
        ?>
        <img src="img/manzana.jpg">
        <h2><a href="https://www.schaer.com/es-int/r/galletas-de-manzana">Receta</a></h2>
        <?php
    } elseif ($fruit == "melocoton") {
        ?>
        <img src="img/melocoton.jpg">
        <h2><a href="https://www.vix.com/es/imj/gourmet/6558/galletitas-de-melocoton">Receta</a></h2>
        <?php
    } elseif ($fruit == "piña") {
        ?>
        <img src="img/piña.jpg">
        <h2><a href="https://www.petitchef.es/recetas/postre/galletas-de-pina-fid-1257918">Receta</a></h2>
        <?php
    } elseif ($fruit == "fresa") {
        ?>
        <img src="img/fresa.jpg">
        <h2><a href="https://www.cocinatis.com/receta/galletas-de-fresa">Receta</a></h2>
        <?php
    } elseif ($fruit == "kiwi") {
        ?>
        <img src="img/kiwi.jpg">
        <h2><a href="https://funcook.com/receta/galletas-de-kiwi/290">Receta</a></h2>
        <?php
    }
}
?>