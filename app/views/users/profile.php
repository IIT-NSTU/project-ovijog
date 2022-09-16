<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require_once APPROOT . '/views/inc/navbar.php'; ?>
<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/profile.css">


<!-----------------Change Password modal start------------------------->
<div class="modal fade" id="staticBackdrop2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="staticBackdropLabel">Change Password</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger" role="alert"></div>
                <form action="">
                    <div class="mb-3">
                        <label class="mb-2 text-muted" for="password">Old Password</label>
                        <input id="old-password" type="password" class="form-control" name="password" value="" required>
                        <span id="old-password-err" class="invalid-feedback"></span>
                    </div>

                    <div class="mb-3">
                        <label class="mb-2 text-muted" for="password-confirm">New Password</label>
                        <input id="new-password" type="password" class="form-control" name="password_confirm" required>
                        <span id="new-password-err" class="invalid-feedback"></span>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Close</button>
                <button onclick="changePassword()" type="button" class="btn btn-sm" style="background-color: #293462; color:white;">
                    Change
                    Password
                </button>
            </div>
        </div>
    </div>
</div>
<!-----------------Change Password modal end------------------------->

<div class="main-body">
    <div class="row">

        <div class="col-md-5 d-flex flex-row" style="position: fixed;">
            <div class="card card-body mb-1">
                <div class="row">
                    <div class="d-flex flex-column align-items-center text-center mt-2 mb-2">
                        <div class="mt-3">
                            <h4><?php echo $data['user']->first_name . ' ' . $data['user']->last_name; ?></h4>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-4">
                        <h6>First Name</h6>
                    </div>
                    <div class="col-sm-8 text-secondary">
                        <?php echo $data['user']->first_name; ?>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-4">
                        <h6>Last Name</h6>
                    </div>
                    <div class="col-sm-7 text-secondary">
                        <?php echo $data['user']->last_name; ?>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-4">
                        <h6>Email</h6>
                    </div>
                    <div class="col-sm-8 text-secondary">
                        <?php echo $data['user']->edu_mail; ?>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-4">
                        <h6>Password</h6>
                    </div>
                    <div class="col-sm-8 text-secondary">
                        <!-- <a href="<?php echo URLROOT; ?>/users/changePassword/<?php echo $data['user']->user_id; ?>" id="change-password">Change Password</a> -->
                        <button class="btn btn-sm text-primary ps-0" data-bs-toggle="modal" data-bs-target="#staticBackdrop2"><b>Change Password</b>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-md-5 d-flex flex-row" style="position: fixed;margin-top: 25%">
            <div class="card card-body mb-1">
                <div class="row">
                    <div class="d-flex flex-column align-items-center text-center mt-2 mb-2">
                        <div class="mt-3">
                            <h6>Select Types of post</h6>
                        </div>
                    </div>
                </div>
                <hr>
                <div>
                    <input class="post-type-radio" type="radio" name="postType" value="created" checked> Created Post
                    <input class="post-type-radio" type="radio" name="postType" value="voted"> Voted Post
                    <input class="post-type-radio" type="radio" name="postType" value="commented"> Commented Post
                </div>

            </div>
        </div>

        <div class="col-sm-7 d-flex" style="margin-left: 35%">

            <div class="mb-2">
                <div id="data" class="row d-flex align-items-center justify-content-end">

                    <!-- All post here ----->

                </div>
            </div>
        </div>
    </div>
</div>


    <!-------spinner------->
    <div class="d-flex justify-content-center">
        <div id="loading" class="spinner-border m-5" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>
    <!-------spinner end------->

<script>



    $('.alert').hide();

    $('#old-password').on('input', function() {
        $('#old-password-err').hide();
        $('.alert').hide();
    });

    $('#new-password').on('input', function() {
        $('#new-password-err').hide();
        $('.alert').hide();
    });

    function changePassword() {
        var oldPassword = $('#old-password').val();
        var newPassword = $('#new-password').val();

        if (oldPassword === "") {
            $('#old-password-err').html("Please enter old password");
            $('#old-password-err').show();
        } else if (newPassword === "") {
            $('#new-password-err').html("Please enter new password");
            $('#new-password-err').show();
        } else if (newPassword.length < 6) {
            $('#new-password-err').html("Password must be at least 6 character");
            $('#new-password-err').show();
        } else if (newPassword === oldPassword) {
            $('#new-password-err').html("Old and new password are same");
            $('#new-password-err').show();
        } else {

            var data = {};

            data['old-password'] = oldPassword;
            data['new-password'] = newPassword;

            $.ajax({
                url: '<?php echo URLROOT; ?>/users/changePassword/',
                type: 'post',
                data: data,
                dataType: 'json',
                success: function(s) {
                    console.log(s);
                    $('.modal').modal('toggle');
                },
                error: function(err) {
                    console.log('failed');
                    $('.alert').html(err.responseText);
                    $('.alert').show();
                }
            });
        }
    }

    var page_no = 1;
    var isrunning = false;
    var halt = false;
    showMore();

    $(".post-type-radio").click(function () {
        $('#data').html("");
        $(window).scrollTop(0);
        page_no = 1;
        isrunning = false;
        halt = false;
        showMore();
    });

    $(window).scroll(function() {
        if ($(window).scrollTop() + $(window).height() > $(document).height() - 100) {
            if (!isrunning && !halt) {
                showMore();
            }
        }
    });

    function showMore() {
        isrunning = true;
        $('#loading').show();
        $.post('<?php echo URLROOT; ?>/users/loadPosts/'+$('.post-type-radio:checked').val()+'/' + page_no, {
            page: page_no
        }, (response) => {
            if (response === "") {
                halt = true;
            }
            $('#data').append(response);
            $('#loading').hide();
            isrunning = false;
            page_no++;
        });
    }
</script>

<?php require APPROOT . '/views/inc/footer.php'; ?>