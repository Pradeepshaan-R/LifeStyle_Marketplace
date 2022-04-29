<?php
session_start();
if (isset($_POST['save'])) {
    include ("./includes/senz_database.php");

    $profile_id = $_SESSION['user']['user_id'];
    $profile_image = $_FILES['profile_img']['name'];
    $profile_temp_name = $_FILES['profile_img']['tmp_name'];
    $profile_size = $_FILES['profile_img']['size'];
    $profile_error = $_FILES['profile_img']['error'];
    $profile_file_type = $_FILES['profile_img']['type'];

    $ufileExt = explode('.', $profile_image);
    $ufileActualExt = strtolower(end($ufileExt));
    $uallowedExt = array('jpg', 'jpeg', 'png');

    if (in_array($ufileActualExt, $uallowedExt)) {
        if ($profile_error === 0) {
            if ($profile_size > 1250) {
                $ufileNameNew = uniqid('IMG-', TRUE) . "." . $ufileActualExt;
                $ufileDestination = 'uploads/' . $ufileNameNew;
                move_uploaded_file($profile_temp_name, $ufileDestination);
                header("location: profile.php?uploadsuccess");

                $conn = ControlDB::getconnect();
                $sql = "UPDATE user SET user_img='$ufileNameNew' WHERE user_id='$profile_id'";
                $result = $conn->query($sql)or die($conn->error);
                if ($result) {
                    move_uploaded_file($_FILES['profile_img']['name'], $profile_image);
                    header("location: profile.php");
                }
            } else {
                echo 'Your file is too big!';
            }
        } else {
            echo 'There was error uploading your file!';
        }
    } else {
        echo 'You cannot upload files of this type!';
    }
}