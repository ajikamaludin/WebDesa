<?php
ob_start();
include 'function/init.php';
$page = 'Berita';
$kategori = null;
$archive = null;

include 'view/header.php';//body was started from here

if(isset($_GET['q'])){
    $slug = $_GET['q'];
    $berita = getBeritaOne($slug);
    if($berita != null){
        include 'view/berita_detail.php';
    }else{
        header('Location: 404.php');
    }
}else{
    $search = null;
    if(isset($_GET['kategori'])){
        $kategori = $_GET['kategori'];
    }else if(isset($_GET['arsip'])){
        $archive = $_GET['arsip'];
    }else if(isset($_GET['search'])){
        $search = $_GET['search'];
    }
    include 'view/berita.php';
}

include 'view/footer.php'
?>
</body>
</html>