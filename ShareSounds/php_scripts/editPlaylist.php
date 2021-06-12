<?php
session_start();

require_once 'connection.php';

if (isset($_POST["access_type"]) && isset($_POST["pl_name"]) && isset($_POST["pl_id"])) {
    
    try {
        if (empty($_POST["pl_name"])) {
            echo "skere";
            
            $stmt = $db->prepare("UPDATE playlist SET access_type = :access_type WHERE pl_id = :pl_id");
            $stmt->bindParam(":access_type", $_POST["access_type"], PDO::PARAM_INT);
            $stmt->bindParam(":pl_id", $_POST["pl_id"], PDO::PARAM_INT);

            if ($stmt->execute()) {
                http_response_code(200);
                echo json_encode("correct");
            } else {
                http_response_code(500);
                echo json_encode("error");
            }

        } else {
            $stmt = $db->prepare("UPDATE playlist SET access_type = :access_type, pl_name = :pl_name WHERE pl_id = :pl_id");
            $stmt->bindParam(":access_type", $_POST["access_type"], PDO::PARAM_INT);
            $stmt->bindParam(":pl_name", $_POST["pl_name"], PDO::PARAM_STR);
            $stmt->bindParam(":pl_id", $_POST["pl_id"], PDO::PARAM_INT);

            if ($stmt->execute()) {
                http_response_code(200);
                echo json_encode("correct");
            } else {
                http_response_code(500);
                echo json_encode("error");
            }    
        }
    } catch (Exception $e) {
        http_response_code(500);
        echo json_encode("error");
    }

}

?>