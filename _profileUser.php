<?php

session_start();

if (isset($_SESSION['user']['user_id'])) {
    include ("./includes/senz_database.php");

    $profile_uname = $_POST['pname'];
    $profile_fname = $_POST['profile_fname'];
    $profile_lname = $_POST['profile_lname'];
    $profile_nic = $_POST['profile_nic'];
    $profile_dob = $_POST['profile_dob'];
    $profile_gen = $_POST['gender'];
    $profile_add = $_POST['profile_address'];
    $profile_ucno1 = $_POST['profile_no1'];
    $profile_ucno2 = $_POST['profile_no2'];
    $profile_uemail = $_POST['profile_email'];
    $profile_udob = $_POST['dob'];

    $conn = ControlDB::getconnect();
    $current_user = $_SESSION['user']['user_id'];
    $sql = "UPDATE user SET user_name='$profile_uname',user_fname='$profile_fname', user_lname='$profile_lname', user_dob='$profile_dob', user_gender='$profile_gen', user_address='$profile_add', user_nic='$profile_nic',user_email='$profile_uemail', user_cno1='$profile_ucno1', user_cno2='$profile_ucno2' WHERE user_id='$current_user'";
//    $sql = "UPDATE user SET user_name='$uname', user_cno1='$ucno1', user_email='$uemail', user_country='$ucountry', user_language='$ulang', user_dob='$udob' WHERE user_id = '$current_user'";
    $result = $conn->query($sql) or die($conn->error);

    $mesg = "Updated successfully"; //Throw Message.
    header("location:profile.php?error=$mesg"); //Redirecting to the Settings Page.
}