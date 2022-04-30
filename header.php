<?php
session_start(); //Starting a Session.
include ("./includes/senz_database.php");

if (!isset($_SESSION['user'])) { //If the Session doesn't Exist.
    header('Location: login-dashboard.php'); //Redirecting if the Session is Time-Out.
    exit();
}

function profileUserPic() {
    $conn = ControlDB::getconnect();
    $current_user = $_SESSION['user']['user_id'];
    $sql = "SELECT * FROM user WHERE user_id = '$current_user'";
    $result = $conn->query($sql) or die($conn->error);
    return $result;
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <!--To ensure proper rendering & touch zooming on mobile devices.-->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--Online Path-->
        <!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">-->
        <!--Offline Path-->
        <link rel="stylesheet" type="text/css" href="vendor/bootstrap-4.5.0/css/bootstrap.css">
        <!--FontAwesome Path-->
        <link rel="stylesheet" type="text/css" href="vendor/fontawesome-free/css/all.css">
        <link rel="stylesheet" type="text/css" href="vendor/fontawesome-free/css/all.min.css">
        <!--Google Font Path-->
        <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300&display=swap" rel="stylesheet">
        <link href='https://fonts.googleapis.com/css?family=Amarante' rel='stylesheet'>
        <link href='https://fonts.googleapis.com/css?family=Andika' rel='stylesheet'>
        <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
        <link href="https://fonts.googleapis.com/css2?family=Noto+Serif&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Staatliches&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Paytone+One&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Candal&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Slabo+27px&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
        <!--Additional CSS File Path-->
        <!--<link rel="stylesheet" type="text/css" href="css/navs.css">-->
        <link rel="stylesheet" type="text/css" href="css/global.css">
        <link rel="stylesheet" type="text/css" href="css/navs.css">
        <title>SenzMarket</title>
    </head>
    <body>
        <!----------------- Dashboard Top-Bar Start ----------------------->
        <nav class="navbar navbar-expand bg-light mb-4 topbar sticky-top">
            <!----------------- Dashboard Top-Bar Brand ----------------------->
            <a href="index.php" class="navbar-brand mb-3 mt-3">
                <div class="img-thumbnail border-0">
                    <!-- <img src="images/SenzAgro_Logo.png" alt="logo" class="senz mb-4"> -->
                    <span class="logo-Text mb-4">Life Style Market Place</span>
                </div>
            </a>
            <!----------------- Dashboard Top-Bar Toggler ----------------------->
            <!-- <br/> -->
            <div class="sidebar-btn">
                <i class="fas fa-align-center"></i>
            </div>
            <!----------------- Nav Item - Alerts ----------------------------->
            <?php
            $conn = ControlDB::getconnect();
            $sql_seller = mysqli_query($conn, "SELECT * FROM seller WHERE seller_status = 1");
            $count_seller = mysqli_num_rows($sql_seller);
            if ($count_seller > 5) {
                $count_seller = "5+";
            }
            ?>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown no-arrow mx-1">
                    <a class="nav-link top-alert" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-bell fa-fw" data-fa-transform="rotate-345"></i>
                        <!----------------- Counter - Alerts ------------------------------>
                        <span class="badge badge-danger badge-counter"><?php echo $count_seller; ?></span>
                    </a>  
                    <!-- Dropdown - Alerts -->
                    <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in py-0" aria-labelledby="alertsDropdown">
                        <a class="dropdown-item d-flex align-items-center p-0" href="#">
                            <?php
                            $sql_seller_msg = mysqli_query($conn, "SELECT * FROM seller WHERE seller_status = 1");
                            if (mysqli_num_rows($sql_seller_msg) > 0) {
                                while ($result = mysqli_fetch_assoc($sql_seller_msg)) {
                                    echo '<a href="sales.php?id='.$result['seller_id'].'" style="text-decoration: none">
                                            <div class="p-2 row">
                                                <div class"col-2"><i class="fas fa-eye-dropper mr-3 ml-3"></i></div>
                                                <div class"col-10 p-5">
                                                    <div class = "small text-gray-500">' . $result['seller_product_reg'] . '</div>
                                                    <span class = "font-weight-bold">' . $result['seller_name'] . '</span></br>                                            
                                                    <span class = "font-weight-bold">' . $result['seller_product_name'] . '</span>
                                                </div>
                                            </div>
                                           </a>';
                                }
                                echo ' <a class="dropdown-item text-center small text-gray-500" href="sales.php">Show All Requests</a>';
                            } else {
                                echo '<a class="dropdown-item text-center small text-gray-500" href=""><i class="far fa-frown mr-2"></i>Sorry! No Request yet.</a>';
                            }
                            ?> 
                        </a>                        
                    </div>
                </li>
                </li>
<!--                <li class="nav-item dropdown no-arrow mx-2">
                    <a class="nav-link top-alert" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-envelope fa-fw"></i>
                        -------------- Counter - Messages ---------------------------
                        <span class="badge badge-danger badge-counter">7</span>
                    </a>   
                </li>-->
                <!----------------------- TopBar Divder --------------------------->
                <div class="topbar-divider d-none d-sm-block"></div>
                <?php
                $result = profileUserPic();
                while ($row = mysqli_fetch_array($result)) {
                    ?>
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link text-secondary" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-secondary "><?php echo $_SESSION['user']['user_fname'] . " " . $_SESSION['user']['user_lname']; ?></span>
                            <img class="img-profile rounded-circle" src="<?php echo './uploads/' . $row['user_img'] . '" width="100px;" height="100px;" alt="image"' ?>">
                        </a>
                    <?php } ?>
                    <!-- Dropdown - User Information -->
                    <div class="dropdown-menu dropdown-menu-right shadow animated-grow-in top-user-in" data-backdrop="static" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="profile.php">
                            <i class="fas fa-user fa-sm fa-fw mr-2"></i>
                            Profile
                        </a>
                        <a class="dropdown-item pb-0" href="settings.php">
                            <i class="fas fa-cogs fa-sm fa-fw mr-2"></i>
                            Settings
                        </a>
                        <!--<div class="dropdown-divider"></div>-->
                        <div class="dark-mode-btn">
<!--                            <i class="fas fa-moon"></i><span>Dark Mode</span>
                            <input type="radio" name="select" id="option-1" checked="checked">
                            <input type="radio" name="select" id="option-2">
                            <input type="radio" name="select" id="option-3">
                            <label class="option-1" for="option-1">
                                <div class="text">On</div>
                                <div class="dot"></div>
                            </label>
                            <label class="option-2" for="option-2">                                        
                                <div class="text">Off</div>
                                <div class="dot"></div>
                            </label>-->
                            <!--                            <div class="dark-radio">
                                                            <div class="row">
                                                                <lable class="control-label-off">OFF</lable>
                                                                <input type="radio" class="radio-input" checked="checked" name="darkmode" value="off" onclick="myFunction()">
                                                            </div>
                                                            <div class="row">
                                                                <lable class="control-label-on">ON</lable>
                                                                <input type="radio" class="radio-input" name="darkmode" value="on" onclick="myFunction()">
                                                            </div>
                                                        </div>-->
                        </div>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="_logout.php">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                            Logout
                        </a>
                    </div>
                </li>
            </ul>
        </nav>
        <!----------------------- End of Topbar --------------------------->
        <!----------------------- Profile Start --------------------------->

        <!----------------------- Profile End --------------------------->
        <!--Dark Mode-->
        <script>
            function myFunction() {
                var element = document.body;
                element.classList.toggle("dark-mode");
            }
        </script>