<?php require APPROOT . '/views/inc/header.php'; ?>
<style>
    #register-image {
        width: 80%;
        margin-top: 80px;
    }

    .button-background-color {
        background-color: #293462;
        color: white;
    }
</style>
<div class="row no-gutters">
    <div class="container-fluid px-1 px-md-5 px-lg-1 px-xl-5 py-3 mx-auto">
        <form action="<?php echo URLROOT; ?>/users/register" method="post">
            <div class="card card0 border-0">
                <div class="row d-flex ">
                    <div class="col-lg-5 text-center">
                        <img src="<?php echo URLROOT; ?>/img/signIn.png" id="register-image" class="img-fluid ">
                    </div>
                    <div class="col-lg-6">
                        <div class="card2 card border-0 px-4 py-6">
                            <div class="row mb-4 px-3">
                                <h3 class="mb-0 mr-4 mt-4 text-center">Registration Now</h3>
                            </div>
                            <div class="row px-3 mb-4">
                                <div class="line"></div>
                                <small class="or text-center">***</small>
                                <div class="line"></div>
                            </div>
                            <div id="signupmessage"></div>
                            <div class="row px-3 form-group">
                                <label class="mb-1" for="fname">
                                    <h6 class="mb-0 text-sm">First Name<sup style="color:red;">*</sup></h6>
                                </label>
                                <input type="text" name="fname" placeholder="Enter first name" class="form-control mb-4 <?php echo (!empty($data['fname_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['fname']; ?>">
                                <span class="invalid-feedback"><?php echo $data['fname_err']; ?></span>

                            </div>
                            <div class="row px-3 form-group">
                                <label class="mb-1" for="lname">
                                    <h6 class="mb-0 text-sm">Last Name<sup style="color:red;">*</sup></h6>
                                </label>
                                <input type="text" name="lname" placeholder="Enter last name" class="form-control mb-4 <?php echo (!empty($data['lname_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['lname']; ?>">
                                <span class="invalid-feedback"><?php echo $data['lname_err']; ?></span>

                            </div>
                            <div class="row px-3 form-group">
                                <label class="mb-1" for="edu_email">
                                    <h6 class="mb-0 text-sm">NSTU Email<sup style="color:red;">*</sup></h6>
                                </label>
                                <input type="email" name="edu_email" placeholder="Enter your edu email address" class="form-control mb-4 <?php echo (!empty($data['edu_email_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['edu_email']; ?>">
                                <span class="invalid-feedback"><?php echo $data['edu_email_err']; ?></span>
                            </div>
                            <div class="row px-3 form-group">
                                <label class="mb-1" for="password">
                                    <h6 class="mb-0 text-sm">Password<sup style="color:red;">*</sup></h6>
                                </label>
                                <input type="password" name="password" placeholder="Enter Password" class="form-control mb-4 <?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['password']; ?>">
                                <span class="invalid-feedback"><?php echo $data['password_err']; ?></span>
                            </div>
                            <div class="row px-3 form-group">
                                <label class="mb-1" for="confirm_password">
                                    <h6 class="mb-0 text-sm">Confirm Password<sup style="color:red;">*</sup></h6>
                                </label>
                                <input type="password" name="confirm_password" placeholder="Confirm Password " class="form-control mb-4 <?php echo (!empty($data['confirm_password_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['confirm_password']; ?>">
                                <span class="invalid-feedback"><?php echo $data['confirm_password_err']; ?></span>
                            </div>
                            <div class="row mb-3 px-3">
                                <input class="btn btn-block button-background-color " name="signup" type="submit" value="Register"></input>
                            </div>
                            <div class="row px-3 ">
                                <small class="font-weight-bold text-center mb-4">Already a member? <a href="<?php echo URLROOT; ?>/users/login" class="text-danger text-decoration-none">Sign in</a></small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>