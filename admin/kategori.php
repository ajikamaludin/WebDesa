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
        Kategori
        <small>daftar kategori berita</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <?= printPesan(); ?>
       <a href="kategori_form.php" class="btn btn-primary">Tambah Kategori</a>
        <table class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>Nama</th>
              <th class="action-column">Action</th>
            </tr>
        </thead>
        <tbody>
        <?php 
        $kategoris = pagination(tampilanKategori());
        if($kategoris == null){ ?>
          <tr>
            <td>Belum Ada Kategori yang dimasukan</td>
            <td></td>
          </tr>
        <?php }else{ 
        foreach($kategoris as $kategori ):?>
          <tr>
            <td><?= $kategori['nama'] ?></td>
            <td> 
              <a href="kategori_form.php?id=<?= $kategori['id_kategori'] ?>" title="Update" aria-label="Update"><span class="fa fa-pencil-square-o fa-1x"></span>Ubah</a>
              <a href="hapus.php?table=kategori_post&key=id_kategori&id=<?= $kategori['id_kategori'] ?>" title="Delete" aria-label="Delete" onclick="return confirm('Apa anda yakin ingin menghapus item ?');">
                <span class="fa fa-trash-o fa-1x"></span>Hapus
              </a>
            </td>
          </tr>
        <?php endforeach;  }?>
        </tbody>
      </table>
      <?= ($kategoris == null) ? '' : $pagination->render(); ?>
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