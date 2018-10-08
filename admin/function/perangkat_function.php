<?php

function redirectPerangkat($pesan, $error = false){
    if($error){
        $_SESSION['error'] = true; 
    }
    $_SESSION['pesan'] = $pesan;
    header('Location: perangkat.php');
    return;
}
function tampilanPerangkat(){
    global $koneksi;
    $sql = 'SELECT * FROM perangkat_desa ORDER BY `id_perangkat` DESC';
    return $koneksi->query($sql);
}

function tambahPerangkat($id_jabatan, $nama, $keterangan, $status){
    global $koneksi;
    $id_jabatan = $koneksi->cekString($id_jabatan);
    $nama = $koneksi->cekString($nama);
    $keterangan = $koneksi->cekString($keterangan);
    $status = $koneksi->cekString($status);
    if(!empty($id_jabatan) &&!empty($nama) &&!empty($keterangan)){
        $sql = "INSERT INTO `perangkat_desa` (`id_jabatan`,`nama`,`keterangan`,`status`) VALUES ('$id_jabatan','$nama','$keterangan','$status')";
        if($koneksi->run($sql)){
            $pesan = 'Berhasil Menambahkan Perangkat';
            redirectPerangkat($pesan);
        }
    }else{
        return "Tidak Ada yang Boleh Kosong";
    }
}

function getPerangkat($id){
    global $koneksi;
    $id = $koneksi->cekString($id);
    $sql = "SELECT * FROM perangkat_desa WHERE id_perangkat = '$id'";    
    $data = $koneksi->singleQuery($sql);
    if($data == null){
        $pesan = 'Terjadi Kesalahan saat mengubah perangkat';
        redirectPerangkat($pesan, true);
    }
    return $data;
}

function ubahPerangkat($id, $id_jabatan, $nama, $keterangan, $status){
    global $koneksi;
    $id = $koneksi->cekString($id);
    $id_jabatan = $koneksi->cekString($id_jabatan);
    $nama = $koneksi->cekString($nama);
    $keterangan = $koneksi->cekString($keterangan);
    $status = $koneksi->cekString($status);
    if(!empty($id_jabatan) &&!empty($nama) &&!empty($keterangan)){
        $sql = "UPDATE `perangkat_desa` 
        SET `id_jabatan` = '$id_jabatan', `nama` = '$nama', `status` = '$status', `keterangan` = '$keterangan' 
        WHERE `perangkat_desa`.`id_perangkat` = $id";
        if($koneksi->run($sql)){
            $pesan = 'Berhasil Mengubah Perangkat';
            redirectPerangkat($pesan);
        }
    }else{
        return "Tidak Ada yang Boleh Kosong";
    }
}