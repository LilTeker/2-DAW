<!DOCTYPE html>
<html lang="es">
<head>
  <!-- https://www.mclibre.org/consultar/php/lecciones/php-servicios-web.html -->
  <meta charset="utf-8">
  <title>
    Número al azar (con servicio web).
    Servicios web.
    Ejemplos. PHP. Bartolomé Sintes Marco. www.mclibre.org
  </title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
<?php
/*
 * http_build_query — Generate URL-encoded query string
 * https://www.php.net/manual/en/function.http-build-query.php
 *
 * file_get_contents — Reads entire file into a string
 * https://www.php.net/manual/en/function.file-get-contents.php
 */

$minimo = 10;
$maximo = 20;

$consulta = http_build_query(["min" => $minimo, "max" => $maximo]);
$numero = file_get_contents("http://localhost/wservice/05-webservice.php?$consulta");

//var_dump($numero);
//$numero = intval($numero);

print "  <p>Número al azar del $minimo al $maximo (con servicio web): <strong>$numero</strong></p>\n";
?>

</body>
</html>
