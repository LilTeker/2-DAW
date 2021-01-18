<?php
// https://www.php.net/manual/en/soapclient.soapclient

//ini_set("soap.wsdl_cache_enabled", "0"); 

$params = array('trace' => 1);

$wsdl = "http://localhost/wservice/08-wsdl.wsdl";

$client = new SoapClient($wsdl, $params);

$minimo = 10;
$maximo = 20;

//var_dump($client->__getFunctions());

$numero = $client->genera_numero($minimo, $maximo);

print "<p>Número al azar del $minimo al $maximo (con servicio web SOAP): <strong>$numero</strong></p>\n";    
 
//echo $client->tirar_dado();
?>

