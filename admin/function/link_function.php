<?php

function redirectLink($pesan, $error = false){
    if($error){
        $_SESSION['error'] = true; 
    }
    $_SESSION['pesan'] = $pesan;
    header('Location: link.php');
    return;
}

function tampilanLink(){
    global $koneksi;
    $sql = 'SELECT * FROM link_terkait ORDER BY `id_link` DESC';
    return $koneksi->query($sql);
}

function tambahLink($nama, $url){
    global $koneksi;
    $nama = $koneksi->cekString($nama);
    if(substr($url, 0, 4) != 'http'){
        $url = 'http://'.$url;
    }
    $url = $koneksi->cekString($url);
    if(!empty($nama) && !empty($url)){
        $sql = "INSERT INTO `link_terkait` (`nama`, `url`) VALUES ('$nama','$url')";
        if($koneksi->run($sql)){
            $pesan = 'Berhasil Menambahkan Link';
            redirectLink($pesan);
        }
    }else{
        return "Tidak Ada Boleh Kosong";
    }
}

function getLink($id){
    global $koneksi;
    $id = $koneksi->cekString($id);
    $sql = "SELECT * FROM link_terkait WHERE id_link = '$id'";    
    $data = $koneksi->singleQuery($sql);
    if($data == null){
        $pesan = 'Terjadi Kesalahan saat mengubah link';
        redirectLink($pesan, true);
    }
    return $data;
}

function ubahLink($id, $nama, $url){
    global $koneksi;
    $id = $koneksi->cekString($id);
    $nama = $koneksi->cekString($nama);
    if(substr($url, 0, 4) != 'http'){
        $url = 'http://'.$url;
    }
    $url = $koneksi->cekString($url);
    if(!empty($nama) && !empty($url)){
        $sql = "UPDATE `link_terkait` SET `nama` = '$nama',`url` = '$url' WHERE `link_terkait`.`id_link` = '$id'";
        if($koneksi->run($sql)){
            $pesan = 'Berhasil Mengubah Link';
            redirectLink($pesan);
        }
    }else{
        return "Tidak Ada Boleh Kosong";
    }
}