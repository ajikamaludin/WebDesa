<?php
include 'view/header.php';

$error = null;
$kategori = ['id' => null,'nama' => ''];


if(isset($_POST['submit'])){
  $nama = $_POST['nama'];
  $id = $_POST['id'];
  if(isset($_POST['id'])){
    $error = ubahKategori($id, $nama);
  }else{
    $error = tambahKategori($nama);
  }
}
if(isset($_GET['id'])){
  $id = $_GET['id'];
  $kategori = getKategori($id);
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
        Kategori
        <small>kategori berita</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
    <?= printError($error) ?>
    <div class="col-md-12">
      <form action="kategori_form.php" method="post">
        <label class="control-label" for="tag-nama">Nama</label>
        <?php if(isset($id)){ ?>
          <input type="hidden" class="form-control" name="id" aria-required="true" value="<?= $id ?>">
        <?php } ?>
        <input type="text" class="form-control" name="nama" aria-required="true" value="<?= $kategori['nama'] ?>" required>

        <div class="help-block"></div>
        
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