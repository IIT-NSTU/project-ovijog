<nav class="navbar navbar-expand-lg navbar-dark sticky-top bg-dark">
    <div class="container">
        <a href="#" class="navbar-brand"><img src="<?php echo URLROOT; ?>/img/logo.PNG" style="width:38px;border-radius:50%"> Project Ovijog</a>
        <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarcollapseCMS">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarcollapseCMS">
            <ul class="navbar-nav ms-auto">

                <?php if (isset($_SESSION['user_id'])) : ?>
                    <li class="nav-item">
                        <a href="<?php echo URLROOT; ?>/pages/home" class="nav-link"><i class="fas fa-house-user"></i> Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo URLROOT; ?>/users/profile" class="nav-link"><i class="fas fa-user"></i> My Profile</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo URLROOT; ?>/posts" class="nav-link"><i class="fa-solid fa-sim-card"></i> Posts</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo URLROOT; ?>/pages/categories" class="nav-link"><i class="fa-solid fa-layer-group"></i> Categories</a>
                    </li>

                    <div style="display:flex ;">
                        <li style="margin-top: 5px;">
                            <input class="form-control form-control-sm bg-light" type="search" placeholder="Search" aria-label="Search">
                        </li>
                        <li style=" margin-top: 7px;">
                            <button class="btn btn-outline-light search-icon" type="submit" style="height: 32px;display:flex;align-items: flex-end;margin-left: 8px;"><i class="fa-solid fa-magnifying-glass"></i></button>
                        </li>
                    </div>
                <?php else : ?>
                    <li class="nav-item">
                        <a href="<?php echo URLROOT; ?>/pages/index" class="nav-link"><i class="fas fa-house-user"></i> Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo URLROOT; ?>/pages/about" class="nav-link"><i class="fas fa-user"></i> About</a>
                    </li>
                <?php endif; ?>
            </ul>
            <ul class="navbar-nav ms-auto">
                <?php if (isset($_SESSION['user_id'])) : ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo URLROOT; ?>/users/logout"><i class="fa-solid fa-right-from-bracket"> Logout</i></a>
                    </li>
                <?php else : ?>
                    <li class="nav-item">
                        <a href="<?php echo URLROOT; ?>/users/register" class="nav-link "><i class="fa-solid fa-user-plus"></i> Register</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo URLROOT; ?>/users/login" class="nav-link "><i class="fa-solid fa-arrow-right-to-bracket"></i> Login</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>