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
        Pesan
        <small>daftar pesan</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <?= printPesan(); ?>
        <table class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>Bio Data</th>
              <th>Pesan</th>
              <th>Tanggal Masuk</th>
            </tr>
        </thead>
        <tbody>
        <?php 
        $pesans = pagination(tampilanPesan());
        if($pesans == null){ ?>
          <tr>
            <td>Belum Ada Pesan masuk</td>
            <td></td>
            <td></td>
          </tr>
        <?php }else{ 
        foreach($pesans as $pesan ):?>
          <tr>
            <td><?= "<b>".$pesan['nama']."</b><br> "."(".$pesan['email'].")<br>"?></td>
            <td><?= $pesan['isi'] ?></td>
            <td><?= formatWaktu($pesan['tgl_dibuat']) ?></td>
          </tr>
        <?php endforeach;  }?>
        </tbody>
      </table>
      <?= ($pesans == null) ? '' : $pagination->render(); ?>
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