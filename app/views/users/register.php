<?php require APPROOT . '/views/inc/header.php'; ?>
<style>
    #register-image {
        width: 80%;
        margin-top: 117px;
    }

    .button-background-color {
        background-color: #293462;
        color: white;
    }

    .button-background-color:hover {
        color: white;
    }
</style>
<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/Login.css">

<?php require_once APPROOT . '/views/inc/navbar.php'; ?>

<form action="<?php echo URLROOT; ?>/users/register" method="post">
    <div class="row no-gutters my-4">
        <div class="container-fluid px-1 px-md-5 px-lg-1 px-xl-5 py-3 mx-auto">
            <div class="card card0 border-0">
                <div class="row ">

                    <div class="col-lg-5 text-center">
                        <div style="display: flex; justify-content: flex-end;">
                            <img src="<?php echo URLROOT; ?>/img/signIn.png" class="img-fluid" id="register-image">
                        </div>

                    </div>
                    <div class="col-lg-7">
                        <div class="container">
                            <div class="card2 card border-0 px-4 py-6">
                                <div class="row mb-4 px-3">
                                    <h3 class="mb-0 mr-4 mt-4 text-center">Registration</h3>
                                </div>
                                <div class="row px-3 mb-4">
                                    <div class="line"></div>
                                    <small class="or text-center">**</small>
                                    <div class="line"></div>
                                </div>
                                <div id="signupmessage"></div>
                                <div class="row px-3 form-group">
                                    <label class="mb-1" for="fname">
                                        <h6 class="mb-0 text-sm">First Name<sup style="color:red;">*</sup></h6>
                                    </label>
                                    <input type="text" name="fname" placeholder="Enter first name" class="form-control mb-3 <?php echo (!empty($data['fname_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['fname']; ?>">
                                    <span class="invalid-feedback"><?php echo $data['fname_err']; ?></span>

                                </div>
                                <div class="row px-3 form-group">
                                    <label class="mb-1" for="lname">
                                        <h6 class="mb-0 text-sm">Last Name<sup style="color:red;">*</sup></h6>
                                    </label>
                                    <input type="text" name="lname" placeholder="Enter last name" class="form-control mb-3 <?php echo (!empty($data['lname_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['lname']; ?>">
                                    <span class="invalid-feedback"><?php echo $data['lname_err']; ?></span>

                                </div>
                                <div class="row px-3 form-group">
                                    <label class="mb-1" for="edu_email">
                                        <h6 class="mb-0 text-sm">NSTU Email<sup style="color:red;">*</sup></h6>
                                    </label>
                                    <input type="email" name="edu_email" placeholder="Enter your edu email address" class="form-control mb-3 <?php echo (!empty($data['edu_email_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['edu_email']; ?>">
                                    <span class="invalid-feedback"><?php echo $data['edu_email_err']; ?></span>
                                </div>
                                <div class="row px-3 form-group">
                                    <label class="mb-1" for="password">
                                        <h6 class="mb-0 text-sm">Password<sup style="color:red;">*</sup></h6>
                                    </label>
                                    <input type="password" name="password" placeholder="Enter Password" class="form-control mb-3 <?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['password']; ?>">
                                    <span class="invalid-feedback"><?php echo $data['password_err']; ?></span>
                                </div>
                                <div class="row px-3 form-group">
                                    <label class="mb-1" for="confirm_password">
                                        <h6 class="mb-0 text-sm">Confirm Password<sup style="color:red;">*</sup></h6>
                                    </label>
                                    <input type="password" name="confirm_password" placeholder="Confirm Password " class="form-control mb-3 <?php echo (!empty($data['confirm_password_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['confirm_password']; ?>">
                                    <span class="invalid-feedback"><?php echo $data['confirm_password_err']; ?></span>
                                </div>
                                <div class="row mb-3 px-3 mt-5">
                                    <input class="btn btn-block button-background-color " name="signup" type="submit" value="Register">
                                </div>
                                <div class="row px-3 ">
                                    <small class="font-weight-bold text-center mb-4">Already a member? <a href="<?php echo URLROOT; ?>/users/login" class="text-primary text-decoration-none fw-bolder">Sign in</a></small>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<?php require APPROOT . '/views/inc/footer.php'; ?>