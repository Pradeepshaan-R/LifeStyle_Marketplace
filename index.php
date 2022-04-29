<!--Header Script Include Link-->
<?php include "./header.php"; ?>
<link rel="stylesheet" type="text/css" href="css/style.css">
<div class="wrapper">
    <!----------------------- SideBar Start --------------------------->
    <div class="sidebar">
        <div class="sidebar-menu">
            <li class="item">
                <a href="#" data-toggle="tooltip" title="Dashboard" data-placement="left" class="current">
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
                <a href="sales.php" data-toggle="tooltip" title="Sales" data-placement="left" class="menu-btn">
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
        <!-- Begin Row Content -->
        <div class="container-fluid">
            <?php
            $conn = ControlDB::getconnect();
            $sql_user = mysqli_query($conn, "SELECT * FROM user WHERE user_status = 1");
            $count_user = mysqli_num_rows($sql_user);

            $sql_customer = mysqli_query($conn, "SELECT * FROM customer WHERE customer_status = 1");
            $count_customer = mysqli_num_rows($sql_customer);

            $sql_ad = mysqli_query($conn, "SELECT * FROM advertisement WHERE ad_status = 1");
            $count_ad = mysqli_num_rows($sql_ad);

            $sql_stock = mysqli_query($conn, "SELECT * FROM stock WHERE stock_status = 1");
            $count_stock = mysqli_num_rows($sql_stock);

            $sql_supplier = mysqli_query($conn, "SELECT * FROM supplier WHERE supplier_status = 1");
            $count_supplier = mysqli_num_rows($sql_supplier);

            $sql_products = mysqli_query($conn, "SELECT * FROM product WHERE product_status = 1");
            $count_products = mysqli_num_rows($sql_products);

            $sql_deal = mysqli_query($conn, "SELECT * FROM deal WHERE deal_status = 1");
            $count_deal = mysqli_num_rows($sql_deal);
            ?>
            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-secondary">Dashboard</h1>
                <a href="report.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                    <i class="fas fa-download fa-sm text-white-50"></i>
                    Generate Report
                </a>
                <!--<button onclick="myFunction()">Toggle dark mode</button>-->
            </div>

            <!-- Content Row -->
            <div class="row">
                <!-- Earnings (Daily) Card  -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <a href="in_users.php" style="text-decoration: none">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Registered User</div>
                                        <div class="h5 mb-0 font-weight-bold text-secondary"><?php echo $count_user; ?></div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-coins fa-2x text-secondary"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- Registered Users -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <a href="ex_users.php" style="text-decoration: none">
                        <div class="card border-left-success shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">External Users</div>
                                        <div class="h5 mb-0 font-weight-bold text-secondary"><?php echo $count_customer; ?></div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-user-tag fa-2x text-secondary"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <a href="ads-mgmt.php" style="text-decoration: none">
                        <div class="card border-left-info shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Advertisement</div>
                                        <div class="row no-gutters align-items-center">
                                            <div class="col-auto">
                                                <div class="h5 mb-0 mr-3 font-weight-bold text-secondary"><?php echo $count_ad; ?></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fab fa-adversal fa-2x text-secondary"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Pending Requests Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <a href="stock-management.php" style="text-decoration: none">
                        <div class="card border-left-warning shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Stock Count</div>
                                        <div class="h5 mb-0 font-weight-bold text-secondary"><?php echo $count_stock; ?></div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-chart-bar fa-2x text-secondary"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <!-- Content Row -->
            <div class="row">
                <div class="col-xl-6 col-lg-5">
                    <div class="col-xl-12 col-md-6 mb-4 pr-0 pl-0">
                        <a href="product_table.php" style="text-decoration: none;">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Product Count</div>
                                            <div class="h1 mb-0 font-weight-bold text-secondary"><?php echo $count_products; ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="h1 fas fa-tree fa-2x text-success"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-xl-6 col-md-6 mb-4">
                    <a href="supplier-management.php" style="text-decoration: none">
                        <div class="card border-left-warning shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Suppliers Registered</div>
                                        <div class="h1 mb-0 font-weight-bold text-secondary"><?php echo $count_supplier; ?></div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="h1 fas fa-handshake fa-2x text-info"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>



<!----------------------- Main-Content End --------------------------->
</div>
<!--Footer Script Include Link-->
<?php include "./footer.php"; ?>
