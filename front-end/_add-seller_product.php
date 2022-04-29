<?php

include ("../includes/senz_database.php");

if (isset($_REQUEST['status'])) {
    $status = $_REQUEST['status'];
    switch ($status) {

//        Add Customer to Database
        case 'addSellerProduct':
            $s_pro_name = $_POST['product_name'];
            $s_pro_cat = $_POST['pro_cat'];
            $s_name = $_POST['seller_name'];
            $s_price = $_POST['seller_product_price'];
            $s_pro_qty = $_POST['pro_qty'];
            $s_pro_des = $_POST['pro_des'];
            $s_pro_exp = $_POST['exp_date'];

            $conn = ControlDB::getconnect();
            $sql = "INSERT INTO seller(seller_name, seller_product_name, seller_price, seller_product_qty, seller_product_des, seller_product_exp, category_category_id) "
                    . "VALUES ('$s_name', '$s_pro_name', '$s_price', '$s_pro_qty', '$s_pro_des', '$s_pro_exp', '$s_pro_cat')";
            $result = $conn->query($sql) or die($conn->error);
            header("location: seller.php?");
            break;
    }
}