<?php
/**
 * ZODIAC SIGNS - zodiac_functions.php
 *
 * IES Virgen del Carmen de Jaén
 * Desarrollo Web en Entorno Servidor 2º DAW
 *
 * Based on the code of:
 *
 * @author    Bartolomé Sintes Marco <bartolome.sintes+mclibre@gmail.com>
 * @copyright 2012 Bartolomé Sintes Marco
 * @license   http://www.gnu.org/licenses/agpl.txt AGPL 3 or later
 * @version   2012-11-27
 * @link      http://www.mclibre.org
 *
 *  This program is free software: you can redistribute it and/or modify
 *  it under the terms of the GNU Affero General Public License as published by
 *  the Free Software Foundation, either version 3 of the License, or
 *  any later version.
 *
 *  This program is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU Affero General Public License for more details.
 *
 *  You should have received a copy of the GNU Affero General Public License
 *  along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

define("MAIN_MENU", "mainMenu");
define("BACK_MENU", "backMenu"); // Back to home

function pageTop($text, $menu)
{
    print "<!DOCTYPE html>
<html lang='en'>
  <head>
    <meta charset='utf-8' />
    <meta name='viewport' content='width=device-width, initial-scale=1.0' />
    <title>Zodiac Signs - $text</title>
    <link href='zodiac.css' rel='stylesheet' type='text/css' /> 
    <link rel='shortcut icon' type='image/x-icon' href='favicon.ico'>
  </head>
<body>
<h1>Zodiac Signs - <span class='page'>$text</span></h1>
<div id='menu'>
  <ul>\n";
    if ($menu == MAIN_MENU) {
        print "    <li><a href='create_zodiac_db.php'>Create zodiac DB</a></li>
    <li><a href='create_zodiacsigns_table.php'>Create zodiacsigns Table</a></li>
    <li><a href='insert_rows.php'>Insert Rows</a></li>
    <li><a href='display_table.php'>Display Table</a></li>
    <li><a href='drop_table.php'>Drop Table</a></li>
    <li><a href='drop_db.php'>Drop Database</a></li>
    <li><a href='logout.php'>Log Out</a></li>\n";
    } elseif ($menu == BACK_MENU) {
        print "    <li><a href='zodiac.php'>Home</a></li>\n";
    } else {
        print "    <li>Menu selection error</li>\n";
    }
    print "  </ul>
</div>
<div id='content'>\n";
}

/*
   $date last modification of the calling page
   yyyy-mm-dd
*/
function pageBottom($date)
{
    print "</div>\n";
    $cadenaFecha = formatearFecha($date);
    $dateString = dateFormat($date);
    echo <<< END
<footer>
  <p class="lastmod">
    Last modification of this page:
    <time datetime="$date">$dateString</time>
  </p>
  <p class="lastmod">
    <time datetime="$date">$cadenaFecha</time> (Rafael García Cabrera)
  </p>
  <p class="license">
    Este programa utiliza código del curso "Páginas web con PHP" disponible en <a
    href="http://www.mclibre.org/consultar/php/">http://www.mclibre.org/consultar/php/</a><br />
    cuyo autor es Bartolomé Sintes Marco<br />
    El programa PHP que genera esta página está bajo
    <a rel="license" href="http://www.gnu.org/licenses/agpl.txt">licencia AGPL 3 o posterior</a>.
  </p>
</footer>
</body>
</html>
END;
}

/*
   $date en formato "aaaa-mm-dd" se pasa a "dd de mes de aaaa"

   Configuración de idioma, para que el mes salga en español
   http://php.net/manual/es/function.setlocale.php

   strftime — Formatea una fecha/hora local según una configuración local
   http://php.net/manual/es/function.strftime.php

   strtotime — Convierte una descripción de fecha/hora textual en Inglés a una fecha Unix
   http://php.net/manual/es/function.strtotime.php
*/

function formatearFecha($date): string
{
    define('formatoFecha', '%d de %B de %Y');
    setlocale(LC_ALL, 'es_ES.UTF-8');
    return strftime(formatoFecha, strtotime($date));
}

function dateFormat($date): string
{
    define('format', '%B %d, %Y');
    setlocale(LC_ALL, "en_US.UTF-8");
    return strftime(format, strtotime($date));
}
