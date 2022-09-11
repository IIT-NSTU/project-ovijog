<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require_once APPROOT . '/views/inc/navbar.php'; ?>
<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/profile.css">
<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/post.css">

<!-----------------Change Password modal start------------------------->
<div class="modal fade" id="staticBackdrop2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="staticBackdropLabel">Change Password</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="#" class="needs-validation" novalidate="" autocomplete="off">
                    <div class="mb-3">
                        <label class="mb-2 text-muted" for="password">Old Password</label>
                        <input id="password" type="password" class="form-control" name="password" value="" required autofocus>
                    </div>

                    <div class="mb-3">
                        <label class="mb-2 text-muted" for="password-confirm">New Password</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirm" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-sm" style="background-color: #293462; color:white;">Change Password</button>
            </div>
        </div>
    </div>
</div>
<!-----------------Change Password modal end------------------------->
<div class="main-body">
    <div class="row">

        <div class="col-md-5 d-flex flex-row" style="position: fixed;">
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
                        <!-- <a href="<?php echo URLROOT; ?>/users/changePassword/<?php echo $data['user']->user_id; ?>" id="change-password">Change Password</a> -->
                        <button class="btn btn-sm text-primary ps-0" data-bs-toggle="modal" data-bs-target="#staticBackdrop2"><b>Change Password</b>
                    </div>
                </div>
            </div>
        </div>

        <div class=" col-sm-7 d-flex" style="margin-left: 35%">

            <div class="mt-2 mb-2">
                <div class="row d-flex align-items-center justify-content-end">

                    <?php if (count($data['posts']) == 0) : ?>
                        <h4 class="border border-dark rounded p-4 text-center mt-5">You do not create any post yet</h4>
                    <?php endif; ?>

                    <?php foreach ($data['posts'] as $post) : ?>
                        <div class="col-sm-9 mb-3">
                            <div class="card">
                                <div class="d-flex justify-content-between p-2 px-3">
                                    <div class="d-flex flex-row align-items-center">
                                        <div class="d-flex flex-column"> <span class="font-weight-bold">Title: <?php echo $post->title; ?></span>
                                            <small class="text-primary">Category: <?php echo $post->category; ?></small>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="d-flex flex-row mt-1 ellipsis"> <small class="mr-2 text-muted"><?php echo $post->created_time; ?></small></div>
                                        <?php if ($post->issolved) : ?>
                                            <div class="text-success"><small><i class="fa-solid fa-circle-check"></i> Solved
                                                </small></div>
                                        <?php endif; ?>
                                    </div>

                                </div>
                                <div class="text-center">
                                    <img src="<?php echo $post->img_link; ?>" width="50%" height="auto" class="img-fluid text-center py-3">
                                </div>
                                <div class="px-5 py-2">
                                    <p style="text-align: justify;"><?php echo $post->body; ?></p>
                                    <hr>
                                    <div class="row ">
                                        <div class="col-sm up-down-vote-icon py-1">
                                            <b id="up-count"><?php echo $data['up-count'][$post->post_id]; ?></b><a id="up" onclick="like(this.parentNode.parentNode,<?php echo $post->post_id; ?>)" class="btn btn-sm <?php echo (empty($data['up-votes'][$post->post_id])) ? 'btn-outline-success' : 'btn-success'; ?> ms-2"><i class="fa-solid fa-arrow-up "></i></a>
                                        </div>
                                        <div class="col-sm up-down-vote-icon">
                                            <b id="down-count"><?php echo $data['down-count'][$post->post_id]; ?></b>
                                            <a id="down" onclick="dislike(this.parentNode.parentNode,<?php echo $post->post_id; ?>)" class="btn btn-sm <?php echo (empty($data['down-votes'][$post->post_id])) ? 'btn-outline-danger' : 'btn-danger'; ?> ms-2"><i class="fa-solid fa-arrow-down"></i>
                                            </a>
                                        </div>
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