<?php

function assets($file){
    return 'http://'.$_SERVER['HTTP_HOST'].'/assets/'.$file;
}

function getPengaturan(){
    global $koneksi;
    $sql = "SELECT * FROM pengaturan";
    $data = $koneksi->singleQuery($sql);
    if($data == null){
        $sqlNew = "INSERT INTO `pengaturan` (`nama`, `logo`, `kontak`, `alamat`, `email`, `facebook`, `twitter`, `instagram`, `deskripsi`) VALUES ('nama web', 'logo-web.png', '+62840', 'Jl. Setia Budi', 'admin@email', 'gaya', 'gaya', 'ig', 'deskripsi')";
        if($koneksi->run($sqlNew)){
            $data = $koneksi->singleQuery($sql);
        }
    }
    return $data;
}

function getMenus(){
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

function getBanners(){
    global $koneksi;
    $sql = "SELECT * FROM banner";
    return $koneksi->query($sql);
}