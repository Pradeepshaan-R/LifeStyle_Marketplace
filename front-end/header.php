<?php
session_start(); //Starting a Session.
include ("../includes/senz_database.php");
if (!isset($_SESSION['customer'])) { //If the Session doesn't Exist.
    header('Location: ../login.php'); //Redirecting if the Session is Time-Out.
    exit();
}
if (isset($_POST['search'])) {
    $search = $_POST['search'];
    $conn = ControlDB::getconnect();
    $sql = "SELECT * FROM product WHERE product_name LIKE '%$search%'";
    $result = $conn->query($sql) or die($conn->error);
}
?>
<!doctype html>
<html lang="en">
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
        <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
        <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
        <!--Additional CSS File Path-->
        <!--Slick Carousel-->
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
        <!--        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.7.1/slick.min.css">
                <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.7.1/slick-theme.min.css">-->
        <link rel="stylesheet" type="text/css" href="css/index-front.css">
        <link rel="stylesheet" type="text/css" href="../css/footer.css">        
        <title>SenzMarket</title>
    </head>
    <body>
        <!------------------------- Topmost NavBar Start -------------------------->
        <nav class="navbar navbar-expand navbar-dark bg-dark topmost-nav">
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="mr-2 d-none d-lg-inline"><i class="far fa-user pr-2"></i>Pradeepshaan Ramdas
                            <?php // echo $_SESSION['customer']['customer_fname'] . " " . $_SESSION['customer']['customer_lname']; ?>
                        </span>
                    </a>
                    <div class="dropdown-menu animated-grow-in no-arrow" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="_logout.php">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                            Logout
                        </a>
                    </div>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-store pr-2"></i>Sell on SenzMarket
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink1">
                        <a class="dropdown-item" href="#">Seller Login</a>
                        <a class="dropdown-item" href="#">Settings</a>
                    </div>
                </li>
                <!----------------------- TopBar Divder ----------------------->
                <div class="topbar-divider d-none d-sm-block"></div>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Help
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="#">Customer Service</a>
                        <a class="dropdown-item" href="#">Disputes & Reports</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Buyer Protection</a>
                </li>
                <!----------------------- TopBar Divder ----------------------->
                <div class="topbar-divider d-none d-sm-block"></div>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-shipping-fast pr-2"></i>Shipment
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="profile.php">
                            <i class="fas fa-user fa-sm fa-fw mr-2"></i>
                            District
                        </a>
                        <a class="dropdown-item" href="settings.php">
                            <i class="fas fa-cogs fa-sm fa-fw mr-2"></i>
                            City/Town
                        </a>
                        <a class="dropdown-item" href="#">
                            <i class="fas fa-list fa-sm fa-fw mr-2"></i>
                            Phone No.
                        </a>
                    </div>
                </li>
                <!----------------------- TopBar Divder ----------------------->
                <div class="topbar-divider d-none d-sm-block"></div>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fab fa-connectdevelop pr-2"></i>Wish List</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fab fa-opencart pr-2"></i>My Cart - $0.00</a>
                </li>
            </ul>
        </nav>
        <!-------------------------- Topmost NavBar End --------------------------->
        <div class="container-fluid">
            <!-------------------------- Top Search NavBar Start ---------------------->
            <div class="row header-nav sticky-top">
                <div class="col-md-3 col-3 header-logo">
                    <a href="index-front.php" class="navbar-brand">
                        <div class="img-thumbnail border-0 senz">
                            <img src="images/SenzAgro_Logo.png" alt="logo" class="senz">
                        </div>
                    </a>
                </div>
                <div class="col-md-7 col-8 header-search">
                    <form class="mr-auto" action="" method="POST">
                        <div class="input-group no-arrow">
                            <div class="input-group-prepend">
                                <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
<!--                                    <i class="fas fa-search"></i>-->
                                </button>
                            </div>
                            <input type="text" name="search" class="form-control search-input" placeholder="Search in SenzMarket">
                            <div class="input-group-append">
                                <button class="btn search-btn" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-2 col-1 header-cart-icon pt-2"><a href="product-cart.php"><i class="fas fa-shopping-cart"></i></a></div>
            </div>
            <!---------------------------- Top Search NavBar End ---------------------->