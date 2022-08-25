<?php require APPROOT . '/views/inc/header.php'; ?>
<style>
    input[type="checkbox"] {
        transform: scale(0.6);
    }

    body {
        color: #000;
        overflow-x: hidden;
        height: 100%;
        /* background-color: #b0bec5; */
        background-color: white;
        background-repeat: no-repeat;
    }

    .card0 {
        box-shadow: 0px 4px 8px 0px #757575;
        border-radius: 0px;
    }

    .card2 {
        margin: 0px 40px;
    }

    .logo {
        width: 200px;
        height: 100px;
        margin-top: 20px;
        margin-left: 35px;
    }

    #login-img {
        width: 70%;
        height: auto;
        margin-top: 80px;
    }

    .btn1 {
        border: none;
        outline: none;
        height: 40px;
        width: 100%;
        background-color: black;
        color: white;
        border-radius: 4px;
        font-weight: bold;
    }

    .border-line {
        border-right: 1px solid #eeeeee;
    }

    .line {
        height: 1px;
        width: 45%;
        background-color: #e0e0e0;
        margin-top: 10px;
    }

    .or {
        width: 10%;
        font-weight: bold;
    }

    .text-sm {
        font-size: 14px !important;
    }

    ::placeholder {
        color: #bdbdbd;
        opacity: 1;
        font-weight: 300;
    }

    :-ms-input-placeholder {
        color: #bdbdbd;
        font-weight: 300;
    }

    ::-ms-input-placeholder {
        color: #bdbdbd;
        font-weight: 300;
    }

    input,
    textarea {
        padding: 10px 12px 10px 12px;
        border: 1px solid lightgrey;
        border-radius: 2px;
        margin-bottom: 5px;
        margin-top: 2px;
        width: 100%;
        box-sizing: border-box;
        color: #2c3e50;
        font-size: 14px;
        letter-spacing: 1px;
    }

    input:focus,
    textarea:focus {
        -moz-box-shadow: none !important;
        -webkit-box-shadow: none !important;
        box-shadow: none !important;
        border: 1px solid #304ffe;
        outline-width: 0;
    }

    button:focus {
        -moz-box-shadow: none !important;
        -webkit-box-shadow: none !important;
        box-shadow: none !important;
        outline-width: 0;
    }

    a {
        color: inherit;
        cursor: pointer;
    }

    .btn-blue {
        background-color: #1a237e;
        width: 150px;
        color: #fff;
        border-radius: 2px;
    }

    .btn-blue:hover {
        background-color: #000;
        cursor: pointer;
    }

    .bg-blue {
        color: #fff;
        background-color: #1a237e;
    }

    @media screen and (max-width: 991px) {
        .logo {
            margin-left: 0px;
        }

        .border-line {
            border-right: none;
        }

        .card2 {
            border-top: 1px solid #eeeeee !important;
            margin: 0px 15px;
        }
    }
</style>
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
                                <small class="or text-center">***</small>
                                <div class="line"></div>
                            </div>

                            <div class="row px-3 form-group">
                                <label for="email" class="mb-1">
                                    <h6 class="mb-0 text-sm">Email Address<sup style="color:red;">*</sup></h6>
                                </label>
                                <input class="form-control mb-4 <?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['email']; ?>" type="email" name="email" placeholder="Enter your edu email address">
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
                                <button type="submit" class="btn1">Login</button>
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