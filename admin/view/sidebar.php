<?php 
cekSession();
$pengguna = getPengguna();
?>
<header class="main-header">
    <!-- Logo -->
    <a href="." class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>A</b>LT</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Admin</b>LTE</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        </a>
</header>
  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?= ($pengguna['foto'] == null) ? assets('dist/img/user2-160x160.jpg') : $pengguna['foto'] ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?= $pengguna['nama'] ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="<?= strpos(getPageName(), 'index') ? 'active' : '' ?>"><a href="index.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
        <li class="treeview <?= (strpos(getPageName(), 'berita') || strpos(getPageName(), 'kategori')) ? 'active' : '' ?>">
          <a href="#">
            <i class="fa fa-file-text-o"></i> <span>Berita</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu ">
            <li><a href="berita.php"><i class="fa fa-circle-o"></i> Berita </a></li>
            <li><a href="kategori.php"><i class="fa fa-circle-o"></i> Kategori </a></li>
          </ul>
        </li>
        <li class="<?= strpos(getPageName(), 'galeri') ? 'active' : '' ?>"><a href="galeri.php"><i class="fa fa-picture-o"></i> <span>Galeri</span></a></li>
        <li class="<?= strpos(getPageName(), 'halaman') ? 'active' : '' ?>"><a href="index.php"><i class="fa fa-file-o"></i> <span>Halaman</span></a></li>
        <li class="<?= strpos(getPageName(), 'pesan') ? 'active' : '' ?>"><a href="index.php"><i class="fa fa-comment-o"></i> <span>Pesan</span></a></li>
        <li class="<?= strpos(getPageName(), 'pengumuman') ? 'active' : '' ?>"><a href="index.php"><i class="fa fa-bullhorn"></i> <span>Pengumuman</span></a></li>
        <li class="<?= strpos(getPageName(), 'berkas') ? 'active' : '' ?>"><a href="berkas.php"><i class="fa fa-download"></i> <span>Berkas</span></a></li>
        <li class="treeview <?= strpos(getPageName(), 'pengaturan') ? 'active' : '' ?>">
          <a href="#">
            <i class="fa fa-cog"></i> <span>Pengaturan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu ">
            <li><a href="pengaturan.php"><i class="fa fa-circle-o"></i> Umum </a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Banner </a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Menu </a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Link Terkaits </a></li>
          </ul>
        </li>
        <li class="<?= strpos(getPageName(), 'pengguna') ? 'active' : '' ?>"><a href="pengguna.php"><i class="fa fa-user-o"></i> <span>Pengguna</span></a></li>

        <li><a href="logout.php"><i class="fa fa-sign-out"></i> <span>Keluar</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>