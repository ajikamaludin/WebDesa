<?php
ob_start();
include 'function/init.php';
$page = 'Struktur Organisasi';

include 'view/header.php';//body was started from here
?>
    <section class="mosh-services-area section_padding_100">
        <div class="container">
            <div class="row">
                <!-- Single Feature Area -->
                <?php if(getStrukturs() != null){
                    foreach(getStrukturs() as $struktur){
                ?>
                <div class="col-12 col-sm-6 col-md-6">
                    <div class="single-feature-area d-flex mb-100">
                        <div class="feature-content">
                            <h4><?= $struktur['orang'] ?></h4>
                            <small><h6><?= $struktur['pangkat'] ?></h6></small>
                        </div>
                    </div>
                </div>
                    <?php } } ?>
            </div>
        </div>
    </section>

<?php
    include 'view/footer.php'
?>
</body>
</html>