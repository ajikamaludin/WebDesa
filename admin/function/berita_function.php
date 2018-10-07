<?php

function redirectBerita($pesan, $error = false){
    if($error){
        $_SESSION['error'] = "true"; 
    }
    $_SESSION['pesan'] = $pesan;
    header('Location: berita.php');
    return;
}
function tampilanBerita(){
    global $koneksi;
    $sql = 'SELECT * FROM post';
    return $koneksi->query($sql);
}
function tambahBerita($judul, $status, $gambar, $isi, $kategori){
    global $koneksi;
    $judul = $koneksi->cekString($judul);
    $status = $koneksi->cekString($status);
    $isi = $koneksi->cekString($isi);
    $kategori = $koneksi->cekString($kategori);

    $slug = slug($judul);
    $slug = $koneksi->cekString($slug);
    $gambar = uploadFiles($gambar);
    if($gambar == false){
        $pesan = "Gagal Mengambil Gambar , Terjadi Kesalahan";
        redirectBerita($pesan, true);
    }
    if(!empty($judul) && !empty($isi) &&!empty($kategori) &&!empty($slug) &&!empty($gambar)){
        $sql = "INSERT INTO `post` (`judul`, `isi`, `gambar`, `status`, `id_kategori`, `slug`) 
                VALUES 
                ('$judul', '$isi', '$gambar', '$status',  '$kategori', '$slug')";
        if($koneksi->run($sql)){
            $pesan = 'Berhasil Menambahkan Berita';
            redirectBerita($pesan);
        }
    }else{
        return "Tidak Boleh ada yang di Kosongkan";
    }
}

function getBerita($id){
    global $koneksi;
    $id = $koneksi->cekString($id);
    $sql = "SELECT * FROM post WHERE id_post = '$id'";    
    $data = $koneksi->singleQuery($sql);
    if($data == null){
        $pesan = 'Terjadi Kesalahan saat mengubah kategori';
        redirectBerita($pesan, true);
    }
    return $data;
}

function ubahBerita($id, $judul, $status, $gambar_lama, $gambar_baru, $isi, $kategori){
    global $koneksi;
    $id = $koneksi->cekString($id);
    $judul = $koneksi->cekString($judul);
    $status = $koneksi->cekString($status);
    $isi = $koneksi->cekString($isi);
    $kategori = $koneksi->cekString($kategori);

    $slug = slug($judul);
    $slug = $koneksi->cekString($slug);
    if($gambar_baru['error'] != 4){
        $gambar = uploadFiles($gambar_baru);
        if($gambar == false){
            $pesan = "Gagal Mengambil Gambar , Terjadi Kesalahan";
            redirectBerita($pesan, true);
        }
    }else{
        $gambar = $gambar_lama;
    }
    
    if(!empty($judul) && !empty($isi) &&!empty($kategori) &&!empty($slug) &&!empty($gambar)){
        $sql = "UPDATE `post` SET 
                `judul` = '$judul', 
                `isi` = '$isi', 
                `gambar` = '$gambar', 
                `status` = '$status',
                `id_kategori` = '$kategori', 
                `slug` = '$slug' 
                WHERE `post`.`id_post` = '$id'";
        if($koneksi->run($sql)){
            $pesan = 'Berhasil Mengubah Berita';
            redirectBerita($pesan);
        }
    }else{
        return "Tidak Boleh ada yang di Kosongkan";
    }
}