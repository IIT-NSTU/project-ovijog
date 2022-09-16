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
    <h2 class="text-center" style="font-family: Penna;"><b>Project Ovijog</b></h2>
  </div>
  <div class="row px-3 mb-4">
    <div class="line"></div>
    <small class="or text-center">***</small>
    <div class="line"></div>
  </div>
</div>
<div class="row">
  <div class="col">
    <div class="card">
      <div class="card-body">
        <p>Noakhali Science and Technology is one of the most renowned universities. There are many teachers and students in our university. Unfortunately, our teachers and students face a variety of problems on campus. For example, students suffer a lot due to lack of transport. There is no canteen in our campus, food quality problem. Many students have problems with their accommodation, drinking water and other problems. Besides, the teachers also face many problems including food, housing problems, lack of adequate buses for transportation. Both the teacher and the student face different problems. But it is a matter of regret that there is no internal system in our university where anyone can talk about their problems without revealing their identity. They posted their problems on the Facebook group. But in Facebook group, it is not clear how many students are facing the same problem. The profile of the person who post, is also visible to everyone. Trending problem, solved problem, unsolved problems are not seen. We see teachers and students wanting a platform where they can complain about their problems. This is one of the main reasons for our motivation. We will do a project called "Project Ovijog", where teachers and students can post all their complaints and all users can see that post. If users also face this problem, they will vote. upvote and if they do not face the problem, then give downvote.</p>
      </div>
    </div>
  </div>
</div>

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
            <a href="mailto:rafid@nstu.edu.bd"><i class="fa-solid fa-envelope"></i></a>
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
            <a href="mailto:armanur2514@student.nstu.edu.bd"><i class="fa-solid fa-envelope"></i></a>
            <a href="https://www.facebook.com/profile.php?id=100007770649052"><i class="fa-brands fa-facebook"></i></a>
            <a href="https://www.linkedin.com/in/armanur-rashid-6266631aa/"><i class="fa-brands fa-linkedin"></i></a>

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
            <a href="mailto:arnab2514@student.nstu.edu.bd"><i class="fa-solid fa-envelope"></i></a>
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
            <a href="mailto:nayeem2514@student.nstu.edu.bd"><i class="fa-solid fa-envelope"></i></a>
            <i class="fa-brands fa-facebook"></i>
            <i class="fa-brands fa-linkedin"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>