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
        Pengguna
        <small>daftar pengguna</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <?= printPesan(); ?>
       <a href="pengguna_form.php" class="btn btn-primary">Tambah Pengguna</a>
        <table class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>E-Mail</th>
              <th class="action-column">Action</th>
            </tr>
        </thead>
        <tbody>
        <?php 
        $penggunas = pagination(tampilanPengguna());
        if($penggunas == null){ ?>
          <tr>
            <td>Belum Ada Pengguna yang dimasukan</td>
            <td></td>
          </tr>
        <?php }else{ 
        foreach($penggunas as $pengguna ):?>
          <tr>
            <td><?= $pengguna['email'] ?></td>
            <td> 
              <a href="pengguna_password.php?id=<?= $pengguna['id_user'] ?>" title="Ubah Password" aria-label="Ubah Password"><span class="fa fa-lock fa-1x"></span>Ubah Password</a>
              <a href="pengguna_form.php?id=<?= $pengguna['id_user'] ?>" title="Update" aria-label="Update"><span class="fa fa-pencil-square-o fa-1x"></span>Ubah Data</a>
              <?php if($_SESSION['admin'] != $pengguna['username']) {?>
              <a href="hapus.php?table=user&key=id_user&id=<?= $pengguna['id_user'] ?>" title="Delete" aria-label="Delete" onclick="return confirm('Apa anda yakin ingin menghapus item ?');">
                <span class="fa fa-trash-o fa-1x"></span>Hapus
              </a>
              <?php } ?>
            </td>
          </tr>
        <?php endforeach;  }?>
        </tbody>
      </table>
      <?= ($penggunas == null) ? '' : $pagination->render(); ?>
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