<!DOCTYPE html>
<html lang="es">
<head>
    <title>DNI calculator</title>
    <meta charset="UTF-8">
    <meta name="description" content="DNI Calculator">
    <meta name="keywords" content="HTML">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <form style="text-align: center">
        <label for="dni">Escriba los números del DNI que quiera calcular</label><br>
        <input type="number" name="dni" id="dni" min="0" max="99999999">
        <input type="submit">
    </form>
    <?php

        if (isset($_GET["dni"])) {

            $inputDni = $_GET["dni"];

            if (is_numeric($inputDni)) {
                if (strlen($inputDni) != 8) {
                    echo "<p>DNI must have 8 digits</p>";
                } else {
                    echo "DNI is ok";
                    echo "<p>$inputDni" . getLetter($inputDni) . "</p>";
                }
            } elseif (strlen($inputDni) == 0) {
                echo "<p>DNI parameter is empty!</p>";
            } else {
                echo "<p>DNI Must be an Integer!</p>";
            }

        } else {
            echo "<p>Missing DNI Parameter</p>";
        }

        function getLetter($inputDni) {
            $rest = $inputDni % 23;
            $arrLetters = array( "T", "R", "W", "A", "G", "M", "Y", "F", "P", "D", "X", "B", "N", "J", "Z", "S", "Q", "V", "H", "L", "C", "K", "E");

            return $arrLetters[$rest];
        }
    ?>
</body>
</html>