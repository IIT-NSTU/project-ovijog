<?php require APPROOT . '/views/inc/header.php'; ?>
<style>
    .button-background-color {
        /* background-color: #0752c1; */
        background-color: #5c6f8c;
        color: white;
    }

    .star-color {
        color: red;
    }

    .create-post-heading {
        /* background-color: #c9d6e6; */
        background-color: #dae1e9;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 55px;
    }
</style>
<div class="container ">

    <div class="card mt-5 create-post-heading">
        <div>
            <h3 class="text-center mb-0"><i class="fa-solid fa-pencil"></i> Create New Post</h2>
        </div>
    </div>
    <div class="card card-body mt-4 bg-light">
        <form action="<?php echo URLROOT; ?>/posts/add" method="post">
            <div class="row">
                <div class="col">
                    <div class="form-group mb-4">
                        <label for="title" class="mb-2"><b>Title:</b> <sup class="star-color">*</sup></label>
                        <input type="text" name="title" class="form-control <?php echo (!empty($data['title_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['title']; ?>">
                        <span class="invalid-feedback"><?php echo $data['title_err']; ?></span>
                    </div>
                    <div class="form-group mb-4">
                        <label for="exampleFormControlSelect1" class="mb-2"><b>Category:</b><sup class="star-color">*</sup></label>
                        <select class="form-control" id="exampleFormControlSelect1">
                            <option>Residence</option>
                            <option>Transport</option>
                            <option>Water</option>
                            <option>Electricity</option>
                            <option>Safety</option>
                            <option>Eve Teasing</option>
                            <option>Food</option>
                            <option>Ragging</option>
                            <option>Political</option>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="title" class="mb-2"><b>Photo:</b></label>
                        <div class="row">
                            <div class="col-9">
                                <input type="file" name="image_file" data-input="false" data-classIcon="icon-plus" data-buttonText="Your label here." class="form-control">
                            </div>
                            <div class="col">
                                <input type="submit" name="submit" class="btn button-background-color" value="Upload">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="body" class="mb-2"><b>Body:</b> <sup class="star-color">*</sup></label>
                        <textarea name="body" class="form-control form-control-lg  <?php echo (!empty($data['body_err'])) ? 'is-invalid' : ''; ?>" rows="7">
                    <?php echo $data['body']; ?>
                </textarea>
                        <span class="invalid-feedback"><?php echo $data['body_err']; ?></span>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6 mt-3 mb-2">
                    <a href="Dashboard.php" class="btn w-100 button-background-color"><i class="fas fa-arrow-left"></i> Back to Dashboard</a>
                </div>
                <div class="col-lg-6 mt-3 mb-2">
                    <button type="button" name="Submit" class="btn button-background-color w-100"> <i class="fas fa-check"></i> Publish</button>
                </div>
            </div>
        </form>
    </div>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>