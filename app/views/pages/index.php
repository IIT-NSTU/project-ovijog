<?php require APPROOT . '/views/inc/header.php'; ?>

<style>
    .jumbo {
        height: 57vh;
        display: flex;
        justify-content: center;
    }

    .jumbotron {
        text-align: center;
        letter-spacing: 2px;
        margin-top: 130px;
        padding: 10%;
        /*background-color: rgba(194, 193, 193, 0.31);
            backdrop-filter: blur(5px);
            border-radius: 10%;*/
    }

    .jumbotron p {
        font-size: 20px;
        min-height: 50%;
    }

    #project-ovijog-text {
        font-size: 55px;
        color: #021c6f;
        font-weight: bold;
    }

    #slogan-text {
        font-size: 30px;
    }

    .index-button {
        width: 110px;
        height: 50px;
        /*background-color: #050505;*/
    }

    @media screen and (max-width: 1000px) {
        .home-footer {
            margin-top: 105px !important;
        }

        .home-body {
            margin-top: 70px;
            font-size: 20px;
        }
    }
</style>

<?php require_once APPROOT . '/views/inc/navbar.php'; ?>

<div class="jumbo">
    <div class="jumbotron pt-lg-4 home-body">
        <p id="slogan-text"></p>
        <div class="">
            <button type="button" onclick="location.href='<?php echo URLROOT; ?>/users/login';" class="btn btn-lg btn-outline-dark index-button" data-bs-target="#signupModal" data-bs-toggle="modal">Login</button>
            <button type="button" onclick="location.href='<?php echo URLROOT; ?>/users/register';" class="btn btn-lg btn-outline-dark index-button" data-bs-target="#signupModal" data-bs-toggle="modal">Sign up</button>
        </div>
    </div>
</div>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vanilla-tilt/1.7.2/vanilla-tilt.js"></script>
<script src="https://unpkg.com/typeit@8.7.0/dist/index.umd.js"></script>
<script>
    new TypeIt("#slogan-text", {

        })
        .type("You is essential")
        .move(-13)
        .type("r voice ")
        .move(null, {
            to: "END"
        })
        .pause(2000)
        .delete()
        // .type("“Never be afraid of the moments <br> thus sings the voice of the everlasting.”<br> - <b>Rabindranath Tagore</b>")
        // .pause(2000)
        // .delete()
        // .type("“Our lives begin to end the day <br> we become silent about the things that matter.”<br> - <b>Martin Luther King, Jr.</b>")
        // .pause(2000)
        // .delete()
        // .type("“When the whole world is silent,<br>even one voice becomes powerful.”<br> - <b>Malala Yousafzai</b>")
        // .pause(2000)
        // .delete()
        // .type("“Nothing strengthens authority <br> so much as silence.”<br> - <b>Leonardo Da Vinci</b>")
        .go();
</script>
<div class="home-footer sticky-bottom">
    <?php require APPROOT . '/views/inc/footer.php'; ?>
</div>