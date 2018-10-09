<?php
include 'view/header.php';
$error = null;
if(isset($_POST['submit'])){
    $nama = $_POST['nama'];
    $file = $_FILES['berkas'];
    $error = tambahBerkas($nama, $file);
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
        Berkas
        <small>pengelolaan berkas publik</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        
      <form action="berkas.php" method="post" enctype="multipart/form-data">
        <label class="control-label" for="tag-nama">Berkas Baru : </label>
        <input class="form-control" type="text" name="nama" required>
        <div class="help-block"></div><div class="help-block"></div>
        <input type="file" id="fotoprofile" name="berkas" required>
        <sub>hanya untuk document ( doc/docx dan pdf )</sub>
        <div class="help-block"></div>
        <input type="submit" class="btn btn-primary btn-flat" name="submit" value="Tambah">
      </form>

      <h3>Daftar Berkas</h3>
      <?= printPesan(); ?>
      <?php if(!empty($error)){ ?>
        <div class='col-md-12'><p class='alert alert-info'><?=$error?></p></div>
      <?php } ?>
        <table class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>Nama</th>
              <th class="action-column">Action</th>
            </tr>
        </thead>
        <tbody>
        <?php 
        $berkas = pagination(tampilanBerkas());
        if($berkas == null){ ?>
          <tr>
            <td>Belum Ada Berkas yang dimasukan</td>
            <td></td>
          </tr>
        <?php }else{ 
        foreach($berkas as $berka ):?>
          <tr>
            <td><a href="<?= $berka['file'] ?>"><?= $berka['nama'] ?></a></td>
            <td> 
              <a href="hapus.php?table=upload_file&key=id_file&id=<?= $berka['id_file'] ?>" title="Delete" aria-label="Delete" onclick="return confirm('Apa anda yakin ingin menghapus item ?');">
                <span class="fa fa-trash-o fa-2x"></span>Hapus
              </a>
            </td>
          </tr>
        <?php endforeach;  }?>
        </tbody>
      </table>
      <?= ($berkas == null) ? '' : $pagination->render(); ?>
      </div>
    </section>
  </div>
  <!-- /.content-wrapper -->

<?php include 'view/footer_wrapper.php' ?>
</div>
<!-- ./wrapper -->
</body>
<?php
include 'view/footer.php';