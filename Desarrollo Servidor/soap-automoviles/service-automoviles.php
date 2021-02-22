<?php
/*
 * Servicio Web en PHP por Jose Hernández
 * https://josehernandez.es/2011/01/18/servicio-web-php.html
 */

include 'GestionAutomoviles.php';

//$test = new GestionAutomoviles;
//$test->TestBD(); 

$soap = new SoapServer(null, array('uri' => 'http://localhost/soap-automoviles/'));
$soap->setClass('GestionAutomoviles');
$soap->handle();
?>
