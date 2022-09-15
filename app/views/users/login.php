<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require_once APPROOT . '/views/inc/navbar.php'; ?>
<style>
    .login-btn-color {
        color: white;
        background-color: #293462;
    }
</style>
<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/Login.css">

<!-- Notify Modal start -->
<div class="modal fade" id="Notify" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title text-center
                " id="staticBackdropLabel">Please Check your email</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
        </div>
    </div>
</div>
<!-- Notify Modal End  -->

<!-----------------Forgot Password modal start------------------------->
<div class="modal fade" id="forgotPassword" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="staticBackdropLabel">Email Verification</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="#" class="needs-validation" novalidate="" autocomplete="off">
                    <div class="mb-3">
                        <label class="mb-2 text-muted" for="email">Enter your email</label>
                        <input id="email" type="email" class="form-control" name="email" value="" required autofocus>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Close</button>
                <button class="btn btn-sm" data-bs-toggle="modal" data-bs-dismiss="modal" data-bs-target="#Notify" style="background-color: #293462; color:white;">Done</button>
            </div>
        </div>
    </div>
</div>
<!-----------------Forgot Password modal end------------------------->

<!-----------------Change Password modal start------------------------->

<!-----------------Change Password modal end------------------------->

<form method="POST" action="<?php echo URLROOT; ?>/users/login">

    <div class="row no-gutters my-4">
        <div class="container-fluid px-1 px-md-5 px-lg-1 px-xl-5 py-3 mx-auto">
            <div class="card card0 border-0">
                <div class="row ">
                    <div class="col-lg-5 text-center">
                        <div style="display: flex; justify-content: flex-end;">
                            <img src="<?php echo URLROOT; ?>/img/signIn.png" class="img-fluid" id="login-img">
                        </div>

                    </div>
                    <div class="col-lg-7">
                        <div class="container">
                            <div class="card2 card border-0 px-4 py-5">
                                <?php flash('register_success'); ?>
                                <div class="row mb-4 px-3">
                                    <h3 class="mb-0 mr-4 mt-2 text-center">Login</h3>
                                </div>
                                <div class="row px-3 mb-4">
                                    <div class="line"></div>
                                    <small class="or text-center">**</small>
                                    <div class="line"></div>
                                </div>

                                <div class="row px-3 pb-2 form-group">
                                    <label for="email" class="mb-1">
                                        <h6 class="mb-0 text-sm">Email Address<sup style="color:red;">*</sup></h6>
                                    </label>
                                    <input class="form-control mb-1 <?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['email']; ?>" type="email" name="email" placeholder="Enter your edu email address">
                                    <span class="invalid-feedback"><?php echo $data['email_err']; ?></span>
                                </div>
                                <div class="row px-3 form-group">
                                    <label for="password" class="mb-1">
                                        <h6 class="mb-0 text-sm">Password<sup style="color:red;">*</sup></h6>
                                    </label>
                                    <input class="form-control mb-1.5 <?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['password']; ?>" type="password" name="password" placeholder="Enter password">
                                    <span class="invalid-feedback"><?php echo $data['password_err']; ?></span>
                                </div>

                                <div class="text-end mb-3 text-sm ">
                                    <!-- <a href="<?php echo URLROOT; ?>/users/forgetPassword/" class="text-decoration-none" style="color:blue ;">Forgot Password? </a> -->
                                    <button class="btn btn-sm text-primary ps-0" data-bs-toggle="modal" data-bs-target="#forgotPassword">Forgot password</button>
                                </div>
                                <div class="row mb-2 px-3">
                                    <button type="submit" class="btn login-btn-color">Login</button>
                                </div>
                                <div class="row px-1 ">
                                    <small>Don't have an account? <a href="<?php echo URLROOT; ?>/users/register" class="text-primary text-decoration-none fw-bolder">Register Now</a></small>
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