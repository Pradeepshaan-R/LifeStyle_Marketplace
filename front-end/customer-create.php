<?php include ("../includes/senz_database.php"); ?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <!--To ensure proper rendering & touch zooming on mobile devices.-->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--Online Path-->
        <!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">-->
        <!--Offline Path-->
        <link rel="stylesheet" type="text/css" href="vendor/bootstrap-4.5.0/css/bootstrap.css">
        <!--FontAwesome Path-->
        <link rel="stylesheet" type="text/css" href="vendor/fontawesome-free/css/all.css">
        <link rel="stylesheet" type="text/css" href="vendor/fontawesome-free/css/all.min.css">
        <!--Google Font Path-->
        <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
        <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
        <!--Additional CSS File Path-->
        <!--Slick Carousel-->
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
        <!--        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.7.1/slick.min.css">
                <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.7.1/slick-theme.min.css">-->
        <link rel="stylesheet" type="text/css" href="css/customer-front.css">
        <link rel="stylesheet" type="text/css" href="css/index-front.css">
        <title>SenzMarket</title>
    </head>
    <body>
        <div class="container-fluid customer">
            <div class="container">
                <div class="row pt-4 pb-4">
                    <div class="col-md-3"></div>
                    <div class="col-md-9 mb-5 mt-5">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="title">Registration</h5>
                            </div>
                            <div class="card-body">
                                <form class="needs-validation" action="../_add-customer.php?status=addCustomer" method="POST" enctype="multipart/form-data" novalidate>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Employee ID</label>
                                                <input type="text" class="form-control" disabled="" placeholder="ID" value="" style="background: #e6fff5; color: white; cursor: not-allowed;">
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label>Username</label>
                                                <input type="text" class="form-control" name="c_uname" placeholder="User Name" value="" required>
                                                <div class="valid-feedback">Valid</div>
                                                <div class="invalid-feedback">Please Enter your User-Name.</div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Email address</label>
                                                <input type="email" class="form-control" name="c_email" placeholder="Email" required>
                                                <div class="valid-feedback">Valid</div>
                                                <div class="invalid-feedback">Please Enter your Email.</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 pr-md-1">
                                            <div class="form-group">
                                                <label>First Name</label>
                                                <input type="text" class="form-control" name="c_fname" placeholder="First Name" value="" required>
                                                <div class="valid-feedback">Valid</div>
                                                <div class="invalid-feedback">Please Enter your First-Name.</div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 pl-md-1">
                                            <div class="form-group">
                                                <label>Last Name</label>
                                                <input type="text" class="form-control" name="c_lname" placeholder="Last Name" value="" required>
                                                <div class="valid-feedback">Valid</div>
                                                <div class="invalid-feedback">Please Enter your Last-Name.</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-5 pr-md-1">
                                            <div class="form-group">
                                                <label>NIC</label>
                                                <input type="text" class="form-control" name="c_nic" placeholder="NIC" value="" required>
                                                <div class="valid-feedback">Valid</div>
                                                <div class="invalid-feedback">Please Enter your NIC.</div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 pr-md-1">
                                            <div class="form-group">
                                                <label>Age</label>
                                                <input type="date" class="form-control" name="c_age" placeholder="Age" value="" required>
                                                <div class="valid-feedback">Valid</div>
                                                <div class="invalid-feedback">Please Enter your Age.</div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 pl-md-1">
                                            <div class="form-group">
                                                <label>Gender</label>
                                                <div class="form-control" style="border: 0;">
                                                    <input type="radio" class="radio-input" name="gender" value="male" checked="checked" required>
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
                                                <input type="text" class="form-control" name="c_address" placeholder="Home Address" value="" required>
                                                <div class="valid-feedback">Valid</div>
                                                <div class="invalid-feedback">Please Enter your Address.</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Contact No. 01</label>
                                                <input type="tel" class="form-control" name="c_cno1" placeholder="" value="" required>
                                                <div class="valid-feedback">Valid</div>
                                                <div class="invalid-feedback">Please Enter your Contact No.</div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Contact No. 02</label>
                                                <input type="tel" class="form-control" name="c_cno2" placeholder="" required>
                                                <div class="valid-feedback">Valid</div>
                                                <div class="invalid-feedback">Please Enter your Contact No.</div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label></label>
                                                <div>
                                                    <button type="submit" class="btn btn-fill btn-primary save-btn was-validated"><i class="far fa-save mr-2"></i>Save</button>
                                                    <button type="reset" class="btn btn-fill btn-primary reset-btn"><i class="fas fa-sync-alt mr-2"></i>Reset</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-1"></div>
                </div>
            </div>
        </div>
    </div>
    <?php include("./footer.php"); ?>
    <script type="text/javascript" src="../js/validation-form.js"></script>