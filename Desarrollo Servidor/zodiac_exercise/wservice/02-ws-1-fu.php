<!DOCTYPE html>
<html lang="es">
<head>
  <!-- https://www.mclibre.org/consultar/php/lecciones/php-servicios-web.html -->
  <meta charset="utf-8">
  <title>
    Número al azar (con funciones).
    Servicios web.
    Ejemplos. PHP. Bartolomé Sintes Marco. www.mclibre.org
  </title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
<?php
function genera_numero() {
    return rand(1, 10);
}

$numero = genera_numero();

print "  <p>Número al azar del 1 al 10 (con funciones): <strong>$numero</strong></p>\n";
?>
</body>
</html>



