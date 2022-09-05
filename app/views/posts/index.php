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
</style>

<?php require_once APPROOT . '/views/inc/navbar.php'; ?>


<?php flash('post_message'); ?>
<div class="container">
    <div class="row mb-3 mt-3">
        <div class="col-md-6">
            <h1>Posts</h1>
        </div>
        <div class="col-md-6" id="create-post-button-div">
            <a href="<?php echo URLROOT; ?>/posts/add" id="create-post-button" class="btn btn-primary float-right">
                <i class="fa-solid fa-pencil"></i> Create New Post
            </a>
        </div>
    </div>


    <div class="container mt-2 mb-2">
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="d-flex justify-content-between p-2 px-3">
                        <div class="d-flex flex-row align-items-center"> <img src="https://bootdey.com/img/Content/avatar/avatar7.png" width="40" class="rounded-circle">
                            <div class="d-flex flex-column"> <span class="font-weight-bold">Water Problem in
                                    Hall</span>
                                <small class="text-primary">Category: Water</small>
                            </div>
                        </div>
                        <div class="d-flex flex-row mt-1 ellipsis"> <small class="mr-2">20 mins</small></div>
                    </div>
                    <div class="text-center">
                        <img src="<?php echo URLROOT; ?>/img/pen.jpg" width="500" height="auto" class="img-fluid text-center">
                    </div>
                    <div class="p-2">
                        <p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p>
                        <hr>
                        <div class="row">
                            <div class="col-sm-4">
                                <small>5</small>
                                <i class="fa-solid fa-thumbs-up" style="font-size: 30px;"></i>
                            </div>
                            <div class="col-sm-4 text-center">
                                <small>5</small>
                                <i class="fa-solid fa-thumbs-down" style="font-size: 30px;"></i>
                            </div>
                            <div class="col-sm-4 ">
                                <a href="#" class="btn button-background-color">More</a>
                            </div>
                        </div>

                        <!-- <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex flex-row icons d-flex align-items-center"> <small>5</small>
                                <i class="fa-solid fa-thumbs-up"></i>
                                <small>10</small><i class="fa-solid fa-thumbs-down"></i>
                            </div>
                            <div class="d-flex flex-row muted-color"> <span>2 comments</span></div>
                        </div> -->
                        <hr>
                        <div class="comment-input mb-3"> <input type="text" class="form-control" placeholder="Write Comment" style="font-size: 12px;">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <?php require APPROOT . '/views/inc/footer.php'; ?>