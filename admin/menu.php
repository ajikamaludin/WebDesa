<?php
include 'view/header.php';
$notAllowed = ['Home','Profile','Berita','Galeri','Dokumen'];
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
        Menu
        <small>pengaturan menu web</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <?= printPesan(); ?>
       <a href="menu_form.php" class="btn btn-primary">Tambah Menu</a>
       <div class="help-block"></div>
       <div class="row">
           <div class="col-md-4" style="font-size:20px;">
                <ol>
       <?php foreach(tampilanMenu() as $menu){ ?>
                    <li>
                        <?= $menu['nama'] ?>
                        <?php if(!in_array($menu['nama'], $notAllowed)){ ?>
                            <a href="menu_form.php?id=<?= $menu['id_menu'] ?>" title="Update" aria-label="Update"><span class="fa fa-pencil-square-o fa-1x"></span>Ubah</a>
                            <a href="hapus.php?table=menu&key=id_menu&id=<?= $menu['id_menu'] ?>" title="Delete" aria-label="Delete" onclick="return confirm('Apa anda yakin ingin menghapus item ?');">
                                <span class="fa fa-trash-o fa-1x"></span>Hapus
                            </a>
                        <?php } ?>
                        
                    </li>
                    <?php if(isset($menu['child'])){ ?>
                        <ol>
                        <?php foreach($menu['child'] as $child){?>
                            <li>
                                <?= $child['nama'] ?> 
                                <a href="menu_form.php?id=<?= $child['id_menu'] ?>" title="Update" aria-label="Update"><span class="fa fa-pencil-square-o fa-1x"></span>Ubah</a>
                                <a href="hapus.php?table=menu&key=id_menu&id=<?= $child['id_menu'] ?>" title="Delete" aria-label="Delete" onclick="return confirm('Apa anda yakin ingin menghapus item ?');">
                                    <span class="fa fa-trash-o fa-1x"></span>Hapus
                                </a>
                            </li>
                        
                        <?php } ?>
                        </ol>
                    <?php } ?>
       <?php } ?>
                </ol>
           </div>
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