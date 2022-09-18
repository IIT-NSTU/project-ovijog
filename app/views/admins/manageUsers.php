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
</style>


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
                <table class="table my-4 cell-border">
                    <thead>
                        <tr class="text-center">
                            <th>User ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>User email</th>
                            <th>Verified</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data['users'] as $user) : ?>
                            <tr class="text-center">
                                <td class="tableDataWrap"><?php echo $user->user_id; ?></td>
                                <td class="tableDataWrap"><?php echo $user->first_name; ?></td>
                                <td class="tableDataWrap"><?php echo $user->last_name; ?></td>
                                <td class="tableDataWrap"><?php echo $user->edu_mail; ?></td>
                                <td class="tableDataWrap"><?php echo ($user->isverified)?'True':'False'; ?></td>
                                <td class="d-flex justify-content-around tableDataWrap">
                                    <a href="<?php echo URLROOT; ?>/admins/deleteUser/<?php echo $user->user_id; ?>" class="btn btn-sm text-danger" style="font-size: 15px;">
                                        <b>Delete User</b>
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
        $(document).ready(function() {
            $('.table').DataTable();
        });
    </script>

<?php require APPROOT . '/views/inc/footer.php'; ?>