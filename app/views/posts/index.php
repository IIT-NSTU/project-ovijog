<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require_once APPROOT . '/views/inc/navbar.php'; ?>

<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/post.css">

<style>
    .card-hover:hover {
        background-color: #b4c3d1;
    }
</style>

<?php flash('post_message'); ?>

<div style="position: fixed;">
    <div class="row">
        <div class="col">
            <div class="mb-3" id="create-post-button-div">
                <a href="<?php echo URLROOT; ?>/posts/add" id="create-post-button" class="btn button-background-color mt-2">
                    <i class="fa-solid fa-pencil"></i> Create New Post
                </a>
            </div>
        </div>
    </div>
    <div class="row mt-1">
        <div class="col">
            <div class="card overflow" style="max-height: 79.2%; overflow-x: hidden;">
                <div class="card-body">
                    <h6 class="text-center">Category</h6>
                    <hr>
                    <div>
                        <?php foreach ($data['categories'] as $category) : ?>
                            <div class="pb-2">
                                <input type="checkbox"> <?php echo $category->category; ?></br>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>

<div class="row">
    <div class="col"></div>
    <div style='float:right; width: 180px;'>

        <div class="col-sm-2 overflow mt-2" style="position:fixed ;max-height: 75.2%; overflow-x: hidden;">
            <div class="card shadow-sm rounded bg-white ">
                <div class="card-body pb-1 ">
                    <h6 class="m-0 pb-1 text-center">Notification</h6>
                    <hr>

                    <div class="px-1 card-hover">
                        <small>A new comment on your post <b>Post Title</b></small>
                        <hr>
                    </div>
                    <div class="px-1 card-hover">
                        <small>New vote on your post <b>Post Title</b></small>
                        <hr>
                    </div>
                    <div class="px-1 card-hover">
                        <small>A new comment on your post <b>Post Title</b></small>
                        <hr>
                    </div>
                    <div class="px-1 card-hover">
                        <small>A new comment on your post <b>Post Title</b></small>
                        <hr>
                    </div>
                    <div class="px-1 card-hover">
                        <small>A new comment on your post <b>Post Title</b></small>
                        <hr>
                    </div>
                    <div class="px-1 card-hover">
                        <small>A new comment on your post <b>Post Title</b></small>
                        <hr>
                    </div>
                    <div class="px-1 card-hover">
                        <small>A new comment on your post <b>Post Title</b></small>
                        <hr>
                    </div>
                    <div class="px-1 card-hover">
                        <small>New vote on your post <b>Post Title</b></small>
                        <hr>
                    </div>
                    <div class="px-1 card-hover">
                        <small>New vote on your post <b>Post Title</b></small>
                        <hr>
                    </div>
                    <div class="px-1 card-hover">
                        <small>A new comment on your post <b>Post Title</b></small>
                        <hr>
                    </div>
                    <div class="px-1 card-hover">
                        <small>A new comment on your post <b>Post Title</b></small>
                        <hr>
                    </div>
                    <div class="px-1 card-hover">
                        <small>A new comment on your post <b>Post Title</b></small>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container mt-2 mb-2">
    <div id="data" class="row d-flex align-items-center justify-content-center">

        <!-- All post here ----->

    </div>
</div>


<!-------spinner------->
<div class="d-flex justify-content-center">
    <div id="loading" class="spinner-border m-5" role="status">
        <span class="visually-hidden">Loading...</span>
    </div>
</div>
<!-------spinner end------->

<script>
    function like(d, id) {

        console.log(d.querySelector('#up'));
        console.log(id);

        if (d.querySelector('#up').classList.contains('btn-success')) {
            d.querySelector('#up').classList.replace('btn-success', 'btn-outline-success');
        } else {
            d.querySelector('#up').classList.replace('btn-outline-success', 'btn-success');
        }

        d.querySelector('#down').classList.value = "btn btn-sm btn-outline-danger ms-2";


        $.ajax({
            url: '<?php echo URLROOT; ?>/posts/vote/' + id + '/1',
            type: 'post',
            dataType: 'json',
            success: function(s) {
                console.log(s);
                d.querySelector('#up-count').innerText = s.upCount;
                d.querySelector('#down-count').innerText = s.downCount;
            },
            error: function(err) {
                console.log(err);
            }
        });
    }

    function dislike(d, id) {
        d.querySelector('#up').classList.value = "btn btn-sm btn-outline-success ms-2";

        if (d.querySelector('#down').classList.contains('btn-danger')) {
            d.querySelector('#down').classList.replace('btn-danger', 'btn-outline-danger');
        } else {
            d.querySelector('#down').classList.replace('btn-outline-danger', 'btn-danger');
        }

        $.ajax({
            url: '<?php echo URLROOT; ?>/posts/vote/' + id + '/0',
            type: 'post',
            dataType: 'json',
            success: function(s) {
                console.log(s);
                d.querySelector('#up-count').innerText = s.upCount;
                d.querySelector('#down-count').innerText = s.downCount;
            },
            error: function(err) {
                console.log(err);
            }
        });
    }

    var page_no = 1;
    var isrunning = false;
    var halt = false;
    showMore();

    $(window).scroll(function() {
        if ($(window).scrollTop() + $(window).height() > $(document).height() - 100) {
            if (!isrunning && !halt) {
                showMore();
            }
        }
    });

    function showMore() {
        isrunning = true;
        $('#loading').show();
        $.post('<?php echo URLROOT; ?>/posts/load/' + page_no, {
            page: page_no
        }, (response) => {
            if (response === "") {
                halt = true;
            }
            $('#data').append(response);
            $('#loading').hide();
            isrunning = false;
            page_no++;
        });
    }
</script>


<?php require APPROOT . '/views/inc/footer.php'; ?>