<?php
include 'view/header.php';
if(isset($_GET['id'])){
    header('Localtion: galeri.php');
}
$id = $_GET['id'];
$galeri = getGaleri($id);
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
        <small>galeri : <?= $galeri['nama'] ?></small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <?= printPesan(); ?>
        <table class="table table-striped table-bordered">
        <tbody>
            <tr>
                <td>Nama</td>
                <td><?= $galeri['nama'] ?></td>
            </tr>
        </tbody>
      </table>
      <h3>Daftar Foto Galeri </h3>
      <a href="galeri_detail_add.php?id=<?= $galeri['id_galeri'] ?>" class="btn btn-primary" style="margin: 2px 2px 10px 2px;">Tambah Foto</a>
      <table class="table table-striped table-bordered">
        <tbody>
            <?php $gambars = tampilanGambarGaleri($id); 
            if($gambars == null){ ?>
                <tr><td>Belum Ada Foto yang di unggah</td></tr>
            <?php } else {
            foreach($gambars as $gambar){
            ?>
            <tr>
                <td>
                    <img src="<?= $gambar['gambar'] ?>" alt="Gambar Galeri" width="300px" heigth="300px">
                </td>
                <td>
                    <a href="hapus.php?table=gambar_galeri&key=id_gambar&id=<?= $gambar['id_gambar'] ?>" title="Delete" aria-label="Delete" onclick="return confirm('Apa anda yakin ingin menghapus item ?');">
                        <span class="fa fa-trash-o fa-3x"></span>
                    </a>
                </td>
            </tr>
            <?php } } ?>
        </tbody>
      </table>
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