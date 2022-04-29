<!--Header Script Include Link-->
<?php
include("./header.php");

function viewSupplier() {
    $conn = ControlDB::getconnect();
    $sql = "SELECT * FROM supplier";
    $result = $conn->query($sql) or die($conn->error);
    return $result;
}
?>
<link rel="stylesheet" type="text/css" href="css/users-ex.css">

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
                <a href="#" data-toggle="tooltip" title="Customer Management" data-placement="left" class="current">
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
                    <i class="fas fa-ad fa-lg"></i></i><span>Ads Management</span>
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
                <h1 class="h3 mb-0 text-secondary">Supplier Management</h1>
                <a href="report.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                    <i class="fas fa-download fa-sm text-white-50"></i>
                    Generate Report
                </a> 
            </div>
            <!-------------------- Page Heading End ------------------>


            <!---------------- Table Start ------------------------->
            <div class="card shadow mb-4"  id="in_user_table">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-info">Registered Suppliers</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr style="text-align: center">
                                    <th>Supplier ID</th>
                                    <th>Supplier Name</th>
                                    <th>Company</th>
                                    <th>Email</th>
                                    <th>Contact No 01</th>
                                    <th>Contact No 02</th>
                                    <th>Address</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr style="text-align: center">
                                    <th>Supplier ID</th>
                                    <th>Supplier Name</th>
                                    <th>Company</th>
                                    <th>Email</th>
                                    <th>Contact No 01</th>
                                    <th>Contact No 02</th>
                                    <th>Address</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php
                                $supplier_no = 1;
                                $result = viewSupplier();
                                while ($row = mysqli_fetch_array($result)) {
                                    ?>
                                    <tr>
                                        <th><?php echo $supplier_no++; ?></th>
                                        <th hidden><?php echo $row['supplier_id']; ?></th>
                                        <th><?php echo $row['supplier_uname']; ?></th>
                                        <th><?php echo $row['supplier_company']; ?></th>
                                        <th><?php echo $row['supplier_email']; ?></th>
                                        <th><?php echo $row['supplier_cno1']; ?></th>
                                        <th><?php echo $row['supplier_cno2']; ?></th>
                                        <th><?php echo $row['supplier_address']; ?></th>
                                        <th>
                                            <!--Call to action buttons--> 
                                            <ul class="list-inline m-0">
                                                <li class="list-inline-item">
                                                    <button class="btn btn-info btn rounded-0 editbtn" name="edit" type="button" type="button" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#supplierUpdateModal"><i class="fas fa-user-edit"></i></button>
                                                </li>
                                                <li class="list-inline-item">
                                                    <button class="btn btn-danger btn rounded-0 deletebtn" name="delete" type="button" data-toggle="modal" title="Delete" data-target="#supplierDeleteModal"><i class="fas fa-user-slash"></i></button>
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
        <!-- /.container-fluid -->
    </div>
</div>
<!--------------------- Update Supplier Modal Start ----------------------------->
<div class="modal fade supplierUpdateModal" id="supplierUpdateModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Update Supplier</h4>
                <button type="button" class="close text-white" data-dismiss="modal"><i class="fas fa-times"></i></button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <form action="_add-supplier.php?status=updateSupplier" method="POST" enctype="multipart/form-data" class="pt-4">
                    <div class="row">                          
                        <div class="col-md-3 pt-2">
                            <label>Supplier ID</label>
                        </div>
                        <div class="col-md-9">
                            <div class="form-group">
                                <input type="text" class="form-control" id="supplier_id" name="update_supplierid" placeholder="ID" value="" style="background: rgba(214, 224, 245,0.3); color: black; cursor: not-allowed;">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 pt-2">
                            <label>Supplier Name</label>
                        </div>
                        <div class="col-md-9">
                            <div class="form-group">
                                <input type="text" class="form-control" id="sfname" name="usf_name" placeholder="First Name" value="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 pt-2">
                            <label>Company Name</label>
                        </div>
                        <div class="col-md-9">
                            <div class="form-group">
                                <input type="text" class="form-control" id="slname" name="uscompany_name" placeholder="Last Name" value="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 pt-2">
                            <label>Email Address</label>
                        </div>
                        <div class="col-md-9">
                            <div class="form-group">
                                <input type="email" class="form-control" id="semail" name="us_email" placeholder="Email">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 pt-2">
                            <label>Contact No. 01</label>
                        </div>
                        <div class="col-md-9">
                            <div class="form-group">
                                <input type="tel" class="form-control" id="sno1" name="us_cno1" placeholder="" value="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 pt-2">
                            <label>Contact No. 02</label>
                        </div>
                        <div class="col-md-9">
                            <div class="form-group">
                                <input type="tel" class="form-control" id="sno2" name="us_cno2" placeholder="" value="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 pt-2">
                            <label>Address</label>
                        </div>
                        <div class="col-md-9">
                            <div class="form-group">
                                <input type="text" class="form-control" id="sadd" name="us_address" placeholder="Home Address" value="" required>
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
<!--------------------- User Supplier Modal End --------------------------->
<!--------------------- Supplier Delete Modal Start -------------------------> 
<!-- Modal -->
<div class="modal fade supplierDeleteModal" id="supplierDeleteModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Delete Supplier</h4>
                <button type="button" class="close text-white" data-dismiss="modal"><i class="fas fa-times"></i></button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <form action="_add-supplier.php?status=deleteSupplier" method="POST" enctype="multipart/form-data" class="pt-4">
                    <div class="row">                          
                        <div class="col-md-9">
                            <div class="form-group">
                                <h4>Do you wish to Delete?</h4>
                            </div>
                            <input type="text" class="form-control" id="s_delete_id" hidden name="supplier_delete_id" placeholder="ID" value="" style="background: rgba(214, 224, 245,0.3); color: white; cursor: not-allowed;">
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
<!--------------------- Supplier Delete Modal End --------------------------->
<!----------------------- Main-Content End ------------------------------>
</div>
<!--Footer Script Include Link-->
<?php include("./footer.php"); ?>
<script type="text/javascript" src="js/validation-form.js"></script>
