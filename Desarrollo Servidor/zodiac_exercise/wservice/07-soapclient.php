<?php
// https://www.php.net/manual/en/soapclient.soapclient

$params = array('location' => 'http://localhost/wservice/07-soapserver.php',
                'uri' => 'http://localhost/wservice/07-soapserver.php',
                'trace' => 1);

$client = new SoapClient(null, $params);

$minimo = 10;
$maximo = 20;

$numero = $client->genera_numero($minimo, $maximo);

print "  <p>Número al azar del $minimo al $maximo (con servicio web SOAP): <strong>$numero</strong></p>\n";    
 
?>

