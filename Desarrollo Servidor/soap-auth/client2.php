<?php
// How to Create a SOAP Client/Server in PHP (Added Authentification) - Part 02
// https://www.youtube.com/watch?v=6V_myufS89A

class client {
    public function __construct() {
        $params = array('location' => 'http://localhost/soap-auth/server2.php',
                        'uri' => 'urn://localhost/soap-auth/server2.php',
                        'trace' => 1);
        $this->instance = new SoapClient(null, $params);

        // set the header 
        // https://www.php.net/manual/en/reserved.classes.php
        $auth_params = new stdClass();
        $auth_params->username = 'ies';
        $auth_params->password = 'daw';

        // https://www.php.net/manual/en/soapheader.soapheader
        // https://www.php.net/manual/en/soapvar.soapvar.php

        $header_params = new SoapVar($auth_params, SOAP_ENC_OBJECT);
        $header = new SoapHeader('http://localhost/soap-auth/', 'authenticate', $header_params, false);
        $this->instance->__setSoapHeaders(array($header));

    }

    public function getName($id_array) {
        return $this->instance->getStudentName($id_array);
        //return $this->instance->__soapCall('getStudentName', $id_array);
    }
}
    
    //$client = new client();   
?>

