<?php

function redirectKategori($pesan, $error = false){
    if($error){
        $_SESSION['error'] = true; 
    }
    $_SESSION['pesan'] = $pesan;
    header('Location: kategori.php');
}
function tampilanKategori(){
    global $koneksi;
    $sql = 'SELECT * FROM kategori_post';
    return $koneksi->query($sql);
}
function tambahKategori($nama){
    global $koneksi;
    $nama = $koneksi->cekString($nama);
    if(!empty($nama)){
        $sql = "INSERT INTO `kategori_post` (`nama`) VALUES ('$nama')";
        if($koneksi->run($sql)){
            $pesan = 'Berhasil Menambahkan Kategori';
            redirectKategori($pesan);
        }
    }else{
        return "Nama Tidak Boleh Kosong";
    }
}

function getKategori($id){
    global $koneksi;
    $id = $koneksi->cekString($id);
    $sql = "SELECT * FROM kategori_post WHERE id_kategori = '$id'";    
    $data = $koneksi->singleQuery($sql);
    if($data == null){
        $pesan = 'Terjadi Kesalahan saat mengubah kategori';
        redirectKategori($pesan, true);
    }
    return $data;
}

function ubahKategori($id, $nama){
    global $koneksi;
    $id = $koneksi->cekString($id);
    $nama = $koneksi->cekString($nama);
    if(!empty($nama)){
        $sql = "UPDATE `kategori_post` SET `nama` = '$nama' WHERE `kategori_post`.`id_kategori` = '$id'";
        if($koneksi->run($sql)){
            $pesan = 'Berhasil Mengubah Kategori';
            redirectKategori($pesan);
        }
    }else{
        return "Nama Tidak Boleh Kosong";
    }
}