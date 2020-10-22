<?php
// https://www.mclibre.org/consultar/php/ejercicios/con-formularios/controles-formularios-2/controles-formularios-2-14-1.php

include_once "funciones.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $titulo = "Datos personales 5 (Resultado). Controles en formularios (2). Con formularios. Ejercicios. PHP. Bartolomé Sintes Marco. www.mclibre.org";
    $estilo = "mclibre-php-ejercicios.css";
    $tituloCSS = "Color";
    $textoh1 = "Datos personales 5 (Resultado)";

    cabecera($titulo, $estilo, $tituloCSS, $textoh1);

    $nombre = recoge("nombre");
    $apellidos = recoge("apellidos");
    $edad = recoge("edad");
    $peso = recoge("peso");
    $sexo = recoge("genero"); // El control no se llama sexo para evitar el proxy de Conselleria
    $estadoCivil = recoge("estadoCivil");
    $cine = recoge("cine");
    $deporte = recoge("deporte");
    $literatura = recoge("literatura");
    $musica = recoge("musica");
    $tebeos = recoge("tebeos");
    $television = recoge("television");

    $nombreOk = false;
    $apellidosOk = false;
    $edadOk = false;
    $pesoOk = false;
    $sexoOk = false;
    $estadoCivilOk = false;
    $cineOk = false;
    $deporteOk = false;
    $literaturaOk = false;
    $musicaOk = false;
    $tebeosOk = false;
    $televisionOk = false;

    if ($nombre == "") {
        print "  <p class=\"aviso\">No ha escrito su nombre.</p>\n";
        print "\n";
    } else {
        $nombreOk = true;
    }

    if ($apellidos == "") {
        print "  <p class=\"aviso\">No ha escrito sus apellidos.</p>\n";
        print "\n";
    } else {
        $apellidosOk = true;
    }

    if ($edad == "...") {
        print "  <p class=\"aviso\">No ha indicado su edad.</p>\n";
        print "\n";
    } elseif ($edad != "1" && $edad != "2" && $edad != "3" && $edad != "4") {
        print "  <p class=\"aviso\">Por favor, indique su grupo de edad.</p>\n";
        print "\n";
    } else {
        $edadOk = true;
    }

    if ($peso == "") {
        print "  <p class=\"aviso\">No ha escrito su peso.</p>\n";
        print "\n";
    } elseif (!is_numeric($peso)) {
        print "  <p class=\"aviso\">No ha escrito el peso como número.</p>\n";
        print "\n";
    } elseif (!ctype_digit($peso)) {
        print "  <p class=\"aviso\">No ha escrito el peso como número entero.</p>\n";
        print "\n";
    } elseif ($peso > 250) {
        print "  <p class=\"aviso\">El peso es superior a 250 kg.</p>\n";
        print "\n";
    } else {
        $pesoOk = true;
    }

    if ($sexo == "") {
        print "  <p class=\"aviso\">No ha indicado su sexo.</p>\n";
        print "\n";
    } elseif ($sexo != "hombre" && $sexo != "mujer") {
        print "  <p class=\"aviso\">Por favor, indique si su sexo es hombre o mujer.</p>\n";
        print "\n";
    } else {
        $sexoOk = true;
    }

    if ($estadoCivil == "") {
        print "  <p class=\"aviso\">No ha indicado su estado civil.</p>\n";
        print "\n";
    } elseif ($estadoCivil != "soltero" && $estadoCivil != "casado" && $estadoCivil != "otro") {
        print "  <p class=\"aviso\">Por favor, indique si su estado civil es soltero, casado u otro.</p>\n";
        print "\n";
    } else {
        $estadoCivilOk = true;
    }

    if ($cine != "" && $cine != "on") {
        print "  <p class=\"aviso\">Por favor, indique si le gusta o no el cine.</p>\n";
        print "\n";
    } else {
        $cineOk = true;
    }

    if ($deporte != "" && $deporte != "on") {
        print "  <p class=\"aviso\">Por favor, indique si le gusta o no el deporte.</p>\n";
        print "\n";
    } else {
        $deporteOk = true;
    }

    if ($literatura != "" && $literatura != "on") {
        print "  <p class=\"aviso\">Por favor, indique si le gusta o no la literatura.</p>\n";
        print "\n";
    } else {
        $literaturaOk = true;
    }

    if ($musica != "" && $musica != "on") {
        print "  <p class=\"aviso\">Por favor, indique si le gusta o no la música.</p>\n";
        print "\n";
    } else {
        $musicaOk = true;
    }

    if ($tebeos != "" && $tebeos != "on") {
        print "  <p class=\"aviso\">Por favor, indique si le gustan o no los tebeos.</p>\n";
        print "\n";
    } else {
        $tebeosOk = true;
    }

    if ($television != "" && $television != "on") {
        print "  <p class=\"aviso\">Por favor, indique si le gusta o no la televisión.</p>\n";
        print "\n";
    } else {
        $televisionOk = true;
    }

    if ($nombreOk && $apellidosOk && $edadOk && $pesoOk && $sexoOk && $estadoCivilOk && $cineOk && $deporteOk && $literaturaOk && $musicaOk && $tebeosOk && $televisionOk) {
        print "  <p>Su nombre es <strong>$nombre</strong>.</p>\n";
        print "\n";
        print "  <p>Sus apellidos son <strong>$apellidos</strong>.</p>\n";
        print "\n";

        if ($edad == 1) {
            print "  <p>Tiene <strong>menos de 20 años</strong>.</p>\n";
        } elseif ($edad == 2) {
            print "  <p>Tiene <strong>entre 20 y 39 años</strong>.</p>\n";
        } elseif ($edad == 3) {
            print "  <p>Tiene <strong>entre 40 y 59 años</strong>.</p>\n";
        } else {
            print "  <p>Tiene <strong>60 o más años</strong>.</p>\n";
        }
        print "\n";

        print "  <p>Su peso es de <strong>$peso</strong> kg.</p>\n";
        print "\n";

        if ($sexo == "hombre") {
            print "  <p>Es un <strong>hombre</strong>.</p>\n";
        } else {
            print "  <p>Es una <strong>mujer</strong>.</p>\n";
        }
        print "\n";

        if ($estadoCivil == "soltero") {
            print "  <p>Su estado civil es <strong>soltero</strong>.</p>\n";
        } elseif ($estadoCivil == "casado") {
            print "  <p>Su estado civil es <strong>casado</strong>.</p>\n";
        } else {
            print "  <p>Su estado civil no es <strong>ni soltero ni casado</strong>.</p>\n";
        }
        print "\n";

        if ($cine != "on" && $deporte != "on" && $literatura != "on" && $musica != "on" && $tebeos != "on" && $television != "on") {
            print "  <p class=\"aviso\">No ha marcado ninguna afición.</p>\n";
        } else {
            print "  <p>Le gusta: ";
            if ($cine == "on") {
                print "<strong>el cine</strong>, ";
            }
            if ($deporte == "on") {
                print "<strong>el deporte</strong>, ";
            }
            if ($literatura == "on") {
                print "<strong>la literatura</strong>, ";
            }
            if ($musica == "on") {
                print "<strong>la música</strong>, ";
            }
            if ($tebeos == "on") {
                print "<strong>los tebeos</strong>, ";
            }
            if ($television == "on") {
                print "<strong>la televisión</strong> ";
            }
            print "</p>\n";
            print "\n";
        }
    }
    print '<p><a href="datosPersonales-1.php">Volver al formulario.</a></p>';
} else {
    $titulo = "Datos personales 5 (Formulario). Controles en formularios (2). Con formularios. Ejercicios. PHP. Bartolomé Sintes Marco. www.mclibre.org";
    $estilo = "mclibre-php-ejercicios.css";
    $tituloCSS = "Color";
    $textoh1 = "Datos personales 5 (Formulario)";

    cabecera($titulo, $estilo, $tituloCSS, $textoh1);
    ?>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <p>Escriba los datos siguientes:</p>

        <table>
            <tbody>
            <tr>
                <td>
                    <label>
                        <strong>Nombre:</strong><br>
                        <input type="text" name="nombre" size="20" maxlength="20">
                    </label>
                </td>
                <td>
                    <label>
                        <strong>Apellidos:</strong><br>
                        <input type="text" name="apellidos" size="20" maxlength="20">
                    </label>
                </td>
                <td>
                    <strong>Edad:</strong><br>
                    <select name="edad">
                        <option>...</option>
                        <option value="1">Menos de 20 años</option>
                        <option value="2">Entre 20 y 39 años</option>
                        <option value="3">Entre 40 y 59 años</option>
                        <option value="4">60 años o más</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <label>
                        <strong>Peso:</strong><br>
                        <input type="number" name="peso" min="1" max="250"> kg
                    </label>
                </td>
                <td>
                    <strong>Sexo:</strong><br>
                    <label><input type="radio" name="genero" value="hombre">Hombre</label>
                    <label><input type="radio" name="genero" value="mujer">Mujer</label>
                </td>
                <td>
                    <strong>Estado Civil:</strong><br>
                    <label><input type="radio" name="estadoCivil" value="soltero">Soltero</label>
                    <label><input type="radio" name="estadoCivil" value="casado">Casado</label>
                    <label><input type="radio" name="estadoCivil" value="otro">Otro</label>
                </td>
            </tr>
            </tbody>
        </table>

        <table style="border-spacing: 5px;">
            <tbody>
            <tr>
                <td rowspan="2" class="borde"><strong>Aficiones:</strong></td>
                <td><label><input type="checkbox" name="cine">Cine</label></td>
                <td><label><input type="checkbox" name="literatura">Literatura</label></td>
                <td><label><input type="checkbox" name="tebeos">Tebeos</label></td>
            </tr>
            <tr>
                <td><label><input type="checkbox" name="deporte">Deporte</label></td>
                <td><label><input type="checkbox" name="musica">Música</label></td>
                <td><label><input type="checkbox" name="television">Televisión</label></td>
            </tr>
            </tbody>
        </table>

        <p>
            <input type="submit" name="enviar" value="Enviar">
            <input type="reset" value="Borrar">
        </p>
    </form>
    <?php
}
?>
<?php

pie("2019-10-24");
/**
 * Controles en formularios (2) 14-1 - controles-formularios-2-14-1.php
 *
 * @author    Bartolomé Sintes Marco <bartolome.sintes+mclibre@gmail.com>
 * @copyright 2019 Bartolomé Sintes Marco
 * @license   http://www.gnu.org/licenses/agpl.txt AGPL 3 or later
 * @version   2019-10-24
 * @link      https://www.mclibre.org
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
?>