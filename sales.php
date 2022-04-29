<!--Header Script Include Link-->
<?php
include("./header.php");

if (isset($_GET['id'])) {
    $conn = ControlDB::getconnect();
    $main_id = $_GET['id'];
    $sql_update = mysqli_query($conn, "UPDATE seller SET seller_status = 0 WHERE seller_id = '$main_id'");
}
?>
<link rel="stylesheet" type="text/css" href="css/sales.css">

<div class="wrapper">
    <!----------------------- SideBar Start --------------------------->
    <div class="sidebar">
        <div class="sidebar-menu">
            <li class="item">
                <a href="index.php" data-toggle="tooltip" title="Dashboard" data-placement="left" class="menu-btn">
                    <i class="fas fa-feather-alt"></i><span>Dashboard</span>
                </a>
            </li>
            <li class="item">
                <a href="in_users.php" data-toggle="tooltip" title="User Management" data-placement="left" class="menu-btn">
                    <i class="fas fa-house-user"></i><span>User Management</span>
                </a>
            </li>
            <li class="item">
                <a href="ex_users.php" data-toggle="tooltip" title="Customer Management" data-placement="left" class="menu-btn">
                    <i class="fas fa-users"></i><span>Customer Management</span>
                </a>
            </li>
            <li class="item">
                <a href="supplier-management.php" data-toggle="tooltip" title="Customer Management" data-placement="left" class="menu-btn">
                    <i class="fas fa-hands-helping"></i><span>Supplier Management</span>
                </a>
            </li>
            <li class="item">
                <a href="product.php" data-toggle="tooltip" title="Products Management" data-placement="left" class="menu-btn">
                    <i class="fas fa-seedling"></i><span>Products Management</span>
                </a>
            </li>
            <li class="item">
                <a href="stock-management.php" data-toggle="tooltip" title="Products Management" data-placement="left" class="menu-btn">
                    <i class="fas fa-database"></i><span>Stock Management</span>
                </a>
            </li>
            <li class="item">
                <a href="ads-mgmt.php" data-toggle="tooltip" title="Ads Management" data-placement="left" class="menu-btn">
                    <i class="fas fa-ad fa-lg"></i></i><span style="font-size: 17px;">Ads Management</span>
                </a>
            </li>
            <li class="item">
                <a href="#" data-toggle="tooltip" title="Sales" data-placement="left" class="current">
                    <i class="fas fa-shopping-cart"></i><span>Sales</span>
                </a>
            </li><!--
                        <li class="item">
                            <a href="route.php" data-toggle="tooltip" title="Route Analytics" data-placement="left" class="menu-btn">
                                <i class="fas fa-map-marked-alt"></i><span>Route Analytics</span>
                            </a>
                        </li>-->
        </div>
    </div>
    <!----------------------- SideBar End ----------------------------->
    <!----------------------- Main-Content Start --------------------------->
    <div class="content">
        <!-------------- Begin Page Content -------------------->
        <div class="container-fluid">
            <!-------------------- Page Heading Start ------------------>
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-secondary">Seller Request Management</h1>
                <a href="report.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                    <i class="fas fa-download fa-sm text-white-50"></i>
                    Generate Report
                </a> 
            </div>
            <!-------------------- Page Heading End ------------------>
            <div class="row">
                <div class="col-md-12">
                    <!---------------- Table Start ------------------------->
                    <div class="card shadow mb-4"  id="in_user_table">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-info">Product Request Alloted</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr style="text-align: center">
                                            <th>ID</th>
                                            <th>Seller Name</th>
                                            <th>Product</th>
                                            <th>Product Quantity</th>
                                            <th>Product Market Price</th>
                                            <th>Product Price</th>
                                            <th>Acceptable / Or Not</th>
                                            <th>Start Date</th>
                                            <th>End Date</th>
                                            <th>Product Type</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr style="text-align: center">
                                            <th>ID</th>
                                            <th>Seller Name</th>
                                            <th>Product</th>
                                            <th>Product Quantity</th>
                                            <th>Product Market Price</th>
                                            <th>Product Price</th>
                                            <th>Acceptable / Or Not</th>
                                            <th>Start Date</th>
                                            <th>End Date</th>
                                            <th>Product Type</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody style="text-align: center">
                                        <?php
                                        $sr_no = 1;
                                        $conn = ControlDB::getconnect();
                                        $sql_get = mysqli_query($conn, "SELECT * FROM seller JOIN category ON "
                                                . "category.category_id=seller.category_category_id WHERE seller_status = 0");
                                        while ($main_result = mysqli_fetch_assoc($sql_get)):

                                            $market_price = $main_result['seller_market_price'];
                                            $seller_price = $main_result['seller_price'];
                                            if ($market_price >= $seller_price) {
                                                $ok = "Acceptable";
                                            } else {
                                                $ok = "Denied";
                                            }
                                            ?>
                                            <tr>
                                                <th><?php echo $sr_no++ ?></th>
                                                <th><?php echo $main_result['seller_name']; ?></th>
                                                <th><?php echo $main_result['seller_product_name']; ?></th>
                                                <th><?php echo $main_result['seller_product_qty'] . " kg"; ?></th>
                                                <th><?php echo $main_result['seller_market_price']; ?></th>
                                                <th><?php echo $main_result['seller_price']; ?></th>
                                                <th><?php echo $ok; ?></th>
                                                <th hidden><?php echo $main_result['seller_product_des']; ?></th>
                                                <th><?php echo $main_result['seller_product_reg']; ?></th>
                                                <th><?php echo $main_result['seller_product_exp']; ?></th>
                                                <th><?php echo $main_result['category_name']; ?></th>
                                                <th>
                                                    <!--Call to action buttons--> 
                                                    <ul class="list-inline m-0">
                                                        <li class="list-inline-item">
                                                            <button class="btn btn-success rounded-0 seller-viewbtn" name="view" type="button" data-toggle="modal" data-target="#sellerViewModal" title="View"><i class="fas fa-id-card"></i></button>
                                                        </li>
                                                        <li class="list-inline-item">
                                                            <a href="_delete-seller.php?id=<?php echo $main_result['seller_id']; ?>" class="btn btn-danger btn rounded-0 seller-deletebtn" name="delete"><i class="fas fa-trash"></i></a>
                                                        </li>
                                                    </ul>
                                                </th>
                                            </tr>
                                        <?php endwhile; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!---------------- Table End ------------------------->
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </div>
    <!--------------------- User View Modal Start --------------------->
    <div class="modal fade sellerDetailsModal" id="sellerViewModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <!--Modal Header--> 
                <div class="modal-header">
                    <h4 class="modal-title">View</h4>                         
                    <button type="button" class="close text-white" data-dismiss="modal"><i class="fas fa-times"></i></button>
                </div>
                <!--Modal body--> 
                <div class="modal-body">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" disabled class="form-control" id="seller_id" name="seller_id" placeholder="First Name" value="<?php echo $row['ad_id']; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" disabled class="form-control" id="seller_name" name="seller_name" placeholder="Last Name" value="<?php echo $row['ad_companyname']; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" disabled class="form-control" id="seller_product" name="seller_product" placeholder="Email" value="<?php echo $row['ad_email']; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" disabled class="form-control" id="seller_qty" name="seller_qty" placeholder="Email" value="<?php echo $row['ad_email']; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <textarea id="seller_des" rows="4" cols="80" class="form-control"></textarea>
                                    <!--<input type="text" disabled class="form-control" id="seller_des" name="seller_des" placeholder="Email" value"">-->
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--------------------- User View Modal End ----------------------->
</div>
<!----------------------- Main-Content End --------------------------->
</div>
<!--Footer Script Include Link-->
<?php include("./footer.php"); ?>
<script type="text/javascript" src="js/validation-form.js"></script>