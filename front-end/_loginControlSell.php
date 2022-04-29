<?php

session_start();
include("./_loginModelSell.php");

$loginObjSell = new LoginControlSell();

$front_u_email = $_POST['log_u_email'];
$front_u_password = $_POST['log_u_ps'];

$login_result_Sell = $loginObjSell->loginSell($front_u_email, $front_u_password);

if ($login_result_Sell->num_rows == 1) {
    $customer = $login_result_Sell->fetch_assoc();
    $customer_id = $user['supplier_id'];
    $customer_fname = $user['supplier_fname'];
    $customer_lname = $user['supplier_lname'];
    $customer_array = array("supplier_id" => $customer_id, "supplier_fname" => $customer_fname, "supplier_lname" => $customer_lname);
    $_SESSION['supplier'] = $customer_array;
    header('Location: seller.php');
} else {
    $msg = "Invalid User Email or Password!";
    $msg = base64_encode($msg);
    header("Location: ../login_supplier.php?error=$msg;");
}