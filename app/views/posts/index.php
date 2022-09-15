<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require_once APPROOT . '/views/inc/navbar.php'; ?>

<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/post.css">

<?php flash('post_message'); ?>
<div class="container">
    <div class="my-3" style="position: fixed;">
        <div class="mb-3" id="create-post-button-div">
            <a href="<?php echo URLROOT; ?>/posts/add" id="create-post-button" class="btn button-background-color">
                <i class="fa-solid fa-pencil"></i> Create New Post
            </a>
        </div>
        <div class=" d-flex justify-content-center">
            <input type="text" class="search-click" name="" placeholder="Search" />
            <button class="btn btn-outline-light search-icon" type="submit" style="height: 32px;display:flex;align-items: flex-end;margin-left: 8px;"><i class="fa-solid fa-magnifying-glass"></i></button>
        </div>
    </div>
    <div class="container mt-2 mb-2">
        <div id="data" class="row d-flex align-items-center justify-content-center">

            <!-- All post here ----->

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
    function like(d, id) {

        console.log(d.querySelector('#up'));
        console.log(id);

        if (d.querySelector('#up').classList.contains('btn-success')) {
            d.querySelector('#up').classList.replace('btn-success', 'btn-outline-success');
        } else {
            d.querySelector('#up').classList.replace('btn-outline-success', 'btn-success');
        }

        d.querySelector('#down').classList.value = "btn btn-sm btn-outline-danger ms-2";


        $.ajax({
            url: '<?php echo URLROOT; ?>/posts/vote/' + id + '/1',
            type: 'post',
            dataType: 'json',
            success: function(s) {
                console.log(s);
                d.querySelector('#up-count').innerText = s.upCount;
                d.querySelector('#down-count').innerText = s.downCount;
            },
            error: function(err) {
                console.log(err);
            }
        });
    }

    function dislike(d, id) {
        d.querySelector('#up').classList.value = "btn btn-sm btn-outline-success ms-2";

        if (d.querySelector('#down').classList.contains('btn-danger')) {
            d.querySelector('#down').classList.replace('btn-danger', 'btn-outline-danger');
        } else {
            d.querySelector('#down').classList.replace('btn-outline-danger', 'btn-danger');
        }

        $.ajax({
            url: '<?php echo URLROOT; ?>/posts/vote/' + id + '/0',
            type: 'post',
            dataType: 'json',
            success: function(s) {
                console.log(s);
                d.querySelector('#up-count').innerText = s.upCount;
                d.querySelector('#down-count').innerText = s.downCount;
            },
            error: function(err) {
                console.log(err);
            }
        });
    }

    var page_no = 1;
    var isrunning = false;
    var halt = false;
    showMore();

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
        $.post('<?php echo URLROOT; ?>/posts/load/' + page_no, {
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