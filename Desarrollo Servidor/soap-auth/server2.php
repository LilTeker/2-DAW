<?php
// How to Create a SOAP Client/Server in PHP (Added Authentification) - Part 02
// https://www.youtube.com/watch?v=6V_myufS89A

class server {
    private $con;

    public static function authenticate($header_params) {
        if($header_params->username == 'ies' && $header_params->password == 'daw') {
            return true;
        }  
        else throw new SoapFault('Wrong user/pass combination', 401);  
    }  

    // singleton
    public function __construct() {
        $this->con = (is_null($this->con)) ? self::connect() : $this->con;
    }

    static function connect() {

        try {
             $user = "root";
             $pass = "";
             $dbname = "students";
             $host = "127.0.0.1";
	
             $con = new PDO("mysql:host=$host; dbname=$dbname", $user, $pass);
             $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  
             return $con;
        } catch (PDOException $e) {  
             print "<p>Error: " . $e->getMessage() . "</p>\n";  
	     exit();
        }
    }

    public function getStudentName($id_array) {
        if (is_null($this->con)) return "ERROR";

        // using prepared statements
        $id = $id_array['id'];
        $sql = "SELECT name FROM students WHERE id = :id";
        $stmt = $this->con->prepare($sql);
        $stmt->execute([':id' => $id]);
        $res = $stmt->fetch(PDO::FETCH_ASSOC); 
        $stmt = null;
        return $res['name'];
    }

} // end class
    
    $params = array('uri' => 'http://localhost/soap-auth/server2.php');
    $server = new SoapServer(null, $params);
    $server->setClass('server');
    $server->handle();
    
?>

