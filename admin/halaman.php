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
        Halaman
        <small>daftar halaman</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <?= printPesan(); ?>
       <a href="halaman_form.php" class="btn btn-primary">Tambah Halaman</a>
        <table class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>Nama</th>
              <th>Link</th>
              <th class="action-column">Action</th>
            </tr>
        </thead>
        <tbody>
        <?php 
        $halamans = pagination(tampilanHalaman());
        if($halamans == null){ ?>
          <tr>
            <td>Belum Ada Halaman yang dibuat</td>
            <td></td>
            <td></td>
          </tr>
        <?php }else{ 
        foreach($halamans as $halaman ):?>
          <tr>
            <td><?= $halaman['nama'] ?></td>
            <td><a href="<?= urlPage($halaman['slug']) ?>" target="_blank"><?= urlPage($halaman['slug']) ?></a></td>
            <td> 
              <a href="halaman_form.php?id=<?= $halaman['id_page'] ?>" title="Update" aria-label="Update"><span class="fa fa-pencil-square-o fa-1x"></span>Ubah</a>
              <a href="hapus.php?table=page&key=id_page&id=<?= $halaman['id_page'] ?>" title="Delete" aria-label="Delete" onclick="return confirm('Apa anda yakin ingin menghapus item ?');">
                <span class="fa fa-trash-o fa-1x"></span>Hapus
              </a>
            </td>
          </tr>
        <?php endforeach;  }?>
        </tbody>
      </table>
      <?= ($halamans == null) ? '' : $pagination->render(); ?>
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