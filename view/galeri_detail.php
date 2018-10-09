<!-- ***** About Us Area Start ***** -->
<section class="mosh-aboutUs-area" style="margin-bottom: 100px;">
    <div class="container">
        <div class="col-12 col-md-12">
                <div class="mosh-about-us-content">
                    <div class="section-heading" style="margin: 30px auto; text-align: center;">
                        <!-- Post Meta -->
                            <div class="post-meta">
                                <h6>By <a href="#">Admin,</a><a href="#"><?= formatWaktu($galeris['tgl_dibuat']) ?></a></h6>
                            </div>
                        <h2>Judul Foto</h2>
                    </div>
                </div>
            </div>
        <div class="row align-items-center">
            <div class="col-12 col-md-1"></div>
            <div class="col-12 col-md-10">
                <div class="mosh-about-us-thumb wow fadeInUp" data-wow-delay="0.5s">
                    <div class="hero-slides owl-carousel">
                    <!-- Single Hero Slides -->
                    <?php if($galeris['gambar'] != null){ 
                        foreach($galeris['gambar'] as $gambar){?>
                    <div class="single-hero-slide d-flex align-items-center justify-content-center">
                        <div class="hero-slide-content text-center">
                            <img class="slide-img" src="<?= $gambar['gambar'] ?>" alt="">
                        </div>
                    </div>
                    <?php } } ?>
                   </div>        
                </div>
            </div>
            <div class="col-12 col-md-2"></div>
            <div class="col-12 col-md-12">
                <div class="mosh-about-us-content" style="margin-top: 50px;">
                    <p style="text-align: justify;"><?= $galeris['deskripsi'] ?></p>
                </div>
            </div>
        </div>
    </div>
</section>