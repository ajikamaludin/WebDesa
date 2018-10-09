<?php
include 'view/header.php';
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
        <small>daftar galeri</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <?= printPesan(); ?>
       <a href="galeri_form.php" class="btn btn-primary">Tambah Galeri</a>
        <table class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>Nama</th>
              <th class="action-column">Action</th>
            </tr>
        </thead>
        <tbody>
        <?php 
        $galeris = pagination(tampilanGaleri());
        if($galeris == null){ ?>
          <tr>
            <td>Belum Ada Galeri yang dimasukan</td>
            <td></td>
          </tr>
        <?php }else{ 
        foreach($galeris as $galeri):?>
          <tr>
            <td><?= $galeri['nama'] ?></td>
            <td> 
              <a href="galeri_detail.php?id=<?= $galeri['id_galeri'] ?>" title="Tambah Foto" aria-label="Tambah Foto"><span class="fa fa-eye fa-1x"></span>Tambah Gambar</a>
              <a href="galeri_form.php?id=<?= $galeri['id_galeri'] ?>" title="Update" aria-label="Update"><span class="fa fa-pencil-square-o fa-1x"></span>Ubah</a>
              <a href="hapus.php?table=galeri&key=id_galeri&id=<?= $galeri['id_galeri'] ?>" title="Delete" aria-label="Delete" onclick="return confirm('Apa anda yakin ingin menghapus item ?');">
                <span class="fa fa-trash-o fa-1x"></span>Hapus
              </a>
            </td>
          </tr>
        <?php endforeach;  }?>
        </tbody>
      </table>
      <?= ($galeris == null) ? '' : $pagination->render(); ?>
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