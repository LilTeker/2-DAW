<!DOCTYPE html>
<html lang="es">
<head>
  <!-- https://www.mclibre.org/consultar/php/lecciones/php-servicios-web.html -->
  <meta charset="utf-8">
  <title>
    Número al azar (con biblioteca).
    Servicios web.
    Ejemplos. PHP. Bartolomé Sintes Marco. www.mclibre.org
  </title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
<?php
include "03-biblioteca.php";

$numero = genera_numero();

//var_dump($numero);

print "  <p>Número al azar del 1 al 10 (con biblioteca): <strong>$numero</strong></p>\n";
?>
</body>
</html>



