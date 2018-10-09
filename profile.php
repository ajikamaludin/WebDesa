<?php
ob_start();
include 'function/init.php';
$page = 'Profil';
$gambar = getGaleriHeader(1);
include 'view/header.php';//body was started from here
?>
<section class="few-words-from-ceo d-md-flex">
         <div class="few-words-thumb bg-img wow fadeInLeftBig" data-wow-delay="1.1s" style="background-image: url(<?= $gambar[0]['gambar'] ?>);">
             
         </div>
        <div class="few-words-contents d-flex align-items-center justify-content-center wow fadeInRightBig" data-wow-delay="0.1s">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-11" >
                        <div class="few-words-text" style="width: 100%;">
                            <div class="section-heading">
                                <h2 style="color: black;"><?= getPengaturan()['nama'] ?></h2>
                            </div>
                            <p style="text-align: justify;">
                                <?= getPengaturan()['deskripsi'] ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       
    </section>
<?php
    include 'view/footer.php'
?>
</body>
</html>