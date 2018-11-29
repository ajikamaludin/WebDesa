<?php
include 'function/init.php';

?>
<?php include 'view/header_index.php' ?>

    <!-- ***** Welcome Area Start ***** -->
    <section class="clearfix" id="home" >
        <div class="mosh-about-us-thumb wow fadeInUp" data-wow-delay="0.5s">
            <div class="hero-slides owl-carousel">
            <?php if(getBanners() != null) {?>
                <?php foreach(getBanners() as $banner ){?>
            <!-- Single Hero Slides -->
                <div class="justify-content-center">
                    <div class="hero-slide-content text-center">
                        <img class="slide-img slide-front" src="<?= $banner['gambar'] ?>" alt="" style="object-fit: cover;">
                    </div>
                </div>
                <?php } }?>
            </div>        
        </div>
    </section>
    <!-- ***** Welcome Area End ***** -->

    <!-- ***** Service Area Start ***** -->
    <div class="container" style="margin-top: 50px;">
        <div class="row">
            <div class="col-12">
                <div class="section-heading text-center" style="margin-bottom: 0px !important;">
                    <h2>Berita</h2>
                    <hr style="border-width: 5px; ">
                </div>
            </div>
        </div>
    </div>
    <section class="mosh-more-services-area d-sm-flex clearfix" style="margin-top: 50px;">
    <?php if(getBeritas() != null) {?>
    <?php foreach(getBeritas() as $berita){?>
        <div class="single-more-service-area">
            <div class="more-service-content text-center wow fadeInUp" data-wow-delay=".1s">
                <img src="<?= $berita['gambar'] ?>" alt="" style="width: 350px; height: 250px;">
                <a href="berita.php?q=<?= $berita['slug'] ?>" style="font-size: 25px;"><?= $berita['judul'] ?></a>
                <p> <?= cutText($berita['isi']) ?> </p>
            </div>
        </div>
        <?php } } ?>

    </section>
    <div class="col-12 text-center mt-50">
        <a href="berita.php" class="btn mosh-btn">Lebih Lanjut</a>
    </div>

     <!-- ***** Portfolio Area Start ***** -->
    <section class="mosh-portfolio-area section_padding_100_0 clearfix">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading text-center" style="margin-bottom: 40px !important;">
                        <h2>Galeri</h2>
                        <hr style="border-width: 5px; ">
                    </div>
                </div>
            </div>
        </div>

        <div class="mosh-portfolio">
            <!-- Single gallery Item Start -->
            <?php if(getGaleriHeader(12) != null) {?>
            <?php foreach(getGaleriHeader(12) as $galeri){?>
            <div class="single_gallery_item gd">
                <img src="<?= $galeri['gambar'] ?>" alt="">
                <div class="gallery-hover-overlay d-flex align-items-center justify-content-center">
                    <div class="port-hover-text text-center">
                        <h4><?= $galeri['nama'] ?></h4>
                        <a href="galeri.php?q=<?= $galeri['id_galeri'] ?>">Lihat Selengkapnya</a>
                    </div>
                </div>
            </div>
            <?php } }?>
            
            
        </div>
        <div class="col-12 text-center mt-100" style="margin-bottom: 100px;">
            <a href="galeri.php" class="btn mosh-btn">Lebih Lanjut</a>
        </div>
    </section>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading text-center" style="margin-bottom: 40px !important;">
                        <h2>Pengumuman</h2>
                        <hr style="border-width: 5px; ">
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading text-center">
                        <div class="single-blog wow fadeInUp" data-wow-delay="0.7s">
                            <div class="media" style="width: 100%; height: auto;border: 10px solid lightblue">
                                <div class="media-body" style="margin: 20px auto;">
                                <?php if(getGaleriHeader() != null) {?>
                                <?php foreach(getPengumumanUpdate() as $pengumuman) {?>
                                    <h3><?= $pengumuman['pengumuman'] ?></h3>
                                <?php } }?>
                                </div>
                            </div>
                        </div>
                    </div> 
                </div>
            </div>
        </div>

<?php include 'view/footer.php' ?>
</body>

</html>