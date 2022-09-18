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

<body>
    <div class="main py-5" style="margin-left:173px;">
        <div class="card" style="width: 100%;">
            <div class="card-header">
                <div class="row">
                    <div class="col col-md-6">
                        <i class="fas fa-table me-1"></i> <span class="table-head">Manage Users</span>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered my-4">
                    <thead>
                        <tr class="text-center">
                            <th>#</th>
                            <th>User ID</th>
                            <th>User Name</th>
                            <th>User email</th>
                            <th>Report Number</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="text-center">
                            <td>1</td>
                            <td>3</td>
                            <td>Armanur Rashid</td>
                            <td>armanur2514@student.nstu.edu.bd</td>
                            <td>0</td>
                            <td class="d-flex justify-content-around"><button title="Disable Account" class="btn btn-sm btn-outline-danger" onclick="disableUser()" id="disable-button"><b>Deactivate</b></button><button title="Disable Account" class="btn btn-sm btn-outline-success" onclick="enableUser()" id="enable-button" style="display:none;"><b>Activate</b></button></td>
                        </tr>
                        <tr class="text-center">
                            <td>2</td>
                            <td>4</td>
                            <td>Arnab Dey</td>
                            <td>arnab2514@student.nstu.edu.bd</td>
                            <td>5</td>
                            <td class="d-flex justify-content-around"><button title="Disable Account" class="btn btn-sm btn-outline-danger" onclick="disableUser()" id="disable-button"><b>Deactivate</b></button><button title="Disable Account" class="btn btn-sm btn-outline-success" onclick="enableUser()" id="enable-button" style="display:none;"><b>Activate</b></button></td>
                        </tr>
                        <tr class="text-center">
                            <td>3</td>
                            <td>7</td>
                            <td>Md Alamin</td>
                            <td>alamin2514@student.nstu.edu.bd</td>
                            <td>2</td>
                            <td class="d-flex justify-content-around"><button title="Disable Account" class="btn btn-sm btn-outline-danger" onclick="disableUser()" id="disable-button"><b>Deactivate</b></button><button title="Disable Account" class="btn btn-sm btn-outline-success" onclick="enableUser()" id="enable-button" style="display:none;"><b>Activate</b></button></td>
                        </tr>
                        <tr class="text-center">
                            <td>4</td>
                            <td>8</td>
                            <td>Farjana Yeasmin</td>
                            <td>farjana2514@student.nstu.edu.bd</td>
                            <td>12</td>
                            <td class="d-flex justify-content-around"><button title="Disable Account" class="btn btn-sm btn-outline-danger" onclick="disableUser()" id="disable-button"><b>Deactivate</b></button><button title="Disable Account" class="btn btn-sm btn-outline-success" onclick="enableUser()" id="enable-button" style="display:none;"><b>Activate</b></button></td>
                        </tr>
                        <tr class="text-center">
                            <td>5</td>
                            <td>9</td>
                            <td>Abdullah Al Tahmid</td>
                            <td>tahmid2514@student.nstu.edu.bd</td>
                            <td>1</td>
                            <td class="d-flex justify-content-around"><button title="Disable Account" class="btn btn-sm btn-outline-danger" onclick="disableUser()" id="disable-button"><b>Deactivate</b></button><button title="Disable Account" class="btn btn-sm btn-outline-success" onclick="enableUser()" id="enable-button" style="display:none;"><b>Activate</b></button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
        function disableUser() {
            document.getElementById('disable-button').style.display = "none";
            document.getElementById('enable-button').style.display = "block";
        }

        function enableUser() {
            document.getElementById('disable-button').style.display = "block";
            document.getElementById('enable-button').style.display = "none";
        }
    </script>
</body>

<?php require APPROOT . '/views/inc/footer.php'; ?>