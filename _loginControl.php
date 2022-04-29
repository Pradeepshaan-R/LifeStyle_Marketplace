<?php

session_start();
include("./_loginModel.php");

$loginObj = new LoginControl();

$dash_u_email = $_POST['dash_log_u_email'];
$dash_u_password = $_POST['dash_log_u_ps'];

$login_result = $loginObj->login($dash_u_email, $dash_u_password);

if ($login_result->num_rows == 1) {
    $user = $login_result->fetch_assoc();
    $user_id = $user['user_id'];
    $user_fname = $user['user_fname'];
    $user_lname = $user['user_lname'];
    $user_array = array("user_id" => $user_id, "user_fname" => $user_fname, "user_lname" => $user_lname);
    $_SESSION['user'] = $user_array;
    header('Location: index.php');
} else {
    $msg = "Invalid User Email or Password!";
    $msg = base64_encode($msg);
    header("Location: login-dashboard.php?error=$msg;");
}