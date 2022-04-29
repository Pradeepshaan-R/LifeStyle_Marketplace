<?php

include("./includes/senz_database.php");

class LoginControl{

    function login($userEmail, $userpassword) {
        $encryptPs = sha1($userpassword);
        $conn = ControlDB::getconnect();
        $sql = "SELECT * FROM user WHERE user_email = '$userEmail' AND user_password = '$encryptPs'";
        $result = $conn->query($sql) or die($conn->error);
        return $result;
        
    }
}