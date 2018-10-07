<?php

function redirectPengumuman($pesan, $error = false){
    if($error){
        $_SESSION['error'] = "true"; 
    }
    $_SESSION['pesan'] = $pesan;
    header('Location: pengumuman.php');
}

function tampilanPengumuman(){
    global $koneksi;
    $sql = "SELECT * FROM pengumuman ORDER BY tgl_berakhir DESC";
    return $koneksi->query($sql);
}

function tambahPengumuman($pengumuman, $tgl){
    global $koneksi;
    $pengumuman = $koneksi->cekString($pengumuman);
    $tgl = $koneksi->cekString($tgl);
    if(!empty($pengumuman) && !empty($tgl)){
        $sql = "INSERT INTO `pengumuman` (`pengumuman`, `tgl_berakhir`)
        VALUES ('$pengumuman', '$tgl')";
        if($koneksi->run($sql)){
            $pesan = 'Pengumuman Berhasil di tambahkan';
            redirectPengumuman($pesan);
            return;
        }
    }else{
        $pesan = 'Pengumuman dan Tanggal Tidak Boleh Kosong';
        redirectPengumuman($pesan, true);
    }
    $pesan = 'Gagal Menambahkan Pengumuman , Terjadi Kesalahan';
    redirectPengumuman($pesan, true);
}

function getPengumuman($id){
    global $koneksi;
    $id = $koneksi->cekString($id);
    $sql = "SELECT * FROM pengumuman WHERE id_pengumuman = '$id'";    
    $data = $koneksi->singleQuery($sql);
    if($data == null){
        $pesan = 'Terjadi Kesalahan saat mengubah pengumuman';
        redirectPengumuman($pesan, true);
    }
    return $data;
}

function ubahPengumuman($id, $pengumuman, $tgl){
    global $koneksi;
    $pengumuman = $koneksi->cekString($pengumuman);
    $tgl = $koneksi->cekString($tgl);
    $id = $koneksi->cekString($id);
    if(!empty($pengumuman) && !empty($tgl) && !empty($id)){
        $sql = "UPDATE `pengumuman` SET `pengumuman` = '$pengumuman', `tgl_berakhir` = '$tgl' WHERE `pengumuman`.`id_pengumuman` = '$id'";
        if($koneksi->run($sql)){
            $pesan = 'Pengumuman Berhasil diubah';
            redirectPengumuman($pesan);
            return;
        }
    }else{
        $pesan = 'Pengumuman dan Tanggal Tidak Boleh Kosong';
        redirectPengumuman($pesan, true);
    }
    $pesan = 'Gagal Mengubah Pengumuman , Terjadi Kesalahan';
    redirectPengumuman($pesan, true);
}