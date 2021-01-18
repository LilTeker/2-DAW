<?php
// ver 06-ws-3-ws.php

$minimo = $_REQUEST["min"];
$maximo = $_REQUEST["max"];
$valores = $_REQUEST["n"];

// Solución generando el string
print "[";
for ($i = 0; $i < $valores - 1; $i++) {
    print rand($minimo, $maximo) . ", ";
}
print rand($minimo, $maximo);
print "]";

// Otra solución usando json_encode
// json_encode — Returns the JSON representation of a value
// https://www.php.net/manual/en/function.json-encode
/*
$a = array();
for ($i = 0; $i < $valores; $i++) {
    array_push($a, rand($minimo, $maximo));
}
echo json_encode($a);
*/
?>
