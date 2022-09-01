<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require_once APPROOT . '/views/inc/navbar.php'; ?>
<style>
    .button-background-color {
        background-color: #293462;
        color: white;
    }
</style>

<?php require_once APPROOT . '/views/inc/navbar.php'; ?>

<div class="container">
    <h1 style="margin-top: 1.4%;">Title : <?php echo $data['post']->title; ?></h1>
    <div class="card bg-secondary text-white p-2 mb-3">
        Written on <?php echo $data['post']->created_time; ?>
    </div>
    <div class="card bg-secondary text-white p-2 mb-3">
        <!-- Categories: <?php echo $data['post']->created_time; ?> -->
        Categories:
    </div>
    <textarea disabled name="body" class="form-control form-control-lg  <?php echo (!empty($data['body_err'])) ? 'is-invalid' : ''; ?>" rows="7">
    <?php echo $data['post']->body; ?></textarea>
    <span class="invalid-feedback"><?php echo $data['body_err']; ?></span>
    <?php if ($data['post']->user_id == $_SESSION['user_id']) : ?>
        <div class="row mb-3">
            <div class="col-lg-4 mt-3 mb-2">
                <a href="<?php echo URLROOT; ?>/posts" class="btn w-100 button-background-color"><i class="fa fa-backward"></i> Back to Posts</a>
            </div>
            <div class="col-lg-4 mt-3 mb-2">
                <a href="<?php echo URLROOT; ?>/posts/edit/<?php echo $data['post']->post_id; ?>" class="btn w-100 button-background-color"><i class="fa-solid fa-pen"></i> Edit Post</a>
            </div>
            <div class="col-lg-4 mt-3 mb-2">
                <form class="float-right" action="<?php echo URLROOT; ?>/posts/delete/<?php echo $data['post']->post_id; ?>" method="post">
                    <button type="submit" name="submit" class="btn button-background-color w-100"><i class="fa-solid fa-trash"></i> Delete Post
                    </button>
                </form>
            </div>
        </div>
    <?php endif; ?>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>