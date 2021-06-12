<?php

session_start();

require_once 'connection.php';

if (isset($_POST["pl_name"]) && isset($_POST["user_name"])) {

    try {

        $likeUserName = "%" . $_POST["user_name"] . "%";

        $stmt = $db->prepare("SELECT * FROM user WHERE username LIKE :user_name");
        $stmt->bindParam(":user_name", $likeUserName, PDO::PARAM_STR);

        $stmt->execute();
        $numRowsUsers = $stmt->rowCount();

        if ($numRowsUsers > 0) {
            
            $data = array();
            $data["users"] = array();
            $data["pl"] = array();

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

                extract($row);
                
                $user = array(
                    "username" => $username,
                    "user_id" => $user_id
                );

                array_push($data["users"], $user);
            }

            $likePlName = "%" . $_POST["pl_name"] . "%";
            
            foreach ($data["users"] as $user) {

                $stmt2 = $db->prepare("SELECT * FROM `playlist` WHERE `pl_name` LIKE :pl_name AND access_type = 0 AND `user_id` = :user_id");
                $stmt2->bindParam(":pl_name", $likePlName, PDO::PARAM_STR);
                $stmt2->bindParam(":user_id", $user["user_id"], PDO::PARAM_INT);

                $stmt2->execute();
                $numRowsPl = $stmt2->rowCount();

                if ($numRowsPl > 0) {
                    
                    while ($row = $stmt2->fetch(PDO::FETCH_ASSOC)) {

                        extract($row);
                        
                        $playlist = array(
                            "pl_id" => $pl_id,
                            "pl_name" => $pl_name,
                            "user_id" => $user_id,
                            "img_name" => $img_name,
                        );
        
                        array_push($data["pl"], $playlist);
                    }

                    http_response_code(200);
                    
                    echo json_encode($data);

                }

            }
        }

    } catch (Exception $e) {
        http_response_code(500);
        echo json_encode("error");
    }
    
    

} else {
    http_response_code(400);
    echo json_encode("bad request");
}
