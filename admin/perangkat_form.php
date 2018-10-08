<?php
include 'view/header.php';

$error = null;
$perangkat = ['id_perangkat' => null,'id_jabatan' => '','nama' => '','keterangan' => '', 'status' => ''];


if(isset($_POST['submit'])){
  $id_jabatan = $_POST['jabatan'];
  $nama = $_POST['nama'];
  $keterangan = $_POST['keterangan'];
  $status = $_POST['status'];
  
  if(isset($_POST['id'])){
    $id = $_POST['id'];
    $error = ubahPerangkat($id, $id_jabatan, $nama, $keterangan, $status);
  }else{
    $error = tambahPerangkat($id_jabatan, $nama, $keterangan, $status);
  }
}
if(isset($_GET['id'])){
  $id = $_GET['id'];
  $perangkat = getPerangkat($id);
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
        Perangkat
        <small>perangkat perangkat desa</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
    <?= printError($error) ?>
    <div class="col-md-12">
      <form action="perangkat_form.php" method="post">
        <?php if(isset($id)){ ?>
          <input type="hidden" class="form-control" name="id" aria-required="true" value="<?= $id ?>">
        <?php } ?>
        <label class="control-label" for="tag-nama">Jabatan</label>
        <select class="form-control" name="jabatan" required>
          <?php if(count(tampilanJabatan())  == 0){ ?>
            <option value="0" disabled> Tidak Diketahui, Setidaknya Buat Satu Jabatan </option>
          <?php } else {
           foreach(tampilanJabatan() as $jabatan){ 
          ?>
            <option value="<?= $jabatan['id_jabatan'] ?>" <?= ($perangkat['id_jabatan'] == $jabatan['id_jabatan']) ? 'selected' : '' ?>><?= $jabatan['nama'] ?></option>
          <?php } 
              } ?>
        </select>
        <label class="control-label" for="tag-nama">Nama</label>
        <input type="text" class="form-control" name="nama" aria-required="true" value="<?= $perangkat['nama'] ?>" required>
        <label class="control-label" for="tag-nama">Keterangan</label>
        <input type="text" class="form-control" name="keterangan" aria-required="true" value="<?= $perangkat['keterangan'] ?>" required>
        <label class="control-label" for="tag-nama">Status</label>
        <select class="form-control" name="status" required>
          <option value="0" <?= ($perangkat['status'] == 0) ? 'selected' : '' ?>>Aktif</option>
          <option value="1"  <?= ($perangkat['status'] == 1) ? 'selected' : ''?>>Tidak Aktif</option>
        </select>
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