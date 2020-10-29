<?php
/**
 * DWES - 2º DAW - IES Virgen del Carmen de Jaén
 *
 * Ejercicio basado en: Cookies 1 - cookies_1b.php
 * https://www.mclibre.org/consultar/php/ejercicios/sesiones/cookies/cookies-1b.php
 *
 * @author    Bartolomé Sintes Marco <bartolome.sintes+mclibre@gmail.com>
 * @copyright 2010 Bartolomé Sintes Marco
 * @license   http://www.gnu.org/licenses/agpl.txt AGPL 3 or later
 * @version   2010-05-09
 * @link      http://www.mclibre.org
 */

// Para usar las funciones cabecera y pie 
include_once 'funciones.php';

// Comprobar valor de la cookie idiomaUsuario
// Si está definida la cookie idiomaUsuario se guarda su valor en $idioma
// si no está definida la coookie idiomaUsuario se guarda la cadena vacía en $idioma

$idioma = $_COOKIE['idiomaUsuario'] ?? '';

// function cabecera($titulo, $estilo, $tituloCSS, $textoh1)
cabecera("Ejemplo de uso de Cookies - Elegir Idioma B","idiomas.css",
	"Estilo básico", "Comprobando la cookie (idiomaUsuario)");
		 
// Texto del mensaje según el idioma seleccionado
// $alt para el atributo alt y title de la imagen de cada bandera

switch ($idioma) {
	case '':
		$texto="No se ha elegido ningún idioma.";
	break;
	case 'es':
		$texto="Ha elegido el idioma Español.";
		$alt="Español";
	break;
	case 'en':
		$texto="You have chosen English language.";
		$alt="English";
	break;
	case 'fr':
		$texto="Vous avez choisi langue française.";
		$alt="Français";
	break;
	default:
		$texto="Por defecto: idioma Español.";
		$alt="Español";
		$idioma = 'es';
}

print "<h2 id=\"mensaje\">$texto</h2>\n";

// Si hay algún idioma elegido se muestra la bandera
if ($idioma!='')
  print "<p class=\"bandera\"><img src=\"images/".$idioma.".png\" alt=\"".$alt."\" title=\"".$alt."\" /></p>\n";

print "<p><a href=\"cookie_idioma_A.php\">Volver a la selección de idioma</a></p>\n";

// function pie($fecha)
pie("2020-10-26");
?>
