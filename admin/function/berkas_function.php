<?php

function redirectBerkas($pesan, $error = false){
    if($error){
        $_SESSION['error'] = true; 
    }
    $_SESSION['pesan'] = $pesan;
    header('Location: berkas.php');
    return;
}

function tampilanBerkas(){
    global $koneksi;
    $sql = "SELECT * FROM upload_file ORDER BY `id_file` DESC";
    return $koneksi->query($sql);
}

function tambahBerkas($nama, $file){
    global $koneksi;
    $nama = $koneksi->cekString($nama);
    $file = uploadFiles($file);
    if($file != false){
        $file = $koneksi->cekString($file);
        $sql = "INSERT INTO `upload_file` ( `nama`, `file`) VALUES ('$nama', '$file')";
        if($koneksi->run($sql)){
            return 'Berhasil Menambahkan Berkas';
        }else{
            return 'Terjadi Kesalahan Saat Menambah Berkas';
        }
    }else{
        return 'Terjadi Kesalahan Saat Menambah Berkas';
    }
}