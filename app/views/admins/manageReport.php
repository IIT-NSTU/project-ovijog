<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require_once APPROOT . '/views/inc/navbar.php'; ?>
<?php require_once APPROOT . '/views/inc/sidebar.php'; ?>
<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/sidebar.css">
<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/admin.css">

<body>
    <div class="main py-5" style="margin-left:173px;">
        <div class="card" style="width: 100%;">
            <div class="card-header">
                <div class="row">
                    <div class="col col-md-6">
                        <i class="fas fa-table me-1"></i> <span class="table-head">Manage Report</span>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered my-4">
                    <thead>
                        <tr class="text-center">
                            <th>#</th>
                            <th>Reporter ID</th>
                            <th style="width:30% ;">poster ID</th>
                            <th>Post ID</th>
                            <th>Title</th>
                            <th style="width: 10%;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="text-center">
                            <td>1</td>
                            <td>Id</td>
                            <td>Id</td>
                            <td>Id</td>
                            <td>Post Title</td>
                            <td class="d-flex justify-content-around"><button title="See Post" class="btn btn-sm text-primary me-1" style="font-size: 15px;"><i class="fa-solid fa-eye"></i></button><button title="Delete Post" class="btn btn-sm text-danger" style="font-size: 15px;"><b>X</b></button>
                        </tr>
                        <tr class="text-center">
                            <td>2</td>
                            <td>Id</td>
                            <td>Id</td>
                            <td>Id</td>
                            <td>Post Title</td>
                            <td class="d-flex justify-content-around"><button title="See Post" class="btn btn-sm text-primary me-1" style="font-size: 15px;"><i class="fa-solid fa-eye"></i></button><button title="Delete Post" class="btn btn-sm text-danger" style="font-size: 15px;"><b>X</b></button>
                        </tr>
                        <tr class="text-center">
                            <td>3</td>
                            <td>Id</td>
                            <td>Id</td>
                            <td>Id</td>
                            <td>Post Title</td>
                            <td class="d-flex justify-content-around"><button title="See Post" class="btn btn-sm text-primary me-1" style="font-size: 15px;"><i class="fa-solid fa-eye"></i></button><button title="Delete Post" class="btn btn-sm text-danger" style="font-size: 15px;"><b>X</b></button>
                        </tr>
                        <tr class="text-center">
                            <td>4</td>
                            <td>Id</td>
                            <td>Id</td>
                            <td>Id</td>
                            <td>Post Title</td>
                            <td class="d-flex justify-content-around"><button title="See Post" class="btn btn-sm text-primary me-1" style="font-size: 15px;"><i class="fa-solid fa-eye"></i></button><button title="Delete Post" class="btn btn-sm text-danger" style="font-size: 15px;"><b>X</b></button>
                        </tr>
                        <tr class="text-center">
                            <td>5</td>
                            <td>Id</td>
                            <td>Id</td>
                            <td>Id</td>
                            <td>>Post Title</td>
                            <td class="d-flex justify-content-around"><button title="See Post" class="btn btn-sm text-primary me-1" style="font-size: 15px;"><i class="fa-solid fa-eye"></i></button><button title="Delete Post" class="btn btn-sm text-danger" style="font-size: 15px;"><b>X</b></button>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

<?php require APPROOT . '/views/inc/footer.php'; ?>