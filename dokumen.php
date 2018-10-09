<?php 
include 'function/init.php';
$page = 'Dokumen';
?>
<?php
include 'view/header.php';
?>
<!--BODY START: CONTENT-->
    <section class="mosh--services-area section_padding_100">
        <div class="container">
            <div class="row">
                <!-- Single Feature Area -->
                <?php 
                $dokumens = paginationFront(getDokumens());
                if($dokumens != null){
                foreach($dokumens as $dokumen) {?>
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="single-feature-area d-flex mb-100">
                        <div class="feature-icon mr-30">
                            <img src="<?= assets('img/core-img/edit.png')?>" alt="">
                        </div>
                        <div class="feature-content">
                            <a href="<?= $dokumen['file'] ?>"><h4><?= $dokumen['nama'] ?></h4></a>
                        </div>
                    </div>
                </div>
                <?php } }?>
            </div>
            
            <div class="mosh-pagination-area" style="margin-top: 10px;">
            <nav style="margin: auto;width: 25%;">
                <?= ($dokumens == null) ? '' : $pagination->render(); ?>
            </nav>
        </div>
        </div>
    </section>

<?php 
include 'view/footer.php'
?>
</body>
</html>