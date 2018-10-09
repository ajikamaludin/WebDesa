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
function getLinkTerkait(){
    global $koneksi;
    $sql = 'SELECT * FROM link_terkait ORDER BY `id_link` DESC';
    return $koneksi->query($sql);
}

function getBeritas($limit = 4, $param = null){
    global $koneksi;
    if($param != null){
        $param = ' AND '.$param.' ';
    }
    $sql = "SELECT * FROM post WHERE `status` = '0'".$param."ORDER BY tgl_dibuat DESC LIMIT 0,$limit";
    return $koneksi->query($sql);
}

function cutText($text, $limit = 300){
    $kalimat = substr($text, 0, $limit).'. . .';
    return $kalimat;
}

function getGaleriHeader($limit = 8){
    global $koneksi;
    $sql = "SELECT * FROM `galeri` 
    JOIN `gambar_galeri` ON galeri.id_galeri = gambar_galeri.id_galeri 
    GROUP BY galeri.nama 
    ORDER BY galeri.id_galeri DESC";
    if($limit != null){
        $sql .= "LIMIT 0,$limit";
    }
    return $koneksi->query($sql);
}

function getPengumumanUpdate(){
    global $koneksi;
    $now = date('Y-m-d');
    $sql = "SELECT * FROM `pengumuman` WHERE tgl_berakhir >='$now'";
    return $koneksi->query($sql);
}

function tambahPesan($nama, $email, $subject, $message){
    global $koneksi;
    $nama = $koneksi->cekString($nama);
    $email = $koneksi->cekString($email);
    $subject = $koneksi->cekString($subject);
    $message = $koneksi->cekString($message);
    $isi = $subject.'<br><br>'.$message;
    $isi = $koneksi->cekString($isi);
    if(!empty($nama)){
        $sql = "INSERT INTO `pesan` (`nama`, `email`, `isi`) VALUES ('$nama', '$email', '$isi')";
        return $koneksi->run($sql);
    }
    return false;
}

function getDokumens(){
    global $koneksi;
    $sql = "SELECT * FROM upload_file ORDER BY `id_file` DESC";
    return $koneksi->query($sql);
}

function paginationFront($data, $records_per_page = 9){
    if($data == null){
        return null;
    }
    if(!isset($_SERVER['QUERY_STRING'])){
        $_SERVER['QUERY_STRING'] = 'page=1';
    }

    global $pagination;
    $pagination->records(count($data));
    $pagination->records_per_page($records_per_page);
    $data = array_slice(
        $data,
        (($pagination->get_page() - 1) * $records_per_page),
        $records_per_page
    );
    return $data;
}

function getGaleriOne($id){
    global $koneksi;
    $id = $koneksi->cekString($id);
    $sql = "SELECT * FROM galeri WHERE id_galeri = '$id'";    
    $datas = $koneksi->singleQuery($sql);
    if($datas != null){
        $datas['gambar'] = [];
        $sql = "SELECT * FROM gambar_galeri WHERE id_galeri = '$id'";
        $gambars = $koneksi->query($sql);
        foreach($gambars as $gambar){
            $datas['gambar'][] = $gambar;
        }
    }
    return $datas;
}

function formatWaktu($datetime){
    return date("F jS, Y", strtotime($datetime));
}