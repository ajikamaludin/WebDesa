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
        Jabatan
        <small>daftar jabatan dalam kantor desa</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <?= printPesan(); ?>
       <a href="jabatan_form.php" class="btn btn-primary">Tambah Jabatan</a>
        <table class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>Nama</th>
              <th class="action-column">Action</th>
            </tr>
        </thead>
        <tbody>
        <?php 
        $jabatans = pagination(tampilanJabatan());
        if($jabatans == null){ ?>
          <tr>
            <td>Belum Ada Jabatan yang dimasukan</td>
            <td></td>
          </tr>
        <?php }else{ 
        foreach($jabatans as $jabatan ):?>
          <tr>
            <td><?= $jabatan['nama'] ?></td>
            <td> 
              <a href="jabatan_form.php?id=<?= $jabatan['id_jabatan'] ?>" title="Update" aria-label="Update"><span class="fa fa-pencil-square-o fa-1x"></span></a>
              <a href="hapus.php?table=jabatan&key=id_jabatan&id=<?= $jabatan['id_jabatan'] ?>" title="Delete" aria-label="Delete" onclick="return confirm('Apa anda yakin ingin menghapus item ?');">
                <span class="fa fa-trash-o fa-1x"></span>
              </a>
            </td>
          </tr>
        <?php endforeach;  }?>
        </tbody>
      </table>
      <?= ($jabatans == null) ? '' : $pagination->render(); ?>
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