<?php
function getUrl(){
    return $_SERVER['HTTP_HOST'];
}
function slug($name){
    global $slugify;
    return $slugify->slugify($name, '_');
}

function assets($file){
    $protocol = 'http://';
    if(isset($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] != '80'){
        $protocol = 'https://';
    }
    return $protocol.$_SERVER['HTTP_HOST'].'/assets/'.$file;
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
        $sql .= " LIMIT 0,$limit";
    }
    return $koneksi->query($sql);
}

function getPengumumanUpdate($now = true){
    global $koneksi;
    if($now == true){
        $now = date('Y-m-d');
        $sql = "SELECT * FROM `pengumuman` WHERE tgl_berakhir >='$now'";
    }else{
        $sql = "SELECT * FROM `pengumuman`";
    }
    
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

function getDokumens($param = null){
    $sql = "SELECT * FROM upload_file ORDER BY `id_file` DESC";
    if($param != null){
        $sql = "SELECT * FROM upload_file WHERE `nama` LIKE '%$param%' ORDER BY `id_file` DESC";
    }
    global $koneksi;
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

function formatWaktuBulan($datetime){
    return date("F Y", strtotime($datetime));
}

function decodeArchive($archive){
    $tahun = substr($archive, 0,4);
    $bulan = substr($archive, 4,2);
    return $tahun.'-'.$bulan;
}

function getFindIdKategori($kategori){
    global $koneksi;
    $kategori = $koneksi->cekString($kategori);
    $kategori = str_replace('_',' ', $kategori);
    $kategori = $koneksi->cekString($kategori);
    $sql = "SELECT id_kategori FROM kategori_post WHERE nama LIKE '%$kategori%'";
    $kategori = $koneksi->singleQuery($sql);
    if($kategori != null){
        return $kategori['id_kategori'];
    }
    return $kategori;
}

function getBeritasAll($search, $archive = null, $kategori = null){
    global $koneksi;
    
    $sql = "SELECT * FROM post WHERE `status` = '0' ORDER BY tgl_dibuat DESC";

    if($search != null){
        $search = $koneksi->cekString($search);
        $sql = "SELECT * FROM post WHERE `status` = '0' AND `judul` LIKE '%$search%' OR `isi` LIKE '%$search%' ORDER BY tgl_dibuat DESC";
    }else if($archive != null){
        $archive = $koneksi->cekString($archive);
        $archive = decodeArchive($archive);
        $archive = $koneksi->cekString($archive);
        $sql = "SELECT * FROM post WHERE `status` = '0' AND `tgl_diupdate` LIKE '%$archive%' ORDER BY tgl_dibuat DESC";
    }else if($kategori != null){
        $kategori = getFindIdKategori($kategori);
        if($kategori != null){
            $id_kategori = $koneksi->cekString($kategori);
            $sql = "SELECT * FROM post WHERE `status` = '0' AND `id_kategori` = '$id_kategori' ORDER BY tgl_dibuat DESC";        
        }
    }
    return $koneksi->query($sql);
}

function getKategoriName($id){
    global $koneksi;
    $id = $koneksi->cekString($id);
    $sql = "SELECT nama FROM kategori_post WHERE id_kategori = '$id'";
    $nama = $koneksi->singleQuery($sql);
    if($nama != null){
        return $nama['nama'];
    }else{
        return 'Tidak Ada Kategori';
    }
}
function formatWaktuSlug($date){
    $date = substr($date,0,7);
    $date = str_replace('-','',$date);
    return $date;
}

function getArchives(){
    global $koneksi;
    $datas = null;
    $sql = "SELECT tgl_diupdate FROM post WHERE `status` = '0' GROUP BY tgl_diupdate ORDER BY tgl_dibuat DESC";
    $archives = $koneksi->query($sql);
    if($archives == null){ return $datas; }
    foreach($archives as $archive){
        $data = [ 'nama' => formatWaktuBulan($archive['tgl_diupdate']), 'slug' => formatWaktuSlug($archive['tgl_diupdate']) ];
        $datas[] = $data;
    }
    return $datas;
}

function getKategoris(){
    global $koneksi;
    $datas = null;
    $sql = "SELECT nama FROM kategori_post GROUP BY nama ORDER BY id_kategori DESC";
    $kategoris = $koneksi->query($sql);
    if($kategoris != null){
        foreach($kategoris as $kategori){
            $datas[] = ['nama' => $kategori['nama'], 'slug' => slug($kategori['nama'])];
        }
    }
    return $datas;
}

function getBeritaOne($slug){
    global $koneksi;
    $slug = $koneksi->cekString($slug);
    $sql = "SELECT * FROM post WHERE slug = '$slug'";
    $data = $koneksi->singleQuery($sql);
    if($data != null){
        return $data;
    }return null;
}

function getStrukturs(){
    global $koneksi;
    $sql = "SELECT perangkat_desa.nama as orang, jabatan.nama as pangkat FROM `perangkat_desa` JOIN jabatan ON perangkat_desa.id_jabatan = jabatan.id_jabatan WHERE status = '0'";
    $data = $koneksi->query($sql);
    if($data != null){
        return $data;
    }return null;
}

function getPage($slug){
    global $koneksi;
    $slug = $koneksi->cekString($slug);
    $sql = "SELECT * FROM `page` WHERE slug = '$slug'";
    return $koneksi->singleQuery($sql);
}