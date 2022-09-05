<?php require APPROOT . '/views/inc/header.php'; ?>

    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/post.css">

    <style>
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


<!----------------->
    <div class="container blog-page">
        <div class="row clearfix">

            <div class="col-lg-12 col-md-12">
                <div class="card single_post shadow ">
                    <div class="body bg-light">
                        <h3 class="m-t-0 m-b-5"><a href="blog-details.html">Apple Introduces Search Ads Basic</a></h3>
                        <ul class="meta">
                            <li><a href="javascript:void(0);"><i class="zmdi zmdi-account col-blue"></i>Posted By: John Smith</a></li>
                            <li><a href="javascript:void(0);"><i class="zmdi zmdi-label col-amber"></i>Technology</a></li>
                            <li><a href="javascript:void(0);"><i class="zmdi zmdi-comment-text col-blue"></i>Comments: 3</a></li>
                        </ul>
                    </div>
                    <div class="body">
                        <div class="img-post text-center m-b-15">
                            <img src="https://bootdey.com/img/Content/avatar/avatar5.png" alt="Awesome Image">
                        </div>
                        <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal</p>
                        <a href="blog-details.html" title="read more" class="btn btn-dark">Read More</a>
                    </div>
                    <div class="card-footer">
                        <a href="javascript:void(0)" class="d-inline-block text-muted">
                            <strong>123</strong> Likes</small>
                        </a>
                        <a href="javascript:void(0)" class="d-inline-block text-muted ml-3">
                            <strong>12</strong> Comments</small>
                        </a>
                        <a href="javascript:void(0)" class="d-inline-block text-muted ml-3">
                            <small class="align-middle">Repost</small>
                        </a>
                    </div>
                </div>
            </div>

            <?php foreach ($data['posts'] as $post) : ?>
                <div class="col-lg-12 col-md-12">
                    <div class="card single_post shadow ">
                        <div class="body bg-light">
                            <h3 class="m-t-0 m-b-5"><?php echo $post->title; ?></h3>
                            <ul class="meta">
                                <li><a href="javascript:void(0);"><i class="zmdi zmdi-account col-blue"></i>Posted By: John Smith</a></li>
                                <li><a href="javascript:void(0);"><i class="zmdi zmdi-label col-amber"></i>Technology</a></li>
                                <li><a href="javascript:void(0);"><i class="zmdi zmdi-comment-text col-blue"></i>Comments: 3</a></li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="img-post text-center m-b-15">
                                <img src="<?php echo $post->img_link; ?>" width="50%">
                            </div>
                            <p><?php echo $post->body; ?></p>
                            <a href="<?php echo URLROOT; ?>/posts/show/<?php echo $post->post_id; ?>" title="read more" class="btn btn-dark">Read More</a>
                        </div>
                        <div class="card-footer">
                            <a href="javascript:void(0)" class="d-inline-block text-muted">
                                <strong>123</strong> Likes</small>
                            </a>
                            <a href="javascript:void(0)" class="d-inline-block text-muted ml-3">
                                <strong>12</strong> Comments</small>
                            </a>
                            <a href="javascript:void(0)" class="d-inline-block text-muted ml-3">
                                <small class="align-middle">Report</small>
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <!----------------->

</div>


<?php require APPROOT . '/views/inc/footer.php'; ?>