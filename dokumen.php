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
                <?php foreach(getDokumens() as $dokumen) {?>
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
                <?php } ?>
            </div>

            <div class="mosh-pagination-area" style="margin-top: 100px;">
            <nav>
                <ul class="pagination" style="justify-content: center;">
                    <li class="page-item active"><a class="page-link" href="#">1.</a></li>
                    <li class="page-item"><a class="page-link" href="#">2.</a></li>
                    <li class="page-item"><a class="page-link" href="#">3.</a></li>
                </ul>
            </nav>
        </div>
        </div>
    </section>

<?php 
include 'view/footer.php'
?>
</body>
</html>