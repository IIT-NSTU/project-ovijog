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
    <!-- <div class=""> -->
    <div class="main-body">
        <div class="row gutters-sm">
            <!-- <div class="col-md-2 mb-1">
                    <div class="card"></div>
                </div> -->
            <div class="col-md-5">
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
                            <div class="col-sm-4">
                                <h6 class="mb-0">First Name</h6>
                            </div>
                            <div class="col-sm-8 text-secondary">
                                Armanur
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-4">
                                <h6 class="mb-0">Last Name</h6>
                            </div>
                            <div class="col-sm-7 text-secondary">
                                Rashid
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-4">
                                <h6 class="mb-0">Email</h6>
                            </div>
                            <div class="col-sm-8 text-secondary">
                                armanur2514@student.nstu.edu.bd
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-4">
                                <h6 class="mb-0">Password</h6>
                            </div>
                            <div class="col-sm-8 text-secondary">
                                0123456789
                            </div>
                        </div>

                        <!-- <div class="row">
                                <div class="col-sm-9"></div>
                                <div class="col-sm-3 text-secondary">
                                    <a href="<?php echo URLROOT; ?>/users/editProfile?id=<?php echo $_SESSION['user_id']; ?>" class="btn w-80 button-background-color">Edit Profile</a>
                                </div>
                            </div> -->
                    </div>
                </div>
            </div>
            <div class="col-sm-7">
                <div class="container mt-2 mb-2">
                    <div class="row d-flex align-items-center justify-content-center">

                        <?php foreach ($data['posts'] as $post) : ?>
                            <div class="col-md-7">
                                <div class="card">
                                    <div class="d-flex justify-content-between p-2 px-3">
                                        <div class="d-flex flex-row align-items-center"> <img src="https://bootdey.com/img/Content/avatar/avatar7.png" width="40" class="rounded-circle">
                                            <div class="d-flex flex-column"> <span class="font-weight-bold"><?php echo $post->title; ?> Water Problem in Hall</span>
                                                <small class="text-primary">Category: <?php echo $post->category; ?></small>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-row mt-1 ellipsis"> <small class="mr-2">20 mins</small></div>
                                    </div>
                                    <div class="text-center">
                                        <!-- <img src="<?php echo URLROOT; ?>/img/pen.jpg" width="500" height="auto" class="img-fluid text-center py-3"> -->
                                        <img src="<?php echo $post->img_link; ?>" width="50%" height="auto" class="img-fluid text-center py-3">
                                    </div>
                                    <div class="px-5 py-2">
                                        <p class="body-text"><?php echo $post->body; ?></p>
                                        <hr>
                                        <div class="row ">
                                            <div class="col-sm up-down-vote-icon ">50 <i class="fa-solid fa-thumbs-up ps-2 icon-text"> </i></div>
                                            <div class="col-sm up-down-vote-icon"> 8 <i class="fa-solid fa-thumbs-down ps-2 pt-1 icon-text"> </i></div>
                                            <div class="col-sm text-center"><a href="<?php echo URLROOT; ?>/posts/show/<?php echo $post->post_id; ?>" class="btn btn-sm text-primary">More</a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- </div> -->
</body>

<?php require APPROOT . '/views/inc/footer.php'; ?>