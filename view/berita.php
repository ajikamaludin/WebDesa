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
                            <?php } } ?>
                        </div>
                    </div>
                    <!-- Pagination Area Start -->
                    <div class="mosh-pagination-area">
                    <nav style="margin: auto;width: 15%;">
                        <?= ($beritas == null) ? '' : $pagination->render(); ?>
                    </nav>
                    </div>
                </div>

                <div class="col-12 col-md-4">
                    <div class="mosh-blog-sidebar">

                        <div class="blog-post-search-widget mb-100">
                            <form action="berita.php" method="GET">
                                <input type="search" name="search" id="Search">
                                <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                            </form>
                        </div>

                        <div class="blog-post-archives mb-100">
                            <h5>Arsip</h5>
                            <ul>
                                <?php $archives = getArchives(); 
                                if($archives != null){
                                    foreach($archives as $archive){?>
                                    <li><a href="?arsip=<?=$archive['slug']?>"><?=$archive['nama']?></a></li>
                                <?php } }else{ ?>
                                    <li>Tidak Ada Arsip</li>
                                <?php } ?>
                            </ul>
                        </div>

                        <div class="blog-post-categories mb-100">
                            <h5>Kategori</h5>
                            <ul>
                            <?php $kategoris = getKategoris(); 
                                if($kategoris != null){
                                    foreach($kategoris as $kategori){?>
                                <li><a href="?kategori=<?= $kategori['slug'] ?>"><?= $kategori['nama'] ?></a></li>
                                <?php } }else{ ?>
                                    <li>Tidak Ada Kategori</li>
                                <?php } ?>
                            </ul>
                        </div>

                        <div class="latest-blog-posts mb-100">
                            <h5>Berita Terbaru</h5>
                            <!-- Single Latest Blog Post -->
                            <?php if(getBeritas() != null) {?>
                            <?php foreach(getBeritas() as $berita){?>
                            <div class="single-latest-blog-post d-flex">
                                <div class="latest-blog-post-thumb">
                                    <img src="<?= $berita['gambar'] ?>" alt="gambar">
                                </div>
                                <div class="latest-blog-post-content">
                                    <h6><a href="?q=<?= $berita['slug'] ?>"><?= $berita['judul'] ?></a></h6>
                                    <div class="post-meta">
                                        <h6>By Admin / <?= formatWaktu($berita['tgl_dibuat']) ?></h6>
                                    </div>
                                </div>
                            </div>
                            <?php } } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Blog Area End ***** -->