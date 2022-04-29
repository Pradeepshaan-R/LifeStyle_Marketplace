<?php

include ("./includes/senz_database.php");

if (isset($_REQUEST['status'])) {
    $status = $_REQUEST['status'];
    switch ($status) {

//        Add Category to Database
        case 'addCategory':
            $cat_name = $_POST['cat_name'];
            $cat_image = $_FILES['cat_img']['name'];
            $cat_temp_name = $_FILES['cat_img']['tmp_name'];
            $cat_size = $_FILES['cat_img']['size'];
            $cat_error = $_FILES['cat_img']['error'];
            $cat_file_type = $_FILES['cat_img']['type'];

            $fileExt = explode('.', $cat_image);
            $fileActualExt = strtolower(end($fileExt));
            $allowedExt = array('jpg', 'jpeg', 'png');

            if (in_array($fileActualExt, $allowedExt)) {
                if ($cat_error === 0) {
                    if ($cat_size > 125000) {
                        $fileNameNew = uniqid('IMG-', TRUE) . "." . $fileActualExt;
                        $fileDestination = 'uploads/' . $fileNameNew;
                        move_uploaded_file($cat_temp_name, $fileDestination);
                        header("location: product.php?uploadsuccess");

                        $conn = ControlDB::getconnect();
                        $sql = "INSERT INTO category(category_name, category_img) VALUES('$cat_name', '$fileNameNew')";
                        $result = $conn->query($sql)or die($conn->error);
                        if ($result) {
                            move_uploaded_file($_FILES['cat_img']['name'], $cat_image);
                            header("location: product.php");
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

        case 'addProduct':
            $pro_name = $_POST['p_name'];
            $pro_cat = $_POST['p_cat'];
            $pro_location = $_POST['p_location'];
            $pro_price = $_POST['p_price'];
            $pro_des = $_POST['p_des'];
            $pro_image = $_FILES['pro_img']['name'];
            $pro_temp_name = $_FILES['pro_img']['tmp_name'];
            $pro_size = $_FILES['pro_img']['size'];
            $pro_error = $_FILES['pro_img']['error'];
            $pro_file_type = $_FILES['pro_img']['type'];
//            $pro_cat_id = $_POST['p_cat'];

            $fileExt = explode('.', $pro_image);
            $fileActualExt = strtolower(end($fileExt));
            $allowedExt = array('jpg', 'jpeg', 'png');

            if (in_array($fileActualExt, $allowedExt)) {
                if ($pro_error === 0) {
                    if ($pro_size > 125000) {
                        $fileNameNew = uniqid('IMG-', TRUE) . "." . $fileActualExt;

                        $fileDestination = 'uploads/' . $fileNameNew;
                        move_uploaded_file($pro_temp_name, $fileDestination);
                        header("location: product_table.php?uploadsuccess");

                        $conn = ControlDB::getconnect();
                        $sql = "INSERT INTO product(product_name, category_category_id, product_location, product_price, product_description, product_img) VALUES('$pro_name', '$pro_cat', '$pro_location', '$pro_price', '$pro_des', '$fileNameNew')";
                        $result = $conn->query($sql)or die($conn->error);
                        if ($result) {
                            move_uploaded_file($_FILES['pro_img']['name'], $pro_image);
                            header("location: product.php?");
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

        case 'ViewProduct':
            $pro_name = $_POST['p_name'];
            $pro_cat = $_POST['p_cat'];
            $pro_des = $_POST['p_des'];
            $pro_image = $_FILES['pro_img']['name'];
            $pro_cat_id = $_POST['p_cat'];

            $conn = ControlDB::getconnect();
            $sql = "SELECT * FROM user";
            $result = $conn->query($sql) or die($conn->error);

            break;

        //        Update Category in index page
        case 'updateCategory':
            $category_id = $_POST['update_categoryid'];
            $ucat_name = $_POST['ucat_name'];
            $ucat_image = $_FILES['ucat_img']['name'];
            $ucat_temp_name = $_FILES['ucat_img']['tmp_name'];
            $ucat_size = $_FILES['ucat_img']['size'];
            $ucat_error = $_FILES['ucat_img']['error'];
            $ucat_file_type = $_FILES['ucat_img']['type'];

            $ufileExt = explode('.', $ucat_image);
            $ufileActualExt = strtolower(end($ufileExt));
            $uallowedExt = array('jpg', 'jpeg', 'png');

            if (in_array($ufileActualExt, $uallowedExt)) {
                if ($ucat_error === 0) {
                    if ($ucat_size > 125000) {
                        $ufileNameNew = uniqid('IMG-', TRUE) . "." . $ufileActualExt;
                        $ufileDestination = 'uploads/' . $ufileNameNew;
                        move_uploaded_file($ucat_temp_name, $ufileDestination);
                        header("location: product_table.php?uploadsuccess");

                        $conn = ControlDB::getconnect();
                        $sql = "UPDATE category SET category_name='$ucat_name', category_img='$ufileNameNew' WHERE category_id='$category_id'";
                        $result = $conn->query($sql)or die($conn->error);
                        if ($result) {
                            move_uploaded_file($_FILES['ucat_img']['name'], $ucat_image);
                            header("location: product_table.php");
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

        //Delete Category through the User Dashboard.
        case 'deleteCategory':
            try {
                $catdeleteid = $_POST['category_delete_id']; //Category ID.

                $conn = ControlDB::getconnect(); // Getting the Database Connection. 
                //Deleting Data from the User Table.
                $sql = "DELETE FROM category WHERE category_id='$catdeleteid'";
                $result = $conn->query($sql) or die($conn->error);

                $mesg = "Deleted successfully"; //Validation Message.
                $mesg = base64_encode($mesg); //Encrypting the Message.
                header("location:product_table.php?success=$mesg");
            } catch (Exception $exc) {
                $mesg = $exc->getMessage();
                $mesg = base64_encode($mesg);
                header("location:product_table.php?error=$mesg"); //Redirecting to the Customer Page.
            }
            break;

        //        Update Product in index page
        case 'updateProduct':
            $product_id = $_POST['update_productid'];
            $pro_name = $_POST['uproduct_name'];
            $pro_cat = $_POST['uproductcategory_name'];
            $pro_location = $_POST['pro_location_update'];
            $pro_price = $_POST['pro_price_update'];
            $pro_image = $_FILES['upro_img']['name'];
            $pro_temp_name = $_FILES['upro_img']['tmp_name'];
            $pro_size = $_FILES['upro_img']['size'];
            $pro_error = $_FILES['upro_img']['error'];
            $pro_file_type = $_FILES['upro_img']['type'];

            $fileExt = explode('.', $pro_image);
            $fileActualExt = strtolower(end($fileExt));
            $allowedExt = array('jpg', 'jpeg', 'png');

            if (in_array($fileActualExt, $allowedExt)) {
                if ($pro_error === 0) {
                    if ($pro_size > 125000) {
                        $fileNameNew = uniqid('IMG-', TRUE) . "." . $fileActualExt;

                        $fileDestination = 'uploads/' . $fileNameNew;
                        move_uploaded_file($pro_temp_name, $fileDestination);
                        header("location: product_table.php?uploadsuccess");

                        $conn = ControlDB::getconnect();
                        $sql = "UPDATE product SET product_name='$pro_name', product_price_updated='$pro_price', category_category_id='$pro_cat', product_location='$pro_location', product_img='$fileNameNew' WHERE product_id='$product_id'";
                        $result = $conn->query($sql)or die($conn->error);
                        if ($result) {
                            move_uploaded_file($_FILES['upro_img']['name'], $pro_image);
                            header("location: product_table.php?");
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

        //Delete Product through the User Dashboard.
        case 'deleteProduct':
            try {
                $prodeleteid = $_POST['product_delete_id']; //Category ID.

                $conn = ControlDB::getconnect(); // Getting the Database Connection. 
                //Deleting Data from the Product Table.
                $sql = "DELETE FROM product WHERE product_id='$prodeleteid'";
                $result = $conn->query($sql) or die($conn->error);

                $mesg = "Deleted successfully"; //Validation Message.
                $mesg = base64_encode($mesg); //Encrypting the Message.
                header("location:product_table.php?success=$mesg");
            } catch (Exception $exc) {
                $mesg = $exc->getMessage();
                $mesg = base64_encode($mesg);
                header("location:product_table.php?error=$mesg"); //Redirecting to the Customer Page.
            }
            break;
    }
}