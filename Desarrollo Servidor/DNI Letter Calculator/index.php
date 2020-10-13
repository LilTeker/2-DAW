<?php
$title = "Home";
include("header.php");
?>
    <form style="text-align: center" action="dni.php" method="get">
        <label for="dni">Escriba los números del DNI que quiera calcular</label><br><br>
        <input type="number" name="dni" id="dni" min="0" max="99999999">
        <input type="submit" value="Enviar">
    </form>
    <br><br><br>
<?php
include("footer.php");
?>