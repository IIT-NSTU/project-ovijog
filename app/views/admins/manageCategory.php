<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require_once APPROOT . '/views/inc/navbar.php'; ?>
<?php require_once APPROOT . '/views/inc/sidebar.php'; ?>
<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/sidebar.css">
<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/admin.css">

<body>
    <div class="main py-5" style="margin-left:173px;">
        <div class="card" style="width: 65%; margin-left:19%;">
            <div class="card-header">
                <div class="row">
                    <div class="col col-md-6">
                        <i class="fas fa-table me-1"></i> <span class="table-head">Manage Category</span>
                    </div>
                    <div class="col col-md-6" align="right">
                        <a href="author.php?action=add" class="btn btn-success btn-sm">Add Category</a>
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