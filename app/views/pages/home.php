<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require_once APPROOT . '/views/inc/navbar.php'; ?>

<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/home.css">

<body>
    <div class="row mt-3" style="display: flex;justify-content: space-between;">
        <!-- <div class=""> -->
        <div class="col-sm-1"></div>
        <div class="col-sm-2">
            <div class="card ">
                <div class="card-body py-0">
                    <h1 class="text-center text-primary" style="font-size:500% ;"><?php echo $data['total_post']; ?></h1>
                    <h3 class="text-center">Posts</h3>
                    <hr>
                </div>
            </div>
        </div>

        <div class="col-sm-2">
            <div class="card">
                <div class="card-body py-0">
                    <h1 class="text-center text-success" style="font-size:500% ;"><?php echo $data['total_solved']; ?></h1>
                    <h3 class="text-center">Solved</h3>
                    <hr>
                </div>
            </div>
        </div>
        <div class="col-sm-2">
            <div class="card">
                <div class="card-body py-0">
                    <h1 class="text-center text-danger" style="font-size:500% ;"><?php echo $data['total_unsolved']; ?></h1>
                    <h3 class="text-center">Unsolved</h>
                        <hr>
                </div>
            </div>
        </div>
        <div class="col-sm-1"></div>
        <!-- </div> -->
    </div>
    <div class="row gutters-sm">
        <div class="col-md-2 mt-4 pe-5">
            <div class="card card-body mb-4 mt-4 bg-secondary">
                <div class="row d-flex flex-column align-items-center text-center card-font-color mb-1 mt-1">
                    <h3><?php echo $data['total_post']; ?></h3>
                    <h5>Posts</h5>
                </div>
            </div>
            <div class="card card-body mb-4 bg-success">
                <div class="row d-flex flex-column align-items-center text-center card-font-color mb-1 mt-1">
                    <h3><?php echo $data['total_solved']; ?></h3>
                    <h5>Solved</h5>
                </div>
            </div>
            <div class="card card-body bg-danger">
                <div class="row d-flex flex-column align-items-center text-center card-font-color mb-1 mt-1">
                    <h3><?php echo $data['total_unsolved']; ?></h3>
                    <h5>Unsolved</h5>
                </div>
            </div>
        </div>
        <div class="col-md-10 mt-5 p-2 bg-light">
            <h2 class="text-center" style="font-family: Penna; color:#6f42c1;"><b><i>Trending Board</i></b></h2>
            <hr>
            <div class="row text-center">
                <div class="col-sm trending-heading">No</div>
                <div class="col-sm trending-heading">Title</div>
                <div class="col-sm trending-heading">Category</a></div>
                <div class="col-sm trending-heading">Upvote</a></div>
                <div class="col-sm trending-heading">Downvote</a></div>
                <div class="col-sm trending-heading">See Post</a></div>
            </div>
            <hr>
        </div>
    </div>
</body>

<?php require APPROOT . '/views/inc/footer.php'; ?>