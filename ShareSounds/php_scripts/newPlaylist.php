<?php
session_start();

require_once 'connection.php';


$valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'bmp', 'pdf', 'doc', 'ppt'); // valid extensions
$path = '../users_img/'; // upload directory


if (!empty($_POST['pl_name']) || !empty($_POST['access_type'])) {

    if (!empty($_FILES["pl_img"]["name"])) {
        $img = $_FILES['pl_img']['name'];
        $tmp = $_FILES['pl_img']['tmp_name'];
        // get uploaded file's extension
        $ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));
        // can upload same image using rand function, we add user id so two users can't have the same.
        $final_image = $_SESSION["user_login"] . rand(1, 1000000) . $img;
        // check's valid format
        if (in_array($ext, $valid_extensions)) {

            $path = $path . strtolower($final_image);

            if (move_uploaded_file($tmp, $path)) {

                echo "<img class='img-pl' alt='preview' src='$path' />";
                $pl_name = $_POST['pl_name'];
                $access_type = $_POST['access_type'];

                $stmt = $db->prepare("INSERT INTO `playlist` (`user_id`, `pl_name`, `access_type`, `img_name`) VALUES (:user_id, :pl_name, :access_type, :img_name)");
                $stmt->bindParam(":user_id", $_SESSION["user_login"]);
                $stmt->bindParam(":pl_name", $_POST["pl_name"]);
                $stmt->bindParam(":access_type", $_POST["access_type"]);
                $stmt->bindParam(":img_name", strtolower($final_image));

                if ($stmt->execute()) {
                    echo "valid";
                } else {
                    echo "could not execute query";
                }
            }
        } else {
            echo json_encode('invalid');
        }
    } else {

        $pl_name = $_POST['pl_name'];
        $access_type = $_POST['access_type'];

        $stmt = $db->prepare("INSERT INTO `playlist` (`user_id`, `pl_name`, `access_type`) VALUES (:user_id, :pl_name, :access_type)");
        $stmt->bindParam(":user_id", $_SESSION["user_login"]);
        $stmt->bindParam(":pl_name", $_POST["pl_name"]);
        $stmt->bindParam(":access_type", $_POST["access_type"]);

        if ($stmt->execute()) {
            echo "valid";
        } else {
            echo "could not execute query";
        }
    }
} else {
    echo json_encode("invalid");
}