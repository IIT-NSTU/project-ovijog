<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require_once APPROOT . '/views/inc/navbar.php'; ?>

<style>
    .button-background-color {
        background-color: #293462;
        color: white;
    }

    .star-color {
        color: red;
    }

    .create-post-heading {
        background-color: #dae1e9;
        margin-top: 25px;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 55px;
    }
</style>
<div class="container ">
    <div class="card create-post-heading">
        <div>
            <h3 class="text-center mb-0"><i class="fa-solid fa-pen"></i> Edit Post</h3>
        </div>
    </div>

    <div class="card card-body mt-4 mb-4 bg-light">
        <form action="<?php echo URLROOT; ?>/posts/edit/<?php echo $data['post_id']; ?>" method="post">
            <div class="row">
                <div class="col">
                    <div class="form-group mb-4">
                        <label for="title" class="mb-2"><b>Title:</b> <sup class="star-color">*</sup></label>
                        <input type="text" name="title" class="form-control <?php echo (!empty($data['title_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['title']; ?>">
                        <span class="invalid-feedback"><?php echo $data['title_err']; ?></span>
                    </div>
                    <div class="form-group mb-4">
                        <label for="exampleFormControlSelect1" class="mb-2"><b>Category:</b><sup class="star-color">*</sup></label>
                        <select name="category" class="form-control" id="categorySelect">
                            <?php foreach ($data['categories'] as $category) : ?>
                                <option><?php echo $category->category; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="formFileMultiple" class="form-label mb-2"><b>Photo:</b></label>
                        <!-- <div class="row"> -->
                        <!-- <div class="col-12"> -->
                        <input class="form-control" type="file" name="image_file" value="">
                        <!-- </div> -->
                        <!-- </div> -->
                    </div>
                    <div class="form-group mb-3">
                        <label for="tags" class="mb-2"><b>Tags:</b></label>
                        <input class="form-control form-control" name="tags" value="" placeholder=''>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="body" class="mb-2"><b>Body:</b> <sup class="star-color">*</sup></label>
                        <textarea name="body" class="form-control form-control-lg  <?php echo (!empty($data['body_err'])) ? 'is-invalid' : ''; ?>" rows="10"><?php echo $data['body']; ?></textarea>
                        <span class="invalid-feedback"><?php echo $data['body_err']; ?></span>
                    </div>
                </div>
            </div>

            <div class="row mb-2 d-flex" style="justify-content: space-between;">
                <div class="col-lg-1 mt-1">
                    <a href="<?php echo URLROOT; ?>/posts" class="btn button-background-color">Back</a>
                </div>
                <div class="col-lg-1 mt-1">
                    <button type="submit" name="submit" class="btn button-background-color">Post</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    $('#categorySelect').val('<?php echo $data['category']; ?>');
</script>

<?php require APPROOT . '/views/inc/footer.php'; ?>