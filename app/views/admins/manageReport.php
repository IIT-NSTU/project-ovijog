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

<!-----------------Delete modal start------------------------->
<div id="modal-here"></div>
<!-----------------Delete modal end------------------------->
<div class="main py-5" style="margin-left:173px;">
    <?php flash('admin'); ?>
    <div class="card" style="width: 100%;">
        <div class="card-header">
            <div class="row">
                <div class="col col-md-6">
                    <i class="fas fa-table me-1"></i> <span class="table-head">Manage Report</span>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table my-4 cell-border pt-3 table-striped" style="width: 100%; white-space: nowrap; table-layout: fixed;">
                <thead>
                    <tr class="text-center">
                        <th class="text-center" style="width:3%;">#</th>
                        <th class="text-center" style="width:10%;">Reporter ID</th>
                        <th class="text-center" style="width:5%;">Post ID</th>
                        <th class="text-center" style="width:10%;">Category</th>
                        <th class="text-center">Feedback</th>
                        <th class="text-center" style="width:15%;">Time</th>
                        <th class="text-center" style="width: 8%;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data['reports'] as $report) : ?>
                        <tr class="text-center">
                            <td class="tableDataWrap"><?php echo $report->report_id; ?></td>
                            <td class="tableDataWrap"><?php echo $report->user_id; ?></td>
                            <td class="tableDataWrap"><?php echo $report->post_id; ?></td>
                            <td class="tableDataWrap"><?php echo $report->category; ?></td>
                            <td class="tableDataWrap"><?php echo $report->feedback; ?></td>
                            <td class="tableDataWrap"><?php echo $report->created_time; ?></td>
                            <td class="d-flex justify-content-around tableDataWrap">
                                <a href="<?php echo URLROOT; ?>/posts/show/<?php echo $report->post_id; ?>" title="See Post" class="btn btn-sm text-primary me-1" style="font-size: 15px;">
                                    <i class="fa-solid fa-eye"></i>
                                </a>
                                <button onclick="removeReportedPost(<?php echo $report->post_id; ?>)" class="btn btn-sm text-danger"><b>X</b>
                                </button>
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

    function removeReportedPost(post_id) {
        $('#modal-here').html("<div class='modal fade' id='manageReportPost' data-bs-backdrop='static' data-bs-keyboard='false' tabindex='-1' aria-labelledby='staticBackdropLabel' aria-hidden='true'>" +
            "<div class='modal-dialog'>" +
            "<div class='modal-content'>" +
            "<div class='modal-header'>" +
            "<h6 class='modal-title' id='staticBackdropLabel'>Delete Confirmation</h6>" +
            "<button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>" +
            "</div>" +
            " <div class='modal-body'>" +
            " Are you sure you want to delete the post?" +
            "</div>" +
            "<div class='modal-footer'>" +
            "<button type='button' class='btn btn-sm btn-secondary' data-bs-dismiss='modal'>Close</button>" +
            "<a href='<?php echo URLROOT; ?>/admins/deleteReportedPost/" + post_id + "' class='btn btn-sm text-danger'>" +
            "<b>Delete</b></a>" +
            "</div>" +
            "</div>" +
            "</div>" +
            "</div>");

        $('#manageReportPost').modal('toggle');
    }
</script>

<?php require APPROOT . '/views/inc/footer.php'; ?>