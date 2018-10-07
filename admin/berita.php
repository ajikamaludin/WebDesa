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
        Berita
        <small>daftar berita</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <?= printPesan(); ?>
       <a href="berita_form.php" class="btn btn-primary">Tambah Berita</a>
        <table class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>Judul</th>
              <th>Status</th>
              <th class="action-column">Action</th>
            </tr>
        </thead>
        <tbody>
        <?php 
        $beritas = pagination(tampilanBerita());
        if($beritas == null){ ?>
          <tr>
            <td>Belum Ada Berita yang dimasukan</td>
            <td></td>
            <td></td>
          </tr>
        <?php }else{ 
        foreach($beritas as $berita ):?>
          <tr>
            <td><?= $berita['judul'] ?></td>
            <td><?= ($berita['status'] == 0) ? 'Publish' : 'Draft' ?></td>
            <td> 
              <a href="berita_form.php?id=<?= $berita['id_post'] ?>" title="Update" aria-label="Update"><span class="fa fa-pencil-square-o fa-1x"></span></a>
              <a href="hapus.php?table=post&key=id_post&id=<?= $berita['id_post'] ?>" title="Delete" aria-label="Delete" onclick="return confirm('Apa anda yakin ingin menghapus item ?');">
                <span class="fa fa-trash-o fa-1x"></span>
              </a>
            </td>
          </tr>
        <?php endforeach;  }?>
        </tbody>
      </table>
      <?= ($beritas == null) ? '' : $pagination->render(); ?>
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