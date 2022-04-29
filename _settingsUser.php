<?php

session_start();

if (isset($_SESSION['user']['user_id'])) {
    include ("./includes/senz_database.php");

    $uname = $_POST['uname'];
    $ucno1 = $_POST['user_cno'];
    $uemail = $_POST['email'];
    $ucountry = $_POST['country'];
    $ulang = $_POST['lang'];
    $ugen = $_POST['gender'];
    $udob = $_POST['dob'];

    $conn = ControlDB::getconnect();
    $current_user = $_SESSION['user']['user_id'];
    $sql = "UPDATE user SET user_name='$uname', user_cno1='$ucno1', user_email='$uemail', user_country='$ucountry', user_language='$ulang', user_gender='$ugen', user_dob='$udob' WHERE user_id = '$current_user'";
    $result = $conn->query($sql) or die($conn->error);

    $mesg = "Updated successfully"; //Throw Message.
    header("location:settings.php?error=$mesg"); //Redirecting to the Settings Page.
}