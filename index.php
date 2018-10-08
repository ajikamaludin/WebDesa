<?php
include 'function/init.php';

?>
<?php include 'view/header_index.php' ?>

    <!-- ***** Welcome Area Start ***** -->
    <section class="welcome_area clearfix" id="home" >
        <div class="mosh-about-us-thumb wow fadeInUp" data-wow-delay="0.5s">
            <div class="hero-slides owl-carousel">
                <?php foreach(getBanners() as $banner ){?>
            <!-- Single Hero Slides -->
                <div class="single-hero-slide d-flex align-items-center justify-content-center">
                    <div class="hero-slide-content text-center">
                        <img class="slide-img" src="<?= $banner['gambar'] ?>" alt="">
                    </div>
                </div>
                <?php } ?>
            </div>        
        </div>
    </section>
    <!-- ***** Welcome Area End ***** -->

    <!-- ***** Service Area Start ***** -->
    <div class="container" style="margin-top: 10%;">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading text-center">
                        <hr style="height: 10px;">
                    </div>
                </div>
            </div>
        </div>
    <section class="mosh-more-services-area d-sm-flex clearfix">
        <div class="single-more-service-area">
            <div class="more-service-content text-center wow fadeInUp" data-wow-delay=".1s">
                <img src="<?= assets('img/bg-img/cta-2.jpg')?>" alt="" style="width: 350px; height: 250px;">
                <a href="berita-single.html" style="font-size: 25px;">Judul Berita</a>
                <p> Deskripsi Singkat Deskripsi Singkat Deskripsi Singkat Deskripsi Singkat Deskripsi Singkat Deskripsi Singkat Deskripsi Singkat Deskripsi Singkat </p>
            </div>
        </div>
        <div class="single-more-service-area">
            <div class="more-service-content text-center wow fadeInUp" data-wow-delay=".4s">
                <img src="<?= assets('img/bg-img/cta-2.jpg')?>" alt="" style="width: 350px; height: 250px;">
                <a href="#" style="font-size: 25px;">Judul Berita</a>
                <p> Deskripsi Singkat Deskripsi Singkat Deskripsi Singkat Deskripsi Singkat Deskripsi Singkat Deskripsi Singkat Deskripsi Singkat Deskripsi Singkat </p>
            </div>
        </div>
        <div class="single-more-service-area">
            <div class="more-service-content text-center wow fadeInUp" data-wow-delay=".7s">
             <img src="<?= assets('img/bg-img/cta-2.jpg')?>" alt="" style="width: 350px; height: 250px;">
                <a href="#" style="font-size: 25px;">Judul Berita</a>
                <p> Deskripsi Singkat Deskripsi Singkat Deskripsi Singkat Deskripsi Singkat Deskripsi Singkat Deskripsi Singkat Deskripsi Singkat Deskripsi Singkat </p>
            </div>
        </div>
        <div class="single-more-service-area">
            <div class="more-service-content text-center wow fadeInUp" data-wow-delay="1s">
                <img src="<?= assets('img/bg-img/cta-2.jpg')?>" alt="" style="width: 350px; height: 250px;">
                <a href="#" style="font-size: 25px;">Judul Berita</a>
                <p> Deskripsi Singkat Deskripsi Singkat Deskripsi Singkat Deskripsi Singkat Deskripsi Singkat Deskripsi Singkat Deskripsi Singkat Deskripsi Singkat </p>
            </div>
        </div>

    </section>
    <div class="col-12 text-center mt-50">
        <a href="berita.html" class="btn mosh-btn">Lebih Lanjut</a>
    </div>

     <!-- ***** Portfolio Area Start ***** -->
    <section class="mosh-portfolio-area section_padding_100_0 clearfix">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading text-center">
                        <h2>Galeri</h2>
                        <hr style="height: 10px;">
                    </div>
                </div>
            </div>
        </div>

        <div class="mosh-portfolio">
            <!-- Single gallery Item Start -->
            <div class="single_gallery_item gd">
                <img src="<?= assets('img/bg-img/cta.jpg')?>" alt="">
                <div class="gallery-hover-overlay d-flex align-items-center justify-content-center">
                    <div class="port-hover-text text-center">
                        <h4>Judul Foto</h4>
                        <a href="galeri-single.html">Lihat Selengkapnya</a>
                    </div>
                </div>

            </div>
            <!-- Single gallery Item Start -->
            <div class="single_gallery_item bi">
                <img src="<?= assets('img/portfolio-img/2.jpg')?>" alt="">
                <div class="gallery-hover-overlay d-flex align-items-center justify-content-center">
                    <div class="port-hover-text text-center">
                       <h4>Judul Foto</h4>
                        <a href="#">Lihat Selengkapnya</a>
                    </div>
                </div>
            </div>
            <!-- Single gallery Item Start -->
            <div class="single_gallery_item gd bi">
                <img src="<?= assets('img/portfolio-img/3.jpg')?>" alt="">
                <div class="gallery-hover-overlay d-flex align-items-center justify-content-center">
                    <div class="port-hover-text text-center">
                        <h4>Judul Foto</h4>
                        <a href="#">Lihat Selengkapnya</a>
                    </div>
                </div>
            </div>
            <!-- Single gallery Item Start -->
            <div class="single_gallery_item pho">
                <img src="<?= assets('img/bg-img/cta.jpg')?>" alt="">
                <div class="gallery-hover-overlay d-flex align-items-center justify-content-center">
                    <div class="port-hover-text text-center">
                        <h4>Judul Foto</h4>
                        <a href="#">Lihat Selengkapnya</a>
                    </div>
                </div>
            </div>
            <!-- Single gallery Item Start -->
            <div class="single_gallery_item pho">
                <img src="<?= assets('img/portfolio-img/5.jpg')?>" alt="">
                <div class="gallery-hover-overlay d-flex align-items-center justify-content-center">
                    <div class="port-hover-text text-center">
                        <h4>Judul Foto</h4>
                        <a href="#">Lihat Selengkapnya</a>
                    </div>
                </div>
            </div>
            <!-- Single gallery Item Start -->
            <div class="single_gallery_item wd pc">
                <img src="<?= assets('img/portfolio-img/6.jpg')?>" alt="">
                <div class="gallery-hover-overlay d-flex align-items-center justify-content-center">
                    <div class="port-hover-text text-center">
                        <h4>Judul Foto</h4>
                        <a href="#">Lihat Selengkapnya</a>
                    </div>
                </div>
            </div>
            <!-- Single gallery Item Start -->
            <div class="single_gallery_item wd">
                <img src="<?= assets('img/bg-img/cta.jpg')?>" alt="">
                <div class="gallery-hover-overlay d-flex align-items-center justify-content-center">
                    <div class="port-hover-text text-center">
                        <h4>Judul Foto</h4>
                        <a href="#">Lihat Selengkapnya</a>
                    </div>
                </div>
            </div>
            <!-- Single gallery Item Start -->
            <div class="single_gallery_item pc">
                <img src="<?= assets('img/portfolio-img/8.jpg')?>" alt="">
                <div class="gallery-hover-overlay d-flex align-items-center justify-content-center">
                    <div class="port-hover-text text-center">
                        <h4>Judul Foto</h4>
                        <a href="#">Lihat Selengkapnya</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 text-center mt-100" style="margin-bottom: 10%;">
            <a href="galeri.html" class="btn mosh-btn">Lebih Lanjut</a>
        </div>
    </section>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading text-center">
                        <h2>Pengumuman</h2>
                        <hr style="height: 10px;">
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
                                    <h3>Pengumuman ini akan hilang dalam waktu yang ditentukan</h3>
                                     <h3>Pengumuman ini akan hilang dalam waktu yang ditentukan</h3>
                                      <h3>Pengumuman ini akan hilang dalam waktu yang ditentukan</h3>
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