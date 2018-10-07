<?php
include 'view/header.php';

$error = null;

if(isset($_GET['id'])){
  $id = $_GET['id'];
}

if(isset($_POST['submit'])){  
  $id = $_POST['id'];
  $password = $_POST['password'];
  $error = ubahPassword($id, $password);
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
        Password
        <small>password pengguna</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
    <?= printError($error) ?>
    <div class="col-md-12">
      <form action="pengguna_password.php" method="post" enctype="multipart/form-data">
          <input type="hidden" value="<?= $id ?>" name="id">
          <label class="control-label" for="tag-nama">Password Baru</label>
          <input type="password" class="form-control" name="password" aria-required="true" required>
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