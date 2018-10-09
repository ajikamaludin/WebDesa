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
        Perangkat
        <small>daftar perangkat dalam kantor desa</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <?= printPesan(); ?>
       <a href="perangkat_form.php" class="btn btn-primary">Tambah Perangkat</a>
        <table class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>Nama</th>
              <th>Keterangan</th>
              <th>Status</th>
              <th class="action-column">Action</th>
            </tr>
        </thead>
        <tbody>
        <?php 
        $perangkats = pagination(tampilanPerangkat());
        if($perangkats == null){ ?>
          <tr>
            <td>Belum Ada Perangkat yang dimasukan</td>
            <td></td>
            <td></td>
          </tr>
        <?php }else{ 
        foreach($perangkats as $perangkat ):?>
          <tr>
            <td><?= $perangkat['nama'].' ('.getJabatan($perangkat['id_jabatan'])['nama'].')' ?></td>
            <td><?= $perangkat['keterangan'] ?></td>
            <td><?= ($perangkat['status'] == 0) ? 'Aktif' : 'Tidak Aktif' ?></td>
            <td> 
              <a href="perangkat_form.php?id=<?= $perangkat['id_perangkat'] ?>" title="Update" aria-label="Update"><span class="fa fa-pencil-square-o fa-1x"></span>Ubah</a>
              <a href="hapus.php?table=perangkat_desa&key=id_perangkat&id=<?= $perangkat['id_perangkat'] ?>" title="Delete" aria-label="Delete" onclick="return confirm('Apa anda yakin ingin menghapus item ?');">
                <span class="fa fa-trash-o fa-1x"></span>Hapus
              </a>
            </td>
          </tr>
        <?php endforeach;  }?>
        </tbody>
      </table>
      <?= ($perangkats == null) ? '' : $pagination->render(); ?>
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