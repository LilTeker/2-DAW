<?php
/**
 * ZODIAC SIGNS - index.php (log in)
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

pageTop("Log In", BACK_MENU);

session_start();

if (isset($_POST["user"]) && isset($_POST["pass"])) {
    if (strlen($_POST["user"]) < 1 || strlen($_POST["pass"]) < 1) {
        $_SESSION["error"] = "User and Password are required";
        header("Location: index.php");
        return;
    } else {
        $stored_hash = '$2y$10$YFhebj9wTFzwAgrVMV8TEuiIJMCtsXgV4gRe9JiIcBBAuiMhA0AuC';
        if ($_POST["user"] && password_verify($_POST["pass"], $stored_hash)) {
            $_SESSION["userName"] = $_POST["user"];
            header("Location: zodiac.php");
            return;
        } else {
            $_SESSION["error"] = "User or password are incorrect";
            header("Location: index.php");
            return;
        }
    }
}

if (isset($_SESSION["error"])) {
    echo('<p style="color: red">' . $_SESSION["error"] .'</p>');
    unset($_SESSION["error"]);
}
?>
  <form method="POST" action="index.php">
    <label for="user">User</label>
    <input type="text" name="user" id="user"><br/>
    <label for="pass">Password</label>
    <input type="password" name="pass" id="pass"><br/>
    <input type="submit" value="Log In">
    <input type="submit" name="cancel" value="Cancel">
  </form>
<?php
pageBottom("2020-11-20");
?>
