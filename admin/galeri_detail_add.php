<?php
include 'view/header.php';

$error = null;
$id = $_GET['id'];
if(isset($_POST['submit'])){
    $files = $_FILES['gambar'];
    $error = tambahGambarGaleri($id, $files);
}
?>

<body class="hold-transition skin-blue fixed sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

<?php include 'view/sidebar.php'; ?>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Galeri
        <small>gambar galeri</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
    <?= printError($error) ?>
    <div class="col-md-12">
      <form action="galeri_detail_add.php?id=<?= $id ?>" method="post" enctype="multipart/form-data">
        <label class="control-label" for="tag-nama">Gambar : </label>
        <input type="file" id="gambarheader" name="gambar">
        <div class="help-block"></div>
        <p>Hanya dapat mengungah foto dengan ekstensi jpeg, jpg, dan png</p>
        <input type="submit" class="btn btn-primary btn-flat" name="submit" value="Simpan">
      </form>
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