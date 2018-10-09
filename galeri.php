<?php
ob_start();
include 'function/init.php';
$page = 'Galeri';

include 'view/header.php';//body was started from here

if(isset($_GET['q'])){
    $id = $_GET['q'];
    $galeris = getGaleriOne($id);
    if($galeris != null){
        include 'view/galeri_detail.php';
    }else{
        header('Location: 404.php');
    }
}else{
    include 'view/galeri.php';
}

include 'view/footer.php'
?>
</body>
</html>