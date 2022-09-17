<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require_once APPROOT . '/views/inc/navbar.php'; ?>
<?php require_once APPROOT . '/views/inc/sidebar.php'; ?>
<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/sidebar.css">
<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/admin.css">

<!-----------------Add Category Modal start------------------------->
<div class="modal fade" id="addCategoryModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="<?php echo URLROOT; ?>/admins/addCategory/" method="post">
                <div class="modal-header">
                    <h6 class="modal-title" id="staticBackdropLabel">Add New Category</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Enter new category name:
                    <input class="form-control mb-1 mt-2" value="" type="text" name="category" required>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-sm btn-success" data-bs-dismiss="modal" value="Add">
                </div>
            </form>
        </div>
    </div>
</div>
<!-----------------Add category Modal end------------------------->


    <div class="main py-5" style="margin-left:173px;">
        <?php flash('admin'); ?>
        <div class="card" style="width: 100%;">
            <div class="card-header">
                <div class="row">
                    <div class="col col-md-6">
                        <i class="fas fa-table me-1"></i> <span class="table-head">Manage Category</span>
                    </div>
                    <div class="col col-md-6" align="right">
                        <button class="btn btn-sm text-primary" data-bs-toggle="modal" data-bs-target="#addCategoryModal"><b><i class="fa-solid fa-plus"></i> Add Category</b>
                        </button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered my-4 cell-border">
                    <thead>
                        <tr class="text-center">
                            <th>Category Name</th>
                            <th style="width: 20%;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data['categories'] as $category): ?>
                            <tr class="text-center">
                                <td><?php echo $category->category; ?></td>
                                <td class="d-flex justify-content-around">
                                    <a href="<?php echo URLROOT; ?>/admins/removeCategory/<?php echo $category->category; ?>" title="Delete Post" class="btn btn-sm text-danger" style="font-size: 15px;">
                                        <b>X</b>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        $(document).ready( function () {
            $('.table').DataTable();
        } );
    </script>

<?php require APPROOT . '/views/inc/footer.php'; ?>