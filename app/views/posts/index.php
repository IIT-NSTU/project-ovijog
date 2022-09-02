<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require_once APPROOT . '/views/inc/navbar.php'; ?>

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

    <?php foreach ($data['posts'] as $post) : ?>
        <div class="card card-body shadow p-3 mb-5 bg-white rounded">
            <h4 class="card-title"><?php echo $post->title; ?></h4>
            <!-- <div class="bg-light p-1 mb-3">
                Written by
                    <!-- <?php echo $post->name; ?> on <?php echo $post->postTime; ?>  -->
            <!-- </div> -->
            <div class="bg-light p-1 mb-3">
                Written on
                <!--code for time access -->
            </div>
            <p class="card-text"><?php echo $post->body; ?></p>
            <a href="<?php echo URLROOT; ?>/posts/show/<?php echo $post->post_id; ?>" class="btn btn-dark">More</a>
        </div>
    <?php endforeach; ?>
</div>


<?php require APPROOT . '/views/inc/footer.php'; ?>