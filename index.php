<?php
include 'function/init.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>Website Bangunkerto</title>

    <!-- Favicon -->
    <link rel="icon" href=" img/core-img/favicon.ico">

    <!-- Core Stylesheet -->
    <link href="<?= assets('style.css') ?>" rel="stylesheet">

    <!-- Responsive CSS -->
    <link href="<?= assets('css/responsive.css') ?>" rel="stylesheet">

</head>

<body>
    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="mosh-preloader"></div>
    </div>

    <!-- ***** Header Area Start ***** -->
    
    <header class="header_area clearfix" style="background-color: #25499f">
        <div class="container-fluid h-100">
            <div class="row h-100">
                <!-- Menu Area Start -->
                <div class="col-12 h-100">
                    <div class="menu_area h-100">
                        <nav class="navbar h-100 navbar-expand-lg align-items-center">
                            <!-- Logo -->
                            <a class="navbar-brand" href="index.html"><img src="<?= assets('img/core-img/sleman.png')?>" alt="logo"></a>

                            <!-- Menu Area -->
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mosh-navbar" aria-controls="mosh-navbar" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>

                            <div class="collapse navbar-collapse justify-content-end" id="mosh-navbar">
                                <ul class="navbar-nav animated" id="nav">
                                    <li class="nav-item active"><a class="nav-link" href="index.html">Home</a></li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="moshDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pages</a>
                                        <div class="dropdown-menu" aria-labelledby="moshDropdown">
                                            <a class="dropdown-item" href="index.html">Home</a>
                                            <a class="dropdown-item" href="about.html">About Us</a>
                                            <a class="dropdown-item" href="services.html">Services</a>
                                            <a class="dropdown-item" href="portfolio.html">Portfolio</a>
                                            <a class="dropdown-item" href="blog.html">Blog</a>
                                            <a class="dropdown-item" href="contact.html">Contact</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="elements.html">Elements</a>
                                        </div>
                                    </li>
                                    <li class="nav-item"><a class="nav-link" href="tentang.html">Profil</a></li>
                                    <li class="nav-item"><a class="nav-link" href="berita.html">Berita</a></li>
                                    <li class="nav-item"><a class="nav-link" href="galeri.html">Galeri</a></li>
                                    <li class="nav-item"><a class="nav-link" href="doc.html">Dokumen</a></li>
                                    <!-- <li class="nav-item"><a class="nav-link" href="portfolio.html">Portfolio</a></li>
                                    <li class="nav-item"><a class="nav-link" href="blog.html">Blog</a></li>
                                    <li class="nav-item"><a class="nav-link" href="contact.html">Contact</a></li> -->
                                </ul>
                                <!-- Search Form Area Start -->
                                <div class="search-form-area animated">
                                    <form action="#" method="post">
                                        <input type="search" name="search" id="search" placeholder="Type keywords &amp; hit enter">
                                        <button type="submit" class="d-none"><img src="<?= assets('img/core-img/search-icon.png')?>" alt="Search"></button>
                                    </form>
                                </div>
                                <!-- Search btn -->
                                <div class="search-button">
                                    <a href="#" id="search-btn"><img src="<?= assets('img/core-img/search-icon.png')?>" alt="Search"></a>
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->

    <!-- ***** Welcome Area Start ***** -->
    <section class="welcome_area clearfix" id="home" >
        <div class="mosh-about-us-thumb wow fadeInUp" data-wow-delay="0.5s">
                        <div class="hero-slides owl-carousel">
                        <!-- Single Hero Slides -->
                            <div class="single-hero-slide d-flex align-items-center justify-content-center">
                                <div class="hero-slide-content text-center">
                                    <img class="slide-img" src="<?= assets('img/bg-img/sub-1.jpg')?>" alt="">
                                </div>
                            </div>
                            <!-- Single Hero Slides -->
                            <div class="single-hero-slide d-flex align-items-center justify-content-center">
                                <div class="hero-slide-content text-center">
                                    <img class="slide-img" src="<?= assets('img/bg-img/cta-2.jpg')?>" alt="">
                                </div>
                            </div>
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