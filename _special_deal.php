<?php

include ("./includes/senz_database.php");

if (isset($_REQUEST['status'])) {
    $status = $_REQUEST['status'];
    switch ($status) {

//        Add Category to Database
        case 'addDealToday':
            $deal_topic = $_POST['deal_topic'];
            $deal_quote = $_POST['deal_quote'];
            $deal_image = $_FILES['deal_img']['name'];
            $deal_temp_name = $_FILES['deal_img']['tmp_name'];
            $deal_size = $_FILES['deal_img']['size'];
            $deal_error = $_FILES['deal_img']['error'];
            $deal_file_type = $_FILES['deal_img']['type'];

            $fileExt = explode('.', $deal_image);
            $fileActualExt = strtolower(end($fileExt));
            $allowedExt = array('jpg', 'jpeg', 'png');

            if (in_array($fileActualExt, $allowedExt)) {
                if ($deal_error === 0) {
                    if ($deal_size > 125000) {
                        $fileNameNew = uniqid('IMG-', TRUE) . "." . $fileActualExt;
                        $fileDestination = 'uploads/' . $fileNameNew;
                        move_uploaded_file($deal_temp_name, $fileDestination);
                        header("location: index.php?uploadsuccess");

                        $conn = ControlDB::getconnect();
                        $sql = "INSERT INTO product_deals(product-deal_topic, product_deal_quote, product_deal_img) VALUES('$deal_topic', '$deal_quote', '$fileNameNew')";
                        $result = $conn->query($sql)or die($conn->error);
                        if ($result) {
                            move_uploaded_file($_FILES['deal_img']['name'], $deal_image);
                            header("location: index.php");
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
    }
}