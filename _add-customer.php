<?php

include ("./includes/senz_database.php");

if (isset($_REQUEST['status'])) {
    $status = $_REQUEST['status'];
    switch ($status) {

//        Add Customer to Database
        case 'addCustomer':
            $c_uname = $_POST['c_uname'];
            $c_fname = $_POST['c_fname'];
            $c_lname = $_POST['c_lname'];
            $c_email = $_POST['c_email'];
            $c_nic = $_POST['c_nic'];
            $c_dob = $_POST['c_age'];
            $c_gen = $_POST['gender'];
            $c_add = $_POST['c_address'];
            $c_cno1 = $_POST['c_cno1'];
            $c_cno2 = $_POST['c_cno2'];
            $c_password = sha1($_POST['c_password']);

            $conn = ControlDB::getconnect();
            $sql = "INSERT INTO customer(customer_uname, customer_fname, customer_lname, customer_dob, customer_address, customer_gender, customer_email, customer_nic, customer_cno1, customer_cno2, customer_password)"
                    . "VALUES('$c_uname', '$c_fname', '$c_lname', '$c_dob', '$c_add', '$c_gen', '$c_email', '$c_nic', '$c_cno1', '$c_cno2', '$c_password')";
            $result = $conn->query($sql) or die($conn->error);
            header("location: ./front-end/index-front.php?");
            break;

//        Update Customer in index page
        case 'updateCustomer':
            try {
                $customerupdateid = $_POST['uc_id']; //User ID.
                $c_fname = $_POST['ucf_name'];
                $c_lname = $_POST['ucl_name'];
                $c_email = $_POST['uc_email'];
                $c_dob = $_POST['uc_age'];
                $c_add = $_POST['uc_address'];
                $c_cno1 = $_POST['uc_cno1'];
                $c_cno2 = $_POST['uc_cno2'];

                if ($c_fname == "") {
                    throw new Exception("Please enter user's first name"); //Catching Exception and displying Error message.
                }
                if ($c_lname == "") {
                    throw new Exception("Please enter user's last name"); //Catching Exception and displying Error message.
                }
                if ($c_email == "") {
                    throw new Exception("Please enter user's email"); //Catching Exception and displying Error message.
                }
                if ($c_add == "") {
                    throw new Exception("Please enter user's Address"); //Catching Exception and displying Error message.
                }

                $patternemail = "/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z]{2,6})+$/"; // Validating the Email format.

                if (!preg_match($patternemail, $c_email)) {
                    //Validating the Email.
                    throw new Exception("Please enter a valid email"); //Message if the Email doesn't meet the format.
                }

                $conn = ControlDB::getconnect(); // Getting the Database Connection. 
                //Updating the User Table.
                $sql = "UPDATE customer SET customer_fname='$c_fname', customer_lname='$c_lname', customer_email='$c_email',customer_dob='$c_dob', customer_cno1='$c_cno1', customer_cno2='$c_cno2', customer_address='$c_add'  WHERE customer_id='$customerupdateid'";
                $result = $conn->query($sql) or die($conn->error);

                $mesg = "Inserted successfully"; //Validation Message.
                $mesg = base64_encode($mesg); //Encrypting the Message.
                header("location:ex_users.php?success=$mesg");
            } catch (Exception $exc) {
                $mesg = $exc->getMessage();
                $mesg = base64_encode($mesg);
                header("location:ex_users.php?error=$mesg"); //Redirecting to the User Page.
            }
            break;

        //Delete User through the User Dashboard.
        case 'deleteCustomer':
            try {
                $cdeleteid = $_POST['customer_delete_id']; //User ID.

                $conn = ControlDB::getconnect(); // Getting the Database Connection. 
                //Deleting Data from the User Table.
                $sql = "DELETE FROM customer WHERE customer_id='$cdeleteid'";
                $result = $conn->query($sql) or die($conn->error);

                $mesg = "Deleted successfully"; //Validation Message.
                $mesg = base64_encode($mesg); //Encrypting the Message.
                header("location:ex_users.php?success=$mesg");
            } catch (Exception $exc) {
                $mesg = $exc->getMessage();
                $mesg = base64_encode($mesg);
                header("location:ex_users.php?error=$mesg"); //Redirecting to the Customer Page.
            }
            break;
    }
}