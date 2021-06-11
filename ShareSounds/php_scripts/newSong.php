<?php
session_start();

require_once 'connection.php';

//name: videoTitle, link: song_url_yt, type: "youtube", pl_id: $("#container-identificator").data("plid")

if (isset($_POST["type"]) && isset($_POST["pl_id"])) {


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

                switch ($_POST["type"]) {
                    case 'youtube':
                        
                        if (isset($_POST["name"]) && isset($_POST["link"]) && isset($_POST["type"]) && isset($_POST["pl_id"]) && isset($_POST["data_frame"])) {
                            
                            $stmt = $db->prepare("INSERT INTO `song` (`name`, `link`, `type`, `pl_id`, `data_frame`) VALUES (:name, :link, :type, :pl_id, :data_frame)");
                            $stmt->bindParam(":name", $_POST["name"], PDO::PARAM_STR);
                            $stmt->bindParam(":link", $_POST["link"], PDO::PARAM_STR);
                            $stmt->bindParam(":type", $_POST["type"], PDO::PARAM_STR);
                            $stmt->bindParam(":pl_id", $_POST["pl_id"], PDO::PARAM_INT);
                            $stmt->bindParam(":data_frame", $_POST["data_frame"], PDO::PARAM_STR);

                            if ($stmt->execute()) {
                                http_response_code(200);

                                echo json_encode("correct");
                            } else {
                                http_response_code(500);

                                echo json_encode("error");
                            }
                    
                        }
                        
            
                    break;
                    case "soundcloud":
                        
                        if (isset($_POST["name"]) && isset($_POST["link"]) && isset($_POST["type"]) && isset($_POST["pl_id"])) {
                            
                            $stmt = $db->prepare("INSERT INTO `song` (`name`, `link`, `type`, `pl_id`) VALUES (:name, :link, :type, :pl_id)");
                            $stmt->bindParam(":name", $_POST["name"], PDO::PARAM_STR);
                            $stmt->bindParam(":link", $_POST["link"], PDO::PARAM_STR);
                            $stmt->bindParam(":type", $_POST["type"], PDO::PARAM_STR);
                            $stmt->bindParam(":pl_id", $_POST["pl_id"], PDO::PARAM_INT);

                            if ($stmt->execute()) {
                                http_response_code(200);

                                echo json_encode("correct");
                            } else {
                                http_response_code(500);

                                echo json_encode("error");
                            }
                    
                        }

                    break;
                    default:
                        http_response_code(400);
                        echo json_encode("bad request");
                    break;
                
                }

            };

        }
        
    } catch (Exception $e) {

        http_response_code(500);

        echo json_encode("error");
    }

} else {
    http_response_code(400);

    echo json_encode("bad request");
}



?>