<?php
// https://www.php.net/manual/en/soapserver.soapserver

require '08-class-aleatorio.php';

$wsdl = "http://localhost/wservice/08-wsdl.wsdl";

$server = new SoapServer($wsdl);

$server->setClass('Aleatorio');
$server->handle();
    
?>

