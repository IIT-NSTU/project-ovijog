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

                            </div>

                            <div class="mb-3">
                                <label class="mb-2 text-muted" for="password-confirm">Confirm Password</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirm" required>

                            </div>

                            <div class="d-flex align-items-center">

                                <button type="submit" name="submit" class="btn btn-sm ms-auto button-background-color">
                                    Reset Password
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require APPROOT . '/views/inc/footer.php'; ?>