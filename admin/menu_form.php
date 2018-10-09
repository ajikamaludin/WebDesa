<?php
include 'view/header.php';

$notAllowed = ['Home', 'Galeri', 'Dokumen'];
$error = null;
$menu = ['id_menu' => null,'parent' => '', 'nama' => '','url' => ''];


if(isset($_POST['submit'])){
  $parent = $_POST['parent'];
  $nama = $_POST['nama'];
  $url = $_POST['url'];
  $id = $_POST['id'];
  if(isset($_POST['id'])){
    $error = ubahMenu($id, $parent, $nama, $url);
  }else{
    $error = tambahMenu($parent,  $nama, $url);
  }
}
if(isset($_GET['id'])){
  $id = $_GET['id'];
  $menu = getMenu($id);
}
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
        <small>menu</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
    <?= printError($error) ?>
    <div class="col-md-12">
      <form action="menu_form.php" method="post">
          <?php if(isset($id)){ ?>
           <input type="hidden" class="form-control" name="id" aria-required="true" value="<?= $id ?>">
          <?php } ?>
        <label class="control-label" for="tag-nama">Parent</label>
        <select class="form-control" name="parent" required>
            <option value="0"> No Parent </option>
            <?php foreach(tampilanMenuNoParent() as $men){
                if(!in_array($men['nama'], $notAllowed)){ ?>
                <option value="<?= $men['id_menu'] ?>" <?= ($men['id_menu'] == $menu['parent']) ? 'selected' : '' ?>><?= $men['nama'] ?></option>
            <?php } } ?>
        </select>

        <label class="control-label" for="tag-nama">Nama</label>
        <input type="text" class="form-control" name="nama" aria-required="true" value="<?= $menu['nama'] ?>" required>
        <label class="control-label" for="tag-nama">Link</label>
        <input type="text" class="form-control" name="url" aria-required="true" value="<?= $menu['url'] ?>" required>
        <p>contoh link : http://example.com/</p>
        <div class="help-block"></div>
        
        <input type="submit" class="btn btn-primary btn-flat" name="submit" value="Simpan">
      </form>
    </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php include 'view/footer_wrapper.php' ?>
</div>
<!-- ./wrapper -->
</body>
<?php
include 'view/footer.php';