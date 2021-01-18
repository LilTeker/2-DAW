<?php
// https://www.php.net/manual/en/soapserver.soapserver

require '07-class-aleatorio.php';

$params = array('uri' => 'http://localhost/wservice/07-soapserver.php');

$server = new SoapServer(null, $params);
$server->setClass('Aleatorio');
$server->handle();
    
?>

