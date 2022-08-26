<?php require APPROOT . '/views/inc/header.php'; ?>

<style>
    body {
        overflow-x: hidden;
    }

    .jumbo {
        height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .jumbotron {
        text-align: center;
        letter-spacing: 2px;
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

    #founten {
        height: 89vh;
    }

    #nstuLogo {
        height: 89vh;
    }

    @media screen and (max-width: 500px) {
        #founten {
            padding-left: 10px !important;
        }

        #nstuLogo {
            padding-right: 10px !important;
        }
    }
</style>
<div class="row row-cols-1 row-cols-md-3 g-4" style="margin-top:-60px; ">
    <div class="col text-center" id="nstuLogo">
        <div class="jumbo">
            <img src="<?php echo URLROOT; ?>/img/pen.jpg" alt="NSTU Logo" width="300" height="auto">
        </div>
    </div>
    <div class="col text-center" style="height:89vh;">
        <div class="jumbo">
            <div class="jumbotron" id="myContainer">
                <h1 id="project-ovijog-text">Project Ovijog</h1>
                <p id="slogan-text">Say the problem Solve the problem</p>
                <button type="button" onclick="location.href='<?php echo URLROOT; ?>/users/login';" class="btn btn-lg btn-dark index-button" data-bs-target="#signupModal" data-bs-toggle="modal">Login</button>
                <button type="button" onclick="location.href='<?php echo URLROOT; ?>/users/register';" class="btn btn-lg btn-dark index-button" data-bs-target="#signupModal" data-bs-toggle="modal">Sign up</button>
            </div>
        </div>
    </div>

    <div class="col text-center" id="founten">
        <div class="jumbo">
            <img src="<?php echo URLROOT; ?>/img/Bangladesh.jpg" alt="Founten Pen" width="300" height="auto">
        </div>
    </div>
</div>

<div class="row">
    <?php require APPROOT . '/views/inc/footer.php'; ?>
</div>