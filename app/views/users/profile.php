<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require_once APPROOT . '/views/inc/navbar.php'; ?>
<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/profile.css">

<div class="main-body">
    <div class="row">
        <div class="col-md-5" style="margin-top:60px;">
            <div class="card card-body mb-1">
                <div class="row">
                    <div class="d-flex flex-column align-items-center text-center mt-2 mb-2">
                        <div class="mt-3">
                            <h4><?php echo $data['user']->first_name . ' ' . $data['user']->last_name; ?></h4>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-4">
                        <h6>First Name</h6>
                    </div>
                    <div class="col-sm-8 text-secondary">
                        <?php echo $data['user']->first_name; ?>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-4">
                        <h6>Last Name</h6>
                    </div>
                    <div class="col-sm-7 text-secondary">
                        <?php echo $data['user']->last_name; ?>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-4">
                        <h6>Email</h6>
                    </div>
                    <div class="col-sm-8 text-secondary">
                        <?php echo $data['user']->edu_mail; ?>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-4">
                        <h6>Password</h6>
                    </div>
                    <div class="col-sm-8 text-secondary">
                        <a href="#" id="change-password">Change Password</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-7">
            <div class="mt-2 mb-2 overflow" style="max-height: 40%; overflow-x: hidden;">
                <div class="row d-flex align-items-center justify-content-center">

                    <?php if (count($data['posts']) == 0) : ?>
                        <h4 class="border border-dark rounded p-4 text-center">You do not create any post yet</h4>
                    <?php endif; ?>

                    <?php foreach ($data['posts'] as $post) : ?>
                        <div class="col-sm-9 mb-3">
                            <div class="card">
                                <div class="d-flex justify-content-between p-2 px-3">
                                    <div class="d-flex flex-row align-items-center"> <img src="https://bootdey.com/img/Content/avatar/avatar7.png" width="40" class="rounded-circle">
                                        <div class="d-flex flex-column"> <span class="font-weight-bold"><?php echo $post->title; ?></span>
                                            <small class="text-primary">Category: <?php echo $post->category; ?></small>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-row mt-1 ellipsis"> <small class="mr-2"><?php echo $post->created_time; ?></small></div>
                                </div>
                                <div class="text-center">
                                    <img src="<?php echo $post->img_link; ?>" width="50%" height="auto" class="img-fluid text-center py-3">
                                </div>
                                <div class="px-5 py-2">
                                    <p style="text-align: justify;"><?php echo $post->body; ?></p>
                                    <hr>
                                    <div class="row ">
                                        <div class="col-sm up-down-vote-icon "> <?php echo $data['up-count'][$post->post_id]; ?> <i class="fa-solid fa-arrow-up "></i></div>
                                        <div class="col-sm up-down-vote-icon"> <?php echo $data['down-count'][$post->post_id]; ?> <i class="fa-solid fa-arrow-down "></i></div>
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


<?php require APPROOT . '/views/inc/footer.php'; ?>