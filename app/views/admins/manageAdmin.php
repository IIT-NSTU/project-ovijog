<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require_once APPROOT . '/views/inc/navbar.php'; ?>
<?php require_once APPROOT . '/views/inc/sidebar.php'; ?>
<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/sidebar.css">
<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/admin.css">

<!-----------------Add New Admin Modal start------------------------->
<div class="modal fade" id="addAdminModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="staticBackdropLabel">Add New Admin</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Enter new admin user_id:
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
        <div class="card" style="width: 100%;">
            <div class="card-header">
                <div class="row">
                    <div class="col col-md-6">
                        <i class="fas fa-table me-1"></i> <span class="table-head">Manage Admin</span>
                    </div>
                    <div class="col col-md-6" align="right">
                        <button class="btn btn-sm text-primary" data-bs-toggle="modal" data-bs-target="#addAdminModal"><b><i class="fa-solid fa-plus"></i> Add Admin</b>
                        </button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered my-4">
                    <thead>
                        <tr class="text-center">
                            <th>#</th>
                            <th>Admin Name</th>
                            <th style="width:30% ;">Admin email</th>
                            <th>Added By</th>
                            <th>Removed By</th>
                            <th style="width: 10%;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="text-center">
                            <td>1</td>
                            <td>Md Alamin</td>
                            <td>alamin2514@student.nstu.edu.bd</td>
                            <td>Armanur Rashid
                            </td>
                            <td>-</td>
                            <td class="d-flex justify-content-around"><button title="Delete Post" class="btn btn-sm text-danger" style="font-size: 15px;"><b>X</b></button></td>
                        </tr>
                        <tr class="text-center">
                            <td>2</td>
                            <td>Admin Name</td>
                            <td>Admin email</td>
                            <td>Admin Name</td>
                            <td>Admin Name</td>
                            <td class="d-flex justify-content-around"><button title="Delete Post" class="btn btn-sm text-danger" style="font-size: 15px;"><b>X</b></button></td>
                        </tr>
                        <tr class="text-center">
                            <td>3</td>
                            <td>Admin Name</td>
                            <td>Admin email</td>
                            <td>Admin Name</td>
                            <td>Admin Name</td>
                            <td class="d-flex justify-content-around"><button title="Delete Post" class="btn btn-sm text-danger" style="font-size: 15px;"><b>X</b></button></td>
                        </tr>
                        <tr class="text-center">
                            <td>4</td>
                            <td>Admin Name</td>
                            <td>Admin email</td>
                            <td>Admin Name</td>
                            <td>Admin Name</td>
                            <td class="d-flex justify-content-around"><button title="Delete Post" class="btn btn-sm text-danger" style="font-size: 15px;"><b>X</b></button></td>
                        </tr>
                        <tr class="text-center">
                            <td>5</td>
                            <td>Admin Name</td>
                            <td>Admin email</td>
                            <td>Admin Name</td>
                            <td>Admin Name</td>
                            <td class="d-flex justify-content-around"><button title="Delete Post" class="btn btn-sm text-danger" style="font-size: 15px;"><b>X</b></button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

<?php require APPROOT . '/views/inc/footer.php'; ?>