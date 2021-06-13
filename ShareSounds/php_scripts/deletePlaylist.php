<?php

session_start();

require_once 'connection.php';

if (isset($_POST["pl_id"]) && isset($_SESSION["user_login"])) {

    try {
        $stmt = $db->prepare("SELECT user_id FROM playlist WHERE pl_id = :pl_id");
        $stmt->bindParam(":pl_id", $_POST["pl_id"], PDO::PARAM_INT);

        if ($stmt->execute()) {

            $numberRows = $stmt->rowCount();

            if ($numberRows > 0) {

                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                extract($row);

                if ($_SESSION["user_login"] == $user_id) {

                    $stmt2 = $db->prepare("DELETE FROM playlist WHERE pl_id = :pl_id");
                    $stmt2->bindParam(":pl_id", $_POST["pl_id"], PDO::PARAM_INT);

                    if ($stmt2->execute()) {

                        http_response_code(200);

                        echo json_encode("deleted");
                    } else {
                        http_response_code(503);

                        echo json_encode("not available");
                    }
                } else {

                    http_response_code(403);

                    echo json_encode("forbidden");
                }
            } else {

                http_response_code(200);

                echo json_encode("empty");
            }
        } else {

            http_response_code(404);

            echo json_encode("404");
        }
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}
