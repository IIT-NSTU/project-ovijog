<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require_once APPROOT . '/views/inc/navbar.php'; ?>

<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/home.css">
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


    h6 {
        color: #386fa7;
    }

    .row {
        display: flex;
        flex-wrap: wrap;
    }

    .flip-main .flip-card {
        flex: 0 0 calc(33.33% - 30px);
        /* margin: 0 15px 30px; */
        perspective: 1000px;
        /*remove this if you dont want the 3d effect*/
    }

    .flip-main .flip-card-inner {
        /* box-shadow: 0 0 10px #a9b3d6; */
        position: relative;
        transform-style: preserve-3d;
        transition: all 1s ease;
    }

    .flip-main .flip-card-front img {
        width: 100%;
    }

    .flip-main .flip-card-front,
    .flip-main .flip-card-back {
        backface-visibility: hidden;
    }

    .flip-main .flip-card-back {
        background-color: #6e0ec5;
        position: absolute;
        left: 0;
        top: 0;
        padding: 15px;
        width: 100%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        transform: rotateY(180deg);
    }

    .flip-main .flip-card:hover .flip-card-inner {
        transform: rotateY(180deg);
    }

    /*responsive*/
    @media(max-width: 991px) {
        .flip-main .flip-card {
            flex: 0 0 calc(50% - 30px);
        }
    }

    @media(max-width: 767px) {
        .flip-main .flip-card {
            flex: 0 0 calc(100% - 30px);
        }
    }
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

    <!-- Top Popular Posts Start-->
    <div class="row " style="display: flex;justify-content: space-around; margin-top:-24px">

        <div class="col-md-10 mt-5 p-2">
            <h2 class="text-center" style="font-family: Penna;"><b>Top Popular Posts</b></h2>
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
    <!-- Top popular Post End -->

    <!-- Top Unsolved Posts Start-->
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
    <!-- Top unsolved Post End -->
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