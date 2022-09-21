<?php require APPROOT . '/views/inc/header.php'; ?>
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
<?php require_once APPROOT . '/views/inc/navbar.php'; ?>
<?php require_once APPROOT . '/views/inc/sidebar.php'; ?>

<!-----------------Delete User modal start------------------------->
<div id="modal-here"></div>
<!-----------------Delete User modal end------------------------->

<div class="main py-5" style="margin-left:173px;">
    <?php flash('admin'); ?>
    <div class="card" style="width: 100%;">
        <div class="card-header">
            <div class="row">
                <div class="col col-md-6">
                    <i class="fas fa-table me-1"></i> <span class="table-head">Manage Users</span>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table my-4 cell-border pt-3 table-striped">
                <thead>
                    <tr>
                        <th class="text-center">User ID</th>
                        <th class="text-center">First Name</th>
                        <th class="text-center">Last Name</th>
                        <th class="text-center">User email</th>
                        <th class="text-center">Verified</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data['users'] as $user) : ?>
                        <tr class="text-center">
                            <td class="tableDataWrap"><?php echo $user->user_id; ?></td>
                            <td class="tableDataWrap"><?php echo $user->first_name; ?></td>
                            <td class="tableDataWrap"><?php echo $user->last_name; ?></td>
                            <td class="tableDataWrap"><?php echo $user->edu_mail; ?></td>
                            <td class="tableDataWrap"><?php echo ($user->isverified) ? 'True' : 'False'; ?></td>
                            <td class="d-flex justify-content-around tableDataWrap">
                                <button onclick="removeUser(<?php echo $user->user_id; ?>)" class="btn btn-sm text-danger"><b>Remove User</b>
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

    function removeUser(user_id) {
        $('#modal-here').html("<div class='modal fade' id='removeUser' data-bs-backdrop='static' data-bs-keyboard='false' tabindex='-1' aria-labelledby='staticBackdropLabel' aria-hidden='true'>" +
            "<div class='modal-dialog'>" +
            "<div class='modal-content'>" +
            "<div class='modal-header'>" +
            "<h6 class='modal-title' id='staticBackdropLabel'>Delete Confirmation</h6>" +
            "<button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>" +
            "</div>" +
            " <div class='modal-body'>" +
            " Are you sure you want to remove this user?" +
            "</div>" +
            "<div class='modal-footer'>" +
            "<button type='button' class='btn btn-sm btn-secondary' data-bs-dismiss='modal'>Close</button>" +
            "<a href='<?php echo URLROOT; ?>/admins/deleteUser/" + user_id + "' class='btn btn-sm text-danger'>" +
            "<b>Delete</b></a>" +
            "</div>" +
            "</div>" +
            "</div>" +
            "</div>");

        $('#removeUser').modal('toggle');
    }
</script>

<?php require APPROOT . '/views/inc/footer.php'; ?>