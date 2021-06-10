<?php

session_start();

require_once 'connection.php';

if (isset($_POST["pl_id"])) {
    if (is_numeric($_POST["pl_id"])) {
       
        try {
            //check if playlist is private or public
            $stmt_plname = $db->prepare("SELECT * FROM playlist WHERE pl_id = :pl_id");

            if ($stmt_plname->execute(array(":pl_id" => $_POST['pl_id']))) {
        
                $row = $stmt_plname->fetch(PDO::FETCH_ASSOC);
                $access_type = $row['access_type'];
                $owner = $row["user_id"];
        
                if ($access_type == 1 && ($owner != $_SESSION["user_login"])) {
                    http_response_code(403);

                    echo json_encode("forbidden");
                } else {

                    $stmt = $db->prepare("SELECT * FROM song WHERE pl_id = :pl_id");
                    $stmt->bindParam(":pl_id", $_POST["pl_id"], PDO::PARAM_INT);
        
                    $stmt->execute();
        
                    $rowCount = $stmt->rowCount();
        
                    if ($rowCount > 0) {
                        
                        $songsArr = [];
        
                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            
                            extract($row);
        
                            $song = array(
                                "song_id" => $song_id,
                                "name" => $name,
                                "link" => $link,
                                "type" => $type,
                                "pl_id" => $pl_id,
                                "data_frame" => $data_frame
                            );
        
                            array_push($songsArr, $song);
                        }
        
                        http_response_code(200);
        
                        echo json_encode($songsArr);
        
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
