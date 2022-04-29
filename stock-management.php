<!--Header Script Include Link-->
<?php
include("./header.php");

function viewStock() {
    $conn = ControlDB::getconnect();
    $sql = "SELECT st.stock_id, st.stock_reg_date, st.stock_expire_date, st.stock_quantity, st.product_product_id, st.supplier_supplier_id, pro.product_name, supplier.supplier_uname FROM stock AS st JOIN product AS pro ON st.product_product_id = pro.product_id JOIN supplier ON st.supplier_supplier_id = supplier.supplier_id";
//    $sql = "SELECT * FROM stock LEFT JOIN product ON stock.product_product_id = product.product_id";
    $result = $conn->query($sql) or die($conn->error);
    return $result;
}

function getCat() {
    $conn = ControlDB::getconnect();
    $sql = "SELECT * FROM category";
    $result = $conn->query($sql) or die($conn->error);
    return $result;
}

//if (isset($_POST['catid'])) {
//    $conn = ControlDB::getconnect();
//    $sql = "SELECT * FROM product WHERE category_category_id = " . $_POST['catid'];
//    $result = $conn->query($sql) or die($conn->error);
//    echo json_encode($result);
//}

function getProduct() {
    $conn = ControlDB::getconnect();
    $sql = "SELECT * FROM product";
    $result = $conn->query($sql) or die($conn->error);
    return $result;
}

function getSupplier() {
    $conn = ControlDB::getconnect();
    $sql = "SELECT * FROM supplier";
    $result = $conn->query($sql) or die($conn->error);
    return $result;
}
?>
<link rel="stylesheet" type="text/css" href="css/stock.css">
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
                <a href="#" data-toggle="tooltip" title="Products Management" data-placement="left" class="current">
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
                <h1 class="h3 mb-0 text-secondary">Stock Management</h1>
                <a href="report.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                    <i class="fas fa-download fa-sm text-white-50"></i>
                    Generate Report
                </a> 
            </div>
            <!-------------------- Page Heading End ------------------>
            <div class="row">
                <div class="col-md-5">
                    <div class="card-stock">
                        <div class="card-header">
                            <h5 class="title"><i class="far fa-edit"></i>Add Stock</h5>
                        </div>
                        <div class="card-body">
                            <form action="_add-stock.php?status=addStock" enctype="multipart/form-data" class="needs-validation" method="POST" novalidate>
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Stock ID</label>
                                            <input type="text" class="form-control" disabled="" name="stock_id" id="st_id" placeholder="ID" value="" style="background: #e6fff5; color: white; cursor: not-allowed;">
                                            <div class="valid-feedback">Valid</div>
                                            <div class="invalid-feedback">Please Enter your Last Name.</div>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label>Stock Category</label>
                                            <select name="stock_cat" id="st_cat" class="custom-select form-control" required>
                                                <option selected value="">Select the Product</option>
                                                <?php
                                                $stock_category = getCat();
                                                while ($row = $stock_category->fetch_assoc()) {
                                                    ?>
                                                    <option value="<?php echo $row["category_id"]; ?>">
                                                        <?php echo $row["category_name"]; ?>
                                                    </option> <?php } ?>                       
                                            </select>
                                            <div class="valid-feedback">Valid</div>
                                            <div class="invalid-feedback">Please Enter Stock Name.</div>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label>Stock Name</label>
                                            <select name="stock_name" id="st_name" class="custom-select form-control" required>
                                                <option selected value="">Select the Product</option>
                                                <?php
                                                $stock_name = getProduct();
                                                while ($row = $stock_name->fetch_assoc()) {
                                                    ?>
                                                    <option value="<?php echo $row["product_id"]; ?>">
                                                        <?php echo $row["product_name"]; ?>
                                                    </option> <?php } ?>                       
                                            </select>
                                            <div class="valid-feedback">Valid</div>
                                            <div class="invalid-feedback">Please Enter Stock Name.</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Stock Quantity</label>
                                            <input type="number" class="form-control" name="stock_qty" id="st_qty" placeholder="Quantity" value="" required>
                                            <div class="valid-feedback">Valid</div>
                                            <div class="invalid-feedback">Please Enter Stock Quantity.</div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Supplier Name</label>
                                            <select name="supplier_name" id="sup_name" class="custom-select form-control" required>
                                                <option selected value="">Select the Supplier Name</option>
                                                <?php
                                                $supplier_name = getSupplier();
                                                while ($row = $supplier_name->fetch_assoc()) {
                                                    ?>
                                                    <option value="<?php echo $row["supplier_id"]; ?>">
                                                        <?php echo $row["supplier_uname"]; ?>
                                                    </option> <?php } ?>                       
                                            </select>
                                            <div class="valid-feedback">Valid</div>
                                            <div class="invalid-feedback">Please Enter Supplier  Name.</div>
                                        </div>
                                    </div>
                                </div> 
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Registration Date</label>
                                            <input type="date" class="form-control" name="reg_date" id="reg_date" placeholder="Registration Date" value="" required>
                                            <div class="valid-feedback">Valid</div>
                                            <div class="invalid-feedback">Please Enter Registration Date.</div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Expiry Date</label>
                                            <input type="date" class="form-control" name="exp_date" id="exp_date" placeholder="Expiry Date" value="" required>
                                            <div class="valid-feedback">Valid</div>
                                            <div class="invalid-feedback">Please Enter Expiry Date.</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-fill btn-primary submit-btn mr-3 was-validated"><i class="far fa-check-circle"></i> Submit</button>
                                    <button type="reset" class="btn btn-fill btn-primary preview-btn mr-3"><i class="fas fa-recycle"></i></i> Reset</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-7">
                    <!---------------- Table Start ------------------------->
                    <div class="card shadow mb-4"  id="in_user_table">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-info">Stock Report</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Product Name</th>
                                            <th>Supplier Name</th>
                                            <th>Stock Quantity</th>
                                            <th>Registration Date</th>
                                            <th>Expiry Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Product Name</th>
                                            <th>Supplier Name</th>
                                            <th>Stock Quantity</th>
                                            <th>Registration Date</th>
                                            <th>Expiry Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                        $stock_no = 1;
                                        $result = viewStock();
                                        while ($row = mysqli_fetch_array($result)) {
                                            ?>
                                            <tr>
                                                <th><?php echo $stock_no++; ?></th>
                                                <th hidden><?php echo($row['stock_id']); ?></th>
                                                <th><?php echo($row['product_name']); ?></th>
                                                <th><?php echo($row['supplier_uname']); ?></th>
                                                <th><?php echo($row['stock_quantity']); ?></th>
                                                <th><?php echo($row['stock_reg_date']); ?></th>
                                                <th><?php echo($row['stock_expire_date']); ?></th>                                
                                                <th>
                                                    <!--Call to action buttons--> 
                                                    <ul class="list-inline m-0">
                                                        <li class="list-inline-item">
                                                            <button class="btn btn-info btn rounded-0 editbtn" name="edit" type="button" type="button" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#stockUpdateModal"><i class="fas fa-user-edit"></i></button>
                                                        </li>
                                                        <li class="list-inline-item">
                                                            <button class="btn btn-danger btn rounded-0 deletebtn" name="delete" type="button" data-toggle="modal" title="Delete" data-target="#stockDeleteModal"><i class="fas fa-user-slash"></i></button>
                                                        </li>
                                                    </ul>
                                                </th>
                                            </tr>
                                        <?php } ?>
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
</div>
<!--------------------- Update Stock Modal Start ----------------------------->
<div class="modal fade stockUpdateModal" id="stockUpdateModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Update Stock</h4>
                <button type="button" class="close text-white" data-dismiss="modal"><i class="fas fa-times"></i></button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <form action="_add-stock.php?status=updateStock" method="POST" enctype="multipart/form-data" class="pt-4">
                    <div class="row">                          
                        <div class="col-md-3 pt-2">
                            <label>Stock ID</label>
                        </div>
                        <div class="col-md-9">
                            <div class="form-group">
                                <input type="text" class="form-control" id="u_stockid" name="u_stockid" placeholder="ID" value="" style="background: rgba(214, 224, 245,0.3); color: black; cursor: not-allowed;">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 pt-2">
                            <label>Product Name</label>
                        </div>
                        <div class="col-md-9">
                            <div class="form-group">
                                <select disabled name="u_stockname" class="custom-select form-control" id="u_stockname" style="color: #000; background: rgba(255,255,255,0.5);">
                                    <option value="" selected>---select---</option>
                                    <?php
                                    $Updatestock_name = getProduct();
                                    while ($row = $Updatestock_name->fetch_assoc()) {
                                        ?>
                                        <option value="<?php echo $row["product_name"]; ?>">
                                            <?php echo $row["product_name"]; ?></option> <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 pt-2">
                            <label>Supplier Name</label>
                        </div>
                        <div class="col-md-9">
                            <div class="form-group">
                                <select disabled name="u_suppliername" class="custom-select form-control" id="u_suppliername" style="color: #000; background: rgba(255,255,255,0.5);">
                                    <option value="" selected>---select---</option>
                                    <?php
                                    $updatesupplier_name = getSupplier();
                                    while ($row = $updatesupplier_name->fetch_assoc()) {
                                        ?>
                                        <option value="<?php echo $row["supplier_uname"]; ?>">
                                            <?php echo $row["supplier_uname"]; ?></option> <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 pt-2">
                            <label>Stock Quantity</label>
                        </div>
                        <div class="col-md-9">
                            <div class="form-group">
                                <input type="number" class="form-control pl-1 pt-3" name="stock_qty" id="stock_qty" placeholder="Kg" value="Kg" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 pt-2">
                            <label>Registration Date</label>
                        </div>
                        <div class="col-md-9">
                            <div class="form-group">
                                <input type="date" class="form-control" name="u_regdate" id="u_regdate" placeholder="Registration Date" value="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 pt-2">
                            <label>Expiry Date</label>
                        </div>
                        <div class="col-md-9">
                            <div class="form-group">
                                <input type="date" class="form-control" name="u_expdate" id="u_expdate" placeholder="Expiry Date" value="">
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
<!--------------------- Stock Update Modal End --------------------------->

<!--------------------- Stock Delete Modal Start -------------------------> 
<!-- Modal -->
<div class="modal fade stockDeleteModal" id="stockDeleteModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Delete Stock</h4>
                <button type="button" class="close text-white" data-dismiss="modal"><i class="fas fa-times"></i></button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <form action="_add-stock.php?status=deleteStock" method="POST" enctype="multipart/form-data" class="pt-4">
                    <div class="row">                          
                        <div class="col-md-9">
                            <div class="form-group">
                                <h4>Do you wish to Delete?</h4>
                            </div>
                            <input type="text" class="form-control" id="st_deleteid" hidden name="stock_delete_id" placeholder="ID" value="" style="background: rgba(214, 224, 245,0.3); color: white; cursor: not-allowed;">
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
<!--------------------- Stock Delete Modal End --------------------------->
<!----------------------- Main-Content End --------------------------->
</div>
<!--Footer Script Include Link-->
<?php include("./footer.php"); ?>
<script type="text/javascript" src="js/validation-form.js"></script>