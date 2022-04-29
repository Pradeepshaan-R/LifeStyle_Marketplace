<?php

session_start();

if (isset($_SESSION['user']['user_id'])) {
    include ("./includes/senz_database.php");

    if (isset($_POST['op']) && isset($_POST['np']) && isset($_POST['c_np'])) {

        function validate($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        $op = validate($_POST['op']);
        $np = validate($_POST['np']);
        $c_np = validate($_POST['c_np']);

        if (empty($op)) {
            header("location: settings.php?error=Old Password is required.");
            exit();
        } else if (empty($np)) {
            header("location: settings.php?error=New Password is required.");
            exit();
        } else if ($np !== $c_np) {
            header("location: settings.php?error=Confirmation password do not match.");
            exit();
        } else {
//            Hashing the Password
            $op = sha1($op);
            $np = sha1($np);
            $id = $_SESSION['user']['user_id'];

            $conn = ControlDB::getconnect(); // Getting the Database Connection.
            $sql = "SELECT user_password FROM user WHERE user_id = '$id' AND user_password = '$op'";
            $result = $conn->query($sql) or die($conn->error);
            if (mysqli_num_rows($result) === 1) {
                $sql_ps = "UPDATE user SET user_password = '$np' WHERE user_id = '$id'";
                $conn->query($sql_ps) or die($conn->error);
                header("location: settings.php?success=Your Password has been changed successfully!");
                exit();
            } else {
                header("location: settings.php?error=Old Password entered is Incorrect.");
                exit();
            }
        }
    } else {
        header("location: settings.php");
        exit();
    }
} else {
    header("location: settings.php");
    exit();
}