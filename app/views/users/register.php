<?php require APPROOT . '/views/inc/header.php'; ?>

    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card card-body bg-light mt-5">
                <h2>Create an account</h2>
                <p>Please fill out the form to register with us</p>
                <form action="<?php echo URLROOT; ?>/users/register" method="post">

                    <div class="form-group">
                        <label for="fname">First Name: <sup>*</sup></label>
                        <input type="text" name="fname" class="form-control form-control-lg <?php echo (!empty($data['fname_err']))? 'is-invalid':''; ?>" value="<?php echo $data['fname']; ?>">
                        <span class="invalid-feedback"><?php echo $data['fname_err']; ?></span>
                    </div>
                    <div class="form-group">
                        <label for="lname">Last Name: <sup>*</sup></label>
                        <input type="text" name="lname" class="form-control form-control-lg <?php echo (!empty($data['lname_err']))? 'is-invalid':''; ?>" value="<?php echo $data['lname']; ?>">
                        <span class="invalid-feedback"><?php echo $data['lname_err']; ?></span>
                    </div>
                    <div class="form-group">
                        <label for="edu_email">NSTU Email: <sup>*</sup></label>
                        <input type="email" name="edu_email" class="form-control form-control-lg <?php echo (!empty($data['edu_email_err']))? 'is-invalid':''; ?>" value="<?php echo $data['edu_email']; ?>">
                        <span class="invalid-feedback"><?php echo $data['edu_email_err']; ?></span>
                    </div>
                    <div class="form-group">
                        <label for="password">Password: <sup>*</sup></label>
                        <input type="password" name="password" class="form-control form-control-lg <?php echo (!empty($data['password_err']))? 'is-invalid':''; ?>" value="<?php echo $data['password']; ?>">
                        <span class="invalid-feedback"><?php echo $data['password_err']; ?></span>
                    </div>
                    <div class="form-group">
                        <label for="confirm_password">Confirm password: <sup>*</sup></label>
                        <input type="password" name="confirm_password" class="form-control form-control-lg <?php echo (!empty($data['confirm_password_err']))? 'is-invalid':''; ?>" value="<?php echo $data['confirm_password']; ?>">
                        <span class="invalid-feedback"><?php echo $data['confirm_password_err']; ?></span>
                    </div>

                    <div class="row">
                        <div class="col">
                            <input type="submit" value="Register" class="btn btn-success btn-block">
                        </div>
                        <div class="col">
                            <a href="<?php echo URLROOT; ?>/users/login" class="btn btn-light btn-block">Have an account? Login</a>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>


<?php require APPROOT . '/views/inc/footer.php'; ?>