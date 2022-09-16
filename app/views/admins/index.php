<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require_once APPROOT . '/views/inc/navbar.php'; ?>
<?php require_once APPROOT . '/views/inc/sidebar.php'; ?>
<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/sidebar.css">
<style>
    .post-hover:hover {
        background-color: #a6b4c9;
    }

    .solved-hover:hover {
        background-color: #9bdac7;
    }

    .unsolved-hover:hover {
        background-color: #e2a1a8;
    }
</style>

<body>
    <div style="margin-left:173px; margin-top:8%;">
        <div class="row mt-3" style="display: flex;justify-content: space-between;">
            <div class="col-sm-1"></div>
            <div class="col-sm-3 pb-2">
                <div class="card">
                    <div class="card-body py-0 post-hover">
                        <h1 class="count text-center text-primary" style="font-size:500% ;">41</h1>
                        <hr class="mt-0 mb-1">
                        <h4 class="text-center">Users</h4>

                    </div>
                </div>
            </div>

            <div class="col-sm-3 pb-2">
                <div class="card counter">
                    <div class="card-body py-0 solved-hover">
                        <h1 class="count text-center text-success" style="font-size:500% ;">75</h1>
                        <hr class="mt-0 mb-1">
                        <h4 class="text-center">Posts</h4>

                    </div>
                </div>
            </div>
            <div class="col-sm-3 pb-2">
                <div class="card counter">
                    <div class="card-body py-0 unsolved-hover">
                        <h1 class="count text-center text-danger" style="font-size:500% ;">52</h1>
                        <hr class="mt-0 mb-1">
                        <h4 class="text-center">Solved</h4>

                    </div>
                </div>
            </div>

            <div class="col-sm-1"></div>
        </div>
        <div class="row mt-3" style="display: flex;justify-content: space-between;">

            <div class="col-sm-1"></div>
            <div class="col-sm-3 pb-2">
                <div class="card">
                    <div class="card-body py-0 post-hover">
                        <h1 class="count text-center text-primary" style="font-size:500% ;">23</h1>
                        <hr class="mt-0 mb-1">
                        <h4 class="text-center">Unsolved</h4>

                    </div>
                </div>
            </div>

            <div class="col-sm-3 pb-2">
                <div class="card counter">
                    <div class="card-body py-0 solved-hover">
                        <h1 class="count text-center text-success" style="font-size:500% ;">21</h1>
                        <hr class="mt-0 mb-1">
                        <h4 class="text-center">Report</h4>

                    </div>
                </div>
            </div>
            <div class="col-sm-3 pb-2">
                <div class="card counter">
                    <div class="card-body py-0 unsolved-hover">
                        <h1 class="count text-center text-danger" style="font-size:500% ;">7</h1>
                        <hr class="mt-0 mb-1">
                        <h4 class="text-center">Delete</h4>

                    </div>
                </div>
            </div>

            <div class="col-sm-1"></div>
        </div>
    </div>
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
</body>

<?php require APPROOT . '/views/inc/footer.php'; ?>