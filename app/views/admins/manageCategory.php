<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require_once APPROOT . '/views/inc/navbar.php'; ?>
<?php require_once APPROOT . '/views/inc/sidebar.php'; ?>
<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/sidebar.css">
<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/admin.css">

<!-----------------Add Category Modal start------------------------->
<div class="modal fade" id="addCategoryModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="staticBackdropLabel">Add New Category</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Enter new category name:
                <input class="form-control mb-1 mt-2" value="" type="text" name="text">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Close</button>
                <button class="btn btn-sm btn-success" data-bs-dismiss="modal">Add</button>
            </div>
        </div>
    </div>
</div>
<!-----------------Add category Modal end------------------------->

<body>
    <div class="main py-5" style="margin-left:173px;">
        <div class="card" style="width: 65%; margin-left:19%;">
            <div class="card-header">
                <div class="row">
                    <div class="col col-md-6">
                        <i class="fas fa-table me-1"></i> <span class="table-head">Manage Category</span>
                    </div>
                    <div class="col col-md-6" align="right">
                        <button class="btn btn-sm text-primary" data-bs-toggle="modal" data-bs-target="#addCategoryModal"><b>Add Category</b>
                        </button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered my-4">
                    <thead>
                        <tr class="text-center">
                            <th>#</th>
                            <th>Category</th>
                            <th style="width: 20%;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="text-center">
                            <td>1</td>
                            <td>Water</td>
                            <td class="d-flex justify-content-around"><button class="btn btn-sm btn-danger">Delete</button></td>
                        </tr>
                        <tr class="text-center">
                            <td>2</td>
                            <td>Food</td>
                            <td class="d-flex justify-content-around"><button class="btn btn-sm btn-danger">Delete</button></td>
                        </tr>
                        <tr class="text-center">
                            <td>3</td>
                            <td>Transport</td>
                            <td class="d-flex justify-content-around"><button class="btn btn-sm btn-danger">Delete</button></td>
                        </tr>
                        <tr class="text-center">
                            <td>4</td>
                            <td>Security</td>
                            <td class="d-flex justify-content-around"><button class="btn btn-sm btn-danger">Delete</button></td>
                        </tr>
                        <tr class="text-center">
                            <td>5</td>
                            <td>Residence</td>
                            <td class="d-flex justify-content-around"><button class="btn btn-sm btn-danger">Delete</button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

<?php require APPROOT . '/views/inc/footer.php'; ?>