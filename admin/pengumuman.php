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
        Pengumuman
        <small>daftar pengumuman</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <?= printPesan(); ?>
       <a href="kategori_form.php" class="btn btn-primary">Tambah Pengumuman</a>
        <table class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>Pengumuman</th>
              <th>Waktu Berakhir</th>
              <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php 
        $pengumumans = pagination(tampilanPengumuman());
        if($pengumumans == null){ ?>
          <tr>
            <td>Belum Ada Pengumuman yang dimasukan</td>
            <td></td>
            <td></td>
          </tr>
        <?php }else{ 
        foreach($pengumumans as $pengumuman ):?>
          <tr>
            <td><?= $pengumuman['penumuman'] ?></td>
            <td><?= $pengumuman['tgl_berakhir'] ?></td>
            <td> 
              <a href="pengumuman_form.php?id=<?= $pengumuman['id_pengumuman'] ?>" title="Update" aria-label="Update"><span class="fa fa-pencil-square-o fa-1x"></span></a>
              <a href="hapus.php?table=pengumuman&key=id_pengumuman&id=<?= $pengumuman['id_pengumuman'] ?>" title="Delete" aria-label="Delete" onclick="return confirm('Apa anda yakin ingin menghapus item ?');">
                <span class="fa fa-trash-o fa-1x"></span>
              </a>
            </td>
          </tr>
        <?php endforeach;  }?>
        </tbody>
      </table>
      <?= ($pengumumans == null) ? '' : $pagination->render(); ?>
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