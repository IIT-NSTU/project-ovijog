<?php require APPROOT . '/views/inc/header.php'; ?>

<?php require_once APPROOT . '/views/inc/navbar.php'; ?>

<div class="container">
    <!-- <h1>Filtering</h1> -->
    <div class="row py-5">
        <div class="col-sm-3">
            <h6 class="text-center">Building</h6>
            <hr>
            <ul>
                <li class="pb-2">Administrative Building</li>
                <li class="pb-2">Academic Building 1</li>
                <li class="pb-2">Academic Building 2</li>
                <li class="pb-2">Library Building</li>
                <li class="pb-2">Auditorium Building</li>
                <li>Medical Center</li>
            </ul>
        </div>
        <div class="col-sm-1"></div>
        <div class="col-sm-3">
            <h6 class="text-center">Hall</h6>
            <hr>
            <ul>
                <li class="pb-2">Abdus Salam Hall</li>
                <li class="pb-2">Abdul Malek Ukil Hall</li>
                <li class="pb-2">Bibi Khadija Hall</li>
                <li>Bangabondhu Hall</li>

            </ul>
        </div>
        <div class="col-sm-1"></div>
        <div class="col-sm-3">
            <h6 class="text-center">Category</h6>
            <hr>

            <ul>
                <!-- <?php foreach ($data['categories'] as $category) : ?>
                    <li><?php echo $category->category; ?></li>
                <?php endforeach; ?> -->

                <li class="pb-2">Residence</li>
                <li class="pb-2">Transport</li>
                <li class="pb-2">Water</li>
                <li class="pb-2">Electricity</li>
                <li class="pb-2">Safety</li>
                <li class="pb-2">Eve Teasing</li>
                <li class="pb-2">Food</li>
                <li class="pb-2">Ragging</li>
                <li>Political</li>
                <li>Acade</li>
            </ul>
        </div>
        <div class="col-sm-1"></div>
    </div>
</div>


<?php require APPROOT . '/views/inc/footer.php'; ?>