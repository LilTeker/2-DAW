<?php
include "functions.php";

cabecera("Galleta de Fruta preferida", "css/style.css", "estilo por defecto", "Galleta de Fruta Preferida");

if (!isset($_COOKIE["fruit"])) {
    setcookie("fruit", "none");
}

chooseFruit($_COOKIE["fruit"]);

echo "<br><br><a href='fruits_cookie.php'>Volver al inicio</a>";

pie(2020-11-1);
?>