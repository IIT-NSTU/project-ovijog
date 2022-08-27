<?php require APPROOT . '/views/inc/header.php'; ?>

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
    }

    .jumbotron p {
        font-size: 20px;
    }

    #project-ovijog-text {
        font-size: 55px;
        color: #021c6f;
        font-weight: bold;
        font-style: italic;
    }

    #slogan-text {
        font-size: 22px;
        font-weight: bold;
        font-style: italic;
    }

    .index-button {
        width: 110px;
        height: 50px;
        background-color: #293462;
    }

    @media screen and (max-width: 500px) {
        #homeId {
            margin-top: -40px !important;
        }
    }
</style>

<div class="jumbo">
    <div class="jumbotron ">
        <h1 id="project-ovijog-text">Project Ovijog</h1>
        <p id="slogan-text">Say the problem Solve the problem</p>
        <button type="button" onclick="location.href='<?php echo URLROOT; ?>/users/login';" class="btn btn-lg btn-dark index-button" data-bs-target="#signupModal" data-bs-toggle="modal">Login</button>
        <button type="button" onclick="location.href='<?php echo URLROOT; ?>/users/register';" class="btn btn-lg btn-dark index-button" data-bs-target="#signupModal" data-bs-toggle="modal">Sign up</button>
    </div>
</div>

<div class="row">
    <img src="<?php echo URLROOT; ?>/img/bottomm.png" id="homeId" alt="Founten Pen" width="450" height="auto" style="margin-top:-95px">
    <?php require APPROOT . '/views/inc/footer.php'; ?>
</div>