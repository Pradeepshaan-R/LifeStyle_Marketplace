<!--Header Script Include Link-->
<?php
include "./header.php";

function getrole()
{
    $conn = ControlDB::getconnect();
    $sql = "SELECT * FROM role";
    $result = $conn->query($sql) or die($conn->error);
    return $result;
}

function viewUser()
{
    $conn = ControlDB::getconnect();
    $sql = "SELECT * FROM user";
    $result = $conn->query($sql) or die($conn->error);
    return $result;
}

function userViewModal()
{
    $conn = ControlDB::getconnect();
    $view_id = $_GET['view'];
    $sql = "SELECT * FROM user WHERE user_id = 'user_id'";
    $result = $conn->query($sql) or die($conn->error);
    return $result;
}
?>
<link rel="stylesheet" type="text/css" href="css/users-in.css">

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
                <a href="#" data-toggle="tooltip" title="User Management" data-placement="left" class="current">
                    <i class="fas fa-house-user"></i><span>User Management</span>
                </a>
            </li>
            <li class="item">
                <a href="ex_users.php" data-toggle="tooltip" title="Customer Management" data-placement="left"
                    class="menu-btn">
                    <i class="fas fa-users"></i><span>Customer Management</span>
                </a>
            </li>
            <li class="item">
                <a href="supplier-management.php" data-toggle="tooltip" title="Customer Management"
                    data-placement="left" class="menu-btn">
                    <i class="fas fa-hands-helping"></i><span>Supplier Management</span>
                </a>
            </li>
            <li class="item">
                <a href="product.php" data-toggle="tooltip" title="Products Management" data-placement="left"
                    class="menu-btn">
                    <i class="fas fa-seedling"></i><span>Products Management</span>
                </a>
            </li>
            <li class="item">
                <a href="stock-management.php" data-toggle="tooltip" title="Products Management" data-placement="left"
                    class="menu-btn">
                    <i class="fas fa-database"></i><span>Stock Management</span>
                </a>
            </li>
            <li class="item">
                <a href="ads-mgmt.php" data-toggle="tooltip" title="Ads Management" data-placement="left"
                    class="menu-btn">
                    <i class="fas fa-ad fa-lg"></i></i><span style="font-size: 17px;">Ads Management</span>
                </a>
            </li>
            <li class="item">
                <a href="sales.php" data-toggle="tooltip" title="Sales" data-placement="left" class="menu-btn">
                    <i class="fas fa-shopping-cart"></i><span>Sales</span>
                </a>
            </li>
            <!--
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
                <h1 class="h3 mb-0 text-secondary">User Management</h1>
                <a href="report.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                    <i class="fas fa-download fa-sm text-white-50"></i>
                    Generate Report
                </a>
            </div>
            <!-------------------- Page Heading End ------------------>
            <div class="row">
                <div class="col-xl-4 col-md-3 col-sm-1 mb-4"></div>
                <!-- View User  -->
                <a class="col-xl-2 col-md-3 mb-4 col-sm-5 tab" onclick="tabs(0)" href="#"
                    style="text-decoration: none;">
                    <!--<div class="col-xl-2 col-md-3 mb-4">-->
                    <div class="card shadow h-100 py-2 view_user">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col" style="text-align: center;">
                                    <div class="text-xs font-weight-bold text-uppercase mb-2">View Users</div>
                                    <i class="fas fa-user-tie" style="font-size: 38px;"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
                <!-- Add User  -->
                <a class="col-xl-2 col-md-3 mb-4 col-sm-5 tab" onclick="tabs(1)" href="#"
                    style="text-decoration: none;">
                    <!--<div class="col-xl-2 col-md-3 mb-4">-->
                    <div class="card shadow h-100 py-2 add_user">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col" style="text-align: center;">
                                    <div class="text-xs font-weight-bold text-uppercase mb-2">Add Users</div>
                                    <i class="fas fa-user-plus" style="font-size: 35px;"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
                <div class="col-xl-4 col-md-3 col-sm-1 mb-4"></div>
            </div>

            <!---------------- Table Start ------------------------->
            <div class="card shadow mb-4 tabShow">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-info">Internal Users</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr class="text-center">
                                    <th>ID</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot class="text-center">
                                <tr>
                                    <th>ID</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody class="text-center">
                                <?php
$user_no = 1;
$result = viewUser();
while ($row = mysqli_fetch_array($result)) {
    ?>
                                <tr>
                                    <th><?php echo $user_no++; ?></th>
                                    <th hidden><?php echo $row['user_id']; ?></th>
                                    <th><?php echo $row['user_fname']; ?></th>
                                    <th><?php echo $row['user_lname']; ?></th>
                                    <th><?php echo $row['user_email']; ?></th>
                                    <th hidden><?php echo $row['role_role_id']; ?></th>
                                    <th><?php echo $row['user_status']; ?></th>
                                    <th>
                                        <!--Call to action buttons-->
                                        <ul class="list-inline m-0">
                                            <li class="list-inline-item">
                                                <button class="btn btn-success rounded-0 viewbtn" name="view"
                                                    type="button" data-toggle="modal" data-target="#userViewModal"
                                                    title="View"><i class="fas fa-id-card"></i></button>
                                            </li>
                                            <li class="list-inline-item">
                                                <button class="btn btn-info btn rounded-0 editbtn" name="edit"
                                                    type="button" type="button" data-toggle="modal"
                                                    data-backdrop="static" data-keyboard="false"
                                                    data-target="#userUpdateModal"><i
                                                        class="fas fa-user-edit"></i></button>
                                            </li>
                                            <li class="list-inline-item">
                                                <button class="btn btn-danger btn rounded-0 deletebtn" name="delete"
                                                    type="button" data-toggle="modal" title="Delete"
                                                    data-target="#userDeleteModal"><i
                                                        class="fas fa-user-slash"></i></button>
                                            </li>
                                        </ul>
                                    </th>
                                </tr>
                                <?php }?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!---------------- Table End ------------------------->

            <!-------------- Add User Start ----------------------------->
            <div class="tabShow">
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6 p-0 shadow">
                        <div class="card reg-user">
                            <div class="card-header">
                                <h5 class="title">User Registration</h5>
                            </div>
                            <div class="card-body">
                                <form action="_add-user.php?status=addUser" class="needs-validation" method="POST"
                                    enctype="multipart/form-data" novalidate>
                                    <div class="row" style="width: 380px;">
                                        <?php if (isset($_REQUEST['success'])) {?>
                                        <label
                                            class="alert alert-success"><?php echo base64_decode($_REQUEST['success']); ?></label>
                                        <?php }?>
                                    </div>
                                    <div class="row" style="width: 380px;">
                                        <?php if (isset($_REQUEST['error'])) {?>
                                        <label
                                            class="alert alert-danger"><?php echo base64_decode($_REQUEST['error']); ?></label>
                                        <?php }?>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3 pt-2">
                                            <label>Employee ID</label>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="user_id" disabled=""
                                                    placeholder="ID" value=""
                                                    style="background: rgba(214, 224, 245,0.3); color: white; cursor: not-allowed;">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3 pt-2">
                                            <label>First Name</label>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="fname"
                                                    placeholder="First Name" value="" required="User Name">
                                                <div class="valid-feedback">Valid</div>
                                                <div class="invalid-feedback">Please Enter your First Name.</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3 pt-2">
                                            <label>Last Name</label>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="lname"
                                                    placeholder="Last Name" value="" required>
                                                <div class="valid-feedback">Valid</div>
                                                <div class="invalid-feedback">Please Enter your Last Name.</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3 pt-2">
                                            <label>Email Address</label>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <input type="email" class="form-control" name="u_email"
                                                    placeholder="Email" required>
                                                <div class="valid-feedback">Valid</div>
                                                <div class="invalid-feedback">Please Enter your Email.</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3 pt-2">
                                            <label>User Role</label>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <select name="u_role" class="custom-select form-control" required>
                                                    <option selected value="">---</option>
                                                    <?php
$urole = getrole();
while ($row = $urole->fetch_assoc()) {
    ?>
                                                    <option value="<?php echo $row["role_id"]; ?>">
                                                        <?php echo $row["role_name"]; ?>
                                                    </option> <?php }?>
                                                </select>
                                                <div class="valid-feedback">Valid</div>
                                                <div class="invalid-feedback">Please select a Role.</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3 pt-2">
                                            <label>New Password</label>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <input type="password" class="form-control" name="u_ps"
                                                    autocomplete="off" value="" required placeholder="*************">
                                                <div class="valid-feedback">Valid</div>
                                                <div class="invalid-feedback">Please Enter Valid Password.</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3 pt-2 pr-0">
                                            <label>Confirm Password</label>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <input type="password" class="form-control" name="u_cps"
                                                    autocomplete="off" value="" required placeholder="*************">
                                                <div class="valid-feedback">Valid</div>
                                                <div class="invalid-feedback">Please Enter Valid Password.</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <div class="row">
                                            <div class="col-md-7"></div>
                                            <div>
                                                <div class="form-group was-validated">
                                                    <script>
                                                    function validateForm() {
                                                        var x = document.forms["myForm"]["fname"].value;
                                                        if (x == "") {
                                                            alert("Name must be filled out");
                                                            return false;
                                                        }
                                                    }
                                                    </script>
                                                    <div>
                                                        <button type="submit" onsubmit="return validateForm()"
                                                            class="btn btn-fill btn-primary save-btn mr-3 was-validated"
                                                            name="save"><i class="far fa-save mr-2"></i>Save</button>
                                                        <button type="reset" class="btn btn-fill btn-primary reset-btn"
                                                            name="reset"><i
                                                                class="fas fa-sync-alt mr-2"></i>Reset</button>
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
            </div>
            <!----------------------- Add User End ---------------------->

            <!--------------------- User View Modal Start --------------------->
            <div class="modal fade userDetailsModal" id="userViewModal">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <!--Modal Header-->
                        <div class="modal-header">
                            <h4 class="modal-title">View User :</h4>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="v_user_id" name="u_id" placeholder="ID"
                                        value="" style="background: transparent; color: white; cursor: not-allowed;">
                                </div>
                            </div>
                            <button type="button" class="close text-white" data-dismiss="modal"><i
                                    class="fas fa-times"></i></button>
                        </div>
                        <!--Modal body-->
                        <div class="modal-body">
                            <form action="_add-user.php?status=ViewUser" method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" disabled class="form-control" id="v_fname" name="fname"
                                                placeholder="First Name" value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" disabled class="form-control" id="v_lname" name="lname"
                                                placeholder="Last Name" value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="email" disabled class="form-control" id="v_uemail"
                                                name="u_email" placeholder="Email">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 pt-2"></div>
                                    <div class="col-md-8">
                                        <div class="form-group view-select">
                                            <select name="u_role" disabled class="custom-select form-control ml-2"
                                                id="v_urole" disabled>
                                                <?php
$v_urole = getrole();
while ($row = $v_urole->fetch_assoc()) {
    ?>
                                                <option value="<?php echo $row["role_id"]; ?>">
                                                    <?php echo $row["role_name"]; ?>
                                                </option> <?php }?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!--------------------- User View Modal End ----------------------->

            <!--------------------- Update User Modal Start ----------------------------->
            <div class="modal fade userUpdateModal" id="userUpdateModal">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Update User</h4>
                            <button type="button" class="close" data-dismiss="modal"><i
                                    class="fas fa-times"></i></button>
                        </div>
                        <!-- Modal body -->
                        <div class="modal-body">
                            <form action="_add-user.php?status=updateUser" method="POST" enctype="multipart/form-data"
                                class="pt-4">
                                <div class="row">
                                    <div class="col-md-3 pt-2">
                                        <label>User ID</label>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="user_id" name="u_id"
                                                placeholder="ID" value=""
                                                style="background: rgba(214, 224, 245,0.3); color: black; cursor: not-allowed;">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 pt-2">
                                        <label>First Name</label>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="fname" name="uf_name"
                                                placeholder="First Name" value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 pt-2">
                                        <label>Last Name</label>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="lname" name="ul_name"
                                                placeholder="Last Name" value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 pt-2">
                                        <label>Email Address</label>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <input type="email" class="form-control" id="uemail" name="u_email"
                                                placeholder="Email">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 pt-2">
                                        <label>User Role</label>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <select name="u_role" class="custom-select form-control" id="urole"
                                                style="color: #000; background: rgba(255,255,255,0.5);">
                                                <option value="" selected>---select---</option>
                                                <?php
$role = getrole();
while ($row = $role->fetch_assoc()) {
    ?>
                                                <option value="<?php echo $row["role_id"]; ?>">
                                                    <?php echo $row["role_name"]; ?></option> <?php
}
?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-md-7"></div>
                                        <div>
                                            <div class="form-group" style="margin-left: 130px;">
                                                <div>
                                                    <button type="submit" class="btn btn-fill btn-primary save-btn mr-3"
                                                        name="save"><i class="far fa-save mr-2"></i>Save</button>
                                                    <button type="reset" class="btn btn-fill btn-primary reset-btn"
                                                        name="reset"><i class="fas fa-sync-alt mr-2"></i>Reset</button>
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
            <!--------------------- User Update Modal End --------------------------->

            <!--------------------- User Delete Modal Start ------------------------->
            <!-- Modal -->
            <div class="modal fade userDeleteModal" id="userDeleteModal">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Delete User</h4>
                            <button type="button" class="close text-white" data-dismiss="modal"><i
                                    class="fas fa-times"></i></button>
                        </div>
                        <!-- Modal body -->
                        <div class="modal-body">
                            <form action="_add-user.php?status=deleteUser" method="POST" enctype="multipart/form-data"
                                class="pt-4">
                                <div class="row">
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <h4>Do you wish to Delete?</h4>
                                        </div>
                                        <input type="text" class="form-control" id="delete_id" hidden name="delete_id"
                                            placeholder="ID" value=""
                                            style="background: rgba(214, 224, 245,0.3); color: white; cursor: not-allowed;">
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-md-7"></div>
                                        <div>
                                            <div class="form-group" style="margin-left: 120px;">
                                                <div>
                                                    <button type="button"
                                                        class="btn btn-fill btn-primary close-btn mr-3"
                                                        data-dismiss="modal">Not Now</button>
                                                    <button type="submit" class="btn btn-fill btn-primary save-btn"
                                                        name="deletedata"><i
                                                            class="fas fa-user-slash mr-2"></i>Delete</button>
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
            <!--------------------- User Delete Modal End --------------------------->
        </div>
        <!-- /.container-fluid -->
    </div>
</div>
<!----------------------- Main-Content End --------------------------->
</div>
<!--Footer Script Include Link-->

<script>
const tabBtn = document.querySelectorAll(".tab");
const tab = document.querySelectorAll(".tabShow");

function tabs(panelIndex) {
    tab.forEach(function(node) {
        node.style.display = "none";
    });
    tab[panelIndex].style.display = "block";
}
tabs(0);
</script>
<?php include "./footer.php";?>
<script type="text/javascript" src="js/validation-form.js"></script>