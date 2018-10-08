<?php

function redirectMenu($pesan, $error = false){
    if($error){
        $_SESSION['error'] = "true"; 
    }
    $_SESSION['pesan'] = $pesan;
    header('Location: menu.php');
    return;
}

function tampilanMenuNoParent(){
    global $koneksi;
    $menus = $koneksi->query("SELECT * FROM menu WHERE parent = '0'");
    return $menus;
}
function tampilanMenu(){
    global $koneksi;
    $menus = $koneksi->query('SELECT * FROM menu');
    $datas = null;
    foreach($menus as $menu){
        $id = $menu['id_menu'];
        $parent = $menu['parent'];
        if($parent != 0){
            $datas[$parent]['child'][] = $menu;
        }else{
            $datas[$id] = $menu;
        }
    }
    return $datas;
}

function tambahMenu($parent,  $nama, $url){
    global $koneksi;
    $parent = $koneksi->cekString($parent);
    $nama = $koneksi->cekString($nama);
    $url = formatUrl($url);
    $url = $koneksi->cekString($url);
    if(!empty($nama)){
        $sql = "INSERT INTO `menu` (`parent`, `nama`, `url`) VALUES ('$parent', '$nama', '$url')";
        if($koneksi->run($sql)){
            $pesan = 'Berhasil Menambahkan Menu';
            redirectMenu($pesan);
        }
    }else{
        return "Tidak Ada yang Boleh Kosong";
    }
}

function getMenu($id){
    global $koneksi;
    $id = $koneksi->cekString($id);
    $sql = "SELECT * FROM menu WHERE id_menu = '$id'";    
    $data = $koneksi->singleQuery($sql);
    if($data == null){
        $pesan = 'Terjadi Kesalahan saat mengubah menu';
        redirectKategori($pesan, true);
    }
    return $data;
}

function ubahMenu($id, $parent,  $nama, $url){
    global $koneksi;
    $id = $koneksi->cekString($id);
    $parent = $koneksi->cekString($parent);
    $nama = $koneksi->cekString($nama);
    $url = formatUrl($url);
    $url = $koneksi->cekString($url);
    if(!empty($nama)){
        $sql = "UPDATE `menu` SET `parent` = '$parent', `nama` = '$nama', `url` = '$url' WHERE `menu`.`id_menu` = '$id'";
        if($koneksi->run($sql)){
            $pesan = 'Berhasil Mengubah Menu';
            redirectMenu($pesan);
        }
    }else{
        return "Tidak Ada yang Boleh Kosong";
    }
}