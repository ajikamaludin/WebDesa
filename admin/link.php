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
        Link Terkait
        <small>daftar link terkait</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <?= printPesan(); ?>
       <a href="link_form.php" class="btn btn-primary">Tambah Link</a>
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
        $links = pagination(tampilanLink());
        if($links == null){ ?>
          <tr>
            <td>Belum Ada Link yang dimasukan</td>
            <td></td>
            <td></td>
          </tr>
        <?php }else{ 
        foreach($links as $link ):?>
          <tr>
            <td><?= $link['nama'] ?></td>
            <td> <a href="<?= $link['url'] ?>" target="_blank"><?= $link['url'] ?></a> </td>
            <td> 
              <a href="link_form.php?id=<?= $link['id_link'] ?>" title="Update" aria-label="Update"><span class="fa fa-pencil-square-o fa-1x"></span>Ubah</a>
              <a href="hapus.php?table=link_terkait&key=id_link&id=<?= $link['id_link'] ?>" title="Delete" aria-label="Delete" onclick="return confirm('Apa anda yakin ingin menghapus item ?');">
                <span class="fa fa-trash-o fa-1x"></span>Hapus
              </a>
            </td>
          </tr>
        <?php endforeach;  }?>
        </tbody>
      </table>
      <?= ($links == null) ? '' : $pagination->render(); ?>
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