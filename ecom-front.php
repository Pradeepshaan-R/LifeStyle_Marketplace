<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--Offline Path-->
        <link rel="stylesheet" type="text/css" href="vendor/bootstrap-4.5.0/css/bootstrap.css">
        <!--FontAwesome Path-->
        <link rel="stylesheet" type="text/css" href="vendor/fontawesome-free/css/all.css">
        <link rel="stylesheet" type="text/css" href="vendor/fontawesome-free/css/all.min.css">
        <!--FontAwesome Path-->
        <link rel="stylesheet" type="text/css" href="vendor/fontawesome-free/css/all.css">
        <!--Google Font Path-->
        <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
        <!--Additional CSS File Path-->
        <link rel="stylesheet" type="text/css" href="css/global.css">
        <link rel="stylesheet" type="text/css" href="css/navs.css">
        <link rel="stylesheet" type="text/css" href="css/ecom-front.css">
        <title>E-Commerce Webpage</title>
    </head>

    <body>
        <!--Header-->
        <header id="home" class="header">
            <!--Navigation-->
            <nav class="nav">
                <div class="navigation container">
                    <div class="logo">
                        <h1>SenzMarket</h1>
                    </div>

                    <div class="menu">
                        <div class="top-nav">
                            <div class="logo">
                                <h1>SenzMarket</h1>
                            </div>
                            <div class="close">
                                <i class="fas fa-times"></i>
                            </div>
                        </div>

                        <ul class="nav-list">
                            <li class="nav-item">
                                <a href="#home" class="nav-link">Home</a>
                            </li>
                            <li class="nav-item">
                                <a href="products.html" class="nav-link">Products</a>
                            </li>
                            <li class="nav-item">
                                <a href="#about" class="nav-link">About</a>
                            </li>
                            <li class="nav-item">
                                <a href="#contact" class="nav-link">Contact</a>
                            </li>
                            <li class="nav-item">
                                <a href="#account" class="nav-link">Account</a>
                            </li>
                            <li class="nav-item">
                                <a href="cart.html" class="nav-link icon"><i class="fas fa-shopping-bag"></i></a>
                            </li>
                        </ul>
                    </div>
                    <a href="cart.html" class="cart-icon"><i class="fas fa-shopping-bag"></i></a>
                    <div class="hamburger"><i class="fas fa-bars"></i></div>
                </div>
            </nav>
            <!----------------- Topmost NavBar Start ------------------------------>
            <nav class="navbar navbar-expand navbar-dark bg-dark topmost-nav">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline"><i class="far fa-user pr-2"></i>Pradeepshaan Ramdas</span>
                        </a>
                        <div class="dropdown-menu animated-grow-in no-arrow" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-user fa-sm fa-fw mr-2"></i>
                                Profile
                            </a>
                            <a class="dropdown-item" href="settings.php">
                                <i class="fas fa-cogs fa-sm fa-fw mr-2"></i>
                                Settings
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-list fa-sm fa-fw mr-2"></i>
                                Activity Log
                            </a>
                            <div class="dropdown-divider"></div>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2"></i>
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
                        <a class="nav-link" href="#"><i class="fab fa-connectdevelop pr-2"></i>Wish List</li></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fab fa-opencart pr-2"></i>My Cart - $0.00</li></a>
                    </li>
                </ul>
            </nav>
            <!------------------ Topmost NavBar End ------------------------------->
        </header>
        <main>
            <section class="section advert">
                <div class="advert-center container">
                    <div class="advert-box">
                        <div class="dotted">
                            <img src="" alt="">
                        </div>
                    </div>
                </div>
            </section>
        </main>

        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.5.1/gsap.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
        <script src="js/ecom-front.js"></script>
    </body>

</html>