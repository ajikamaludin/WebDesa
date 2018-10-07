<?php
include 'view/header.php';

$error = null;
$pengun = ['nama'=>'','username' => '','email'=>'','password'=>'','foto'=>''];
$id = [];

if(isset($_POST['submit'])){
  $nama = $_POST['nama'];
  $email = $_POST['email'];
  $username = $_POST['username'];
  $foto = $_FILES['gambar'];
  
  if(isset($_POST['id'])){
    $id = $_POST['id'];
    $foto_lama = $_POST['foto'];
    $error = ubahPengguna($id, $nama, $email, $username, $foto, $foto_lama);
  }else{
    $password = $_POST['password'];
    $error = tambahPengguna($nama, $email, $username, $password, $foto);
  }
}
if(isset($_GET['id']) && !empty($_GET['id']) ){
  $id = $_GET['id'];
  $pengun = getPengguna($id);
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
        Profile
        <small>profile pengguna</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
    <?= printError($error) ?>
    <div class="col-md-12">
      <form action="pengguna_form.php" method="post" enctype="multipart/form-data">
        <label class="control-label" for="tag-nama">Nama</label>
        <input type="text" class="form-control" name="nama" aria-required="true" required value="<?= $pengun['nama'] ?>">
        <label class="control-label" for="tag-nama">E-Mail</label>
        <input type="email" class="form-control" name="email" aria-required="true" required value="<?= $pengun['email'] ?>">
        <label class="control-label" for="tag-nama">Username</label>
        <input type="text" class="form-control" name="username" aria-required="true" required value="<?= $pengun['username'] ?>">
        <label class="control-label" for="tag-nama">Password</label>
        <?php if($id == null){ ?>
          <input type="password" class="form-control" name="password" aria-required="true" required>
        <?php } ?>
        <label class="control-label" for="tag-nama">Gambar : </label>
        <input type="file" id="fotoprofile" name="gambar">

        <?php if(!empty($id)){ ?>
          <input type="hidden" value="<?= $pengun['foto'] ?>" name="foto">
          <input type="hidden" value="<?= $pengun['id_user'] ?>" name="id">
        <?php } ?>
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