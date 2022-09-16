<?php foreach ($data['posts'] as $post) : ?>
    <div class="col-sm-9 mb-3">
        <div class="card">
            <div class="d-flex justify-content-between p-2 px-3">
                <div class="d-flex flex-row align-items-center">
                    <div class="d-flex flex-column"><span class="font-weight-bold">Title: <?php echo $post->title; ?></span>
                        <small class="text-primary">Category: <?php echo $post->category; ?></small>
                    </div>
                </div>
                <div>
                    <div class="d-flex flex-row mt-1 ellipsis"><small class="mr-2 text-muted"><?php echo $post->created_time; ?></small>
                    </div>
                    <?php if ($post->issolved) : ?>
                        <div class="text-success"><small><i class="fa-solid fa-circle-check"></i> Solved
                            </small></div>
                    <?php endif; ?>
                </div>

            </div>
            <div class="text-center">
                <img src="<?php echo $post->img_link; ?>" width="50%" height="auto" class="img-fluid text-center py-3">
            </div>
            <div class="px-5 py-2">
                <p style="text-align: justify;"><?php echo $post->body; ?></p>
                <hr class="my-0">
                <div class="row ">
                    <div class="col-sm up-down-vote-icon">
                        <b id="up-count"><?php echo $data['up-count'][$post->post_id]; ?></b><span id="up" class="btn btn-sm ms-2"><i class="fa-solid fa-arrow-up "></i></span>
                    </div>
                    <div class="col-sm up-down-vote-icon">
                        <b id="down-count"><?php echo $data['down-count'][$post->post_id]; ?></b>
                        <span id="down" class="btn btn-sm ms-2"><i class="fa-solid fa-arrow-down"></i>
                                            </span>
                    </div>
                    <div class="col-sm text-center">
                        <a href="<?php echo URLROOT; ?>/posts/show/<?php echo $post->post_id; ?>" class="btn btn-sm text-primary" style="padding-top: 6px;">More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>