<?php 
ob_start();
include 'function/init.php';
$page = 'Dokumen';
$search = null;
if(isset($_GET['search'])){
    $search = $_GET['search'];
}
?>
<?php
include 'view/header.php';
?>
<!--BODY START: CONTENT-->
    <section class="mosh-services-area section_padding_100">
        <div class="container">
            <div class="row"  style="display: flex;">
                <div class="blog-post-search-widget mb-100"  style="flex: 1;">
                    <form action="dokumen.php" method="GET">
                        <input type="search" name="search" id="Search" placeholder="Cari Dokumen ">
                        <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                    </form>
                </div>
            </div>
            <div class="row">
                <!-- Single Feature Area -->
                <?php 
                $dokumens = paginationFront(getDokumens($search));
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
                <?php } }else{
                    header('Location: 404.php');
                }?>
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