<?php
include 'view/header.php';
$pengaturan = getPengaturan();
if(isset($_POST['submit'])){
    var_dump($_POST);
    $nama = $_POST['nama'];
    $kontak = $_POST['kontak'];
    $alamat = $_POST['alamat'];
    $email = $_POST['email'];
    $facebook = $_POST['facebook'];
    $twitter = $_POST['twitter'];
    $instagram = $_POST['instagram'];
    $deskripsi = $_POST['deskripsi'];
    $logo = $_POST['logo_old'];
    $files = $_FILES['logo_new'];

    $error = setPengaturan($nama, $logo, $kontak, $alamat, $email, $facebook, $twitter, $instagram, $deskripsi, $files);
    if($error == true){
        header("Refresh:0");
    }
}

?>

<body class="hold-transition skin-blue fixed sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

<?php include 'view/sidebar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Pengaturan
        <small>pengaturan umum</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
    <div class="row">
    <?= printPesan(); ?>
    <div class="col-md-12">
      <form action="pengaturan.php" method="post" enctype="multipart/form-data">
        <label class="control-label" for="tag-nama">Nama Website</label>
        <input type="text" class="form-control" name="nama" aria-required="true" required value="<?= $pengaturan['nama'] ?>">
        <label class="control-label" for="tag-nama">Logo Website</label>
        <input type="file" id="logo" name="logo_new">
        <div class="help-block"></div>
        <img src="<?= $pengaturan['logo'] ?>" alt="" width="300px" height="300px">
        <div class="help-block"></div>
        <input type="hidden" class="form-control" name="logo_old" aria-required="true" required value="<?= $pengaturan['logo'] ?>">
        <label class="control-label" for="tag-nama">Kontak</label>
        <input type="text" class="form-control" name="kontak" aria-required="true" required value="<?= $pengaturan['kontak'] ?>">
        <label class="control-label" for="tag-nama">Alamat</label>
        <input type="text" class="form-control" name="alamat" aria-required="true" required value="<?= $pengaturan['alamat'] ?>">
        <label class="control-label" for="tag-nama">Email</label>
        <input type="email" class="form-control" name="email" aria-required="true" required value="<?= $pengaturan['email'] ?>">
        <label class="control-label" for="tag-nama">Facebook</label>
        <input type="text" class="form-control" name="facebook" aria-required="true" required value="<?= $pengaturan['facebook'] ?>">
        <label class="control-label" for="tag-nama">Twitter</label>
        <input type="text" class="form-control" name="twitter" aria-required="true" required value="<?= $pengaturan['twitter'] ?>">
        <label class="control-label" for="tag-nama">Instagram</label>
        <input type="text" class="form-control" name="instagram" aria-required="true" required value="<?= $pengaturan['instagram'] ?>">
        <label class="control-label" for="tag-nama">Deskripsi</label>
        <textarea  class="form-control" name="deskripsi" aria-required="true" required><?= $pengaturan['deskripsi'] ?></textarea>
        <div class="help-block"></div>
        
        <input type="submit" class="btn btn-primary btn-flat" name="submit" value="Simpan">
      </form>
    </div>
    </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php include 'view/footer_wrapper.php' ?>
</div>
<!-- ./wrapper -->
</body>
<?php
include 'view/footer.php';