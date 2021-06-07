<?php

session_start();

require_once 'connection.php';



if (isset($_SESSION["user_login"])) {
    
    $stmt = $db->prepare("SELECT * FROM playlist WHERE user_id = :user_id");
    $stmt->bindParam(":user_id", $_SESSION["user_login"], PDO::PARAM_INT);

    if ($stmt->execute()) {

        $numberRows = $stmt->rowCount();

        if ($numberRows > 0) {

            $plArray = array();

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                extract($row);

                $playlist = array(
                    "pl_id" => $pl_id,
                    "pl_name" => $pl_name,
                    "img_name" => $img_name,
                    "access_type" => $access_type 
                );

                array_push($plArray, $playlist);

            }

            http_response_code(200);

            echo json_encode($plArray);

        } else {

            http_response_code(200);

            echo json_encode("empty");
        }

    } else {

        http_response_code(404);

        echo "Could not retrieve playlists from the server, try again later";
    }


} else {
    
    http_response_code(403);

    echo "You must be logged in to access this data";  

}

?>