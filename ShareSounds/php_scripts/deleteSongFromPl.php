<?php

session_start();

require_once 'connection.php';

if (isset($_POST["pl_id"]) && isset($_POST["song_id"])) {
    if (is_numeric($_POST["pl_id"]) && is_numeric($_POST["song_id"])) {
       
        try {
            //check if playlist is private or public
            $stmt_plname = $db->prepare("SELECT * FROM playlist WHERE pl_id = :pl_id");

            if ($stmt_plname->execute(array(":pl_id" => $_POST['pl_id']))) {
        
                $row = $stmt_plname->fetch(PDO::FETCH_ASSOC);
                $owner = $row["user_id"];
        
                if ($owner != $_SESSION["user_login"]) {
                    http_response_code(403);

                    echo json_encode("forbidden");
                } else {

                    $stmt = $db->prepare("DELETE FROM song WHERE song_id = :song_id");
                    $stmt->bindParam(":song_id", $_POST["song_id"], PDO::PARAM_INT);
        
                    $stmt->execute();
        
                    $rowCount = $stmt->rowCount();
        
                    if ($rowCount > 0) {
        
                        http_response_code(200);
        
                        echo json_encode("deleted");
        
                    } else {
                        http_response_code(404);
        
                        echo json_encode("not found");
                    }

                };

            }
            
        } catch (Exception $e) {
            http_response_code(500);

            echo json_encode("error");
        }

    } else {
        http_response_code(400);

        echo json_encode("bad_request");
    }
} else {
    http_response_code(400);

    echo json_encode("bad_request");
}
