<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require_once APPROOT . '/views/inc/navbar.php'; ?>

<style>
    .jumbo {
        height: 50vh;
        display: flex;
        justify-content: center;
    }

    .jumbotron {
        text-align: center;
        letter-spacing: 2px;
        margin-top: 65px;
        padding: 10%;
        background-color: rgba(194, 193, 193, 0.31);
        backdrop-filter: blur(5px);
        border-radius: 10%;
    }

    .jumbotron p {
        font-size: 20px;
    }

    #project-ovijog-text {
        font-size: 55px;
        color: #021c6f;
        font-weight: bold;
    }

    #slogan-text {
        font-size: 22px;
        font-weight: bold;
    }

    .index-button {
        width: 110px;
        height: 50px;
        background-color: #293462;
        color: white;
    }

    @media screen and (max-width: 500px) {
        #homeId {
            margin-top: -40px !important;
        }
    }
</style>

<div class="jumbo">
    <div class="jumbotron pt-lg-4">
        <h1 id="project-ovijog-text">Project Ovijog</h1>
        <p id="slogan-text">Say the problem, Solve the problem</p>
        <button type="button" onclick="location.href='<?php echo URLROOT; ?>/users/login';" class="btn btn-lg index-button" data-bs-target="#signupModal" data-bs-toggle="modal">Login</button>
        <button type="button" onclick="location.href='<?php echo URLROOT; ?>/users/register';" class="btn btn-lg index-button" data-bs-target="#signupModal" data-bs-toggle="modal">Sign up</button>
    </div>
</div>

<div class="row">
    <img src="<?php echo URLROOT; ?>/img/homePagePicture.png" id="homeId" alt="Founten Pen" width="450" height="auto" style="margin-top:-95px">
    <?php require APPROOT . '/views/inc/footer.php'; ?>
</div>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vanilla-tilt/1.7.2/vanilla-tilt.js"></script>
<script src="https://unpkg.com/typeit@8.6.0/dist/index.umd.js"></script>
<script>
    new TypeIt("#slogan-text", {

    }).go();

    VanillaTilt.init(document.querySelector("#homeId"), {
        max: 10,
        speed: 400
    });
</script>