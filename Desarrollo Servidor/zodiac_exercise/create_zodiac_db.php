<?php
/**
 * ZODIAC SIGNS - create_zodiac_db.php
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

require_once "zodiac_functions.php";

pageTop("Create zodiac DB", BACK_MENU);
require_once  "pdo.php";

try {
    $execResult = $pdo->exec("CREATE DATABASE zodiac; USE zodiac;");

    if ($execResult == 1) {
        echo "<p style='color: green'>Zodiac database has been created</p>";
    }
} catch (Exception $e) {
    echo "<p style='color: red'>Could not create <b>zodiac</b> db or it already exists</p>";
}

echo("<p>... and the connection is closed</p>");

pageBottom("2020-11-20");

