<!--Header Script Include Link-->
<?php
include("./header.php");
$item_id = $_GET['item_id'];
if (isset($_POST['addCart'])) {
    if (isset($_SESSION['cart'])) {
        $pid_array = array_column($_SESSION['cart'], "pro_id");
        if (!in_array($_GET['item_id'], $pid_array)) {
            $index = count($_SESSION['cart']);
            $item = array(
                'pro_id' => $_GET['item_id'],
                'pro_qty' => $_POST['qty'],
                'pro_name' => $_POST['pro_name'],
                'pro_price' => $_POST['pro_price'],
            );
            $_SESSION['cart'][$index] = $item;
            echo "<script>alert('Product Added.');</script>";
        } else {
            echo "<script>alert('Product already added.');</script>";
        }
    } else {
        $item = array(
            'pro_id' => $_GET['item_id'],
            'pro_qty' => $_POST['qty'],
            'pro_name' => $_POST['pro_name'],
            'pro_price' => $_POST['pro_price'],
        );
        $_SESSION['cart'][0] = $item;
        echo "<script>alert('Product Added.');</script>";
    }
}

function viewProductPage() {
    $item_id = $_GET['item_id'];
    $conn = ControlDB::getconnect();
    $sql = "SELECT * FROM product JOIN category ON category.category_id=product.category_category_id WHERE product_id='$item_id'";
    $result = $conn->query($sql) or die($conn->error);
    return $result;
}

function getStockDetails() {
    $item_id = $_GET['item_id'];
    $conn = ControlDB::getconnect();
    $sql = "SELECT * FROM stock WHERE product_product_id='$item_id'";
    $result = $conn->query($sql) or die($conn->error);
    return $result;
}
function viewCustomerDetails() {
    $conn = ControlDB::getconnect();
    $current_customer = $_SESSION['customer']['customer_id'];
    $sql = "SELECT * FROM customer WHERE customer_id='$current_customer'";
    $result = $conn->query($sql) or die($conn->error);
    return $result;
}
?>
<link rel="stylesheet" type="text/css" href="css/index-front.css">
<!---------------------------- Main Content Start ----------------------------->
<div class="container pt-4 pb-4">
    <!------------------ Product Section Start ----------------------->
    <form action="" method="POST">
        <div class="row main-product shadow">
            <?php
            $pro_web = viewProductPage();
            while ($row = mysqli_fetch_array($pro_web)) {
                ?>
                <div class="col-md-5">
                    <div class="row main-product-img">
                        <div class="col">
                            <img src="../uploads/<?php echo $row['product_img']; ?>" class="img-fluid" alt="product">
                        </div>
                    </div>
                    <div class="row main-product-btn">
                        <div class="col-md-6">
                            <button class="btn-buy">Buy Now</button>
                        </div>
                        <div class="col-md-6">
                            <input type="hidden" class="form-control" id="cat_img" name="pro_img" accept="image/*" style="height: 60px;" placeholder="Category Image" alt="Category Image" src="./uploads/<?php echo $row['product_img']; ?>">
                            <input type="hidden" name="pro_name" value="<?php echo $row['product_name']; ?>">
                            <input type="hidden" name="pro_price" value="<?php echo number_format($row['product_price_updated']); ?>">
                            <input type="submit" name="addCart" class="btn-cart" value="Add to Cart">
                            <!--                            <button class="btn-cart">Add to Cart</button>-->
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="col main-product-info-h border-bottom">
                        <h5><?php echo $row['product_name']; ?></h5>
                        <small>By SenzMarket</small>
                        <div class="d-flex">
                            <div class="ratings text-warning">
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star-half-alt"></i></span>
                                <span><i class="fas fa-star-half-alt"></i></span>
                            </div>
                            <a href="#">120 Ratings | 1000+ Answered Questions</a>
                        </div>
                        <p><a href="#">From : SenzMarket | More Storage from Market</a></p>
                    </div>
                    <div class="col main-product-info-p border-bottom pb-1 pt-2 pl-0">
                        <table class="main-product-pricing">
                            <tr class="current-price">
                                <td><?php echo number_format($row['product_price']); ?></td>
                            </tr>
                            <tr class="earlier-price">
                                <td><strike>Rs.<?php echo number_format($row['product_price_updated']); ?></strike></td>
                            </tr>
                        </table>
                    </div>
                    <div class="col main-product-info-p border-bottom pl-0 pt-2 pb-2">
                        <table class="main-product-data">
                            <tr>
                                <td class="data-q">Type</td>
                                <td class="data-m">:</td>
                                <td class="data-a"><?php echo $row['category_name']; ?></td>
                            </tr>
                            <tr>
                                <td class="data-q">Location</td>
                                <td class="data-m">:</td>
                                <td class="data-a"><?php echo $row['product_location']; ?></td>
                            </tr>
                            <tr>
                                <td class="data-q">Unit Price</td>
                                <td class="data-m">:</td>
                                <td class="data-a">Rs.<?php echo number_format($row['product_price']); ?></td>
                            </tr>
                        <?php } ?>
                        <?php
                        $pro_stock = getStockDetails();
                        while ($row = mysqli_fetch_array($pro_stock)) {
                            ?>
                            <tr>
                                <td class="data-q">Manufactured Date</td>
                                <td class="data-m">:</td>
                                <td class="data-a"><?php echo($row['stock_reg_date']); ?></td>
                            </tr>
                            <tr>
                                <td class="data-q">Expire Date</td>
                                <td class="data-m">:</td>
                                <td class="data-a"><?php echo($row['stock_expire_date']); ?></td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
                <div class="col main-product-info-p pt-2 pb-2">
                    <div class="qty d-flex">
                        <h6 class="qty-text">Qty</h6>
                        <div class="px-4 d-flex">
                            <!--<button class="qty-up border bg-light"><i class="fas fa-chevron-up"></i></button>-->
                            <input type="number" name="qty" class="qty-input border px-2 w-50 bg-light" value="1" placeholder="1">
                            <!--<button class="qty-down border bg-light"><i class="fas fa-chevron-down"></i></button>-->
                        </div>
                    </div> 
                </div>
            </div>
            <div class="col-md-3 main-product-ex-info">
                <div class="col main-product-info-h">
                    <?php
                    $customer_details = viewCustomerDetails();
                    while ($row = mysqli_fetch_array($customer_details)) {
                        ?>
                        <div class="row ex-info-title">
                            <div class="col-md-10"><h5>Delivery Options</h5></div>
                            <div class="col-md-2"><i class="fas fa-exclamation-circle fa-rotate-180"></i></div>
                        </div>
                        <div class="row ex-info-data">
                            <div class="col-md-2"><i class="fas fa-map-marked-alt"></i></div>
                            <div class="col-md-6"><span><?php echo $row['customer_address']; ?></span></div>
                            <div class="col-md-4"><a href="#">Change</a></div>
                        </div>
                    <?php } ?>
                    <div class="row ex-info-data">
                        <div class="col-md-2"><i class="fas fa-truck-loading"></i></div>
                        <div class="col-md-6"><span>Home Delivery</span></div>
                        <div class="col-md-4"><h3>Rs. 50</span></h3></div>
                    </div>
                    <div class="row ex-info-data border-bottom">
                        <div class="col-md-2"><i class="fas fa-money-check-alt"></i></div>
                        <div class="col-md-6"><span>Cash on Delivery</span></div>
                        <div class="col-md-4"><h3>Rs. 750</span></h3></div>
                    </div>
                    <div class="row ex-info-title">
                        <div class="col-md-10"><h5>Warranty</h5></div>
                        <div class="col-md-2"><i class="fas fa-exclamation-circle fa-rotate-180"></i></div>
                    </div>
                    <div class="row ex-info-data border-bottom">
                        <div class="col-md-2"><i class="fas fa-handshake"></i></div>
                        <div class="col-md-6"><span>100% Authentic</span></div>
                    </div>
                    <div class="row ex-info-title">
                        <div class="col-md-10"><h5>Sold By</h5></div>
                    </div>
                    <div class="row ex-info-data border-bottom">
                        <div class="col-md-2 pr-0"><i class="fab fa-envira fa-flip-horizontal text-success pr-0 ml-0"></i></div>
                        <div class="col-md-6 pl-0"><span>SenzMarket</span></div>
                    </div>
                    <div class="row ex-info-data pl-2">
                        <table class="ex-info-tbl">
                            <tr class="ex-info-tbl-h">
                                <td>Positive Seller Ratings</td>
                                <td>Seller Size</td>
                                <td class="pl-4 pr-2">Shipment on Time</td>
                            </tr>
                            <tr class="ex-info-tbl-d">
                                <td>98%</td>
                                <td><i class="fas fa-signal"></i></td>
                                <td class="pl-4"><i class="fas fa-stopwatch"></i></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!------------------ Product Section End ------------------------->
</div>

</div><!--For Header page Search Bar Closing DIV-->
<!------------------------------ Main Content End ----------------------------->
<?php include ("./footer.php"); ?>