<?php require APPROOT . '/views/inc/header.php'; ?>

<?php require_once APPROOT . '/views/inc/navbar.php'; ?>
<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/profile.css">
<style>
    .button-background-color {
        background-color: #293462;
        color: white;
    }
</style>

<body>
    <div class="container">
        <div class="main-body">
            <div class="row gutters-sm">
                <div class="col-md-2 mb-1">
                    <div class="card"></div>
                </div>
                <div class="col-md-8">
                    <div class="card mb-1">
                        <div class="card-body">
                            <div class="row">
                                <div class="d-flex flex-column align-items-center text-center mt-2 mb-2">
                                    <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150">
                                    <div class="mt-3">
                                        <h4>Armanur Rashid</h4>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-5">
                                    <h6 class="mb-0">First Name</h6>
                                </div>
                                <div class="col-sm-7 text-secondary">
                                    Armanur
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-5">
                                    <h6 class="mb-0">Last Name</h6>
                                </div>
                                <div class="col-sm-7 text-secondary">
                                    Rashid
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-5">
                                    <h6 class="mb-0">Email</h6>
                                </div>
                                <div class="col-sm-7 text-secondary">
                                    armanur2514@student.nstu.edu.bd
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-5">
                                    <h6 class="mb-0">Password</h6>
                                </div>
                                <div class="col-sm-7 text-secondary">
                                    0123456789
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-9"></div>
                                <div class="col-sm-3 text-secondary">
                                    <a href="<?php echo URLROOT; ?>/users/editProfile?id=<?php echo $_SESSION['user_id']; ?>" class="btn w-80 button-background-color">Edit Profile</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<?php require APPROOT . '/views/inc/footer.php'; ?>