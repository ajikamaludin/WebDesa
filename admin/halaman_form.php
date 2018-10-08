<?php
include 'view/header.php';

$error = null;
$page = [
  'id_page' => null,
  'nama' => '',
  'judul' => '',
  'isi' => '',
];

if(isset($_POST['submit'])){
  
  $nama = $_POST['nama'];
  $judul = $_POST['judul'];
  $isi = $_POST['isi'];

  if(isset($_POST['id'])){
    $id = $_POST['id'];
    $error = ubahHalaman($id, $nama, $judul, $isi);
  }else{
    $error = tambahHalaman($nama, $judul, $isi);
  }
}

if(isset($_GET['id'])){
  $id = $_GET['id'];
  $page = getHalaman($id);
}
?>

<body class="hold-transition skin-blue sidebar-mini">
<script src="https://cdn.ckeditor.com/4.10.1/standard/ckeditor.js"></script>
<!-- Site wrapper -->
<div class="wrapper">

<?php include 'view/sidebar.php'; ?>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Halaman
        <small>Halaman <?= (isset($_GET['id'])) ? 'baru' : 'ubah' ?></small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
    <?= printError($error) ?>
    <div class="row">
    <div class="col-md-12">
      <form action="halaman_form.php" method="post" enctype="multipart/form-data">
        
        <?php if($page['id_page'] != null){ ?>
          <input type="hidden" class="form-control" name="id" aria-required="true" value="<?= $id ?>">
        <?php } ?>
        <label class="control-label" for="tag-nama">Nama</label>
        <sub>ditampilkan pada menu</sub>
        <input type="text" class="form-control" name="nama" aria-required="true" value="<?= $page['nama'] ?>" required>

        <label class="control-label" for="tag-nama">Judul</label>
        <input type="text" class="form-control" name="judul" aria-required="true" value="<?= $page['judul'] ?>" required>

        <label class="control-label" for="tag-nama">Halaman</label>
        <textarea class="form-control" name="isi" aria-required="true" required> <?= $page['isi'] ?> </textarea>

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
<script>
	CKEDITOR.replace('isi');
</script>
</body>
<?php
include 'view/footer.php';