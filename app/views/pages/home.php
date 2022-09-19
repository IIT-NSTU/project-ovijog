<?php require APPROOT . '/views/inc/header.php'; ?>



<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/toTopButton.css">
<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/home.css">

<?php require_once APPROOT . '/views/inc/navbar.php'; ?>

<body>
    <div class="row mt-3" style="display: flex;justify-content: space-between;">

        <div class="col-sm-1"></div>
        <div class="col-sm-3 pb-2">
            <div class="card">
                <div class="card-body py-0 post-hover">
                    <h1 class="count text-center text-primary" style="font-size:500% ;"><?php echo $data['total_post']; ?></h1>
                    <hr class="mt-0 mb-1">
                    <h4 class="text-center">Posts</h4>

                </div>
            </div>
        </div>

        <div class="col-sm-3 pb-2">
            <div class="card counter">
                <div class="card-body py-0 solved-hover">
                    <h1 class="count text-center text-success" style="font-size:500% ;"><?php echo $data['total_solved']; ?></h1>
                    <hr class="mt-0 mb-1">
                    <h4 class="text-center">Solved</h4>

                </div>
            </div>
        </div>
        <div class="col-sm-3 pb-2">
            <div class="card counter">
                <div class="card-body py-0 unsolved-hover">
                    <h1 class="count text-center text-danger" style="font-size:500% ;"><?php echo $data['total_unsolved']; ?></h1>
                    <hr class="mt-0 mb-1">
                    <h4 class="text-center">Unsolved</h4>
                </div>
            </div>
        </div>
        <div class="col-sm-1"></div>
    </div>

    <!-- Top Popular Posts Start-->
    <div class="row " style="display: flex;justify-content: space-around; margin-top:-24px">

        <div class="col-md-10 mt-5 p-2">
            <h2 class="text-center" style="font-family: Penna;"><b>Top Unsolved Posts</b></h2>
        </div>
        <div class="row px-3 mb-4">
            <div class="line"></div>
            <small class="or text-center">***</small>
            <div class="line"></div>
        </div>
    </div>
    <div class="row mt-3" style="display: flex;justify-content: space-between;">
        <div>
            <div>

                <div class="row">

                    <?php foreach ($data['top_unsolved_posts'] as $post) : ?>
                        <div class="col-sm-4 pb-4" onclick="location.href='<?php echo URLROOT; ?>/posts/show/<?php echo $post->post_id; ?>'">
                            <div class="card">
                                <div class="card-body py-0 card-effect">
                                    <h6 class="mb-0 mt-2"><?php echo $post->title; ?></h6>
                                    <div class="d-flex" style="justify-content: space-between;">
                                        <p class="text-muted mb-0"><small>Category: <?php echo $post->category; ?></small></p>
                                        <p class="mb-0"> <small class="text-muted"><?php echo $post->created_time; ?></small></p>
                                    </div>
                                    <hr class="mb-2">
                                    <p> <small><?php echo $post->body; ?></small></p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>

                </div>

            </div>
        </div>
    </div>
    <!-- Top popular Post End -->

    <!-- Top Solved Posts Start-->
    <div class="row " style="display: flex;justify-content: space-around; margin-top:-24px">

        <div class="col-md-10 mt-5 p-2">
            <h2 class="text-center" style="font-family: Penna;"><b>Top Solved Posts</b></h2>
        </div>
        <div class="row px-3 mb-4">
            <div class="line"></div>
            <small class="or text-center">***</small>
            <div class="line"></div>
        </div>
    </div>

    <div class="row mt-3" style="display: flex;justify-content: space-between;">
        <div>
            <div>
                <div class="row">

                    <?php foreach ($data['top_solved_posts'] as $post) : ?>
                        <div class="col-sm-4 pb-4" onclick="location.href='<?php echo URLROOT; ?>/posts/show/<?php echo $post->post_id; ?>'">
                            <div class="card">
                                <div class="card-body py-0 card-effect">
                                    <h6 class="mb-0 mt-2"><?php echo $post->title; ?></h6>
                                    <div class="d-flex" style="justify-content: space-between;">
                                        <p class="text-muted mb-0"><small>Category: <?php echo $post->category; ?></small></p>
                                        <p class="mb-0"> <small class="text-muted"><?php echo $post->created_time; ?></small></p>
                                    </div>
                                    <hr class="mb-2">
                                    <p> <small><?php echo $post->body; ?></small></p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>

                </div>

            </div>
        </div>
    </div>
    <!-- Top unsolved Post End -->

    <a href="#" class="to-top">
        <i class="fas fa-chevron-up"></i>
    </a>
</body>
<script>
    $('.count').each(function() {
        $(this).prop('Counter', 0).animate({
            Counter: $(this).text()
        }, {
            duration: 500,
            easing: 'swing',
            step: function(now) {
                $(this).text(Math.ceil(now));
            }
        });
    });

    const toTop = document.querySelector(".to-top");

    window.addEventListener("scroll", () => {
        if (window.pageYOffset > 100) {
            toTop.classList.add("active");
        } else {
            toTop.classList.remove("active");
        }
    })
</script>
<?php require APPROOT . '/views/inc/footer.php'; ?>