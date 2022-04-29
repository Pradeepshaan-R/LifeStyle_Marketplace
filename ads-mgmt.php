<!--Header Script Include Link-->
<?php
include("./header.php");

function viewAdvertisement() {
    $conn = ControlDB::getconnect();
    $sql = "SELECT * FROM advertisement";
    $result = $conn->query($sql) or die($conn->error);
    return $result;
}

if (isset($_POST['view'])) {
    $id = $_POST['view-id'];
    $sql = "SELECT * FROM advertisement WHERE ad_id='$id'";
    $result = $conn->query($sql) or die($conn->error);
    return $result;
}
?>
<link rel="stylesheet" type="text/css" href="css/ads-mgmt.css">

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
                <a href="#" data-toggle="tooltip" title="Ads Management" data-placement="left" class="current">
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
                <h1 class="h3 mb-0 text-secondary">Advertisement Management</h1>
                <a href="report.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                    <i class="fas fa-download fa-sm text-white-50"></i>
                    Generate Report
                </a> 
            </div>
            <!-------------------- Page Heading End ------------------>
            <div class="row">
                <div class="col-md-8">
                    <!---------------- Table Start ------------------------->
                    <div class="card shadow mb-4"  id="in_user_table">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-info">Advertisements Alloted</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr style="text-align: center">
                                            <th>ID</th>
                                            <th>Company Name</th>
                                            <th>Reference Email</th>
                                            <th>Start Date</th>
                                            <th>End Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr style="text-align: center">
                                            <th>ID</th>
                                            <th>Company Name</th>
                                            <th>Reference Email</th>
                                            <th>Start Date</th>
                                            <th>End Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody style="text-align: center">
                                        <?php
                                        $result = viewAdvertisement();
                                        while ($row = mysqli_fetch_array($result)) {
                                            ?>
                                            <tr>
                                                <th><?php echo $row['ad_id']; ?></th>
                                                <th><?php echo $row['ad_companyname']; ?></th>
                                                <th><?php echo $row['ad_email']; ?></th>
                                                <th><?php echo $row['ad_stdate']; ?></th>
                                                <th><?php echo $row['ad_eddate']; ?></th>
                                                <th>
                                                    <!--Call to action buttons--> 
                                                    <ul class="list-inline m-0">
                                                        <form action="_add-advertisement.php" method="POST">
                                                            <li class="list-inline-item">
                                                                <input type="hidden" name="view-id" value="<?php echo $row['ad_id']; ?>">
                                                                <button class="btn btn-success rounded-0 ad-viewbtn" name="view" type="button" data-toggle="modal" data-target="#adViewModal" title="View"><i class="fas fa-id-card"></i></button>
                                                            </li>
                                                            <li class="list-inline-item"> 
                                                                <button class="btn btn-info btn rounded-0 ad-editbtn" name="edit" type="button" type="button" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#adUpdateModal"><i class="fas fa-user-edit"></i></button>
                                                            </li>
                                                            <li class="list-inline-item">
                                                                <button class="btn btn-danger btn rounded-0 ad-deletebtn" name="delete" type="button" data-toggle="modal" title="Delete" data-target="#adDeleteModal"><i class="fas fa-user-slash"></i></button>
                                                            </li>
                                                        </form>
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
                <div class="col-md-4">
                    <div class="card-ads">
                        <div class="card-header">
                            <h5 class="title"><i class="far fa-edit"></i>Advertisement</h5>
                        </div>
                        <div class="card-body">
                            <form action="_add-advertisement.php?status=addAdvertisement" method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Advertisement ID</label>
                                            <input type="text" class="form-control" id="ad_id" name="ad_id" disabled="" placeholder="ID" value="" style="background: #e6fff5; color: white; cursor: not-allowed;">
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label>Company Name</label>
                                            <input type="text" class="form-control" id="ad_comp_name" name="ad_comp_name" placeholder="ABC Company" value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Start Date</label>
                                            <input type="date" class="form-control" id="ad_stdate" name="ad_stdate" placeholder="Start Date" value="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>End Date</label>
                                            <input type="date" class="form-control" id="ad_enddate" name="ad_enddate" placeholder="End Date" value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Insert Advertisement</label>
                                            <input type="file" class="form-control" id="ad_img" name="ad_img" accept="image/*" style="height: 60px;" placeholder="Ad Image" alt="Advertisement Image" src="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Reference Email</label>
                                            <input type="text" class="form-control" id="ad_email" name="ad_email" placeholder="abs@example.com" value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-fill btn-primary submit-btn mr-3"><i class="far fa-check-circle"></i> Submit</button>
                                    <button type="submit" class="btn btn-fill btn-primary preview-btn mr-3"><i class="far fa-eye"></i> Preview</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </div>
    <!--------------------- User View Modal Start --------------------->
    <div class="modal fade adDetailsModal" id="adViewModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <!--Modal Header--> 
                <div class="modal-header">
                    <h4 class="modal-title">Advertistment</h4>                         
                    <button type="button" class="close text-white" data-dismiss="modal"><i class="fas fa-times"></i></button>
                </div>
                <!--Modal body--> 
                <div class="modal-body">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="view-id" value="<?php echo $row['ad_id']; ?>">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" disabled class="form-control" id="adv_id" name="adv_id" placeholder="First Name" value="<?php echo $row['ad_id']; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" disabled class="form-control" id="adv_name" name="adv_name" placeholder="Last Name" value="<?php echo $row['ad_companyname']; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="email" disabled class="form-control" id="adv_email" name="adv_email" placeholder="Email" value="<?php echo $row['ad_email']; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="date" class="form-control" name="adv_startdate" id="adv_startdate" placeholder="Expiry Date" value="<?php echo $row['ad_stdate']; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="date" class="form-control" name="adv_enddate" id="adv_enddate" placeholder="Expiry Date" value="<?php echo $row['ad_eddate']; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div><?php echo '<img src="./uploads/' . $row['ad_image'] . '" width="100px;" height="100px;" alt="image">'; ?></div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--------------------- User View Modal End ----------------------->
    <!--------------------- Product Update Modal Start ----------------------------->
    <div class="modal fade adUpdateModal" id="adUpdateModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Update Advertisement</h4>
                    <button type="button" class="close text-white" data-dismiss="modal"><i class="fas fa-times"></i></button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <form action="_add-advertisement.php?status=updateAdvertisement" method="POST" enctype="multipart/form-data" class="pt-4">
                        <div class="row">                          
                            <div class="col-md-3 pt-2">
                                <label>Advertisement ID</label>
                            </div>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="ad_uid" name="update_ad_id" placeholder="ID" value="" style="background: rgba(214, 224, 245,0.3); color: black; cursor: not-allowed;">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 pt-2">
                                <label>Company Name</label>
                            </div>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="uad_name" name="uad_name" placeholder="Product Name" value="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 pt-2">
                                <label>Email Address</label>
                            </div>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <input type="email" class="form-control" id="uad_email" name="uad_email" placeholder="Email">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 pt-2">
                                <label>Start Date</label>
                            </div>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <input type="date" class="form-control" name="uad_regdate" id="uad_regdate" placeholder="Registration Date" value="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 pt-2">
                                <label>End Date</label>
                            </div>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <input type="date" class="form-control" name="uad_expdate" id="uad_expdate" placeholder="Expiry Date" value="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 pt-2">
                                <label>Advertisement Image</label>
                            </div>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <input type="file" class="form-control" id="uad_img" name="uad_img" accept="image/*" style="height: 60px;" placeholder="Product Image" alt="Category Image" src="./uploads/<?php echo $row['category_img']; ?>">
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
    <div class="modal fade adDeleteModal" id="adDeleteModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Delete Advertisement</h4>
                    <button type="button" class="close text-white" data-dismiss="modal"><i class="fas fa-times"></i></button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <form action="_add-advertisement.php?status=deleteAdvertisement" method="POST" enctype="multipart/form-data" class="pt-4">
                        <div class="row">                          
                            <div class="col-md-9">
                                <div class="form-group">
                                    <h4>Do you wish to Delete?</h4>
                                </div>
                                <input type="text" class="form-control" id="ad_delete_id" hidden name="ad_delete_id" placeholder="ID" value="" style="background: rgba(214, 224, 245,0.3); color: white; cursor: not-allowed;">
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
<!----------------------- Main-Content End --------------------------->
</div>
<!--Footer Script Include Link-->
<?php include("./footer.php"); ?>
<script type="text/javascript" src="js/validation-form.js"></script>