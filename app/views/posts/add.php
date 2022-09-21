<?php require APPROOT . '/views/inc/header.php'; ?>

<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/post.css">

<script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify"></script>
<script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.polyfills.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.css" rel="stylesheet" type="text/css" />
<style>
    .tagify {
        border: 1px solid black;
    }
</style>
<?php require_once APPROOT . '/views/inc/navbar.php'; ?>



<div class="container ">
    <div class="card create-post-heading">
        <div>
            <h3 class="text-center mb-0"><i class="fa-solid fa-pencil"></i> Create New Post</h3>
        </div>
    </div>

    <div class="card card-body my-4 bg-light">
        <form action="<?php echo URLROOT; ?>/posts/add" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col">
                    <div class="form-group mb-3">
                        <label for="title" class="mb-2"><b>Title:</b> <sup class="star-color">*</sup></label>
                        <input type="text" name="title" id="title" class="form-control<?php echo (!empty($data['title_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['title']; ?>" style="border-color:black;" required>
                        <span class="invalid-feedback"><?php echo $data['title_err']; ?></span>
                    </div>
                    <div class="form-group mb-2">
                        <label for="exampleFormControlSelect1" class="mb-2"><b>Category:</b><sup class="star-color">*</sup></label>
                        <select name="category" class="form-control" id="categorySelect" style="border-color:black;" required>
                            <?php foreach ($data['categories'] as $category) : ?>
                                <option><?php echo $category->category; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="formFileMultiple" class="form-label mb-2"><b>Photo:</b></label>
                        <div class="row">
                            <div>
                                <input id="img-input" class="form-control" type="file" accept="image/png, image/jpeg" name="image" value="<?php echo $data['image']; ?>" style="border-color:black;">
                                <img id="img-show" width="20%">
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="tags" class="mb-2"><b>Tags:</b></label>
                        <input class="form-control form-control-sm" name="tags" value="<?php echo $data['tags']; ?>" placeholder="Write some tags" style="border-color:black;">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="body" class="mb-2"><b>Body:</b> <sup class="star-color">*</sup></label>
                        <textarea id="body" name="body" class="form-control form-control-lg  <?php echo (!empty($data['body_err'])) ? 'is-invalid' : ''; ?>" rows="9" style="border-color:black;" required><?php echo $data['body']; ?></textarea>
                        <span class="invalid-feedback"><?php echo $data['body_err']; ?></span>
                    </div>
                </div>
            </div>

            <div class="row mb-2 d-flex" style="justify-content: space-between;">
                <div class="col-lg-1 mt-1">
                    <a href="<?php echo URLROOT; ?>/posts" class="btn button-background-color">Back</a>
                </div>
                <div class="col-lg-1 mt-1">
                    <button id="req-btn" class="btn button-background-color">Post</button>
                </div>
            </div>

            <!-----------------Alert modal start------------------------->
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Similar Post Found</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <h6 class="text-muted">Similar Posts:</h6>
                            <div>
                                <ul id="similar-posts">

                                </ul>
                            </div><br>
                            <h6 class="text-muted">Please do not create a new post if a similar post already exist. You can always vote and comment to show your support.</h6>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Close</button>
                            <input id="submit" type="submit" name="submit" value="Post" class="btn btn-sm btn-success">
                        </div>
                    </div>
                </div>
            </div>
            <!----------------- Alert modal end ------------------------->

        </form>
    </div>
</div>

<script>
    var postShowReq = "<?php echo URLROOT; ?>/posts/show/";

    $('#categorySelect').val('<?php echo $data['category']; ?>');

    document.querySelector('#req-btn').addEventListener('click', function(e) {
        if ($('#title').val() !== '' && $('#categorySelect').val() !== '' && $('#body').val() !== '') {
            e.preventDefault();

            data = {};

            data['content'] = $('#title').val() + ' ' + $('#categorySelect').val() + ' ' + $('#body').val();

            console.log(data);

            $.ajax({
                url: '<?php echo URLROOT; ?>/posts/getSimilarPosts',
                type: 'post',
                data: data,
                dataType: 'json',
                success: function(s) {
                    var posts = s.suggestedPosts;
                    if (posts.length === 0) {
                        $('#submit').trigger('click');
                    } else {
                        for (const post of posts) {
                            $('#similar-posts').append("<li><a href='" + (postShowReq + post.post_id) + "' target='_blank' >" + post.title + "</a></li>")
                            console.log(post.title);
                        }
                    }

                },
                error: function(err) {
                    console.log(err);
                }
            });


            $('#staticBackdrop').modal('toggle');
        }
    });
    /*function handlePostRequest(e) {
        if($('#title').val()!=='' && $('#categorySelect').val()!=='' && $('#body').val()!==''){
            e.preventDefault();
            $('#staticBackdrop').modal('toggle');
        }
    }*/

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#img-show').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#img-input").change(function() {
        readURL(this);
    });

    var inputElm = document.querySelector('input[name=tags]');
    var whitelist = [];

    // initialize Tagify on the above input node reference
    var tagify = new Tagify(inputElm, {
        originalInputValueFormat: valuesArr => valuesArr.map(item => item.value).join(','),
        whitelist: whitelist // Array of values
    })

    $.ajax({
        url: '<?php echo URLROOT; ?>/posts/getAllTags',
        type: 'post',
        dataType: 'json',
        success: function(s) {
            for (const sElement of s) {
                console.log(sElement['tag']);
                whitelist.push(sElement['tag']);
                tagify.whitelist.push(sElement['tag']);
            }
        },
        error: function(err) {
            console.log(err);
        }
    });
</script>

<?php require APPROOT . '/views/inc/footer.php'; ?>