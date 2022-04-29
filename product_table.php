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
    $sql = "SELECT * FROM product JOIN category ON category.category_id=product.category_category_id";
    $result = $conn->query($sql) or die($conn->error);
    return $result;
}

function getCat() {
    $conn = ControlDB::getconnect();
    $sql = "SELECT * FROM category";
    $result = $conn->query($sql) or die($conn->error);
    return $result;
}
?>
<link rel="stylesheet" type="text/css" href="css/product-table.css">

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
                <a href="product.php" data-toggle="tooltip" title="Products Management" data-placement="left" class="profile-menu-btn">
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
                <h1 class="h3 mb-0 text-secondary">Category & Product Management</h1>
                <a href="report.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                    <i class="fas fa-download fa-sm text-white-50"></i>
                    Generate Report
                </a> 
            </div>
            <!-------------------- Page Heading End ------------------>
            <div class="row">
                <div class="col-xl-4 col-md-3 col-sm-1 mb-4"></div>
                <!-- View User  -->
                <a class="col-xl-2 col-md-3 mb-4 col-sm-5 tab" onclick="tabs(0)" href="#" style="text-decoration: none;">
                    <!--<div class="col-xl-2 col-md-3 mb-4">-->
                    <div class="card shadow h-100 py-2 view_user">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col" style="text-align: center;">
                                    <div class="text-xs font-weight-bold text-uppercase mb-2">View Category</div>
                                    <i class="fas fa-tree" style="font-size: 38px;"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
                <!-- Add User  -->
                <a class="col-xl-2 col-md-3 mb-4 col-sm-5 tab" onclick="tabs(1)" href="#" style="text-decoration: none;">
                    <!--<div class="col-xl-2 col-md-3 mb-4">-->
                    <div class="card shadow h-100 py-2 add_user">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col" style="text-align: center;">
                                    <div class="text-xs font-weight-bold text-uppercase mb-2">View Products</div>
                                    <i class="fab fa-pagelines" style="font-size: 35px;"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
                <div class="col-xl-4 col-md-3 col-sm-1 mb-4"></div>
            </div>
            <!---------------- Category Table Start ------------------------->
            <div class="card shadow mb-4 tabShow">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-info">Category Table</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr style="text-align: center">
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr style="text-align: center">
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php
                                $cat_no = 1;
                                $cat_result = viewCategory();
                                while ($row = mysqli_fetch_array($cat_result)) {
                                    ?>
                                    <tr style="text-align: center">
                                        <th><?php echo $cat_no++ ?></th>
                                        <th hidden><?php echo $row['category_id']; ?></th>
                                        <th><?php echo $row['category_name']; ?></th>
                                        <th><?php echo '<img src="./uploads/' . $row['category_img'] . '" width="100px;" height="100px;" alt="image">' ?></th>
                                        <th>
                                            <!--Call to action buttons--> 
                                            <ul class="list-inline m-0">
                                                <li class="list-inline-item">
                                                    <button class="btn btn-info btn rounded-0 editbtn" name="edit" type="button" type="button" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#categoryUpdateModal"><i class="fas fa-user-edit pr-2"></i>UPDATE</button>
                                                </li>
                                                <!--                                                <li class="list-inline-item">
                                                                                                    <button class="btn btn-danger btn rounded-0 deletebtn" name="delete" type="button" data-toggle="modal" title="Delete" data-target="#categoryDeleteModal"><i class="fas fa-user-slash"></i></button>
                                                                                                </li>-->
                                            </ul>
                                        </th>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!---------------- Category Table End --------------------------->
            <!---------------- Product Table Start ------------------------->
            <div class="card shadow mb-4 tabShow">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-info">Product Table</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr style="text-align: center">
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>Location</th>
                                    <th>Old Price</th>
                                    <th>New Price</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr style="text-align: center">
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>Location</th>
                                    <th>Old Price</th>
                                    <th>New Price</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>                        <tbody>
                                <?php
                                $pro_no = 1;
                                $pro_result = viewProduct();
                                while ($row = mysqli_fetch_array($pro_result)) {
                                    ?>
                                    <tr style="text-align: center">
                                        <td style="font-weight: 600;"><?php echo $pro_no++; ?></td>
                                        <td style="font-weight: 600;" hidden><?php echo $row['product_id']; ?></td>
                                        <td style="font-weight: 600;"><?php echo $row['product_name']; ?></td>
                                        <td style="font-weight: 600;"><?php echo $row['category_name']; ?></td>
                                        <td style="font-weight: 600;"><?php echo $row['product_location']; ?></td>
                                        <td style="font-weight: 600;"><?php echo $row['product_price']; ?></td>
                                        <td style="font-weight: 600;"><?php echo $row['product_price_updated']; ?></td>
                                        <td style="font-weight: 600;"><?php echo '<img src="./uploads/' . $row['product_img'] . '" width="100px;" height="100px;" alt="image">' ?></td>
                                        <td>
                                            <!--Call to action buttons--> 
                                            <ul class="list-inline m-0">
                                                <li class="list-inline-item">
                                                    <button class="btn btn-info btn rounded-0 product_editbtn" name="edit" type="button" type="button" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#productUpdateModal"><i class="fas fa-user-edit"></i></button>
                                                </li>
                                                <li class="list-inline-item">
                                                    <button class="btn btn-danger btn rounded-0 deletebtn" name="delete" type="button" data-toggle="modal" title="Delete" data-target="#productDeleteModal"><i class="fas fa-user-slash"></i></button>
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!---------------- Product Table End --------------------------->

            <!--------------------- Category Update Modal Start ----------------------------->
            <div class="modal fade categoryUpdateModal" id="categoryUpdateModal">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Update Category</h4>
                            <button type="button" class="close text-white" data-dismiss="modal"><i class="fas fa-times"></i></button>
                        </div>
                        <!-- Modal body -->
                        <div class="modal-body">
                            <form action="_add-product.php?status=updateCategory" method="POST" enctype="multipart/form-data" class="pt-4">
                                <div class="row">                          
                                    <div class="col-md-3 pt-2">
                                        <label>Category ID</label>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="category_id" name="update_categoryid" placeholder="ID" value="" style="background: rgba(214, 224, 245,0.3); color: black; cursor: not-allowed;">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 pt-2">
                                        <label>Category Name</label>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="cat_name" name="ucat_name" placeholder="Category Name" value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 pt-2">
                                        <label>Category Image</label>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <input type="file" class="form-control" id="cat_img" name="ucat_img" accept="image/*" style="height: 60px;" placeholder="Category Image" alt="Category Image" src="./uploads/<?php echo $row['category_img']; ?>">
                                        </div> 
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-md-7"></div>
                                        <div>
                                            <div class="form-group" style="margin-left: 130px;">
                                                <div>
                                                    <button type="submit" class="btn btn-fill btn-primary save-btn mr-3" name="save"><i class="far fa-save mr-2"></i>Save</button>
                                                    <button type="reset" class="btn btn-fill btn-primary reset-btn" name="reset"><i class="fas fa-sync-alt mr-2"></i>Reset</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!--------------------- Category Update Modal End --------------------------->
            <!--            ------------------- Category Delete Modal Start ----------------------- 
                         Modal 
                        <div class="modal fade categoryDeleteModal" id="categoryDeleteModal">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                     Modal Header 
                                    <div class="modal-header">
                                        <h4 class="modal-title">Delete Category</h4>
                                        <button type="button" class="close text-white" data-dismiss="modal"><i class="fas fa-times"></i></button>
                                    </div>
                                     Modal body 
                                    <div class="modal-body">
                                        <form action="_add-product.php?status=deleteCategory" method="POST" enctype="multipart/form-data" class="pt-4">
                                            <div class="row">                          
                                                <div class="col-md-9">
                                                    <div class="form-group">
                                                        <h4>Do you wish to Delete?</h4>
                                                    </div>
                                                    <input type="text" class="form-control" id="category_delete_id" hidden name="category_delete_id" placeholder="ID" value="" style="background: rgba(214, 224, 245,0.3); color: white; cursor: not-allowed;">
                                                </div>
                                            </div>
                                            <div class="card-footer">
                                                <div class="row">
                                                    <div class="col-md-7"></div>
                                                    <div>
                                                        <div class="form-group" style="margin-left: 120px;">
                                                            <div>
                                                                <button type="button" class="btn btn-fill btn-primary close-btn mr-3" data-dismiss="modal">Not Now</button>
                                                                <button type="submit" class="btn btn-fill btn-primary save-btn" name="deletedata"><i class="fas fa-user-slash mr-2"></i>Delete</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        ------------------- Category Delete Modal End --------------------------->

            <!--------------------- Product Update Modal Start ----------------------------->
            <div class="modal fade productUpdateModal" id="productUpdateModal">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Update Product</h4>
                            <button type="button" class="close text-white" data-dismiss="modal"><i class="fas fa-times"></i></button>
                        </div>
                        <!-- Modal body -->
                        <div class="modal-body">
                            <form action="_add-product.php?status=updateProduct" method="POST" enctype="multipart/form-data" class="pt-4">
                                <div class="row">                          
                                    <div class="col-md-3 pt-2">
                                        <label>Product ID</label>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="upro_id" name="update_productid" placeholder="ID" value="" style="background: rgba(214, 224, 245,0.3); color: black; cursor: not-allowed;">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 pt-2">
                                        <label>Product Name</label>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="upro_name" name="uproduct_name" placeholder="Product Name" value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 pt-2">
                                        <label>Product Category</label>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <select name="uproductcategory_name" id="uproduct_cat_name" class="custom-select form-control" style="background: rgba(214, 224, 245,0.3); color: black;">
                                                <option selected value="">---</option>
                                                <?php
                                                $cat_name = getCat();
                                                while ($row = $cat_name->fetch_assoc()) {
                                                    ?>                      
                                                    <option value="<?php echo $row['category_id']; ?>">
                                                        <?php echo $row["category_name"]; ?>
                                                    </option> <?php } ?>                       
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 pt-2">
                                        <label>Product Location</label>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="upro_loc" placeholder="Location" value="" name="pro_location_update">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 pt-2">
                                        <label>Product Price</label>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <input type="number" class="form-control" id="upro_price" placeholder="Rs.200" value="" name="pro_price_update">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 pt-2">
                                        <label>Product Image</label>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <input type="file" class="form-control" id="upro_img" name="upro_img" accept="image/*" style="height: 60px;" placeholder="Product Image" alt="Category Image" src="./uploads/<?php echo $row['category_img']; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-md-7"></div>
                                        <div>
                                            <div class="form-group" style="margin-left: 130px;">
                                                <div>
                                                    <button type="submit" class="btn btn-fill btn-primary save-btn mr-3" name="save"><i class="far fa-save mr-2"></i>Save</button>
                                                    <button type="reset" class="btn btn-fill btn-primary reset-btn" name="reset"><i class="fas fa-sync-alt mr-2"></i>Reset</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!--------------------- Product Update Modal End --------------------------->
            <!--------------------- Product Delete Modal Start -------------------------> 
            <!-- Modal -->
            <div class="modal fade productDeleteModal" id="productDeleteModal">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Delete Product</h4>
                            <button type="button" class="close text-white" data-dismiss="modal"><i class="fas fa-times"></i></button>
                        </div>
                        <!-- Modal body -->
                        <div class="modal-body">
                            <form action="_add-product.php?status=deleteProduct" method="POST" enctype="multipart/form-data" class="pt-4">
                                <div class="row">                          
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <h4>Do you wish to Delete?</h4>
                                        </div>
                                        <input type="text" class="form-control" id="pro_delete_id" hidden name="product_delete_id" placeholder="ID" value="" style="background: rgba(214, 224, 245,0.3); color: white; cursor: not-allowed;">
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-md-7"></div>
                                        <div>
                                            <div class="form-group" style="margin-left: 120px;">
                                                <div>
                                                    <button type="button" class="btn btn-fill btn-primary close-btn mr-3" data-dismiss="modal">Not Now</button>
                                                    <button type="submit" class="btn btn-fill btn-primary save-btn" name="deletedata"><i class="fas fa-user-slash mr-2"></i>Delete</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!--------------------- Product Delete Modal End --------------------------->
        </div>
    </div>
</div>
<!----------------------- Main-Content End --------------------------->
</div>
<!--Footer Script Include Link-->
<script>
    const tabBtn = document.querySelectorAll(".tab");
    const tab = document.querySelectorAll(".tabShow");

    function tabs(panelIndex) {
        tab.forEach(function (node) {
            node.style.display = "none";
        });
        tab[panelIndex].style.display = "block";
    }
    tabs(0);
</script>
<?php include("./footer.php"); ?>
<script type="text/javascript" src="js/validation-form.js"></script>