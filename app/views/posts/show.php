<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require_once APPROOT . '/views/inc/navbar.php'; ?>
<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/post.css">
<div class="container">
    <div class="container mt-2 mb-2">
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-md-8 mb-3">
                <div class="card">
                    <div class="d-flex justify-content-between p-2 px-3">
                        <div class="d-flex flex-row align-items-center"> <img src="https://bootdey.com/img/Content/avatar/avatar7.png" width="40" class="rounded-circle">
                            <div class="d-flex flex-column"> <span class="font-weight-bold"><?php echo $data['post']->title; ?></span>
                                <small class="text-primary">Category: <?php echo $data['post']->category; ?></small>
                            </div>
                        </div>
                        <div class="d-flex flex-row mt-1 ellipsis"> <small class="mr-2"><?php echo $data['post']->created_time; ?></small></div>
                    </div>
                    <div class="text-center">
                        <img src="<?php echo $data['post']->img_link; ?>" width="50%" height="auto" class="img-fluid text-center py-3">
                    </div>
                    <div class="px-5 py-2">
                        <p class="body-text"><?php echo $data['post']->body; ?></p>
                        <hr>
                        <div class="row py-1">
                            <div class="col-sm up-down-vote-icon "><b>50</b> <button class="btn btn-sm btn-outline-success ms-2"><i class="fa-solid fa-arrow-up "></i></button></div>
                            <div class="col-sm up-down-vote-icon"><b>12</b><button class="btn btn-sm btn-outline-danger ms-2"><i class="fa-solid fa-arrow-down"></i> </button></div>

                            <?php if ($data['post']->user_id == $_SESSION['user_id']) : ?>
                                <div class="col-sm text-center"><a href="#" class="btn btn-sm text-primary"><b>Edit</b></a></div>
                                <div class="col-sm text-center"><a href="#" class="btn btn-sm text-danger"><b>Remove</b></a></div>
                            <?php else : ?>
                                <div class="col-sm text-center"><a href="#" class="btn btn-sm text-danger"><b>Report</b></a></div>
                            <?php endif; ?>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-10 mb-2 mt-2">
                                <input type="text" class="form-control comment-text" placeholder="Write Comment">
                            </div>
                            <div class="col-sm-2">
                                <button class="btn btn-sm btn-primary mb-2 mt-2" style="border-radius:10px;">Comment</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php require APPROOT . '/views/inc/footer.php'; ?>