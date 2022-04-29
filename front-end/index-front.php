<!--Header Script Include Link-->
<?php
include("./header.php");

function viewCategory() {
    $conn = ControlDB::getconnect();
    $sql = "SELECT * FROM category";
    $result = $conn->query($sql) or die($conn->error);
    return $result;
}

function viewProduct() {
    $conn = ControlDB::getconnect();
    $sql = "SELECT * FROM product";
    $result = $conn->query($sql) or die($conn->error);
    return $result;
}

function viewProductsMore() {
    $conn = ControlDB::getconnect();
    $sql = "SELECT * FROM product WHERE product_price_updated > 100";
    $result = $conn->query($sql) or die($conn->error);
    return $result;
}

function viewDeal() {
    $conn = ControlDB::getconnect();
    $sql = "SELECT * FROM deal";
    $result = $conn->query($sql) or die($conn->error);
    return $result;
}

function viewAd() {
    $conn = ControlDB::getconnect();
    $sql = "SELECT * FROM advertisement";
    $result = $conn->query($sql) or die($conn->error);
    return $result;
}

function viewProductDeal() {
    $conn = ControlDB::getconnect();
    $sql = "SELECT * FROM product WHERE product_price_updated < 800";
    $result = $conn->query($sql) or die($conn->error);
    return $result;
}

function viewProductDealWeek() {
    $conn = ControlDB::getconnect();
    $sql = "SELECT * FROM product WHERE product_price < 500";
    $result = $conn->query($sql) or die($conn->error);
    return $result;
}

function viewProduct1() {
    $conn = ControlDB::getconnect();
    $sql = "SELECT * FROM product WHERE category_category_id = 6";
    $result = $conn->query($sql) or die($conn->error);
    return $result;
}

function viewProduct2() {
    $conn = ControlDB::getconnect();
    $sql = "SELECT * FROM product WHERE category_category_id = 7";
    $result = $conn->query($sql) or die($conn->error);
    return $result;
}

function viewProduct3() {
    $conn = ControlDB::getconnect();
    $sql = "SELECT * FROM product WHERE category_category_id = 40";
    $result = $conn->query($sql) or die($conn->error);
    return $result;
}

function viewProduct4() {
    $conn = ControlDB::getconnect();
    $sql = "SELECT * FROM product WHERE category_category_id = 43";
    $result = $conn->query($sql) or die($conn->error);
    return $result;
}

function viewProduct5() {
    $conn = ControlDB::getconnect();
    $sql = "SELECT * FROM product WHERE category_category_id = 45";
    $result = $conn->query($sql) or die($conn->error);
    return $result;
}

function viewProduct6() {
    $conn = ControlDB::getconnect();
    $sql = "SELECT * FROM product WHERE category_category_id = 46";
    $result = $conn->query($sql) or die($conn->error);
    return $result;
}

function viewProduct7() {
    $conn = ControlDB::getconnect();
    $sql = "SELECT * FROM product WHERE category_category_id = 47";
    $result = $conn->query($sql) or die($conn->error);
    return $result;
}
?>
<!---------------------------- Main Content Start ----------------------------->
<div class="container">
    <div class="row">
        <div class="col-lg-3 pt-4 pl-0">
            <div class="col-lg-12 card category-menu">
                <div>
                    <ul>
                        <li onclick="tabs(0)" class="tab active">
                            <i class="fas fa-reply-all fa-flip-horizontal"></i>All Products<i class="fas fa-angle-double-right"></i>
                        </li>
                        <li onclick="tabs(1)" class="tab"><i class="fas fa-carrot"></i></i>Vegetables<i class="fas fa-chevron-right"></i>
                            <!--                            <ul>
                            <?php
//                                $pro_web = viewProduct();
//                                while ($row = mysqli_fetch_array($pro_web)) {
//                                    
                            ?>
                                                                <li>//<?php // echo $row['product_name'];                                      ?></li>
                            <?php // }   ?>
                                                        </ul>-->
                        </li>
                        <li onclick="tabs(2)" class="tab"><i class="fas fa-apple-alt"></i>Fruits<i class="fas fa-chevron-right"></i>
                            <!--                            <ul>
                                                            <li>Apple</li>
                                                            <li>Orange</li>
                                                            <li>Grapes</li>
                                                            <li>Banana</li>
                                                            <li>Pears</li>
                                                            <li>Pineapple</li>
                                                            <li>Strawberry</li>
                                                            <li>Rashberry</li>
                                                        </ul>-->
                        </li>
                        <li onclick="tabs(3)" class="tab"><i class="fas fa-cheese"></i>Processed Foods<i class="fas fa-chevron-right"></i>
                            <!--                            <ul>
                                                            <li>Apple</li>
                                                            <li>Orange</li>
                                                            <li>Grapes</li>
                                                            <li>Banana</li>
                                                            <li>Pears</li>
                                                            <li>Pineapple</li>
                                                            <li>Strawberry</li>
                                                            <li>Rashberry</li>
                                                        </ul>-->
                        </li>
                        <li onclick="tabs(4)" class="tab"><i class="fas fa-cookie"></i>Tubers & Yams<i class="fas fa-chevron-right"></i>
                            <!--                            <ul>
                                                            <li>Apple</li>
                                                            <li>Orange</li>
                                                            <li>Grapes</li>
                                                            <li>Banana</li>
                                                            <li>Pears</li>
                                                            <li>Pineapple</li>
                                                            <li>Strawberry</li>
                                                            <li>Rashberry</li>
                                                        </ul>-->
                        </li>
                        <li onclick="tabs(5)" class="tab"><i class="fab fa-pagelines"></i>Plantation Crops<i class="fas fa-chevron-right"></i>
                            <!--                            <ul>
                                                            <li>Apple</li>
                                                            <li>Orange</li>
                                                            <li>Grapes</li>
                                                            <li>Banana</li>
                                                            <li>Pears</li>
                                                            <li>Pineapple</li>
                                                            <li>Strawberry</li>
                                                            <li>Rashberry</li>
                                                        </ul>-->
                        </li>
                        <li onclick="tabs(6)" class="tab"><i class="fas fa-seedling"></i>Mushroom<i class="fas fa-chevron-right"></i>
                            <!--                            <ul>
                                                            <li>Apple</li>
                                                            <li>Orange</li>
                                                            <li>Grapes</li>
                                                            <li>Banana</li>
                                                            <li>Pears</li>
                                                            <li>Pineapple</li>
                                                            <li>Strawberry</li>
                                                            <li>Rashberry</li>
                                                        </ul>-->
                        </li>
                        <li onclick="tabs(7)" class="tab"><i class="fas fa-mortar-pestle"></i>Medicinal<i class="fas fa-chevron-right"></i>
                            <!--                            <ul>
                                                            <li>Apple</li>
                                                            <li>Orange</li>
                                                            <li>Grapes</li>
                                                            <li>Banana</li>
                                                            <li>Pears</li>
                                                            <li>Pineapple</li>
                                                            <li>Strawberry</li>
                                                            <li>Rashberry</li>
                                                        </ul>-->
                        </li>
                        <li style="text-align: center; border-top: 1px solid #ddd;" onclick="tabs(8)" class="tab">
                            <i class="fas fa-stream"></i>All Categories<i class="fas fa-angle-double-right"></i>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-lg-6 pl-0 pr-0">

            <!----------------- Advertisement Carousel Start ---------------------->
            <div id="adCarousel" class="carousel carousel-dark my-4" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#adCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#adCarousel" data-slide-to="1"></li>
                    <li data-target="#adCarousel" data-slide-to="2"></li>
                    <li data-target="#adCarousel" data-slide-to="3"></li>
                    <li data-target="#adCarousel" data-slide-to="4"></li>
                </ol>
                <div class="carousel-inner" role="listbox" style="border-radius: 10px;">
                    <div class="carousel-item active">

                        <img class="d-block img-fluid" src="images/1.jpg" style="width: 900px; height: 350px;" alt="First slide">
                        <div class="carousel-caption d-none d-md-block">
                            <button class="btn btn-info btn-sm">Shop Now.</button>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="d-block img-fluid" src="images/2.jpg" style="width: 900px; height: 350px;" alt="Second slide">
                        <div class="carousel-caption d-none d-md-block">
                            <h1>First slide label</h1>
                            <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
                            <button class="btn btn-info btn-sm">Shop Now.</button>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="d-block img-fluid" src="images/3.jpg" style="width: 900px; height: 350px" alt="Third slide">
                        <div class="carousel-caption d-none d-md-block">
                            <h1>First slide label</h1>
                            <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
                            <button class="btn btn-info btn-sm">Shop Now.</button>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="d-block img-fluid" src="images/5.jpg" style="width: 900px; height: 350px;" alt="Third slide">
                        <div class="carousel-caption d-none d-md-block">
                            <h1>First slide label</h1>
                            <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
                            <button class="btn btn-info btn-sm">Shop Now.</button>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="d-block img-fluid" src="images/6.jpg" style="width: 900px; height: 350px;" alt="Third slide">
                        <div class="carousel-caption d-none d-md-block">
                            <h1>First slide label</h1>
                            <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
                            <button class="btn btn-info btn-sm">Shop Now.</button>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#adCarousel" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#adCarousel" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        <!-------------- Invitation Section Start ----------------->
        <div class="col-lg-3 pt-4 pr-0">
            <div class="col-lg-12 card invitation">
                <div class="card-header">
                    <p class="card-text">
                    <div class="author">
                        <a>
                            <img class="avatar" src="images/Pradeepshaan.jpg" alt="...">
                            <!--<input type="file" id="User_img" name="user_img" onchange="readURL(this)" class="form-control">-->
                            <h5 class="title">Pradeepshaan Ramdas</h5>
                        </a>
                        <p class="description">
                            Welcome to SenzMarket
                        </p>
                    </div>
                    </p>
                    <div class="invitation-btn">
                        <button type="submit" class="btn btn-fill btn-primary join-btn"><a href="../login.php">Join</a></button>
                        <button type="submit" class="btn btn-fill btn-primary signin-btn"><a href="customer-create.php">Sign in</a></button>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 pt-2 p-0">
                <div class="card invitation-sell">
                    <div class="card-header">
                        <h3>Do you have Agro Products?</h3>
                        <a type="submit" class="btn btn-fill btn-primary sell-btn" href="seller.php">Sell on SenzMarket</a>
                    </div>
                </div>
            </div>
        </div>
        <!---------------- Invitation Section End ----------------->
    </div>
</div>
<div class="tabShow">
    <div class="container">
        <div class="row">
            <!----------------- Category Section Start -------------------->
            <div class="container-fluid product pb-4 mb-4 pl-0 pr-0 shadow">
                <div class="container pt-4 pro-topic">
                    <div class="row">
                        <h3 id="textChange">All Products</h3>
                        <div class="ml-auto">
                        </div>
                    </div>
                    <div class="underline"></div>
                </div>
                <div class="row">
                    <div class="col-md-2 pl-0">
                        <div class="filter-products">
                            <form action="" method="GET">
                                <h5><button type="submit" class="btn btn-info btn-sm float-end">Filter Products</button></h5>
                                <?php
                                $conn = ControlDB::getconnect();
                                $sql = "SELECT * FROM category";
                                $result_cat = $conn->query($sql) or die($conn->error);

                                if (mysqli_num_rows($result_cat) > 0) {
                                    foreach ($result_cat as $brandlist) {
                                        $checked = [];
                                        if (isset($_GET['brands'])) {
                                            $checked = $_GET['brands'];
                                        }
                                        ?>
                                        <ul class="list-group">
                                            <li class="form-group-item">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" name="brands[]" id="brand" class="form-check-input product_check" value="<?php echo $brandlist['category_id']; ?>"
                                                        <?php
                                                        if (in_array($brandlist['category_id'], $checked)) {
                                                            echo 'checked';
                                                        }
                                                        ?>/>
                                                               <?= $brandlist['category_name'] ?>
                                                    </label>
                                                </div>
                                            </li>
                                        </ul>
                                        <?php
                                    }
                                } else {
                                    echo "No Category Available!";
                                }
                                ?>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-10 p-0">
                        <div class="row m-0" id="result">
                            <?php
                            if (isset($_GET['brands'])) {
                                $brandChecked = [];
                                $brandChecked = $_GET['brands'];
                                foreach ($brandChecked as $rowbrand) {

                                    $conn = ControlDB::getconnect();
                                    $sql = "SELECT * FROM product WHERE category_category_id IN ($rowbrand)";
                                    $result = $conn->query($sql) or die($conn->error);
                                    if (mysqli_num_rows($result) > 0) {
                                        foreach ($result as $proitems) :
                                            ?>
                                            <div class="col-lg-2 col-md-6 pro-items tab1">
                                                <div class="card">
                                                    <a href="<?php printf('%s?item_id=%s', 'products.php', $proitems['product_id']); ?>">
                                                        <img class="card-img-top-box" src="../uploads/<?php echo $proitems['product_img']; ?>" alt="">
                                                        <h4><?php echo $proitems['product_name']; ?></h4>
                                                        <p>Price : <?php echo number_format($proitems['product_price']); ?>Rs</p>
                                                    </a>
                                                </div>
                                            </div>
                                            <?php
                                        endforeach;
                                    }
                                }
                            } else {
                                $pro_result = viewProduct();
                                while ($row = mysqli_fetch_array($pro_result)) {
                                    ?>
                                    <div class="col-lg-2 col-md-6 pro-items tab1">
                                        <div class="card">
                                            <a href="<?php printf('%s?item_id=%s', 'products.php', $row['product_id']); ?>">
                                                <img class="card-img-top-box" src="../uploads/<?php echo $row['product_img']; ?>" alt="">
                                                <h4><?php echo $row['product_name']; ?></h4>
                                                <p>Price : <?php echo number_format($row['product_price']); ?>Rs</p>
                                            </a>
                                        </div>
                                    </div>
                                    <?php
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <!----------------- Category Section End ---------------------->
            <!--Category In Detail Start-->

            <!--Category In Detail End-->
            <!------------------ Daily Deals Section Start ---------------->
            <div class="container-fluid post-slider pb-4 mb-4 shadow">
                <div class="container pt-4 pb-2 deal-topic">
                    <div class="row">
                        <h3>Daily Deals</h3>
                    </div>
                    <div class="underline-daily"></div>
                </div>
                <i class="fas fa-chevron-right next"></i>
                <i class="fas fa-chevron-left prev"></i>
                <div class="post-wrapper">
                    <?php
                    $deal_result1 = viewProductDeal();
                    while ($row = mysqli_fetch_array($deal_result1)) {
                        ?>
                        <div class="post">
                            <div class="card tab" onclick="tabs(0)">
                                <a href="<?php printf('%s?item_id=%s', 'products.php', $row['product_id']); ?>"><img class="card-img-top-circle" src="../uploads/<?php echo $row['product_img']; ?>" alt="">
                                    <h4><?php echo $row['product_name']; ?></h4>
                                    <p>Price : <?php echo number_format($row['product_price']); ?>Rs</p>
                                </a>                        
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <!------------------- Daily Deals Section End ----------------->

            <!----------------- Weekly Deals Section Start -------------------->
            <div class="container-fluid post-slider shadow">
                <div class="row">
                    <div class="container pt-4 pb-2 deal-topic">
                        <div class="row">
                            <h3>Weekly Deals</h3>
                        </div>
                        <div class="underline-weekly"></div>
                    </div>
                    <i class="fas fa-chevron-right next1"></i>
                    <i class="fas fa-chevron-left prev1"></i>
                    <div class="post-wrapper1">
                        <?php
                        $deal_result2 = viewProductDealWeek();
                        while ($row = mysqli_fetch_array($deal_result2)) {
                            ?>
                            <div class="post">
                                <div class="card">
                                    <a href="<?php printf('%s?item_id=%s', 'products.php', $row['product_id']); ?>"><img class="card-img-top-circle" src="../uploads/<?php echo $row['product_img']; ?>" alt="">
                                        <h4><?php echo $row['product_name']; ?></h4>
                                        <p>Price : <?php echo number_format($row['product_price']); ?>Rs</p>
                                    </a> 
                                </div>
                            </div>
                        <?php } ?>                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!----------------- Weekly Deals End ---------------------->
    <?php
    $deal_result = viewDeal();
    while ($row = mysqli_fetch_array($deal_result)) {
        ?>
        <!--Parallex Background Start -->
        <section class="parallex py-5" 
                 style="background: linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)), url(../uploads/<?php echo $row['deal_img']; ?>)no-repeat; background-attachment: fixed; background-size: 100% 100%; width: 100%;">
            <div class="container py-5 text-white text-center" style="">
                <div class="row py-3">
                    <div class="col-lg-9 mx-auto">
                        <h2><?php echo $row['deal_topic']; ?></h2>
                        <p class="py-3"><?php echo $row['deal_quote']; ?></p>
                        <button class="mr-1 btn-shop">SHOP NOW</button>
                        <button class="btn-deal">GET DEAL</button>
                    </div>
                </div>
            </div>
        </section>
        <!--Parallex Background End-->
    <?php } ?>
    <!----------------- More Fruits Section Start -------------------->
    <div class="container product pb-4 mt-4 mb-4 shadow">
        <div class="container pt-4 pro-topic">
            <div class="row">
                <h3>Explore More Products</h3>
            </div>
            <div class="underline"></div>
        </div>
        <div class="row">
            <?php
            $products_more = viewProductsMore();
            while ($row = mysqli_fetch_array($products_more)) {
                ?>
                <div class="col-lg-2 col-md-6 pro-items">
                    <div class="card">
                        <a href="<?php printf('%s?item_id=%s', 'products.php', $row['product_id']); ?>"><img class="card-img-top-box" src="../uploads/<?php echo $row['product_img']; ?>" alt="">
                            <h4><?php echo $row['product_name']; ?></h4>
                            <p class="m-0 text-danger" style="font-size: 12px;">Price : <s><?php echo number_format($row['product_price_updated']); ?>Rs</s></p>
                            <p>Price : <?php echo number_format($row['product_price']); ?>Rs</p>
                        </a>
                    </div>
                </div>  
            <?php } ?>
        </div>
    </div>
    <!----------------- More Fruits Section End ---------------------->
    <!-------------------- Promotion Section Start ------------------------>
    <div class="container-fluid offer pt-3 pb-3 d-none d-md-block">
        <div class="container">
            <div class="row">
                <div class="col-md-4 m-right">
                    <h4>FREE SHIPPING</h4>
                    <p>on order over $99</p>
                </div>
                <div class="col-md-4 m-right">
                    <h4>CALL US ANYTIME</h4>
                    <p>+94 77 1406 699</p>
                </div>
                <div class="col-md-4">
                    <h4>OUR LOCATION</h4>
                    <p>Colombo, Sri-Lanka</p>
                </div>
            </div>
        </div>
    </div>
    <!-------------------- Promotion Section End -------------------------->
</div>
<!--Vegetables-->
<div class="tabShow">
    <div class="container">
        <div class="row">
            <!----------------- Category Section Start -------------------->
            <div class="container-fluid product pb-4 mb-4 shadow">
                <div class="container pt-4 pro-topic">
                    <div class="row"><h3>Explore Vegetables</h3></div>
                    <div class="underline"></div>
                </div>
                <div class="row">
                    <?php
                    $product_1 = viewProduct1();
                    while ($row = $product_1->fetch_assoc()) {
                        ?>
                        <div class="col-lg-2 col-md-6 pro-items">
                            <div class="card">
                                <a href="#"><img class="card-img-top-box" src="../uploads/<?php echo $row['product_img']; ?>" alt="">
                                    <h4><?php echo $row['product_name']; ?></h4>
                                    <p>Price : <?php echo number_format($row['product_price']); ?>Rs</p>
                                </a>
                            </div>
                        </div> 
                    <?php } ?>
                </div>  
            </div>
        </div>
    </div>
</div>
<!--Fruits-->
<div class="tabShow">
    <div class="container">
        <div class="row">
            <!----------------- Category Section Start -------------------->
            <div class="container-fluid product pb-4 mb-4 shadow">
                <div class="container pt-4 pro-topic">
                    <div class="row">
                        <h3>Explore Fruits</h3>
                    </div>
                    <div class="underline"></div>
                </div>
                <div class="row">
                    <?php
                    $product_2 = viewProduct2();
                    while ($row = $product_2->fetch_assoc()) {
                        ?>
                        <div class="col-lg-2 col-md-6 pro-items">
                            <div class="card">
                                <a href="<?php printf('%s?item_id=%s', 'products.php', $row['product_id']); ?>"><img class="card-img-top-box" src="../uploads/<?php echo $row['product_img']; ?>" alt="">
                                    <h4><?php echo $row['product_name']; ?></h4>
                                    <p>Price : <?php echo number_format($row['product_price']); ?>Rs</p>
                                </a>
                            </div>
                        </div>
                    <?php } ?>                    
                </div>               
            </div>
        </div>
    </div>
</div>
<!--Processed Food-->
<div class="tabShow">
    <div class="container">
        <div class="row">
            <!----------------- Category Section Start -------------------->
            <div class="container-fluid product pb-4 mb-4 shadow">
                <div class="container pt-4 pro-topic">
                    <div class="row">
                        <h3>Explore Processed Food</h3>
                    </div>
                    <div class="underline"></div>
                </div>
                <div class="row">
                    <?php
                    $product_3 = viewProduct3();
                    while ($row = $product_3->fetch_assoc()) {
                        ?>
                        <div class="col-lg-2 col-md-6 pro-items">
                            <div class="card">
                                <a href="<?php printf('%s?item_id=%s', 'products.php', $row['product_id']); ?>"><img class="card-img-top-box" src="../uploads/<?php echo $row['product_img']; ?>" alt="">
                                    <h4><?php echo $row['product_name']; ?></h4>
                                    <p>Price : <?php echo number_format($row['product_price']); ?>Rs</p>
                                </a>
                            </div>
                        </div>
                    <?php } ?>
                </div>               
            </div>
        </div>
    </div>
</div>
<!--Tubers & Yams-->
<div class="tabShow">
    <div class="container">
        <div class="row">
            <!----------------- Category Section Start -------------------->
            <div class="container-fluid product pb-4 mb-4 shadow">
                <div class="container pt-4 pro-topic">
                    <div class="row">
                        <h3>Explore Tubers & Yams</h3>
                    </div>
                    <div class="underline"></div>
                </div>
                <div class="row">
                    <?php
                    $product_4 = viewProduct4();
                    while ($row = $product_4->fetch_assoc()) {
                        ?>
                        <div class="col-lg-2 col-md-6 pro-items">
                            <div class="card">
                                <a href="<?php printf('%s?item_id=%s', 'products.php', $row['product_id']); ?>"><img class="card-img-top-box" src="../uploads/<?php echo $row['product_img']; ?>" alt="">
                                    <h4><?php echo $row['product_name']; ?></h4>
                                    <p>Price : <?php echo number_format($row['product_price']); ?>Rs</p>
                                </a>
                            </div>
                        </div>
                    <?php } ?>
                </div>               
            </div>
        </div>
    </div>
</div>
<!--Plantation Crops-->
<div class="tabShow">
    <div class="container">
        <div class="row">
            <!----------------- Category Section Start -------------------->
            <div class="container-fluid product pb-4 mb-4 shadow">
                <div class="container pt-4 pro-topic">
                    <div class="row">
                        <h3>Explore Plantation Crops</h3>
                    </div>
                    <div class="underline"></div>
                </div>
                <div class="row">
                    <?php
                    $product_5 = viewProduct5();
                    while ($row = $product_5->fetch_assoc()) {
                        ?>
                        <div class="col-lg-2 col-md-6 pro-items">
                            <div class="card">
                                <a href="<?php printf('%s?item_id=%s', 'products.php', $row['product_id']); ?>"><img class="card-img-top-box" src="../uploads/<?php echo $row['product_img']; ?>" alt="">
                                    <h4><?php echo $row['product_name']; ?></h4>
                                    <p>Price : <?php echo number_format($row['product_price']); ?>Rs</p>
                                </a>
                            </div>
                        </div>
                    <?php } ?>
                </div>               
            </div>
        </div>
    </div>
</div>
<!--Mushroom-->
<div class="tabShow">
    <div class="container">
        <div class="row">
            <!----------------- Category Section Start -------------------->
            <div class="container-fluid product pb-4 mb-4 shadow">
                <div class="container pt-4 pro-topic">
                    <div class="row">
                        <h3>Explore Mushroom</h3>
                    </div>
                    <div class="underline"></div>
                </div>
                <div class="row">
                    <?php
                    $product_6 = viewProduct6();
                    while ($row = $product_6->fetch_assoc()) {
                        ?>
                        <div class="col-lg-2 col-md-6 pro-items">
                            <div class="card">
                                <a href="<?php printf('%s?item_id=%s', 'products.php', $row['product_id']); ?>"><img class="card-img-top-box" src="../uploads/<?php echo $row['product_img']; ?>" alt="">
                                    <h4><?php echo $row['product_name']; ?></h4>
                                    <p>Price : <?php echo number_format($row['product_price']); ?>Rs</p>
                                </a>
                            </div>
                        </div>
                    <?php } ?>                
                </div>               
            </div>
        </div>
    </div>
</div>
<!--Medicinal-->
<div class="tabShow">
    <div class="container">
        <div class="row">
            <!----------------- Category Section Start -------------------->
            <div class="container-fluid product pb-4 mb-4 shadow">
                <div class="container pt-4 pro-topic">
                    <div class="row">
                        <h3>Explore Medicinal</h3>
                    </div>
                    <div class="underline"></div>
                </div>
                <div class="row">
                    <?php
                    $product_7 = viewProduct7();
                    while ($row = $product_7->fetch_assoc()) {
                        ?>
                        <div class="col-lg-2 col-md-6 pro-items">
                            <div class="card">
                                <a href="<?php printf('%s?item_id=%s', 'products.php', $row['product_id']); ?>"><img class="card-img-top-box" src="../uploads/<?php echo $row['product_img']; ?>" alt="">
                                    <h4><?php echo $row['product_name']; ?></h4>
                                    <p>Price : <?php echo number_format($row['product_price']); ?>Rs</p>
                                </a>
                            </div>
                        </div>
                    <?php } ?>
                </div>               
            </div>
        </div>
    </div>
</div>
<!--Category Selector-->
<div class="tabShow">
    <div class="container">
        <div class="row">
            <!----------------- Category Section Start -------------------->
            <div class="container-fluid product pb-4 mb-4 shadow">
                <div class="container pt-4 pro-topic">
                    <div class="row">
                        <h3>Explore Category</h3>
                    </div>
                    <div class="underline"></div>
                </div>
                <div class="row">
                    <?php
                    $result = viewCategory();
                    while ($row = mysqli_fetch_array($result)) {
                        ?>
                        <div class="col-lg-2 col-md-6 pro-items tab1">
                            <div class="card">
                                <a href="#"><img class="card-img-top-box" src="../uploads/<?php echo $row['category_img']; ?>" alt="">
                                    <h4><?php echo $row['category_name']; ?></h4>
                                </a>
                            </div>
                        </div>
                    <?php } ?>
                </div>               
            </div>
        </div>
    </div>
</div>
<!----------------- Category Section End ---------------------->
</div><!--For Header page Search Bar Closing DIV-->
<!------------------------------ Main Content End ----------------------------->
<?php include ("./footer.php"); ?>
<!--<script type="text/javascript" src="js/filter_products.js"></script>-->