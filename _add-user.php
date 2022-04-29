<?php

session_start();
include ("./includes/senz_database.php");

if (isset($_REQUEST['status'])) {
    $status = $_REQUEST['status'];
    switch ($status) {
//        Add user to Database
        case 'addUser':
            try {
                $userid = $_POST['user_id']; //User ID.
                $fname = $_POST['fname']; //First Name.
                $lname = $_POST['lname']; //Last Name.
                $email = $_POST['u_email']; //Email.
                $urole = $_POST['u_role']; //User Role
                $upassword = sha1($_POST['u_ps']); //Encrypting the Password.
                $uc_password = sha1($_POST['u_cps']); //Encrypting the Password.

                if ($fname == "") {
                    throw new Exception("Please enter user's first name"); //Catching Exception and displying Error message.
                }
                if ($lname == "") {
                    throw new Exception("Please enter user's last name"); //Catching Exception and displying Error message.
                }
                if ($email == "") {
                    throw new Exception("Please enter user's email"); //Catching Exception and displying Error message.
                }

                if ($upassword == "") {
                    throw new Exception("Please enter user's password"); //Catching Exception and displying Error message.
                }
                if ($upassword !== $uc_password) {
                    throw new Exception("Confirmation password do not match"); //Catching Exception and displying Error message.
                }

                $patternemail = "/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z]{2,6})+$/"; // Validating the Email format.

                if (!preg_match($patternemail, $email)) {
                    throw new Exception("Please enter a valid email");
                }

                $conn = ControlDB::getconnect(); // Getting the Database Connection.
                $sql = "INSERT INTO user(user_fname, user_lname, user_email, role_role_id, user_password) VALUES('$fname', '$lname', '$email', '$urole', '$upassword')";
                $result = $conn->query($sql) or die($conn->error);

                $msg = "A User has been Added"; //Validation Message.
                $msg = base64_encode($msg); //Encrypting the Message.
                header("location: in_users.php?success=$msg"); //Redirecting to the Index Page.
            } catch (Exception $exc) {
                $msg = $exc->getMessage();
                $msg = base64_encode($msg);
                header("location: in_users.php?error=$msg"); //Redirecting to the index Page.
            }
            break;

        //View User from the Database.
        case 'ViewUser':
            $userid = $_POST['user_id']; //User ID.
            $fname = $_POST['fname']; //First Name.
            $lname = $_POST['lname']; //Last Name.
            $email = $_POST['u_email']; //Email.
            $urole = $_POST['u_role']; //User Role.

            $conn = ControlDB::getconnect(); // Getting the Database Connection.
            $sql = "SELECT * FROM user WHERE user_id = '$userid'"; //Fetching from the Database.
            $result = $conn->query($sql) or die($conn->error);
            break;

        case 'updateUser':
            try {
                $userupdateid = $_POST['u_id']; //User ID.
                $fname = $_POST['uf_name']; //First Name.
                $lname = $_POST['ul_name']; //Last Name.
                $email = $_POST['u_email']; //Email.
                $urole = $_POST['u_role']; //User Role.

                if ($fname == "") {
                    throw new Exception("Please enter user's first name"); //Catching Exception and displying Error message.
                }
                if ($lname == "") {
                    throw new Exception("Please enter user's last name"); //Catching Exception and displying Error message.
                }
                if ($email == "") {
                    throw new Exception("Please enter user's email"); //Catching Exception and displying Error message.
                }

                $patternemail = "/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z]{2,6})+$/"; // Validating the Email format.

                if (!preg_match($patternemail, $email)) {
                    //Validating the Email.
                    throw new Exception("Please enter a valid email"); //Message if the Email doesn't meet the format.
                }

                $conn = ControlDB::getconnect(); // Getting the Database Connection. 
                //Updating the User Table.
                $sql = "UPDATE user SET user_fname='$fname', user_lname='$lname', user_email='$email', role_role_id='$urole' WHERE user_id='$userupdateid'";
                $result = $conn->query($sql) or die($conn->error);

                $mesg = "Inserted successfully"; //Validation Message.
                $mesg = base64_encode($mesg); //Encrypting the Message.
                header("location:in_users.php?success=$mesg");
            } catch (Exception $exc) {
                $mesg = $exc->getMessage();
                $mesg = base64_encode($mesg);
                header("location:in_users.php?error=$mesg"); //Redirecting to the User Page.
            }
            break;

        case 'updateProfileUser':
            try {
                $profileupdateid = $_POST['profile_id']; //User ID.
                $fname = $_POST['profile_fname']; //First Name.
                $lname = $_POST['profile_lname']; //Last Name.
                $email = $_POST['profile_email']; //Email.
                $nic = $_POST['profile_nic']; //NIC.
                $dob = $_POST['profile_dob']; //DOB.
                $address = $_POST['profile_address']; //Address.
                $ph1 = $_POST['profile_no1']; //Ph1.
                $ph2 = $_POST['profile_no2']; //Ph2.

                $patternemail = "/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z]{2,6})+$/"; // Validating the Email format.

                if (!preg_match($patternemail, $email)) {
                    //Validating the Email.
                    throw new Exception("Please enter a valid email"); //Message if the Email doesn't meet the format.
                }

                $conn = ControlDB::getconnect(); // Getting the Database Connection. 
                //Updating the User Table.
                $sql = "UPDATE user SET user_fname='$fname', user_lname='$lname', "
                        . "user_email='$email', user_dob='$dob', user_address='$address', "
                        . "user_nic='$nic', user_cno1='$ph1', user_cno2='$ph2' WHERE user_id='$profileupdateid'";
                $result = $conn->query($sql) or die($conn->error);

                $mesg = "Inserted successfully"; //Validation Message.
                $mesg = base64_encode($mesg); //Encrypting the Message.
                header("location:profile.php?success=$mesg");
            } catch (Exception $exc) {
                $mesg = $exc->getMessage();
                $mesg = base64_encode($mesg);
                header("location:profile.php?error=$mesg"); //Redirecting to the User Page.
            }
            break;

        //Delete User through the User Dashboard.
        case 'deleteUser':
            try {
                $deleteid = $_POST['delete_id']; //User ID.

                $conn = ControlDB::getconnect(); // Getting the Database Connection. 
                //Deleting Data from the User Table.
                $sql = "DELETE FROM user WHERE user_id='$deleteid'";
                $result = $conn->query($sql) or die($conn->error);

                $mesg = "Deleted successfully"; //Validation Message.
                $mesg = base64_encode($mesg); //Encrypting the Message.
                header("location:in_users.php?success=$mesg");
            } catch (Exception $exc) {
                $mesg = $exc->getMessage();
                $mesg = base64_encode($mesg);
                header("location:in_users.php?error=$mesg"); //Redirecting to the User Page.
            }
            break;
    }
}