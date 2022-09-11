<?php require APPROOT . '/views/inc/header.php'; ?>

<?php require_once APPROOT . '/views/inc/navbar.php'; ?>

<div class="container">
    <div class="card card-body my-4">
        <div class="row py-5 px-2">
            <div class="card card-body col-sm-3">
                <h5 class="text-center" style="color:#375c91;">Building</h5>
                <hr>
                <div class="ps-3">
                    <div class="pb-2">
                        <input type="checkbox"> Administrative Building</br>
                    </div>
                    <div class="pb-2">
                        <input type="checkbox"> Academic Building 1</br>
                    </div>
                    <div class="pb-2">
                        <input type="checkbox"> Academic Building 2</br>
                    </div>
                    <div class="pb-2">
                        <input class="pb-2" type="checkbox"> Library Building</br>
                    </div>
                    <div class="pb-2">
                        <input class="pb-2" type="checkbox"> Auditorium Building</br>
                    </div>
                </div>

            </div>
            <!-- <div class="col-sm-1"></div> -->
            <div class="col-sm-3 card card-body">
                <h5 class="text-center" style="color:#375c91;">Hall</h5>
                <hr>
                <div class="ps-3">
                    <div class="pb-2">
                        <input type="checkbox"> ASH</br>
                    </div>
                    <div class="pb-2">
                        <input type="checkbox"> AMU</br>
                    </div>
                    <div class="pb-2">
                        <input type="checkbox"> BKH</br>
                    </div>
                    <div class="pb-2">
                        <input class="pb-2" type="checkbox"> FMH</br>
                    </div>
                    <div class="pb-2">
                        <input class="pb-2" type="checkbox"> Jatir Pita Bangabandhu Sheikh Mujibur Rahman Hall</br>
                    </div>
                </div>
            </div>
            <!-- <div class="col-sm-1"></div> -->
            <div class="col-sm-3 card card-body">
                <h5 class="text-center" style="color:#375c91;">Category</h5>
                <hr>
                <div class="ps-3">
                    <?php foreach ($data['categories'] as $category) : ?>
                        <div class="pb-2">
                            <input type="checkbox"> <?php echo $category->category; ?></br>
                        </div>
                    <?php endforeach; ?>
                </div>


            </div>
            <!-- <div class="col-sm-1"></div> -->
            <div class="col-sm-3 card card-body">
                <h5 class="text-center" style="color:#375c91;">Others</h5>
                <hr>
                <div class="ps-3">
                    <div class="pb-2">
                        <input type="checkbox"> Cafeteria</br>
                    </div>
                    <div class="pb-2">
                        <input type="checkbox"> Medical Center</br>
                    </div>
                    <div class="pb-2">
                        <input type="checkbox"> Mosque</br>
                    </div>
                    <div class="pb-2">
                        <input type="checkbox"> Temple</br>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>