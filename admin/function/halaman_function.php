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

function tambahHalaman($nama, $judul, $isi){
    global $koneksi;
    $nama = $koneksi->cekString($nama);
    $judul = $koneksi->cekString($judul);
    $isi = $koneksi->cekString($isi);
    $slug = slug($nama);
    $slug = $koneksi->cekString($slug);

    if(!empty($nama) && !empty($judul) && !empty($isi) && !empty($slug)){
        $sql = "INSERT INTO `page` (`nama`, `judul`, `isi`, `slug`) VALUES ('$nama','$judul','$isi','$slug')";
        if($koneksi->run($sql)){
            $pesan = 'Berhasil Menambahkan Halaman';
            redirectHalaman($pesan);
        }
    }else{
        return "Tidak Ada Boleh Kosong";
    }
}

function getHalaman($id){
    global $koneksi;
    $id = $koneksi->cekString($id);
    $sql = "SELECT * FROM `page` WHERE id_page = '$id'";    
    $data = $koneksi->singleQuery($sql);
    if($data == null){
        $pesan = 'Terjadi Kesalahan saat mengubah Halaman';
        redirectHalaman($pesan, true);
    }
    return $data;
}

function ubahHalaman($id, $nama, $judul, $isi){
    global $koneksi;
    $nama = $koneksi->cekString($nama);
    $nama = $koneksi->cekString($nama);
    $judul = $koneksi->cekString($judul);
    $isi = $koneksi->cekString($isi);
    $slug = slug($nama);
    $slug = $koneksi->cekString($slug);
    
    if(!empty($id) && !empty($nama) && !empty($judul) && !empty($isi) && !empty($slug)){
        $sql = "UPDATE `page` SET `nama` = '$nama', `judul` = '$judul', `isi` = '$isi', `slug` = '$slug' WHERE `page`.`id_page` = '$id'";
        if($koneksi->run($sql)){
            $pesan = 'Berhasil Mengubah Halaman';
            redirectHalaman($pesan);
        }
    }else{
        return "Tidak Ada Boleh Kosong";
    }
}