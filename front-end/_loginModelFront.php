<?php

include ("../includes/senz_database.php"); 

class LoginControlFront{

    function loginFront($customerEmail, $customerpassword) {
        $encryptPsFront = sha1($customerpassword);
        $conn = ControlDB::getconnect();
        $sql = "SELECT * FROM customer WHERE customer_email = '$customerEmail' AND customer_password = '$encryptPsFront'";
        $result = $conn->query($sql) or die($conn->error);
        return $result;
        
    }
}