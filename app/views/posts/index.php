<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require_once APPROOT . '/views/inc/navbar.php'; ?>

<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/post.css">

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
                <div class="col-md-8 mb-3">
                    <div class="card">
                        <div class="d-flex justify-content-between p-2 px-3">
                            <div class="d-flex flex-row align-items-center">
                                <div class="d-flex flex-column"> <span class="font-weight-bold">Title: <?php echo $post->title; ?> </span>
                                    <small class="text-primary">Category: <?php echo $post->category; ?></small>
                                </div>
                            </div>
                            <div>
                                <div class="d-flex flex-row mt-1 ellipsis"> <small class="mr-2"><?php echo $post->created_time; ?></small></div>
                                <div class="text-muted"><small><i class="fa-solid fa-eye"></i> <?php echo $data['view-count'][$post->post_id]; ?> views</small></div>
                            </div>
                        </div>
                        <div class="text-center">
                            <img src="<?php echo $post->img_link; ?>" width="50%" height="auto" class="img-fluid text-center py-3">
                        </div>
                        <div class="px-5 py-2">
                            <p class="body-text"><?php echo $post->body; ?></p>
                            <hr>
                            <div class="row ">

                                <div class="col-sm up-down-vote-icon "><b id="up-count"><?php echo $data['up-count'][$post->post_id]; ?></b><a id="up" onclick="like(this.parentNode.parentNode,<?php echo $post->post_id; ?>)" class="btn btn-sm <?php echo (empty($data['up-votes'][$post->post_id])) ? 'btn-outline-success' : 'btn-success'; ?> ms-2"><i class="fa-solid fa-arrow-up "></i></a></div>
                                <div class="col-sm up-down-vote-icon"><b id="down-count"><?php echo $data['down-count'][$post->post_id]; ?></b><a id="down" onclick="dislike(this.parentNode.parentNode,<?php echo $post->post_id; ?>)" class="btn btn-sm <?php echo (empty($data['down-votes'][$post->post_id])) ? 'btn-outline-danger' : 'btn-danger'; ?> ms-2"><i class="fa-solid fa-arrow-down"></i> </a></div>

                                <?php if ($post->user_id != $_SESSION['user_id']) : ?>
                                    <div class="col-sm text-center"><a href="#" class="btn btn-sm text-danger"><b>Report</b></a></div>
                                <?php endif; ?>

                                <div class="col-sm text-center"><a href="<?php echo URLROOT; ?>/posts/show/<?php echo $post->post_id; ?>" class="btn btn-sm text-primary"><b>More</b></a></div>

                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>
    </div>

</div>
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
</script>


<?php require APPROOT . '/views/inc/footer.php'; ?>