<?php

function redirectGaleri($pesan, $error = false){
    if($error){
        $_SESSION['error'] = true; 
    }
    $_SESSION['pesan'] = $pesan;
    header('Location: galeri.php');
    return;
}

function redirectGaleriDetail($id, $pesan, $error = false){
    if($error){
        $_SESSION['error'] = true; 
    }
    $_SESSION['pesan'] = $pesan;
    header('Location: galeri_detail.php?id='.$id);
    return;
}

function tampilanGaleri(){
    global $koneksi;
    $sql = "SELECT * FROM galeri ORDER BY `id_galeri` DESC";
    return $koneksi->query($sql);
}

function tambahGaleri($nama){
    global $koneksi;
    $nama = $koneksi->cekString($nama);
    if(!empty($nama)){
        $sql = "INSERT INTO `galeri` (`nama`) VALUES ('$nama')";
        if($koneksi->run($sql)){
            $pesan = 'Berhasil Menambahkan Galeri';
            redirectGaleri($pesan);
        }
    }else{
        return "Nama Tidak Boleh Kosong";
    }
}

function getGaleri($id){
    global $koneksi;
    $id = $koneksi->cekString($id);
    $sql = "SELECT * FROM galeri WHERE id_galeri = '$id'";    
    $data = $koneksi->singleQuery($sql);
    if($data == null){
        $pesan = 'Terjadi Kesalahan saat mengubah galeri';
        redirectGaleri($pesan, true);
    }
    return $data;
}

function ubahGaleri($id, $nama){
    global $koneksi;
    $id = $koneksi->cekString($id);
    $nama = $koneksi->cekString($nama);
    if(!empty($nama)){
        $sql = "UPDATE `galeri` SET `nama` = '$nama' WHERE `id_galeri` = '$id'";
        if($koneksi->run($sql)){
            $pesan = 'Berhasil Mengubah Galeri';
            redirectGaleri($pesan);
        }
    }else{
        return "Nama Tidak Boleh Kosong";
    }
}

function tampilanGambarGaleri($id){
    global $koneksi;
    $sql = "SELECT * FROM gambar_galeri WHERE `id_galeri` = '$id'";
    return $koneksi->query($sql);
}

function tambahGambarGaleri($id, $file){
    global $koneksi;
    $gambar = uploadFiles($file);
    if($gambar == false){
        $pesan = "Gagal Mengambil Gambar , Terjadi Kesalahan";
        redirectGaleriDetail($id, $pesan, true);
    }else{
        $sql = "INSERT INTO `gambar_galeri` (`id_galeri`, `gambar`) VALUES ('$id', '$gambar');";
        if($koneksi->run($sql)){
            $pesan = "Berhasi Mengugah Gambar";
            redirectGaleriDetail($id, $pesan);
        }else{
            $pesan = "Gagal Mengambil Gambar , Terjadi Kesalahan";
            redirectGaleriDetail($id, $pesan, true);
        }
    }
   
}