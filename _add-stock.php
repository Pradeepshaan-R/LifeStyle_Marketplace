<?php

include("./includes/senz_database.php");

if (isset($_REQUEST['status'])) {
    $status = $_REQUEST['status'];
    switch ($status) {

//        Add Stock to Database
        case 'addStock':
//            $stock_id = $_POST['stock_id'];
            $stock_category = $_POST['stock_cat'];
            $stock_name = $_POST['stock_name'];
            $stock_quantity = $_POST['stock_qty'];
            $supplier_name = $_POST['supplier_name'];
            $stock_reg = $_POST['reg_date'];
            $stock_exp = $_POST['exp_date'];

            $conn = ControlDB::getconnect();
            $sql = "INSERT INTO stock(category_category_id, product_product_id, stock_quantity, supplier_supplier_id, stock_reg_date, stock_expire_date) VALUES('$stock_category', '$stock_name', '$stock_quantity', '$supplier_name', '$stock_reg', '$stock_exp')";
            $result = $conn->query($sql) or die($conn->error);
            header("location: stock-management.php");
            break;

//        Update Stock in index page
        case 'updateStock':
            try {
                $stock_id = $_POST['u_stockid'];
//                $stock_name = $_POST['u_stockname'];
//                $supplier_name = $_POST['u_suppliername'];
                $stock_quantity = $_POST['stock_qty'];
                $stock_reg = $_POST['u_regdate'];
                $stock_exp = $_POST['u_expdate'];

                $conn = ControlDB::getconnect(); // Getting the Database Connection. 
                //Updating the Stock Table.
                $sql = "UPDATE stock SET stock_reg_date='$stock_reg', stock_quantity='$stock_quantity', stock_expire_date='$stock_exp' WHERE stock_id='$stock_id'";
//                $sql = "UPDATE stock, supplier, product SET stock.stock_id='$stock_id', stock.stock_quantity='$stock_quantity', stock.stock_reg_date='$stock_reg', stock.stock_expire_date='$stock_exp', stock.supplier_supplier_id='$supplier_name', stock.product_product_id='$stock_name' FROM stock st, supplier su, product pro WHERE st.supplier_supplier_id=su.supplier_id, st.product_product_id=pro.product_id";
                $result = $conn->query($sql) or die($conn->error);

                $mesg = "Inserted successfully"; //Validation Message.
                $mesg = base64_encode($mesg); //Encrypting the Message.
                header("location:stock-management.php?success=$mesg");
            } catch (Exception $exc) {
                $mesg = $exc->getMessage();
                $mesg = base64_encode($mesg);
                header("location:stock-management.php?error=$mesg"); //Redirecting to the Supplier Page.
            }
            break;

        //Delete Stock through the Stock Management Dashboard.
        case 'deleteStock':
            try {
                $stdeleteid = $_POST['stock_delete_id']; //User ID.

                $conn = ControlDB::getconnect(); // Getting the Database Connection. 
                //Deleting Data from the Stock Table.
                $sql = "DELETE FROM stock WHERE stock_id='$stdeleteid'";
                $result = $conn->query($sql) or die($conn->error);

                $mesg = "Deleted successfully"; //Validation Message.
                $mesg = base64_encode($mesg); //Encrypting the Message.
                header("location:stock-management.php?success=$mesg");
            } catch (Exception $exc) {
                $mesg = $exc->getMessage();
                $mesg = base64_encode($mesg);
                header("location:stock-management.php?error=$mesg"); //Redirecting to the Customer Page.
            }
            break;
    }
}