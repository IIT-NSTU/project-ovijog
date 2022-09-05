<?php require APPROOT . '/views/inc/header.php'; ?>

<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/post.css">

<style>
    .button-background-color {
        background-color: #293462;
        color: white;
    }

    #create-post-button {
        height: 40px;
    }

    #create-post-button-div {
        display: flex;
        flex-direction: row;
        justify-content: flex-end;
        align-items: center;
    }

    .up-down-vote-icon {
        display: flex;
        align-items: center;
        justify-content: center;
        align-content: stretch;
    }

    .body-text {
        text-align: justify;
    }

    .icon-text {
        font-size: 20px;
    }
</style>

<?php require_once APPROOT . '/views/inc/navbar.php'; ?>


<?php flash('post_message'); ?>
<div class="container">
    <div class="row mb-3 mt-3">
        <div class="col-md-6">
            <h1>Posts</h1>
        </div>
        <div class="col-md-6" id="create-post-button-div">
            <a href="<?php echo URLROOT; ?>/posts/add" id="create-post-button" class="btn button-background-color float-right">
                <i class="fa-solid fa-pencil"></i> Create New Post
            </a>
        </div>
    </div>

    <div class="container mt-2 mb-2">
        <div class="row d-flex align-items-center justify-content-center">

            <?php foreach ($data['posts'] as $post) : ?>
                <div class="col-md-8">
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
<?php require APPROOT . '/views/inc/footer.php'; ?>