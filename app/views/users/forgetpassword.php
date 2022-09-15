<?php require APPROOT . '/views/inc/header.php'; ?>
<style>
    .button-background-color {
        background-color: #293462;
        color: white;
    }
</style>

<?php require_once APPROOT . '/views/inc/navbar.php'; ?>
<section class="h-100">
    <div class="container h-100">
        <div class="row justify-content-sm-center h-100">
            <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9 mt-5">

                <div class="card shadow-lg">
                    <div class="card-body p-5">
                        <h1 class="fs-4 card-title fw-bold mb-4 text-center">Change Password</h1>
                        <form method="POST" action="" class="needs-validation" novalidate="" autocomplete="off">
                            <div class="mb-3">
                                <label class="mb-2 text-muted" for="password">New Password</label>
                                <input id="password" type="password" class="form-control" name="password" value="" required>
                                <span id="password-err" class="invalid-feedback"></span>
                            </div>

                            <div class="mb-3">
                                <label class="mb-2 text-muted" for="password-confirm">Confirm Password</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirm" required>
                                <span id="password-confirm-err" class="invalid-feedback"></span>
                            </div>

                            <div class="d-flex align-items-center">
                                <a onclick="changePassword()" class="btn btn-sm ms-auto button-background-color">Reset Password</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

    <script>

        $('#password').on('input',function () {
            $('#password-err').hide();
        });

        $('#password-confirm').on('input',function () {
            $('#password-confirm-err').hide();
        });

        function changePassword() {
            var password=$('#password').val();
            var confirmPassword=$('#password-confirm').val();

            if(password===""){
                $('#password-err').html("Please enter password");
                $('#password-err').show();
            }else if(confirmPassword===""){
                $('#password-confirm-err').html("Please enter confirm password");
                $('#password-confirm-err').show();
            }else if(confirmPassword.length<6){
                $('#password-err').html("Password must be at least 6 character");
                $('#password-err').show();
            }else if(confirmPassword!==password){
                $('#password-confirm-err').html("Password are not same");
                $('#password-confirm-err').show();
            }else {

                var data={};

                data['user_id']=<?php echo $data['user_id'] ?>;
                data['password']=password;

                $.ajax({
                    url: '<?php echo URLROOT; ?>/users/changePasswordForForget/',
                    type: 'post',
                    data: data,
                    dataType: 'json',
                    success: function(s) {
                        console.log(s);
                        location.replace('<?php echo URLROOT; ?>/users/login/');
                    },
                    error: function(err) {
                        console.log('failed');
                        console.log(err);
                    }
                });
            }
        }
    </script>

<?php require APPROOT . '/views/inc/footer.php'; ?>