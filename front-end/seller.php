<?php
session_start(); //Starting a Session.
include ("../includes/senz_database.php");
if (!isset($_SESSION['supplier'])) { //If the Session doesn't Exist.
    header('Location: ../login_supplier.php'); //Redirecting if the Session is Time-Out.
    exit();
}

function getCat() {
    $conn = ControlDB::getconnect();
    $sql = "SELECT * FROM category";
    $result = $conn->query($sql) or die($conn->error);
    return $result;
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
        <title>SenzMarket</title>
    </head>
    <body>
        <!------------------------- Topmost NavBar Start -------------------------->
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
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Help
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="#">Customer Service</a>
                        <a class="dropdown-item" href="#">Disputes & Reports</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Seller Protection</a>
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
        <!-------------------------- Topmost NavBar End --------------------------->
        <div class="container-fluid p-0">
            <!-------------------------- Top Search NavBar Start ---------------------->
            <div class="row header-nav sticky-top">
                <div class="col-md-3 col-3 header-logo">
                    <a href="index-front.php" class="navbar-brand">
                        <div class="img-thumbnail border-0 senz">
                            <img src="images/SenzAgro_Logo.png" alt="logo" class="senz">
                        </div>
                    </a>
                </div>
                <!--                <div class="col-md-7 col-8 header-search">
                                    <form class="mr-auto">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    All
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="#">Action</a>
                                                    <a class="dropdown-item" href="#">Another action</a>
                                                    <a class="dropdown-item" href="#">Something else here</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a class="dropdown-item" href="#">Separated link</a>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control search-input" placeholder="Search in SenzMarket">
                                            <div class="input-group-append">
                                                <button class="btn search-btn" type="button">
                                                    <i class="fas fa-search fa-sm"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>-->
                <div class="col-md-2 invitation-btn pt-4 ml-auto">
                    <button type="submit" class="btn btn-fill btn-primary signin-btn" style="font-size: 12px;"><a href="supplier-create.php">Profile Update</a></button>
                </div>
            </div>
            <!---------------------------- Top Search NavBar End ---------------------->
            <div class="container mt-4">
                <div class="row">
                    <!----------------- Category Section Start -------------------->
                    <div class="container-fluid product pb-4 mb-4 shadow">
                        <div class="container pt-4 pro-topic">
                            <div class="row">
                                <h3>Add your Product</h3>
                            </div>
                            <div class="underline"></div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card-stock">
                                    <div class="card-header">
                                        <h5 class="title"><i class="far fa-edit"></i>Add Product</h5>
                                    </div>
                                    <div class="card-body">
                                        <form action="_add-seller_product.php?status=addSellerProduct" enctype="multipart/form-data" class="needs-validation" method="POST" novalidate>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Product ID</label>
                                                        <input type="text" class="form-control" disabled="" name="stock_id" id="st_id" placeholder="ID" value="" style="background: #e6fff5; color: white; cursor: not-allowed;">
                                                        <div class="valid-feedback">Valid</div>
                                                        <div class="invalid-feedback"></div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Product Category</label>
                                                        <select name="pro_cat" id="pro_cat" class="custom-select form-control" required>
                                                            <option selected value="" disabled>Select the Product Category</option>
                                                            <?php
                                                            $product_category = getCat();
                                                            while ($row = $product_category->fetch_assoc()) {
                                                                ?>
                                                                <option value="<?php echo $row["category_id"]; ?>">
                                                                    <?php echo $row["category_name"]; ?>
                                                                </option> <?php } ?>                       
                                                        </select>
                                                        <div class="valid-feedback">Valid</div>
                                                        <div class="invalid-feedback">Please Select a Category Name.</div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Product Name</label>
                                                        <input type="text" class="form-control" name="product_name" id="pro_name" placeholder="Apple" value="" required>
                                                        <div class="valid-feedback">Valid</div>
                                                        <div class="invalid-feedback">Please Enter Product Name.</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label>Your Name</label>
                                                        <input type="text" class="form-control" name="seller_name" id="seller_name" placeholder="User Name" value="" required>
                                                        <div class="valid-feedback">Valid</div>
                                                        <div class="invalid-feedback">Please Enter Your  Name.</div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label>Product Price</label>
                                                        <input type="number" class="form-control" name="seller_product_price" id="seller_pro_price" placeholder="Price per Kg" value="" required>
                                                        <div class="valid-feedback">Valid</div>
                                                        <div class="invalid-feedback">Please Enter Your  Name.</div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 pr-0">
                                                    <div class="form-group">
                                                        <label>Product Quantity</label>
                                                        <input type="number" class="form-control" name="pro_qty" id="pro_qty" placeholder="Quantity" value="" required>
                                                        <div class="valid-feedback">Valid</div>
                                                        <div class="invalid-feedback">Please Enter Product Quantity.</div>
                                                    </div>
                                                </div>                                                
                                                <div class="col-md-2 p-0">
                                                    <div class="form-group">
                                                        <label></label>
                                                        <input type="text" disabled class="form-control border-0 pl-1 pt-3" name="pro_qty" id="pro_qty" placeholder="Kg" value="Kg" required>
                                                        <div class="valid-feedback">Valid</div>
                                                        <div class="invalid-feedback">Please Enter Product Quantity.</div>
                                                    </div>
                                                </div>                                                
                                            </div> 
                                            <div class="row">                                                
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Describe your Product</label>
                                                        <textarea rows="4" cols="80" name="pro_des" class="form-control" placeholder="" value="">An apple is an edible fruit produced by an apple tree. Apple trees are cultivated worldwide and are the most widely grown species in the genus Malus.</textarea>
                                                    </div> 
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Product Expiry Date</label>
                                                        <input type="date" class="form-control" name="exp_date" id="exp_date" placeholder="Expiry Date" value="" required>
                                                        <div class="valid-feedback">Valid</div>
                                                        <div class="invalid-feedback">Please Enter Expiry Date.</div>
                                                    </div>
                                                    <div class="card-footer">
                                                        <button type="submit" class="btn btn-fill btn-primary submit-btn mr-3 was-validated"><i class="far fa-check-circle"></i> Submit</button>
                                                        <button type="reset" class="btn btn-fill btn-primary preview-btn mr-3"><i class="fas fa-recycle"></i></i> Reset</button>
                                                    </div> 
                                                </div>
                                            </div>                                                                                       
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!----------------- Category Section End ---------------------->
            <!--Category In Detail Start-->
            <?php include("./footer.php"); ?>
            <script type="text/javascript" src="js/front_form.js"></script>