<?php
include 'view/header.php';

$error = null;
$berita = [
  'judul' => '', 
  'isi' => '', 
  'gambar' => '', 
  'status' => '1',
  'id_kategori' => ''
];


if(isset($_POST['submit'])){
  
  $judul = $_POST['judul'];
  $status = $_POST['status'];
  $gambar_baru = $_FILES['gambar_baru'];
  $isi = $_POST['berita'];
  $kategori = $_POST['kategori'];

  if(isset($_POST['id'])){
    $id = $_POST['id'];
    $gambar_lama = $_POST['gambar_lama'];
    $error = ubahBerita($id, $judul, $status, $gambar_lama, $gambar_baru, $isi, $kategori);
  }else{
    $error = tambahBerita($judul, $status, $gambar_baru, $isi, $kategori);
  }
}

if(isset($_GET['id'])){
  $id = $_GET['id'];
  $berita = getBerita($id);
}
?>

<body class="hold-transition skin-blue sidebar-mini">
<script src="https://cdn.ckeditor.com/4.10.1/standard/ckeditor.js"></script>
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
        <small>berita</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
    <?= printError($error) ?>
    <div class="row">
    <div class="col-md-12">
      <form action="berita_form.php<?= (isset($id))  ? '?id='.$berita['id_post'] : '' ?>" method="post" enctype="multipart/form-data">
        
        <?php if(isset($id)){ ?>
          <input type="hidden" class="form-control" name="id" aria-required="true" value="<?= $id ?>">
        <?php } ?>
        
        <label class="control-label" for="tag-nama">Judul</label>
        <input type="text" class="form-control" name="judul" aria-required="true" value="<?= $berita['judul'] ?>" required>

        <label class="control-label" for="tag-nama">Status</label>
        <select class="form-control" name="status" required>
          <option value="0" <?= ($berita['status'] == 0) ? 'selected' : '' ?>>Publish</option>
          <option value="1"  <?= ($berita['status'] == 1) ? 'selected' : ''?>>Draf</option>
        </select>
        
        <label class="control-label" for="tag-nama">Header Image</label>
        <input type="file" id="gambarheader" name="gambar_baru">
        
        <?php if($berita['gambar'] != null){?>
            <div class="help-block"></div>
            <img src="<?= $berita['gambar'] ?>" alt="Gambar Lama" width="400px" height="300px" >
            <input type="hidden" name="gambar_lama" value="<?= $berita['gambar'] ?>">
            <div class="help-block"></div>
        <?php } ?>
        
        <label class="control-label" for="tag-nama">Berita</label>
        <textarea class="form-control" name="berita" aria-required="true" required> <?= $berita['isi'] ?> </textarea>

        <label class="control-label" for="tag-nama">Kategori </label>
        <select class="form-control" name="kategori" required>
          <?php if(count(tampilanKategori())  == 0){ ?>
            <option value="0" disabled> Tidak Diketahui, Setidaknya Buat Satu Kategori </option>
          <?php } else {
           foreach(tampilanKategori() as $kategori){ 
          ?>
            <option value="<?= $kategori['id_kategori'] ?>" <?= ($berita['id_kategori'] == $kategori['id_kategori']) ? 'selected' : '' ?>><?= $kategori['nama'] ?></option>
          <?php } 
              } ?>
        </select>

        <div class="help-block"></div>
        
        <input type="submit" class="btn btn-primary btn-flat" name="submit" value="Simpan">
      </form>
    </div>
    </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php include 'view/footer_wrapper.php' ?>
</div>
<!-- ./wrapper -->
<script>
	CKEDITOR.replace('berita');
</script>
</body>
<?php
include 'view/footer.php';