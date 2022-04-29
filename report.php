<!--Header Script Include Link-->
<?php include("./header.php"); ?>
<link rel="stylesheet" type="text/css" href="css/style.css">
<!-- Line Graph Script End -->
<div class="wrapper">
    <!----------------------- SideBar Start --------------------------->
    <div class="sidebar">
        <div class="sidebar-menu">
            <li class="item">
                <a href="index.php" data-toggle="tooltip" title="Dashboard" data-placement="left" class="profile-menu-btn">
                    <i class="fas fa-feather-alt"></i><span>Dashboard</span>
                </a>
            </li>
            <!--            <li class="item">
                            <a href="#" data-toggle="tooltip" title="Profile" data-placement="left" class="menu-btn">
                                <i class="fas fa-user mr-3"></i><span>Profile</span>
                            </a>
                        </li>-->
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
            <!--            <li class="item">
                            <a href="#" data-toggle="tooltip" title="Inbox" data-placement="left" class="menu-btn">
                                <i class="fas fa-envelope mr-3"></i><span>Inbox</span>
                            </a>
                        </li>-->
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
    <div class="content pb-5 mb-5">
        <!-- Begin Row Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-secondary">Report Management</h1>
                <!--<button onclick="myFunction()">Toggle dark mode</button>-->
            </div>

            <!-- Content Row -->
            <div class="row">
                <!-- Earnings (Daily) Card  -->
                <div class="col-xl-3 col-md-6 mb-4"></div>
                <!-- Registered Users -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col ml-3 mt-3">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                        <a href="report_user.php">User Management Report</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-info shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col ml-3 mt-3">
                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                        <a href="report_customer.php">Customer Management Report</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Pending Requests Card Example -->
                <div class="col-xl-3 col-md-6 mb-4"></div>
            </div>
            <!-- Content Row -->
            <div class="row">
                <!-- Earnings (Daily) Card  -->
                <div class="col-xl-3 col-md-6 mb-4"></div>
                <!-- Registered Users -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col ml-2 mt-4">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                        <a href="report_supplier.php">Supplier Management Report</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-info shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col ml-2 mt-4">
                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                        <a href="report_stock.php">Stock Management Report</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Pending Requests Card Example -->
                <div class="col-xl-3 col-md-6 mb-4"></div>
            </div>
            <!-- Content Row -->
        </div>
    </div>

</div>

</div>



<!----------------------- Main-Content End --------------------------->
</div>
<!--Footer Script Include Link-->
<?php include("./footer.php"); ?>
