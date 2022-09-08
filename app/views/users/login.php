<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require_once APPROOT . '/views/inc/navbar.php'; ?>
<style>
    .login-btn-color {
        color: white;
        background-color: #293462;
    }
</style>
<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/Login.css">

<form method="POST" action="<?php echo URLROOT; ?>/users/login">

    <div class="row no-gutters my-4">
        <div class="container-fluid px-1 px-md-5 px-lg-1 px-xl-5 py-3 mx-auto">
            <div class="card card0 border-0">
                <div class="row ">
                    <div class="col-lg-5 text-center">
                        <img src="<?php echo URLROOT; ?>/img/signIn.png" class="img-fluid" id="login-img">
                    </div>
                    <div class="col-lg-6">
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

                            <div class="row px-3 form-group">
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
                                <a href="#" class="text-decoration-none" style="color:blue ;">Forgot Password? </a>
                            </div>
                            <div class="row mb-2 px-3">
                                <button type="submit" class="btn login-btn-color">Login</button>
                            </div>

                            <div class="row mb-2 text-sm">
                                <label class="form-check-label" for="rememberme">
                                    <input class="form-check-input align-middle" type="checkbox" value="" id="rememberme" name="rememberme"> Remember Me
                                </label>
                            </div>
                            <div class="row px-1 ">
                                <small class="font-weight-bold">Don't have an account? <a href="<?php echo URLROOT; ?>/users/register" class="text-danger text-decoration-none"> Register Now</a></small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<?php require APPROOT . '/views/inc/footer.php'; ?>