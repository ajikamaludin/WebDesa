<?php
if(!isset($_GET['q'])){
    header('Location: 404.php');
}
include 'function/init.php';
$slug = $_GET['q'];
$data = getPage($slug);
if($data == null){
    header('Location: 404.php');
}
$page = $data['nama'];
include 'view/header.php';//body was started from here

?>
<?php

?>
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
                                    <!-- Post Meta -->
                                    <div class="post-meta">
                                        <h6>By Admin</h6>
                                    </div>
                                    <!-- Post Title -->
                                    <h2><?= $data['judul'] ?></h2>
                                    <!-- Post Excerpt -->
                                    <p><?= $data['isi'] ?></p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
    <!-- sidebar -->
    <?php include 'view/sidebar.php' ?>
            </div>
        </div>
    </section>
    <!-- ***** Blog Area End ***** -->
<?php
include 'view/footer.php'
?>
</body>
</html>