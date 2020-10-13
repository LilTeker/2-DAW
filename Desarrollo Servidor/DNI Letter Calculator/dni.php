<?php
$title = "Dni";
include("header.php");                  //INCLUIMOS HEADER
?>
<?php

if (isset($_GET["dni"])) {

    $inputDni = $_GET["dni"];

    if (is_numeric($inputDni)) {
        if (strlen($inputDni) != 8) {
            echo "<p style='text-align: center; font-size: large'>DNI debe de tener 8 dígitos</p>";
        } else {
            echo "<p style='text-align: center; font-size: large'>El DNI completo es: $inputDni" . getLetter($inputDni) . "</p>";
        }                                                                                                                               //CALCULAMOS LETRA
    } elseif (strlen($inputDni) == 0) {
        echo "<p style='text-align: center; font-size: large'>El parámetro DNI esta vacío</p>";
    } else {
        echo "<p style='text-align: center; font-size: large'>DNI debe ser un entero!</p>";
    }

} else {
    echo "<p style='text-align: center; font-size: large'>No existe el parámetro DNI</p>";
}

function getLetter($inputDni)
{
    $rest = $inputDni % 23;
    $arrLetters = array("T", "R", "W", "A", "G", "M", "Y", "F", "P", "D", "X", "B", "N", "J", "Z", "S", "Q", "V", "H", "L", "C", "K", "E");

    return $arrLetters[$rest];
}

?>
<?php
include("footer.php");                          //INCLUIMOS FOOTER
?>