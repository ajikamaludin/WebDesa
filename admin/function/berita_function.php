<?php

function redirectBerita($pesan, $error = false){
    if($error){
        $_SESSION['error'] = true; 
    }
    $_SESSION['pesan'] = $pesan;
    header('Location: berita.php');
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
    if($gambar){
        $pesan = "Gagal Mengambil Gambar , Terjadi Kesalahan";
        redirectBerita($pesan, true);
    }
    if(!empty($judul) && !empty($isi) &&!empty($kategori) &&!empty($slug)){
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
    //$sql = "SELECT * FROM kategori_post WHERE id_kategori = '$id'";    
    $data = $koneksi->singleQuery($sql);
    if($data == null){
        //$pesan = 'Terjadi Kesalahan saat mengubah kategori';
        redirectKategori($pesan, true);
    }
    return $data;
}

function ubahBerita($id, $nama){
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