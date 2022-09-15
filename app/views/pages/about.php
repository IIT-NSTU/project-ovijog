<?php require APPROOT . '/views/inc/header.php'; ?>

<?php require_once APPROOT . '/views/inc/navbar.php'; ?>

<div class="jumbotron jumbotron-flud text-center">
    <div class="container">
        <h1 class="display-3"><?php echo $data['title']; ?></h1>
        <p>Project Ovhijog</p>
        <p>Version: <strong><?php echo APPVIRSION ?></strong></p>
    </div>
</div>
<div>
  <div class="col-4">
    <div class="card">
        <img src="/img/Arman.png" alt="Armanm" class="card-img-top">
        <div class="card-body">
            <h5 class="card-title">Arman</h5>
             <p>
                One of the developer
             </p>


        </div>
        
    </div>

  </div>

</div>


<?php require APPROOT . '/views/inc/footer.php'; ?>