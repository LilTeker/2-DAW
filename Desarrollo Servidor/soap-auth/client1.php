<?php
// How to Create a SOAP Client/Server in PHP - Part 01
// https://www.youtube.com/watch?v=e_7jDqN2A-Y

class client {
    public function __construct() {
        $params = array('location' => 'http://localhost/soap-auth/server1.php',
                        'uri' => 'urn://localhost/soap-auth/server1.php',
                        'trace' => 1);
        $this->instance = new SoapClient(null, $params);
    }

    public function getName($id_array) {
        return $this->instance->__soapCall('getStudentName', $id_array);
        //return $this->instance->getStudentName($id_array);
    }
}
    
    $client = new client();   
?>

