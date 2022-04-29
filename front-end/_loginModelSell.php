<?php

include ("../includes/senz_database.php"); 

class LoginControlSell{

    function loginSell($supplierEmail, $supplierpassword) {
        $encryptPsFront = sha1($supplierpassword);
        $conn = ControlDB::getconnect();
        $sql = "SELECT * FROM supplier WHERE supplier_email = '$supplierEmail' AND supplier_password = '$encryptPsFront'";
        $result = $conn->query($sql) or die($conn->error);
        return $result;
        
    }
}