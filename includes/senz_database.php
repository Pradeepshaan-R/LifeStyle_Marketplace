<?php

//Creating a Class to Implement the DB Connection
class ControlDB {

    //Implementing a Function to return Connection from the Database.
    public static function getconnect() {
        //To Connect to the Database.
        $host = "localhost"; //Host Name.
        $db_username = "root"; //User Name.
        $db_password = ""; //Password.
        $db_name = "senzmarket_db"; //DB Name.
//Creating an Object.
        $ObjControl = new mysqli($host, $db_username, $db_password, $db_name);

// Create connection
        if ($ObjControl->connect_errno) {
            //Validation the Connecting.
            echo ("Connection failed: " . $ObjControl->connect_errno);
            exit;
        }
        return $ObjControl;
    }

}
