<?php
function redirectHalaman($pesan, $error = false){
    if($error){
        $_SESSION['error'] = "true"; 
    }
    $_SESSION['pesan'] = $pesan;
    header('Location: halaman.php');
    return;
}
function tampilanHalaman(){
    global $koneksi;
    $sql = 'SELECT * FROM `page`';
    return $koneksi->query($sql);
}