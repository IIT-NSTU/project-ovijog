<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require_once APPROOT . '/views/inc/navbar.php'; ?>
<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/post.css">
<style>
    .btn-hover :hover {
        padding: 0px;
        background-color: green;
        color: white;
    }
</style>
<div class="container mt-2 mb-2">
    <div class="row d-flex align-items-center justify-content-center">

        <div class="col-md-8 mb-3">
            <div class="card">
                <div class="d-flex justify-content-between p-2 px-3">
                    <div class="d-flex flex-row align-items-center"><img src="https://bootdey.com/img/Content/avatar/avatar7.png" width="40" class="rounded-circle">
                        <div class="d-flex flex-column"><span class="font-weight-bold"><?php echo $data['post']->title; ?></span>
                            <small class="text-primary">Category: <?php echo $data['post']->category; ?></small>
                        </div>
                    </div>
                    <div class="d-flex flex-row mt-1 ellipsis"><small class="mr-2"><?php echo $data['post']->created_time; ?></small></div>
                </div>
                <div class="text-center">
                    <img src="<?php echo $data['post']->img_link; ?>" width="50%" height="auto" class="img-fluid text-center py-3">
                </div>
                <div class="px-5 py-2">
                    <p class="body-text"><?php echo $data['post']->body; ?></p>
                    <hr>
                    <div class="row py-1">

                        <div class="col-sm up-down-vote-icon ">
                            <b id="up-count"><?php echo $data['up-count']; ?></b>
                            <a id="up" onclick="like(this.parentNode.parentNode,<?php echo $data['post']->post_id; ?>)" class="btn btn-sm <?php echo (!$data['up-voted']) ? 'btn-outline-success' : 'btn-success'; ?> ms-2"><i class="fa-solid fa-arrow-up "></i></a>
                        </div>
                        <div class="col-sm up-down-vote-icon">
                            <b id="down-count"><?php echo $data['down-count']; ?></b>
                            <a id="down" onclick="dislike(this.parentNode.parentNode,<?php echo $data['post']->post_id; ?>)" class="btn btn-sm <?php echo (!$data['down-voted']) ? 'btn-outline-danger' : 'btn-danger'; ?> ms-2"><i class="fa-solid fa-arrow-down"></i></a>
                        </div>

                        <?php if ($data['post']->user_id == $_SESSION['user_id']) : ?>
                            <div class="col-sm text-center">
                                <a href="#" class="btn btn-sm text-success"><b>Solved</b></a>
                            </div>
                            <div class="col-sm text-center"><a href="<?php echo URLROOT; ?>/posts/edit/<?php echo $data['post']->post_id; ?>" class="btn btn-sm text-primary"><b>Edit</b></a>
                            </div>
                            <div class="col-sm text-center"><a href="<?php echo URLROOT; ?>/posts/delete/<?php echo $data['post']->post_id; ?>" class="btn btn-sm text-danger"><b>Remove</b></a>
                            </div>

                        <?php else : ?>
                            <div class="col-sm text-center"><a href="#" class="btn btn-sm text-danger"><b>Report</b></a>
                            </div>
                        <?php endif; ?>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-10 mb-2 mt-2">
                            <input id="comment-text" type="text" class="form-control comment-text" placeholder="Write Comment">
                        </div>
                        <div class="col-sm-2">
                            <a onclick="comment(this.parentNode.parentNode,<?php echo $data['post']->post_id; ?>)" class="btn btn-sm btn-primary mb-2 mt-2" style="border-radius:10px;">Comment</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--comments-->
        <div id="comments" class="row d-flex align-items-center justify-content-center">
            <?php foreach ($data['comments'] as $comment) : ?>
                <div class="col-md-8 mb-3">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between p-2 px-3">
                            <div class="d-flex flex-row mt-1 ellipsis">
                                <small class="mr-2"><?php echo $comment->created_time; ?></small>
                            </div>
                        </div>
                        <div class="px-5 py-2">
                            <p class="body-text"><?php echo $comment->comment; ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

    </div>
</div>

<script>
    function comment(d, post_id) {

        var commentText = d.querySelector("#comment-text").value;

        if (commentText !== "") {

            var data = {};

            data['comment'] = commentText;

            $.ajax({
                url: '<?php echo URLROOT; ?>/posts/comment/' + post_id,
                type: 'post',
                data: data,
                dataType: 'json',
                success: function(s) {
                    d.querySelector("#comment-text").value = "";
                    console.log(s);

                    $('#comments').prepend('<div class="col-md-8 mb-3 comment"> ' +
                        '<div class="card"> ' +
                        '<div class="card-header d-flex justify-content-between p-2 px-3"> ' +
                        '<div class="d-flex flex-row mt-1 ellipsis"> ' +
                        '<small class="mr-2">' + s.created_time + '</small>' +
                        '</div>' +
                        '</div>' +
                        '<div class="px-5 py-2"> ' +
                        '<p class="body-text">' + s.comment + '</p> </div> </div> </div>');
                    $('.comment').first().hide();
                    $('.comment').first().show('slow');

                },
                error: function(err) {
                    console.log(err);
                }
            });

        } else {

        }


    }

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