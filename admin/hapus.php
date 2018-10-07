<?php
include 'function/init.php';

if(isset($_GET['table']) && isset($_GET['key']) && isset($_GET['id'])){
    $id = $_GET['id'];
    $key = $_GET['key'];
    $table = $_GET['table'];
    hapusData($table, $key, $id);
}else{
    $_SESSION['pesan'] = 'Terjadi Kesalahan di Sistem Saat Menghapus Data';
    header('Location: index.php');
}
