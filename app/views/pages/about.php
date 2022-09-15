<?php require APPROOT . '/views/inc/header.php'; ?>
<style>
  .line {
    height: 1px;
    width: 45%;
    background-color: black;
    margin-top: 10px;
  }

  .or {
    width: 10%;
    font-weight: bold;
  }
</style>
<?php require_once APPROOT . '/views/inc/navbar.php'; ?>
<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/aboutUs.css">
<div class="row " style="display: flex;justify-content: space-around; margin-top:-24px">

  <div class="col-md-10 mt-5 p-2">
    <h2 class="text-center" style="font-family: Penna;"><b>Our Team</b></h2>
  </div>
  <div class="row px-3 mb-4">
    <div class="line"></div>
    <small class="or text-center">***</small>
    <div class="line"></div>
  </div>
</div>
<div class="profile-area">
  <div class="container">
    <div class="row">
      <div class="col-md-3">
        <div class="card">
          <div class="img1">
            <img src="<?php echo URLROOT; ?>/img/sir.jpg" class="img-fluid" id="login-img">
          </div>
          <div class="img2">
            <img src="<?php echo URLROOT; ?>/img/sir1.jpg" class="img-fluid" id="login-img">
          </div>
          <div class="main-text">
            <h5>Rafid Mostafiz</h5>
            <p class="text-muted">
              <small>
                Supervisor</br>
                Lecturer, IIT, NSTU</small>
            </p>
          </div>
          <div class="socials">
            <i class="fa-solid fa-envelope"></i>
            <i class="fa-brands fa-facebook"></i>
            <i class="fa-brands fa-linkedin"></i>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card">
          <div class="img1">
            <img src="<?php echo URLROOT; ?>/img/arman_cover.jpg" class="img-fluid" id="login-img">
          </div>
          <div class="img2">
            <img src="<?php echo URLROOT; ?>/img/arman.jpg" class="img-fluid" id="login-img">
          </div>
          <div class="main-text">
            <h5>Armanur Rashid</h5>
            <p class="text-muted">
              <small>
                Developer</br>
                ID: ASH1925013M
              </small>
            </p>
          </div>
          <div class="socials">
            <i class="fa-solid fa-envelope"></i>
            <i class="fa-brands fa-facebook"></i>
            <i class="fa-brands fa-linkedin"></i>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card">
          <div class="img1">
            <img src="<?php echo URLROOT; ?>/img/arna.jpg" class="img-fluid" id="login-img">
          </div>
          <div class="img2">
            <img src="<?php echo URLROOT; ?>/img/arnab.jpg" class="img-fluid" id="login-img">
          </div>
          <div class="main-text">
            <h5>Arnab Dey</h5>
            <p class="text-muted">
              <small>
                Developer</br>
                ID: ASH1925024M
              </small>
            </p>
          </div>
          <div class="socials">
            <i class="fa-solid fa-envelope"></i>
            <i class="fa-brands fa-facebook"></i>
            <i class="fa-brands fa-linkedin"></i>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card">
          <div class="img1">
            <img src="<?php echo URLROOT; ?>/img/nayeem.jpg" class="img-fluid" id="login-img">
          </div>
          <div class="img2">
            <img src="<?php echo URLROOT; ?>/img/nayeem.jpg" class="img-fluid" id="login-img">
          </div>
          <div class="main-text">
            <h5>Nayeem Khan</h5>
            <p class="text-muted"><small>
                Developer</br>
                ID: ASH1925027M</small>
            </p>
          </div>
          <div class="socials">
            <i class="fa-solid fa-envelope"></i>
            <i class="fa-brands fa-facebook"></i>
            <i class="fa-brands fa-linkedin"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>