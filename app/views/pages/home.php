<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require_once APPROOT . '/views/inc/navbar.php'; ?>

<!-- <div class="container">
    <h1><?php echo $data['title'] ?></h1>
</div> -->
<div class="container mt-5">
    <!-- <h1><?php echo $data['title'] ?></h1> -->


    <div class="row">


        <div class="col-sm-4">
            <div class="form-group mb-4">
                <label for="title" class="mb-2"><b>Title:</b> <sup class="star-color">*</sup></label>
                <div class="card" style="width: 12rem;">
                    <!-- <img src="..." class="card-img-top" alt="..."> -->
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title</p>

                    </div>
                </div>
            </div>
            <div class="form-group mb-4">
                <label for="exampleFormControlSelect1" class="mb-2"><b>Category:</b><sup class="star-color">*</sup></label>

            </div>
            <div class="form-group mb-3">
                <!-- <label for="title" class="mb-2"><b>Photo:</b></label> -->
                <label for="formFileMultiple" class="form-label mb-2"><b>Photo:</b></label>

            </div>
        </div>
        <div class="col-sm-8">
            <div class="form-group">
                <label for="body" class="mb-2"><b>Body:</b> <sup class="star-color">*</sup></label>

            </div>
        </div>
    </div>

</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>