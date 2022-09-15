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

    .line {
        height: 1px;
        width: 45%;
        /* background-color: #e0e0e0; */
        background-color: black;
        margin-top: 10px;
    }

    .or {
        width: 10%;
        font-weight: bold;
    }

    .card-effect:hover {
        /* background-color: #bacad9; */
        background-color: #f1fafe;
    }

    .card-effect {
        /* background-color: #bacad9; */
    }

    h6 {
        color: #386fa7;
    }

    /* hr {
        margin-top: 5px;
        margin-bottom: 5px;
    } */
</style>

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

    <!-- Top Popular Posts -->
    <!-- Online design  -->

    <!-- Online Design  -->
    <div class="row " style="display: flex;justify-content: space-around; margin-top:-24px">

        <div class="col-md-10 mt-5 p-2">
            <h2 class="text-center" style="font-family: Penna;"><b>Top Popular Posts</b></h2>
            <!-- <hr> -->
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
                    <div class="col-sm-4 pb-4">
                        <div class="card">
                            <div class="card-body py-0 card-effect">
                                <h6 class="mb-0 mt-2">Water problem in ASH hall</h6>
                                <div class="d-flex" style="justify-content: space-between;">
                                    <p class="text-muted mb-0"><small>Category: Water</small></p>
                                    <p class="mb-0"> <small class="text-muted">2022-09-15</small></p>
                                </div>
                                <hr class="mb-2">
                                <p> <small>More than 1.8 million people in Bangladesh lack access to an improved water source in Bangladesh lack access to...</small></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 pb-4">
                        <div class="card">
                            <div class="card-body py-0 card-effect">
                                <h6 class="mb-0 mt-2">Water problem in ASH hall</h6>
                                <div class="d-flex" style="justify-content: space-between;">
                                    <p class="text-muted mb-0"><small>Category: Water</small></p>
                                    <p class="mb-0"> <small class="text-muted">2022-09-15</small></p>
                                </div>
                                <hr class="mb-2">
                                <p> <small>More than 1.8 million people in Bangladesh lack access to an improved water source in Bangladesh lack access to...</small></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 pb-4">
                        <div class="card">
                            <div class="card-body py-0 card-effect">
                                <h6 class="mb-0 mt-2">Water problem in ASH hall</h6>
                                <div class="d-flex" style="justify-content: space-between;">
                                    <p class="text-muted mb-0"><small>Category: Water</small></p>
                                    <p class="mb-0"> <small class="text-muted">2022-09-15</small></p>
                                </div>
                                <hr class="mb-2">
                                <p> <small>More than 1.8 million people in Bangladesh lack access to an improved water source in Bangladesh lack access to...</small></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4 pb-4">
                        <div class="card">
                            <div class="card-body py-0 card-effect">
                                <h6 class="mb-0 mt-2">Water problem in ASH hall</h6>
                                <div class="d-flex" style="justify-content: space-between;">
                                    <p class="text-muted mb-0"><small>Category: Water</small></p>
                                    <p class="mb-0"> <small class="text-muted">2022-09-15</small></p>
                                </div>
                                <hr class="mb-2">
                                <p> <small>More than 1.8 million people in Bangladesh lack access to an improved water source in Bangladesh lack access to...</small></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 pb-4">
                        <div class="card">
                            <div class="card-body py-0 card-effect">
                                <h6 class="mb-0 mt-2">Water problem in ASH hall</h6>
                                <div class="d-flex" style="justify-content: space-between;">
                                    <p class="text-muted mb-0"><small>Category: Water</small></p>
                                    <p class="mb-0"> <small class="text-muted">2022-09-15</small></p>
                                </div>
                                <hr class="mb-2">
                                <p> <small>More than 1.8 million people in Bangladesh lack access to an improved water source in Bangladesh lack access to...</small></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 pb-4">
                        <div class="card">
                            <div class="card-body py-0 card-effect">
                                <h6 class="mb-0 mt-2">Water problem in ASH hall</h6>
                                <div class="d-flex" style="justify-content: space-between;">
                                    <p class="text-muted mb-0"><small>Category: Water</small></p>
                                    <p class="mb-0"> <small class="text-muted">2022-09-15</small></p>
                                </div>
                                <hr class="mb-2">
                                <p> <small>More than 1.8 million people in Bangladesh lack access to an improved water source in Bangladesh lack access to...</small></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4 pb-4">
                        <div class="card">
                            <div class="card-body py-0 card-effect">
                                <h6 class="mb-0 mt-2">Water problem in ASH hall</h6>
                                <div class="d-flex" style="justify-content: space-between;">
                                    <p class="text-muted mb-0"><small>Category: Water</small></p>
                                    <p class="mb-0"> <small class="text-muted">2022-09-15</small></p>
                                </div>
                                <hr class="mb-2">
                                <p> <small>More than 1.8 million people in Bangladesh lack access to an improved water source in Bangladesh lack access to...</small></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 pb-4">
                        <div class="card">
                            <div class="card-body py-0 card-effect">
                                <h6 class="mb-0 mt-2">Water problem in ASH hall</h6>
                                <div class="d-flex" style="justify-content: space-between;">
                                    <p class="text-muted mb-0"><small>Category: Water</small></p>
                                    <p class="mb-0"> <small class="text-muted">2022-09-15</small></p>
                                </div>
                                <hr class="mb-2">
                                <p> <small>More than 1.8 million people in Bangladesh lack access to an improved water source in Bangladesh lack access to...</small></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 pb-4">
                        <div class="card">
                            <div class="card-body py-0 card-effect">
                                <h6 class="mb-0 mt-2">Water problem in ASH hall</h6>
                                <div class="d-flex" style="justify-content: space-between;">
                                    <p class="text-muted mb-0"><small>Category: Water</small></p>
                                    <p class="mb-0"> <small class="text-muted">2022-09-15</small></p>
                                </div>
                                <hr class="mb-2">
                                <p> <small>More than 1.8 million people in Bangladesh lack access to an improved water source in Bangladesh lack access to...</small></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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