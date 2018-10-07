<?php

function redirectKategori($pesan){
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