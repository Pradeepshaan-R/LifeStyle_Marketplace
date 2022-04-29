<!--Header Script Include Link-->
<?php
include("./header.php");

function profileUser() {
    $conn = ControlDB::getconnect();
    $current_user = $_SESSION['user']['user_id'];
    $sql = "SELECT * FROM user JOIN role ON user.role_role_id=role.role_id WHERE user_id = '$current_user'";
    $result = $conn->query($sql) or die($conn->error);
    return $result;
}
?>
<link rel="stylesheet" type="text/css" href="css/profile.css">

<div class="wrapper">
    <!----------------------- SideBar Start --------------------------->
    <div class="sidebar">
        <div class="sidebar-menu">
            <li class="item">
                <a href="index.php" data-toggle="tooltip" title="Dashboard" data-placement="left" class="profile-menu-btn">
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
        <div class="container-fluid">
            <!-- Begin Row Content -->
            <!-------------------- Page Heading Start ------------------>
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-secondary">Profile</h1>
            </div>
            <!-------------------- Page Heading End ------------------>

            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="title">Edit Profile</h5>
                        </div>
                        <div class="card-body">
                            <?php
                            $result = profileUser();
                            while ($row = mysqli_fetch_array($result)) {
                                ?>
                                <form action="_profileUser.php" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Employee ID</label>
                                                <input type="text" class="form-control" name="profile_id" disabled placeholder="ID" value="<?php echo $row['user_id'] ?>" style="background: #e6fff5; color: black; cursor: not-allowed;">
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label>Username</label>
                                                <input type="text" class="form-control" name="pname" placeholder="User Name" value="<?php echo $row['user_name'] ?>" required>
                                                <div class="valid-feedback">Valid</div>
                                                <div class="invalid-feedback">Please Enter your User-Name.</div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Email address</label>
                                                <input type="email" class="form-control" name="profile_email" value="<?php echo $row['user_email'] ?>" placeholder="Email" required>
                                                <div class="valid-feedback">Valid</div>
                                                <div class="invalid-feedback">Please Enter your Email.</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 pr-md-1">
                                            <div class="form-group">
                                                <label>First Name</label>
                                                <input type="text" class="form-control" name="profile_fname" placeholder="First Name" value="<?php echo $row['user_fname'] ?>" required>
                                                <div class="valid-feedback">Valid</div>
                                                <div class="invalid-feedback">Please Enter your First-Name.</div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 pl-md-1">
                                            <div class="form-group">
                                                <label>Last Name</label>
                                                <input type="text" class="form-control" name="profile_lname" placeholder="Last Name" value="<?php echo $row['user_lname'] ?>" required>
                                                <div class="valid-feedback">Valid</div>
                                                <div class="invalid-feedback">Please Enter your Last-Name.</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-5 pr-md-1">
                                            <div class="form-group">
                                                <label>NIC</label>
                                                <input type="text" class="form-control" name="profile_nic" placeholder="NIC" value="<?php echo $row['user_nic'] ?>" required>
                                                <div class="valid-feedback">Valid</div>
                                                <div class="invalid-feedback">Please Enter your NIC.</div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 pr-md-1">
                                            <div class="form-group">
                                                <label>Age</label>
                                                <input type="date" class="form-control" name="profile_dob" placeholder="Age" value="<?php echo $row['user_dob'] ?>" required>
                                                <div class="valid-feedback">Valid</div>
                                                <div class="invalid-feedback">Please Enter your Age.</div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 pl-md-1">
                                            <div class="form-group">
                                                <label>Gender</label>
                                                <div class="form-control" style="border: 0;">
                                                    <input type="radio" class="radio-input" name="gender" value="male" required>
                                                    <lable class="control-label"> Male</lable>
                                                    &nbsp;&nbsp;
                                                    <input type="radio" class="radio-input" name="gender" value="female" required>
                                                    <lable class="control-label"> Female</lable>
                                                    &nbsp;&nbsp;
                                                    <input type="radio" class="radio-input" name="gender" value="other" required>
                                                    <lable class="control-label"> Other</lable>
                                                    <div class="valid-feedback">Valid</div>
                                                    <div class="invalid-feedback">Please Enter your Gender.</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Address</label>
                                                <input type="text" class="form-control" name="profile_address" placeholder="Home Address" value="<?php echo $row['user_address'] ?>" required>
                                                <div class="valid-feedback">Valid</div>
                                                <div class="invalid-feedback">Please Enter your Address.</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Contact No. 01</label>
                                                <input type="number" class="form-control" name="profile_no1" placeholder="City" value="<?php echo $row['user_cno1'] ?>" required>
                                                <div class="valid-feedback">Valid</div>
                                                <div class="invalid-feedback">Please Enter your User-Name.</div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Contact No. 02</label>
                                                <input type="number" class="form-control" name="profile_no2" placeholder="Country" value="<?php echo $row['user_cno2'] ?>" required>
                                                <div class="valid-feedback">Valid</div>
                                                <div class="invalid-feedback">Please Enter your User-Name.</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label>About Me</label>
                                                <textarea rows="4" cols="80" class="form-control" placeholder="" value="<?php echo $_SESSION['user']['user_address'] ?>">Lamborghini Mercy, Your chick she so thirsty, I'm in that two seat Lambo.</textarea>
                                            </div> 
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label></label>
                                                <div>
                                                    <button type="submit" class="btn btn-fill btn-primary save-btn mr-3 was-validated"><i class="far fa-save mr-2"></i>Save</button>
                                                    <button type="reset" class="btn btn-fill btn-primary reset-btn"><i class="fas fa-sync-alt mr-2"></i>Reset</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-user">
                            <div class="card-header">
                                <p class="card-text">
                                <div class="author">
                                    <img class="avatar" id="photo" src="<?php echo './uploads/' . $row['user_img'] . '" width="100px;" height="100px;" alt="image"' ?>">
                                         <input type="button" id="profile_img" name="profile_img" class="profile_img_input" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#profileUpdateModal">
                                         <label for="profile_img" id="uploadBtn" class="uploadBtn"><i class="fas fa-camera"></i></label>
                                </div>
                                <h5 class="title"><?php echo $_SESSION['user']['user_fname'] . " " . $_SESSION['user']['user_lname']; ?></h5>
                                <p class="description"><?php echo $row['role_name'] ?></p>
                                </p>
                            </div>
                            <div class="card-body">
                                <div class="card-description">
                                    I think I am a nice person though have negligible weaknesses, have a good amount of likeable good qualities too. I am sincere and responsible. I am not a very intelligent student but sure I am dynamic as I am capable of managing and handling serious and difficult situations easily and finish all tasks well.
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="button-container">
                                    <button class="btn btn-icon icon-facebook">
                                        <i class="fab fa-facebook-f"></i>
                                    </button>
                                    <button class="btn btn-icon icon-twitter">
                                        <i class="fab fa-twitter"></i>
                                    </button>
                                    <button class="btn btn-icon icon-google">
                                        <i class="fab fa-google-plus-g"></i>
                                    </button>
                                    <button class="btn btn-icon icon-insta">
                                        <i class="fab fa-instagram"></i>
                                    </button>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!----------------------- Main-Content End --------------------------->
    <!--------------------- Profile Update Modal Start ----------------------------->
    <div class="modal fade profileUpdateModal" id="profileUpdateModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Update Profile Picture</h4>
                    <button type="button" class="close text-white" data-dismiss="modal"><i class="fas fa-times"></i></button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <form action="_profileUserPic.php" method="POST" enctype="multipart/form-data" class="pt-4">
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="file" class="form-control" id="profile_img" name="profile_img" accept="image/*" placeholder="Profile Image" alt="Profile Image" src="">          
                            </div> 
                        </div>
                        <div class="card-footer">
                            <div class="form-group">
                                <div>
                                    <button type="submit" class="btn btn-fill btn-primary save-btn mr-3" name="save"><i class="far fa-save mr-2"></i>Upload Image</button>
                                    <!--<button type="submit" class="btn btn-fill btn-primary save-btn mr-3" name="delete"><i class="far fa-save mr-2"></i>Remove Image</button>-->
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--------------------- Profile Update Modal End --------------------------->
</div>
<!--Footer Script Include Link-->
<?php include("./footer.php"); ?>
<script type="text/javascript" src="js/validation-form.js"></script>
<script type="text/javascript" src="js/profile.js"></script>