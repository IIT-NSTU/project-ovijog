<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require_once APPROOT . '/views/inc/navbar.php'; ?>
<?php require_once APPROOT . '/views/inc/sidebar.php'; ?>
<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/sidebar.css">
<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/admin.css">

<body>
    <div class="main py-5" style="margin-left:173px;">
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
                <table class="table table-bordered my-4">
                    <thead>
                        <tr class="text-center">
                            <th style="width: 6%;">#</th>
                            <th style="width:10%">User_id</th>
                            <th style="width:10%">Post_id</th>
                            <th style="width:17%">Title</th>
                            <th style="width:15%;">Category</th>
                            <th style="width:25%;">Body</th>
                            <th style="width:17%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="text-center">
                            <td>1</td>
                            <td>10</td>
                            <td>13</td>
                            <td>Food</td>
                            <td>Clark</td>
                            <td>Kent</td>
                            <td class="d-flex justify-content-around"><button title="See Post" class="btn btn-sm text-primary me-1" style="font-size: 15px;"><i class="fa-solid fa-eye"></i></button><button title="Delete Post" class="btn btn-sm text-danger" style="font-size: 15px;"><b>X</b></button>
                        </tr>
                        <tr class="text-center">
                            <td>2</td>
                            <td>13</td>
                            <td>12</td>
                            <td>Transport</td>
                            <td>Clark</td>
                            <td>Kent</td>
                            <td class="d-flex justify-content-around"><button title="See Post" class="btn btn-sm text-primary me-1" style="font-size: 15px;"><i class="fa-solid fa-eye"></i></button><button title="Delete Post" class="btn btn-sm text-danger" style="font-size: 15px;"><b>X</b></button>
                        </tr>
                        <tr class="text-center">
                            <td>3</td>
                            <td>9</td>
                            <td>15</td>
                            <td>Ragging</td>
                            <td>Clark</td>
                            <td>Kent</td>
                            <td class="d-flex justify-content-around"><button title="See Post" class="btn btn-sm text-primary me-1" style="font-size: 15px;"><i class="fa-solid fa-eye"></i></button><button title="Delete Post" class="btn btn-sm text-danger" style="font-size: 15px;"><b>X</b></button>
                        </tr>
                        <tr class="text-center">
                            <td>4</td>
                            <td>2</td>
                            <td>5</td>
                            <td>political</td>
                            <td>Clark</td>
                            <td>Kent</td>
                            <td class="d-flex justify-content-around"><button title="See Post" class="btn btn-sm text-primary me-1" style="font-size: 15px;"><i class="fa-solid fa-eye"></i></button><button title="Delete Post" class="btn btn-sm text-danger" style="font-size: 15px;"><b>X</b></button>
                        </tr>
                        <tr class="text-center">
                            <td>5</td>
                            <td>21</td>
                            <td>7</td>
                            <td>Water</td>
                            <td>Clark</td>
                            <td>Kent</td>
                            <td class="d-flex justify-content-around"><button title="See Post" class="btn btn-sm text-primary me-1" style="font-size: 15px;"><i class="fa-solid fa-eye"></i></button><button title="Delete Post" class="btn btn-sm text-danger" style="font-size: 15px;"><b>X</b></button>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

<?php require APPROOT . '/views/inc/footer.php'; ?>