<!--Header Script Include Link-->
<?php
include("./header.php");

function getCat() {
    $conn = ControlDB::getconnect();
    $sql = "SELECT * FROM category";
    $result = $conn->query($sql) or die($conn->error);
    return $result;
}
?>
<link rel="stylesheet" type="text/css" href="css/product.css">

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
                <a href="#" data-toggle="tooltip" title="Products Management" data-placement="left" class="current">
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
        <!-------------- Begin Page Content -------------------->
        <div class="container-fluid">
            <!-------------------- Page Heading Start ------------------>
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-secondary">Products Management</h1>
                <a href="product_table.php" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm">
                    <i class="far fa-eye fa-sm text-white-50"></i>
                    View Product & Category Table
                </a> 
            </div>
            <!-------------------- Page Heading End ------------------>
            <div class="row">
                <!--Add Category Start-->
                <div class="col-md-4">
                    <div class="card-product">
                        <div class="card-header">
                            <h5 class="title"><i class="far fa-edit"></i>Add New Product Category</h5>
                        </div>
                        <div class="card-body">
                            <form action="_add-product.php?status=addCategory" method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>Category ID</label>
                                    <input type="text" class="form-control" disabled="" placeholder="ID" value="" name="cat_id" style="background: #e6fff5; color: white; cursor: not-allowed;">
                                </div>
                                <div class="form-group">
                                    <label>Category Name</label>
                                    <input type="text" class="form-control" name="cat_name" placeholder="Fruits" value="">
                                </div>
                                <div class="form-group">
                                    <label>Insert Category Image</label>
                                    <input type="file" class="form-control" name="cat_img" accept="image/*" style="height: 60px;" placeholder="Ad Image" alt="Category Image" src="">
                                </div>                               
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-fill btn-primary submit-btn mr-3"><i class="far fa-check-circle"></i> Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!--Add Category Start-->

                <!--Add Product Start-->
                <div class="col-md-8">
                    <div class="card-product">
                        <div class="card-header">
                            <h5 class="title"><i class="far fa-edit"></i>Add New Product</h5>
                        </div>
                        <div class="card-body">
                            <form  action="_add-product.php?status=addProduct" class="needs-validation" method="POST" enctype="multipart/form-data" novalidate>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Product ID</label>
                                            <input type="text" class="form-control" disabled="" placeholder="ID" value="" style="background: #e6fff5; color: white; cursor: not-allowed;">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Product Name</label>
                                            <input type="text" class="form-control" required placeholder="Apple" value="" name="p_name">
                                            <div class="valid-feedback">Valid</div>
                                            <div class="invalid-feedback">Please Enter Product Name.</div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Product Location</label>
                                            <input type="text" class="form-control" required placeholder="Location" value="" name="p_location">
                                            <div class="valid-feedback">Valid</div>
                                            <div class="invalid-feedback">Please Enter Product Location.</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Product category</label>
                                            <div class="form-group">
                                                <select name="p_cat" class="custom-select form-control" required>
                                                    <option selected value="">---</option>
                                                    <?php
                                                    $cat_name = getCat();
                                                    while ($row = $cat_name->fetch_assoc()) {
                                                        ?>
                                                        <option value="<?php echo $row["category_id"]; ?>">
                                                            <?php echo $row["category_name"]; ?>
                                                        </option> <?php } ?>                       
                                                </select>
                                                <div class="valid-feedback">Valid</div>
                                                <div class="invalid-feedback">Please select Category.</div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Product Image</label>
                                            <input type="file" class="form-control" required name="pro_img" accept="image/*" style="height: 60px;" placeholder="Ad Image" alt="Advertisement Image" src="">
                                            <div class="valid-feedback">Valid</div>
                                            <div class="invalid-feedback">Please add Image.</div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Product Price</label>
                                            <input type="number" class="form-control" required placeholder="Rs.200" value="" name="p_price">
                                            <div class="valid-feedback">Valid</div>
                                            <div class="invalid-feedback">Please Enter Product Price.</div>
                                        </div>
                                        <div class="form-group">
                                            <label>Product Description</label>
                                            <textarea rows="4" cols="40" name="p_des" class="form-control" placeholder="" value="Mike">An apple is an edible fruit produced by an apple tree. Apple trees are cultivated worldwide and are the most widely grown species in the genus Malus. The tree originated in Central Asia, where its wild ancestor, Malus sieversii, is still found today.</textarea>
                                        </div>
                                    </div>
                                </div>                                   
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-fill btn-primary submit-btn mr-3 was-validated"><i class="far fa-check-circle"></i> Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!--Add Product End-->
            </div>
        </div>
        <!-- /.container-fluid -->
    </div>

</div>

<!----------------------- Main-Content End --------------------------->
</div>
<!--Footer Script Include Link-->
<?php include("./footer.php"); ?>
<script type="text/javascript" src="js/validation-form.js"></script>
