<?php

include ("./includes/senz_database.php");


if (isset($_GET['id'])) {
    $delete_id = $_GET['id'];
    $conn = ControlDB::getconnect();
    $sql_delete = mysqli_query($conn, "DELETE FROM seller WHERE seller_id = '$delete_id'");
    if($sql_delete){
         header("location: ./sales.php?");
    } else {
        echo mysqli_error($conn);
    }
}