<?php

function redirectJabatan($pesan, $error = false){
    if($error){
        $_SESSION['error'] = true; 
    }
    $_SESSION['pesan'] = $pesan;
    header('Location: jabatan.php');
    return;
}
function tampilanJabatan(){
    global $koneksi;
    $sql = 'SELECT * FROM jabatan ORDER BY `id_jabatan` DESC';
    return $koneksi->query($sql);
}
function tambahJabatan($nama){
    global $koneksi;
    $nama = $koneksi->cekString($nama);
    if(!empty($nama)){
        $sql = "INSERT INTO `jabatan` (`nama`) VALUES ('$nama')";
        if($koneksi->run($sql)){
            $pesan = 'Berhasil Menambahkan Jabatan';
            redirectJabatan($pesan);
        }
    }else{
        return "Nama Tidak Boleh Kosong";
    }
}

function getJabatan($id){
    global $koneksi;
    $id = $koneksi->cekString($id);
    $sql = "SELECT * FROM jabatan WHERE id_jabatan = '$id'";    
    $data = $koneksi->singleQuery($sql);
    if($data == null){
        $pesan = 'Terjadi Kesalahan saat mengubah jabatan';
        redirectJabatan($pesan, true);
    }
    return $data;
}

function ubahJabatan($id, $nama){
    global $koneksi;
    $id = $koneksi->cekString($id);
    $nama = $koneksi->cekString($nama);
    if(!empty($nama)){
        $sql = "UPDATE `jabatan` SET `nama` = '$nama' WHERE `id_jabatan` = '$id'";
        if($koneksi->run($sql)){
            $pesan = 'Berhasil Mengubah Jabatan';
            redirectJabatan($pesan);
        }
    }else{
        return "Nama Tidak Boleh Kosong";
    }
}