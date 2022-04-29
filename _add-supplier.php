<?php

include ("./includes/senz_database.php");
$current_supplier = $_SESSION['supplier']['supplier_id'];
if (isset($_REQUEST['status'])) {
    $status = $_REQUEST['status'];
    switch ($status) {

//        Add Supplier to Database
        case 'addSupplier':
            $s_uname = $_POST['s_uname'];
            $s_company = $_POST['s_companyname'];
            $s_fname = $_POST['s_fname'];
            $s_lname = $_POST['s_lname'];
            $s_email = $_POST['s_email'];
            $s_address = $_POST['s_address'];
            $s_cno1 = $_POST['s_cno1'];
            $s_cno2 = $_POST['s_cno2'];
            $s_password = sha1($_POST['s_password']);

            $conn = ControlDB::getconnect();
            $sql = "INSERT INTO supplier(supplier_uname, supplier_company, supplier_fname, supplier_lname, supplier_email, supplier_cno1, supplier_cno2, supplier_address, supplier_password) VALUES('$s_fname', '$s_company', '$s_fname', '$s_lname', '$s_email', '$s_cno1', '$s_cno2', '$s_address', '$s_password')";
            $result = $conn->query($sql) or die($conn->error);
            header("location: login.php");
            break;

//        Update Supplier in index page
        case 'updateSupplier':
            try {
                $supplier_id = $_POST['update_supplierid'];
                $s_uname = $_POST['usf_name'];
                $s_company = $_POST['uscompany_name'];
                $s_email = $_POST['us_email'];
                $s_address = $_POST['us_address'];
                $s_cno1 = $_POST['us_cno1'];
                $s_cno2 = $_POST['us_cno2'];

                $conn = ControlDB::getconnect(); // Getting the Database Connection. 
                //Updating the Supplier Table.
//                $sql = "UPDATE supplier SET supplier_uname='$s_uname', supplier_company='$s_company', supplier_email='$s_email', supplier_cno1='$s_cno1', supplier_cno2='$s_cno2', supplier_address='$s_address' WHERE supplier_id='$supplier_id'";
                $sql = "UPDATE supplier SET supplier_uname='$s_uname', supplier_company='$s_company', supplier_email='$s_email', supplier_cno1='$s_cno1', supplier_cno2='$s_cno2', supplier_address='$s_address' WHERE supplier_id='$supplier_id'";
                $result = $conn->query($sql) or die($conn->error);

                $mesg = "Inserted successfully"; //Validation Message.
                $mesg = base64_encode($mesg); //Encrypting the Message.
                header("location:supplier-management.php?success=$mesg");
            } catch (Exception $exc) {
                $mesg = $exc->getMessage();
                $mesg = base64_encode($mesg);
                header("location:supplier-management.php?error=$mesg"); //Redirecting to the Supplier Page.
            }
            break;

        //Delete User through the User Dashboard.
        case 'deleteSupplier':
            try {
                $sdeleteid = $_POST['supplier_delete_id']; //User ID.

                $conn = ControlDB::getconnect(); // Getting the Database Connection. 
                //Deleting Data from the User Table.
                $sql = "DELETE FROM supplier WHERE supplier_id='$sdeleteid'";
                $result = $conn->query($sql) or die($conn->error);

                $mesg = "Deleted successfully"; //Validation Message.
                $mesg = base64_encode($mesg); //Encrypting the Message.
                header("location:supplier-management.php?success=$mesg");
            } catch (Exception $exc) {
                $mesg = $exc->getMessage();
                $mesg = base64_encode($mesg);
                header("location:supplier-management.php?error=$mesg"); //Redirecting to the Customer Page.
            }
            break;
    }
}