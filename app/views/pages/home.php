<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require_once APPROOT . '/views/inc/navbar.php'; ?>

<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/home.css">
<style>
    .post-hover:hover {
        background-color: #85aeea;
    }

    .solved-hover:hover {
        background-color: #89dcb6;
    }

    .unsolved-hover:hover {
        background-color: #e2a1a8;
    }
</style>

<body>
    <div class="row mt-3" style="display: flex;justify-content: space-between;">
        <!-- <div class=""> -->
        <div class="col-sm-1"></div>
        <div class="col-sm-2 pb-2">
            <div class="card">
                <div class="card-body py-0 post-hover">
                    <h1 class="count text-center text-primary" style="font-size:500% ;"><?php echo $data['total_post']; ?></h1>
                    <hr class="mt-0 mb-1">
                    <h4 class="text-center">Posts</h4>

                </div>
            </div>
        </div>

        <div class="col-sm-2 pb-2">
            <div class="card counter">
                <div class="card-body py-0 solved-hover">
                    <h1 class="count text-center text-success" style="font-size:500% ;"><?php echo $data['total_solved']; ?></h1>
                    <hr class="mt-0 mb-1">
                    <h4 class="text-center">Solved</h4>

                </div>
            </div>
        </div>
        <div class="col-sm-2 pb-2">
            <div class="card counter">
                <div class="card-body py-0 unsolved-hover">
                    <h1 class="count text-center text-danger" style="font-size:500% ;"><?php echo $data['total_unsolved']; ?></h1>
                    <hr class="mt-0 mb-1">
                    <h4 class="text-center">Unsolved</h4>

                </div>
            </div>
        </div>
        <div class="col-sm-1"></div>
        <!-- </div> -->
    </div>



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
</script>
<?php require APPROOT . '/views/inc/footer.php'; ?>