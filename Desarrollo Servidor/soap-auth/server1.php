<?php
// How to Create a SOAP Client/Server in PHP - Part 01
// https://www.youtube.com/watch?v=e_7jDqN2A-Y

class server {
    private $con;
  
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
        //return "nombre";

        $id = $id_array['id'];
        $sql = "SELECT name FROM students WHERE id = '$id'";
        $qry = $this->con->query($sql);
        $res = $qry->fetch(PDO::FETCH_ASSOC); 
        return $res['name'];
    }
}
    
    $params = array('uri' => 'http://localhost/soap-auth/server1.php');
    $server = new SoapServer(null, $params);
    $server->setClass('server');
    $server->handle();
    
?>

