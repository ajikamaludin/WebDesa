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
                                    foreach($archives as $archive){
                                        ?>
                                    <li><a href="berita.php?arsip=<?=$archive['slug']?>"><?=$archive['nama']?></a></li>
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
                                <li><a href="berita.php?kategori=<?= $kategori['slug'] ?>"><?= $kategori['nama'] ?></a></li>
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
                                    <h6><a href="berita.php?q=<?= $berita['slug'] ?>"><?= $berita['judul'] ?></a></h6>
                                    <div class="post-meta">
                                        <h6>By Admin / <?= formatWaktu($berita['tgl_dibuat']) ?></h6>
                                    </div>
                                </div>
                            </div>
                            <?php } } ?>
                        </div>
                    </div>
                </div>