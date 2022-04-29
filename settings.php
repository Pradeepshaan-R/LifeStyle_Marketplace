<!--Header Script Include Link-->
<?php
include("./header.php");

function settingsUpdateUser() {
    $conn = ControlDB::getconnect();
    $current_user = $_SESSION['user']['user_id'];
    $sql = "SELECT * FROM user WHERE user_id = '$current_user'";
    $result = $conn->query($sql) or die($conn->error);
    return $result;
}
?>
<link rel="stylesheet" type="text/css" href="css/settings.css">

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
                <h1 class="h3 mb-0 text-secondary">General Account Settings</h1>
                <div>
                    <?php if (isset($_GET['error'])) { ?>
                        <p class="alert alert-danger"><?php echo $_GET['error']; ?></p>
                    <?php } ?>
                    <?php if (isset($_GET['success'])) { ?>
                        <p class="alert alert-success"><?php echo $_GET['success']; ?></p>
                    <?php } ?>
                </div>
            </div>
            <!-------------------- Page Heading End ------------------>

            <!----------------------- Main-Content Start --------------------------->
            <div class="row settings-row">
                <!------ Left Settings Bar Start ---------->
                <div class="col-md-6 card-settings-left">
                    <div class="settings-header">
                        <h5 class="title">Settings</h5>
                    </div>
                    <div class="settings-body">
                        <a class="tab" onclick="tabs(0)" href="#">
                            <div class="row  body-info active">
                                <div class="col-1 settings-main-icon"><i class="fas fa-user-cog"></i></div>
                                <div class="col-10 settings-content">
                                    <span>Account Information</span>
                                    <p>See your account information like your phone number and email address.</p>
                                </div>
                                <div class="col-1 settings-btn-arrow"><i class="fas fa-chevron-right"></i></div>
                            </div>
                        </a>
                    </div> 
                    <div class="settings-body">
                        <a class="tab" onclick="tabs(1)" href="#">
                            <div class="row body-info">
                                <div class="col-1 settings-main-icon"><i class="fas fa-key fa-rotate-180"></i></div>
                                <div class="col-10 settings-content">
                                    <span>Change your password</span>
                                    <p>Change your password at any time.</p>
                                </div>
                                <div class="col-1 settings-btn-arrow"><i class="fas fa-chevron-right"></i></div>
                            </div>
                        </a>
                    </div> 
                </div>
                <!------ Left Settings Bar End ---------->
                <!------ Right Settings Bar Start ---------->
                <div class="col-md-6 card-settings-right">
                    <div class="info tabShow">
                        <div class="settings-header">
                            <h5 class="title">Account Information</h5>
                        </div>
                        <div class="settings-body">
                            <?php
                            $result = settingsUpdateUser();
                            while ($row = mysqli_fetch_array($result)) {
                                ?>
                                <div id="accordion">
                                    <form action="_settingsUser.php" method="POST">
                                        <a class="card-link" data-toggle="collapse" href="#uname">
                                            <div class="row body-info-r">
                                                <div class="col-1 settings-main-icon"><i class="far fa-user"></i> </div>
                                                <div class="col-10 settings-content">
                                                    <span>Username</span>
                                                    <p><?php echo $row['user_name'] ?></p>
                                                </div>
                                                <div class="col-1 settings-btn-arrow"><i class="fas fa-edit"></i></div>
                                            </div>
                                        </a>
                                        <div id="uname" class="collapse accordion-form" data-parent="#accordion">
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label>Change Username</label>
                                                    <div class="row">
                                                        <input type="text" name="uname" class="form-control col-md-9" placeholder="User-Name" value="<?php echo $row['user_name'] ?>">
                                                        <button type="submit" class="btn btn-fill btn-info"><i class="far fa-save mr-2"></i>Save</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <a class="card-link" data-toggle="collapse" href="#uphone">
                                            <div class="row body-info-r">
                                                <div class="col-1 settings-main-icon"><i class="fas fa-phone-alt"></i></div>
                                                <div class="col-10 settings-content">
                                                    <span>Phone</span>
                                                    <p><?php echo $row['user_cno1'] ?></p>
                                                </div>
                                                <div class="col-1 settings-btn-arrow"><i class="fas fa-edit"></i></div>
                                            </div>
                                        </a>
                                        <div id="uphone" class="collapse accordion-form" data-parent="#accordion">
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label>Change Phone</label>
                                                    <div class="row">
                                                        <input type="text" name="user_cno" class="form-control col-md-9" placeholder="Contact No." value="<?php echo $row['user_cno1'] ?>">
                                                        <button type="submit" class="btn btn-fill btn-info"><i class="far fa-save mr-2"></i>Save</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <a class="card-link" data-toggle="collapse" href="#uemail">
                                            <div class="row body-info-r">
                                                <div class="col-1 settings-main-icon"><i class="fas fa-paper-plane"></i></div>
                                                <div class="col-10 settings-content">
                                                    <span>Email</span>
                                                    <p><?php echo $row['user_email'] ?></p>
                                                </div>
                                                <div class="col-1 settings-btn-arrow"><i class="fas fa-edit"></i></div>
                                            </div>
                                        </a>
                                        <div id="uemail" class="collapse accordion-form" data-parent="#accordion">
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label>Change Email</label>
                                                    <div class="row">
                                                        <input type="text" name="email" class="form-control col-md-9" placeholder="Email" value="<?php echo $row['user_email'] ?>">
                                                        <button type="submit" class="btn btn-fill btn-info"><i class="far fa-save mr-2"></i>Save</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <a class="card-link" data-toggle="collapse" href="#ucountry">
                                            <div class="row body-info-r">
                                                <div class="col-1 settings-main-icon"><i class="fas fa-globe-asia"></i></div>
                                                <div class="col-10 settings-content">
                                                    <span>Country</span>
                                                    <p><?php echo $row['user_country'] ?></p>
                                                </div>
                                                <div class="col-1 settings-btn-arrow"><i class="fas fa-edit"></i></div>
                                            </div>
                                        </a>
                                        <div id="ucountry" class="collapse accordion-form" data-parent="#accordion">
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label>Change Country</label>
                                                    <div class="row">
                                                        <input type="text" name="country" class="form-control col-md-9" placeholder="Country" value="<?php echo $row['user_country'] ?>">
                                                        <button type="submit" class="btn btn-fill btn-info"><i class="far fa-save mr-2"></i>Save</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <a class="card-link" data-toggle="collapse" href="#ulanguage">
                                            <div class="row body-info-r">

                                                <div class="col-1 settings-main-icon"><i class="fas fa-sign-language"></i></div>
                                                <div class="col-10 settings-content">
                                                    <span>Language</span>
                                                    <p><?php echo $row['user_language'] ?></p>
                                                </div>
                                                <div class="col-1 settings-btn-arrow"><i class="fas fa-edit"></i></div>
                                            </div>
                                        </a>
                                        <div id="ulanguage" class="collapse accordion-form" data-parent="#accordion">
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label>Languages</label>
                                                    <div class="row">
                                                        <input type="text" name="lang" class="form-control col-md-9" placeholder="Default Language" value="<?php echo $row['user_language'] ?>">
                                                        <button type="submit" class="btn btn-fill btn-info"><i class="far fa-save mr-2"></i>Save</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <a class="card-link" data-toggle="collapse" href="#ugender">
                                            <div class="row body-info-r">
                                                <div class="col-1 settings-main-icon"><i class="fas fa-venus-mars"></i></div>
                                                <div class="col-10 settings-content">
                                                    <span>Gender</span>
                                                    <p><?php echo $row['user_gender'] ?></p>
                                                </div>
                                                <div class="col-1 settings-btn-arrow"><i class="fas fa-edit"></i></div>
                                            </div>
                                        </a>
                                        <!--------- Gender Radio Settings --------------->
                                        <div id="ugender" class="collapse accordion-form-gen" data-parent="#accordion">
                                            <div class="card-header">
                                                <label>Gender</label>
                                                <p>If you haven’t already specified a gender, this is the one associated with your account based on your profile and activity. This information won’t be displayed publicly.</p>
                                            </div>
                                            <div class="card-body">
                                                <input type="radio" name="gender" value="male" id="option-1" checked="checked">
                                                <input type="radio" name="gender" value="female" id="option-2">
                                                <input type="radio" name="gender" value="other" id="option-3">
                                                <label class="option-1" for="option-1">
                                                    <div class="text">Male</div>
                                                    <div class="dot"></div>
                                                </label>
                                                <label class="option-2" for="option-2">                                        
                                                    <div class="text">Female</div>
                                                    <div class="dot"></div>
                                                </label>
                                                <label class="option-3" for="option-3">                                          
                                                    <div class="text">Other</div>
                                                    <div class="dot"></div>
                                                </label>
                                            </div>
                                            <div class="card-footer">
                                                <div class="row">
                                                    <div class="col-md-9"></div>
                                                    <button type="submit" class="btn btn-fill btn-info"><i class="far fa-save mr-2"></i>Save</button>
                                                </div>
                                            </div>
                                        </div>
                                        <a class="card-link" data-toggle="collapse" href="#udob">
                                            <div class="row body-info-r">
                                                <div class="col-1 settings-main-icon"><i class="fas fa-calendar-check"></i></div>
                                                <div class="col-10 settings-content">
                                                    <span>Birth Date</span>
                                                    <p><?php echo $row['user_dob'] ?></p>
                                                </div>
                                                <div class="col-1 settings-btn-arrow"><i class="fas fa-edit"></i></div>
                                            </div>
                                        </a>
                                        <div id="udob" class="collapse accordion-form" data-parent="#accordion">
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label>Age</label>
                                                    <div class="row">
                                                        <input type="date" name="dob" class="form-control col-md-9" placeholder="D.O.B" value="<?php echo $row['user_dob'] ?>">
                                                        <button type="submit" class="btn btn-fill btn-info"><i class="far fa-save mr-2"></i>Save</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!------------------- Change Password Settings ---------------------------->
                        <div class="pay tabShow">
                            <div class="settings-header">
                                <h5 class="title">Change your password</h5>
                            </div>
                            <form action="_change-password.php" method="POST">
                                <div class="settings-body">
                                    <div class="body-info-ps">
                                        <div>
                                            <div class="form-group">
                                                <!--<label>Current Password</label>-->
                                                <input type="password" class="form-control"name="op" autocomplete="off" value="" required="">
                                                <label for="password" class="ps-lable1">
                                                    <span class="ps-span1">Current Password</span>
                                                </label>
                                                <a href="#">Forgot Password?</a>
                                            </div>
                                        </div>
                                    </div> 
                                    <div class="body-info-ps">
                                        <div>
                                            <div class="form-group">
                                                <!--<label>New Password</label>-->
                                                <input type="password" class="form-control"name="np" autocomplete="off" value="" required="">
                                                <label for="password" class="ps-lable2">
                                                    <span class="ps-span2">New Password</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="form-group">
                                                <!--<label>Confirm Password</label>-->
                                                <input type="password" class="form-control"name="c_np" autocomplete="off" value="" required="">
                                                <label for="password" class="ps-lable3">
                                                    <span class="ps-span3">Confirm Password</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="body-info-ps-btn">
                                        <button type="submit" class="btn btn-fill btn-primary save-btn mr-3 was-validated" name="save"><i class="far fa-save mr-2"></i>Save</button>
                                        <button type="reset" class="btn btn-fill btn-primary reset-btn" name="reset"><i class="fas fa-sync-alt mr-2"></i>Reset</button>
                                    </div>                                    
                                </div>
                            </form>
                        </div>
                    </div>
                <?php } ?>
                <!------ Right Settings Bar End ---------->
            </div>
            <!----------------------- Main-Content End ----------------------------->
        </div>
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