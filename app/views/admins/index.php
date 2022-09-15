<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require_once APPROOT . '/views/inc/navbar.php'; ?>
<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/sidebar.css">

<body>
    <!-- <header class="header" id="header">
        <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
    </header> -->
    <!-- <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarcollapseCMS">
        <span class="navbar-toggler-icon"></span>
    </button> -->
    <!-- <div class="collapse navbar-collapse" id="navbarcollapseCMS"> -->
    <div class="sidebar">
        <ul class="nav mt-5 ms-2">
            <li class="nav-item mb-4">
                <a href="#" class="nav-link">
                    <i class="fa-solid fa-file-pen"></i>
                    <span>Manage Post</span>
                </a>
            </li>
            <li class="nav-item mb-4">
                <a href="#" class="nav-link">
                    <i class="fa-solid fa-file-circle-exclamation"></i>
                    <span>Manage Report</span>
                </a>
            </li>
            <li class="mb-4">
                <a href="#" class="nav-link ">
                    <i class="fa-solid fa-list-check"></i>
                    <span>Manage Category</span>
                </a>
            </li>
            <li class="mb-4">
                <a href="#" class="nav-link">
                    <i class="fa-solid fa-users"></i>
                    <span>Manage Users</span>
                </a>
            </li>
            <li>
                <a href="#" class="nav-link">
                    <i class="fa-solid fa-person"></i>
                    <span>Manage Admin</span>
                </a>
            </li>
        </ul>
    </div>
    <div class="main" style="margin-left:173px;">
        <h2>main</h2>

    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function(event) {

            const showNavbar = (toggleId, navId, bodyId, headerId) => {
                const toggle = document.getElementById(toggleId),
                    nav = document.getElementById(navId),
                    bodypd = document.getElementById(bodyId),
                    headerpd = document.getElementById(headerId)

                // Validate that all variables exist
                if (toggle && nav && bodypd && headerpd) {
                    toggle.addEventListener('click', () => {
                        // show navbar
                        nav.classList.toggle('show')
                        // change icon
                        toggle.classList.toggle('bx-x')
                        // add padding to body
                        bodypd.classList.toggle('body-pd')
                        // add padding to header
                        headerpd.classList.toggle('body-pd')
                    })
                }
            }

            showNavbar('header-toggle', 'nav-bar', 'body-pd', 'header')

            /*===== LINK ACTIVE =====*/
            const linkColor = document.querySelectorAll('.nav-link')

            function colorLink() {
                if (linkColor) {
                    linkColor.forEach(l => l.classList.remove('active'))
                    this.classList.add('active')
                }
            }
            linkColor.forEach(l => l.addEventListener('click', colorLink))

            // Your code to run since DOM is loaded and ready
        });
    </script>
</body>

<?php require APPROOT . '/views/inc/footer.php'; ?>