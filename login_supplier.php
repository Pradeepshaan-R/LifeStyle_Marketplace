<?php
include("./includes/senz_database.php");

session_start();
if (isset($_SESSION['supplier'])) {
    header('Location: front-end/seller.php');
    exit();
}
?>
<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Bootstrap CSS -->
        <!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">-->
        <!--FontAwesome Path-->
        <link rel="stylesheet" type="text/css" href="vendor/fontawesome-free/css/all.css">
        <link rel="stylesheet" type="text/css" href="vendor/fontawesome-free/css/all.min.css">
        <!--Google Font Path-->
        <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
        <!--Addition Stylesheet-->
        <link rel="stylesheet" type="text/css" href="css/login.css">
        <title>SenzMarket Login Form</title>
    </head>
    <body>
        <div class="container">
            <div class="forms-container">
                <div class="singin-singup">
                    <form action="front-end/_loginControlSell.php" class="sign-in-form" method="POST">
                        <h2 class="title">Sign In</h2>
                        <br>
                        <div class="row" style="width: 380px;">
                            <?php if (isset($_REQUEST['error'])) { ?>
                                <label class="alert alert-danger"><?php echo base64_decode($_REQUEST['error']); ?></label>
                            <?php } ?>
                        </div>
                        <div class="input-field">
                            <i class="fas fa-envelope"></i>
                            <input type="email" placeholder="User Email" name="log_u_email">
                        </div>
                        <div class="input-field">
                            <i class="fas fa-lock"></i>
                            <input type="password" placeholder="Password" name="log_u_ps">
                        </div>
                        <input type="submit" value="Login" class="btn-submit">
<!--                        <p class="social-text">Or Sign-in with Social Media Platforms</p>
                        <div class="social-media">
                            <a href="#" class="social-icon">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="#" class="social-icon">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="#" class="social-icon">
                                <i class="fab fa-google-plus-g"></i>
                            </a>
                            <a href="#" class="social-icon">
                                <i class="fab fa-instagram"></i>
                            </a>
                        </div>-->
                    </form>

                    <form action="_add-supplier.php?status=addSupplier" class="sign-up-form" method="POST" enctype="multipart/form-data">
                        <h2 class="title">Sign Up</h2>
                        <div class="input-field">
                            <i class="fas fa-user"></i>
                            <input type="text" placeholder="User Name" name="s_uname">
                        </div>
                        <div class="input-field">
                            <i class="fas fa-envelope"></i>
                            <input type="email" placeholder="Email" name="s_email">
                        </div>
                        <div class="input-field">
                            <i class="fas fa-lock"></i>
                            <input type="password" placeholder="Password" name="s_password">
                        </div>
                        <input type="submit" value="Sign Up" class="btn-submit" name="submit">
<!--                        <p class="social-text">Or Sign-up with Social Media Platforms</p>
                        <div class="social-media">
                            <a href="#" class="social-icon">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="#" class="social-icon">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="#" class="social-icon">
                                <i class="fab fa-google-plus-g"></i>
                            </a>
                            <a href="#" class="social-icon">
                                <i class="fab fa-instagram"></i>
                            </a>
                        </div>-->
                    </form>
                </div>
            </div>
            <div class="panels-container">
                <div class="panel left-panel">
                    <div class="content">
                        <img alt="" src="images/SenzAgro_Logo.png"class="logo">
                        <h3>New Here?</h3>
                        <p>Simply Sign Up to the SenzMarket and enjoy a great deal of surprices and ease in doing your daily Marketing.
                        </p>
                        <button class="btn-submit transparent" id="sign-up-btn">Sign Up</button>
                    </div>
                    <img class="image" alt="" src="images/signup4.svg">
                </div>

                <div class="panel right-panel">
                    <div class="content">
                        <img alt="" src="images/SenzAgro_Logo.png" class="logo">
                        <h3>One of Us?</h3>
                        <p>Welcome our most valuable customer, Login and unvail all your surprices.
                        </p>
                        <button class="btn-submit transparent" id="sign-in-btn">Login</button>
                    </div>
                    <img class="image" alt="" src="images/login1.svg">
                </div>
            </div>
        </div>

        <!-- Optional JavaScript; choose one of the two! -->
        <script src="vendor/bootstrap-4.5.0/js/bootstrap.js"></script>
        <script src="https://use.fontawesome.com/releases/v5.15.1/js/all.js" data-auto-replace-svg="nest"></script>
        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
        <!-- Option 2: Separate Popper and Bootstrap JS -->  
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
        <script type="text/javascript" src="js/login.js"></script>
    </body>
</html>