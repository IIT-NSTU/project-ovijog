<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require_once APPROOT . '/views/inc/navbar.php'; ?>
<?php require_once APPROOT . '/views/inc/sidebar.php'; ?>
<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/sidebar.css">
<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/admin.css">

<body>
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
                <table class="table table-bordered my-4 cell-border">
                    <thead>
                        <tr class="text-center">
                            <th>#</th>
                            <th>Reporter ID</th>
                            <th style="width:30% ;">Post ID</th>
                            <th>Category</th>
                            <th>Feedback</th>
                            <th>Time</th>
                            <th style="width: 10%;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data['reports'] as $report): ?>
                            <tr class="text-center">
                                <td><?php echo $report->report_id; ?></td>
                                <td><?php echo $report->user_id; ?></td>
                                <td><?php echo $report->post_id; ?></td>
                                <td><?php echo $report->category; ?></td>
                                <td><?php echo $report->feedback; ?></td>
                                <td><?php echo $report->created_time; ?></td>
                                <td class="d-flex justify-content-around">
                                    <a href="<?php echo URLROOT; ?>/posts/show/<?php echo $report->post_id; ?>" title="See Post" class="btn btn-sm text-primary me-1" style="font-size: 15px;">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>
                                    <a href="<?php echo URLROOT; ?>/admins/deletePost/<?php echo $report->post_id; ?>" title="Delete Post" class="btn btn-sm text-danger" style="font-size: 15px;">
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
</body>

<?php require APPROOT . '/views/inc/footer.php'; ?>