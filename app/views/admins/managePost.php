<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require_once APPROOT . '/views/inc/navbar.php'; ?>
<?php require_once APPROOT . '/views/inc/sidebar.php'; ?>
<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/sidebar.css">
<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/admin.css">

<body>
    <div class="main py-5" style="margin-left:173px;">
        <?php flash('admin'); ?>
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col col-md-6">
                        <i class="fas fa-table me-1"></i>
                        <span class="table-head">Manage post</span>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered my-4 cell-border">
                    <thead>
                        <tr class="text-center">
                            <th style="width: 6%;">Post ID</th>
                            <th style="width:10%">User Id</th>
                            <th style="width:17%">Title</th>
                            <th style="width:15%;">Category</th>
                            <th style="width:25%;">Body</th>
                            <th style="width:17%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data['posts'] as $post): ?>
                        <tr class="text-center">
                            <td><?php echo $post->post_id; ?></td>
                            <td><?php echo $post->user_id; ?></td>
                            <td><?php echo $post->title; ?></td>
                            <td><?php echo $post->category; ?></td>
                            <td><?php echo $post->body; ?></td>
                            <td class="d-flex justify-content-around">
                                <a href="<?php echo URLROOT; ?>/posts/show/<?php echo $post->post_id; ?>" title="See Post" class="btn btn-sm text-primary me-1" style="font-size: 15px;">
                                    <i class="fa-solid fa-eye"></i>
                                </a>
                                <a href="<?php echo URLROOT; ?>/admins/deletePost/<?php echo $post->post_id; ?>" title="Delete Post" class="btn btn-sm text-danger" style="font-size: 15px;">
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

    <script>
        $(document).ready( function () {
            $('.table').DataTable();
        } );
    </script>

<?php require APPROOT . '/views/inc/footer.php'; ?>