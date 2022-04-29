<?php

include ("./includes/senz_database.php");

if (isset($_REQUEST['status'])) {
    $status = $_REQUEST['status'];
    switch ($status) {

//        Add Advertisement to Database
        case 'addAdvertisement':
            $ad_company = $_POST['ad_comp_name'];
            $ad_email = $_POST['ad_email'];
            $ad_start = $_POST['ad_stdate'];
            $ad_end = $_POST['ad_enddate'];
            $ad_image = $_FILES['ad_img']['name'];
            $ad_temp_name = $_FILES['ad_img']['tmp_name'];
            $ad_size = $_FILES['ad_img']['size'];
            $ad_error = $_FILES['ad_img']['error'];
            $ad_file_type = $_FILES['ad_img']['type'];

            $fileExt = explode('.', $ad_image);
            $fileActualExt = strtolower(end($fileExt));
            $allowedExt = array('jpg', 'jpeg', 'png');

            if (in_array($fileActualExt, $allowedExt)) {
                if ($ad_error === 0) {
                    if ($ad_size > 125000) {
                        $fileNameNew = uniqid('IMG-', TRUE) . "." . $fileActualExt;

                        $fileDestination = 'uploads/' . $fileNameNew;
                        move_uploaded_file($ad_temp_name, $fileDestination);
                        header("location: ads-mgmt.php?uploadsuccess");

                        $conn = ControlDB::getconnect();
                        $sql = "INSERT INTO advertisement(ad_companyname, ad_email, ad_image, ad_stdate, ad_eddate) VALUES('$ad_company', '$ad_email', '$fileNameNew', '$ad_start', '$ad_end')";
                        $result = $conn->query($sql) or die($conn->error);
                        if ($result) {
                            move_uploaded_file($_FILES['ad_img']['name'], $ad_image);
                            header("location: ads-mgmt.php");
                        }
                    } else {
                        echo 'Your file is too big!';
                    }
                } else {
                    echo 'There was error uploading your file!';
                }
            } else {
                echo 'You cannot upload files of this type!';
            }
            break;

//        Update Advertisement to Database
        case 'updateAdvertisement':
            $ad_id = $_POST['update_ad_id'];
            $ad_company = $_POST['uad_name'];
            $ad_email = $_POST['uad_email'];
            $ad_start = $_POST['uad_regdate'];
            $ad_end = $_POST['uad_expdate'];
            $ad_image = $_FILES['uad_img']['name'];
            $ad_temp_name = $_FILES['uad_img']['tmp_name'];
            $ad_size = $_FILES['uad_img']['size'];
            $ad_error = $_FILES['uad_img']['error'];
            $ad_file_type = $_FILES['uad_img']['type'];;

            $fileExt = explode('.', $ad_image);
            $fileActualExt = strtolower(end($fileExt));
            $allowedExt = array('jpg', 'jpeg', 'png');

            if (in_array($fileActualExt, $allowedExt)) {
                if ($ad_error === 0) {
                    if ($ad_size > 125000) {
                        $fileNameNew = uniqid('IMG-', TRUE) . "." . $fileActualExt;

                        $fileDestination = 'uploads/' . $fileNameNew;
                        move_uploaded_file($ad_temp_name, $fileDestination);
                        header("location: ads-mgmt.php?uploadsuccess");

                        $conn = ControlDB::getconnect();
                        $sql = "UPDATE advertisement SET ad_companyname='$ad_company', ad_email='$ad_email', ad_stdate='$ad_start', ad_eddate='$ad_end', ad_image='$fileNameNew' WHERE ad_id='$ad_id'";
                        $result = $conn->query($sql) or die($conn->error);
                        if ($result) {
                            move_uploaded_file($_FILES['uad_img']['name'], $ad_image);
                            header("location: ads-mgmt.php");
                        }
                    } else {
                        echo 'Your file is too big!';
                    }
                } else {
                    echo 'There was error uploading your file!';
                }
            } else {
                echo 'You cannot upload files of this type!';
            }
            break;

        //Delete Advertisement through the User Dashboard.
        case 'deleteAdvertisement':
            try {
                $ad_deleteid = $_POST['ad_delete_id']; //Category ID.

                $conn = ControlDB::getconnect(); // Getting the Database Connection. 
                //Deleting Data from the User Table.
                $sql = "DELETE FROM advertisement WHERE ad_id='$ad_deleteid'";
                $result = $conn->query($sql) or die($conn->error);

                $mesg = "Deleted successfully"; //Validation Message.
                $mesg = base64_encode($mesg); //Encrypting the Message.
                header("location:ads-mgmt.php?success=$mesg");
            } catch (Exception $exc) {
                $mesg = $exc->getMessage();
                $mesg = base64_encode($mesg);
                header("location:ads-mgmt.php?error=$mesg"); //Redirecting to the Customer Page.
            }
            break;
    }
}