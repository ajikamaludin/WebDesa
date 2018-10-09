<?php

?>
<!-- ***** Blog Area Start ***** -->
    <section class="blog-area section_padding_100">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-8">
                    <div class="mosh-blog-posts">
                        <div class="row">
                        <?php $beritas = paginationFront(getBeritasAll($search,$archive,$kategori), 4);
                            if($beritas != null) {?>
                            <?php foreach($beritas as $berita){?>
                            <!-- Single Blog Start -->
                            <div class="col-12">
                                <div class="single-blog wow fadeInUp" data-wow-delay="0.2s">
                                    <!-- Post Thumb -->
                                    <div class="blog-post-thumb">
                                        <img src="<?= $berita['gambar'] ?>" alt="">
                                    </div>
                                    <!-- Post Meta -->
                                    <div class="post-meta">
                                        <h6>By Admin, 
                                            <a href="?arship=<?= formatWaktuSlug($berita['tgl_diupdate']) ?>"><?= formatWaktu($berita['tgl_diupdate']) ?>,</a>
                                            <a href="?kategori=<?= slug(getKategoriName($berita['id_kategori'])) ?>"><?= getKategoriName($berita['id_kategori']) ?></a>
                                        </h6>
                                    </div>
                                    <!-- Post Title -->
                                    <h2><?= $berita['judul'] ?></h2>
                                    <!-- Post Excerpt -->
                                    <p><?= cutText($berita['isi']) ?></p>
                                    <!-- Read More btn -->
                                    <a href="berita.php?q=<?= $berita['slug'] ?>">Read More</a>
                                </div>
                            </div>
                            <?php } }else{ ?>
                                <h1>Berita Tidak ditemuka</h1>
                            <?php } ?>
                        </div>
                    </div>
                    <!-- Pagination Area Start -->
                    <div class="mosh-pagination-area">
                    <nav style="margin: auto;width: 15%;">
                        <?= ($beritas == null) ? '' : $pagination->render(); ?>
                    </nav>
                    </div>
                </div>
    <!-- sidebar -->
    <?php include 'sidebar.php' ?>
            </div>
        </div>
    </section>
    <!-- ***** Blog Area End ***** -->