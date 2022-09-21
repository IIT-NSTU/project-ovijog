<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require_once APPROOT . '/views/inc/navbar.php'; ?>
<?php require_once APPROOT . '/views/inc/sidebar.php'; ?>
<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/sidebar.css">
<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/admin.css">
<style>
    .tableDataWrap {
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .dataTables_wrapper .dataTables_filter input {
        border: 1px solid black;
    }
</style>
<!-----------------Delete Category modal start------------------------->
<div id="modal-here"></div>
<!-----------------Delete Category modal end------------------------->

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
            <table class="table my-4 cell-border pt-3 table-striped">
                <thead>
                    <tr>
                        <th class="text-center">Category Name</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data['categories'] as $category) : ?>
                        <tr class="text-center">
                            <td class="tableDataWrap"><?php echo $category->category; ?></td>
                            <td class="d-flex justify-content-around">
                                <button onclick="removeCategory('<?php echo $category->category; ?>')" class="btn btn-sm text-danger"><b>X</b>
                                </button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('.table').DataTable();
    });

    function removeCategory(category) {
        $('#modal-here').html("<div class='modal fade' id='deleteCategory' data-bs-backdrop='static' data-bs-keyboard='false' tabindex='-1' aria-labelledby='staticBackdropLabel' aria-hidden='true'>" +
            "<div class='modal-dialog'>" +
            "<div class='modal-content'>" +
            "<div class='modal-header'>" +
            "<h6 class='modal-title' id='staticBackdropLabel'>Category Delete Confirmation</h6>" +
            "<button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>" +
            "</div>" +
            " <div class='modal-body'>" +
            " Are you sure you want to delete the category?" +
            "</div>" +
            "<div class='modal-footer'>" +
            "<button type='button' class='btn btn-sm btn-secondary' data-bs-dismiss='modal'>Close</button>" +
            "<a href='<?php echo URLROOT; ?>/admins/removeCategory/" + category + "' class='btn btn-sm text-danger'>" +
            "<b>Delete</b></a>" +
            "</div>" +
            "</div>" +
            "</div>" +
            "</div>");

        $('#deleteCategory').modal('toggle');
    }
</script>

<?php require APPROOT . '/views/inc/footer.php'; ?>