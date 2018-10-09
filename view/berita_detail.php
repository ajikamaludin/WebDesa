   <!-- ***** Blog Area Start ***** -->
   <section class="blog-area section_padding_100">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-8">
                    <div class="mosh-blog-posts">
                        <div class="row">
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
                                        <a href="berita.php?arship=<?= formatWaktuSlug($berita['tgl_diupdate']) ?>"><?= formatWaktu($berita['tgl_diupdate']) ?>,</a>
                                        <a href="berita.php?kategori=<?= slug(getKategoriName($berita['id_kategori'])) ?>"><?= getKategoriName($berita['id_kategori']) ?></a>
                                    </div>
                                    <!-- Post Title -->
                                    <h2><?= $berita['judul'] ?></h2>
                                    <!-- Post Excerpt -->
                                    <p style="text-align: justify;">
                                        <?= $berita['isi'] ?>
                                    </p>
                                    
                                </div>
                            </div>
                            <!-- Single Blog Start -->
                            <div class="col-12">
                                <div class="single-blog wow fadeInUp" data-wow-delay="0.7s">
                                    <div>
                                    	<h3>Komentar</h3>
                                        <div id="disqus_thread"></div>
                                        
                                            <script>
                                                var disqus_config = function () {
                                                    this.page.url = "<?= 'http://'.getUrl().'/page/'.$berita['slug'] ?>";
                                                    this.page.identifier = '<?= $berita['slug'] ?>';
                                                };
                                            (function() { var d = document, s = d.createElement('script');s.src = 'https://desa-bangun-kerto.disqus.com/embed.js';s.setAttribute('data-timestamp', +new Date());(d.head || d.body).appendChild(s);})();

                                            </script>
                                            <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    <!-- sidebar -->
    <?php include 'sidebar.php' ?>
            </div>
        </div>
    </section>
    <!-- ***** Blog Area End ***** -->