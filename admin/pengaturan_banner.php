<?php
include 'view/header.php';
$error = null;
if(isset($_POST['submit'])){
    $file = $_FILES['banner'];
    $error = tambahBanner($file);
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
        Banner
        <small>pengelolaan banner halaman depan</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <form action="pengaturan_banner.php" method="post" enctype="multipart/form-data">
        <label class="control-label" for="tag-nama">Banner Baru : </label>
        <input type="file" id="banner" name="banner" required>
        <sub>pastikan rasio banner sesuai dengan ukuran layar, hanya berupa file png dan jpg, banner dibatasi maksimal 7 banner</sub>
        <div class="help-block"></div>
        <input type="submit" class="btn btn-primary btn-flat" name="submit" value="Tambah">
      </form>

      <h3>Daftar Banner</h3>
      <?= printPesan(); ?>
      <?php if(!empty($error)){ ?>
        <div class='col-md-12'><p class='alert alert-info'><?=$error?></p></div>
      <?php } ?>
        <table class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>Banner</th>
              <th class="action-column">Action</th>
            </tr>
        </thead>
        <tbody>
        <?php 
        $banners = pagination(tampilanBanner());
        if($banners == null){ ?>
          <tr>
            <td>Belum Ada Banner yang dimasukan</td>
            <td></td>
          </tr>
        <?php }else{ 
        foreach($banners as $banner ):?>
          <tr>
            <td>
              <img src="<?= $banner['gambar'] ?>" alt="Banner" width="600px" height="200px">
            </td>
            <td> 
              <a href="hapus.php?table=banner&key=id_banner&id=<?= $banner['id_banner'] ?>" title="Delete" aria-label="Delete" onclick="return confirm('Apa anda yakin ingin menghapus item ?');">
                <span class="fa fa-trash-o fa-2x"></span>
              </a>
            </td>
          </tr>
        <?php endforeach;  }?>
        </tbody>
      </table>
      <?= ($banners == null) ? '' : $pagination->render(); ?>
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