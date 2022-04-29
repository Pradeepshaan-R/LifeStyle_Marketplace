<?php

session_start();
include("./_loginModelFront.php");

$loginObjFront = new LoginControlFront();

$front_u_email = $_POST['log_u_email'];
$front_u_password = $_POST['log_u_ps'];

$login_result_Front = $loginObjFront->loginFront($front_u_email, $front_u_password);

if ($login_result_Front->num_rows == 1) {
    $customer = $login_result_Front->fetch_assoc();
    $customer_id = $user['customer_id'];
    $customer_fname = $user['customer_fname'];
    $customer_lname = $user['customer_lname'];
    $customer_array = array("customer_id" => $customer_id, "customer_fname" => $customer_fname, "customer_lname" => $customer_lname);
    $_SESSION['customer'] = $customer_array;
    header('Location: index-front.php');
} else {
    $msg = "Invalid User Email or Password!";
    $msg = base64_encode($msg);
    header("Location: ../login.php?error=$msg;");
}