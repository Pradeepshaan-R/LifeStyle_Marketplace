<!--Header Script Include Link-->
<?php
include("./header.php");
//print_r($_SESSION['cart']);

?>
<link rel="stylesheet" type="text/css" href="css/shop-cart.css">
<!---------------------------- Main Content Start ----------------------------->
<div class="container shop-cart mt-4 mb-4">
    <h5 class="cart-title">Shopping Cart</h5>
    <div class="row cart-details">
        <div class="col-md-12 cart-product-info">
            <div class="row border-top py-3 mt-2">
                <?php
                if (isset($_GET['del'])) {
                    foreach ($_SESSION['cart'] as $keys => $values) {
                        if ($values['pro_id'] == $_GET['del']) {
                            unset($_SESSION['cart'][$keys]);
                        }
                    }
                }
                if (!empty($_SESSION['cart'])) {
                    $total = 0;
                    foreach ($_SESSION['cart'] as $keys => $values) {
                        $amount = $values['pro_price'] * $values['pro_qty'];
                        $total += $amount;
                        ?>
                        <div class="col-md-2 pt-4 pl-5 pr-0">
                            <h6>Product : </h6>
                            <!--<img src="../uploads/<?php echo $row['product_img']; ?>" alt="cart-item-img" class="product-img img-fluid">-->
                        </div>
                        <div class="col-md-5 product-details pl-0">
                            <h5><?php echo $values['pro_name']; ?></h5>
                            <small>By SenzMarket</small>
                        </div>
                        <div class="col-md-5 procduct-price-sub">
                            <table class="table table-borderless">
                                <tr style="text-align: center;">
                                    <th>Product Quantity</th>
                                    <th>Product Price</th>
                                    <th>Total Price</th>
                                    <th>Remove Product</th>
                                </tr>
                                <tr style="text-align: center;">
                                    <td><?php echo $values['pro_qty']; ?></td>
                                    <td><?php echo $values['pro_price']; ?></td>
                                    <td><?php echo $amount ?></td>
                                    <td><a href="<?php printf('%s?del=%s', 'product-cart.php', $values['pro_id']); ?>">Remove</a></td>
                                    <!--<td><a href="product-cart.php?del=values['pro_id']">Remove</a></td>-->
                                </tr>
                            </table>
                        </div>
                    <?php }
                    ?>
                    <div class="ml-auto">
                        <table class="table ml-auto">
                            <tr>
                                <th>Total Price</th>
                                <th></th>
                            </tr>
                            <tr style="text-align: center;">
                                <td><?php echo $total; ?></td>
                                <td></td>
                            </tr>
                        </table>
                    </div>
                <?php } else {
                    ?>
                    <div class="alert alert-danger" style="margin-left: 450px;">No Products Available in the Cart</div> <?php
//                    echo '<script>alert("Please select a Product.");</script>';
//                    header("location: ./front-end/index-front.php?");
                }
                ?>
            </div>
        </div>
    </div>
</div>
</div><!--For Header page Search Bar Closing DIV-->
<!------------------------------ Main Content End ----------------------------->
<?php include ("./footer.php"); ?>