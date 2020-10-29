<?php 
/**
 * DWES - 2º DAW - IES Virgen del Carmen de Jaén
 *
 * Ejercicio basado en: Cookies 1 - cookies_1a.php
 * https://www.mclibre.org/consultar/php/ejercicios/sesiones/cookies/cookies-1a.php
 *
 * @author    Bartolomé Sintes Marco <bartolome.sintes+mclibre@gmail.com>
 * @copyright 2010 Bartolomé Sintes Marco
 * @license   http://www.gnu.org/licenses/agpl.txt AGPL 3 or later
 * @version   2010-05-09
 * @link      http://www.mclibre.org
 */

$idioma = $_GET['idioma'] ?? '';

// Si se establece un idioma se crea la cookie idiomaUsuario con el valor correspondiente $idioma
if (($idioma=='es') || ($idioma=='en') || ($idioma=='fr')) {
    setcookie('idiomaUsuario', $idioma);
// Si se elige idioma ninguno se borra la cookie idiomaUsuario
} elseif ($idioma=='none') {
    setcookie ("idiomaUsuario", "", time() - 3600);
// Si no se elige idioma se comprueba si ya existe la cookie idiomaUsuario y se guarda en $idioma
} elseif (isset($_COOKIE['idiomaUsuario'])) {
    $idioma = $_COOKIE['idiomaUsuario'];
} else {
    $idioma = '';
}

// Para usar las funciones cabecera y pie
include_once 'funciones.php';

// function cabecera($titulo, $estilo, $tituloCSS, $textoh1)
cabecera("Ejemplo de uso de Cookies - Elegir Idioma A", "idiomas.css",
    "Estilo básico", "Ejemplo de uso de Cookies (Elegir Idioma)");

// Mostrar mensaje respecto al valor de $idioma
if ($idioma=='') {
    print "<h2>No se ha seleccionado ningún idioma.</h2>\n";
} else { 
    print "<h2>Ha elegido el idioma: $idioma.</h2>\n";
}

//Cambiar de idioma
print "<p>Cambio de idioma: 
  <a href=\"$_SERVER[PHP_SELF]?idioma=es\"><img src=\"images/es_50px.png\" alt=\"Español\" title=\"Español\" /></a>
  <a href=\"$_SERVER[PHP_SELF]?idioma=en\"><img src=\"images/en_50px.png\" alt=\"English\" title=\"English\" /></a>
  <a href=\"$_SERVER[PHP_SELF]?idioma=fr\"><img src=\"images/fr_50px.png\" alt=\"Français\" title=\"Français\" /></a>
  <a href=\"$_SERVER[PHP_SELF]?idioma=none\"><img src=\"images/none_50px.png\" alt=\"Ninguno\" title=\"Ninguno / None / Aucun\" /></a>(se borra la cookie idiomaUsuario)</p>
<p><a href=\"cookie_idioma_B.php\">Ir a otra página para comprobar la cookie</a></p>";

// function pie($fecha)
pie("2020-10-26");
?>
