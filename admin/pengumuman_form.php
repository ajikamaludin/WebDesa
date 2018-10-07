<?php
include 'view/header.php';

$error = null;
$pengumuman = ['pengumuman' => '', 'tgl_berakhir' => ''];

if(isset($_POST['submit'])){
  $pengumuman = $_POST['pengumuman'];
  $tglselesai = $_POST['tgl'];
  $id = $_POST['id'];
  if(isset($_POST['id'])){
    $error = ubahPengumuman($id, $pengumuman, $tglselesai);
  }else{
    $error = tambahPengumuman($pengumuman, $tglselesai);
  }
}
if(isset($_GET['id'])){
  $id = $_GET['id'];
  $pengumuman = getPengumuman($id);
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
        Pengumuman
        <small>pengumuman</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
    <?= printError($error) ?>
    <div class="col-md-12">
      <form action="pengumuman_form.php" method="post">
        <?php if(isset($_GET['id'])){?>
            <input type="hidden" name="id" value="<?= $id ?>">
        <?php } ?>
        <label class="control-label" for="tag-nama">Pengumuman</label>
        <input type="text" class="form-control" name="pengumuman" aria-required="true" required value="<?= $pengumuman['pengumuman'] ?>">
        <label class="control-label" for="tag-nama">Tanggal Berakhir</label>
        <input type="date" class="form-control" name="tgl" aria-required="true" required value="<?= $pengumuman['tgl_berakhir'] ?>">
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