    <!-- ***** Portfolio Area Start ***** -->
    <section class="mosh-portfolio-area section_padding_100">
        <div class="container">
            <div class="row">
            </div>
        </div>

        <div class="mosh-portfolio">
            <!-- Single gallery Item Start -->
            <?php $galeris = paginationFront(getGaleriHeader(null), 12);
            if($galeris != null) {?>
            <?php foreach($galeris as $galeri){?>
            <div class="single_gallery_item gd">
                <img src="<?= $galeri['gambar'] ?>" alt="">
                <div class="gallery-hover-overlay d-flex align-items-center justify-content-center">
                    <div class="port-hover-text text-center">
                        <h4><?= $galeri['nama'] ?></h4>
                        <a href="galeri.php?q=<?= $galeri['id_galeri'] ?>">Lihat Selengkapnya</a>
                    </div>
                </div>
            </div>
            <?php } } ?>
        </div>

        <!-- Discover More btn -->
        <div class="mosh-pagination-area" style="margin-top: 100px;">
            <nav style="margin: auto;width: 15%;">
            <?= ($galeris == null) ? '' : $pagination->render(); ?>
            </nav>
        </div>
    </section>
    <!-- ***** Portfolio Area End ***** -->