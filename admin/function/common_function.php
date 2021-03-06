<?php

function assetsAdmin($file){
    $protocol =  'http://';
    if(isset($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] != '80'){
        $protocol = 'https://';
    }
    return $protocol.$_SERVER['HTTP_HOST'].'/assets/admin_assets/'.$file;
}

function url($string){
    $protocol =  'http://';
    if(isset($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] != '80'){
        $protocol = 'https://';
    }
    return $protocol.$_SERVER['HTTP_HOST'].'/'.$string;
}

function urlPage($string){
    $protocol =  'http://';
    if(isset($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] != '80'){
        $protocol = 'https://';
    }
    return $protocol.$_SERVER['HTTP_HOST'].'/page?q='.$string;
}

function cekSession(){
    if(!isset($_SESSION['admin'])){
        header('Location: login.php');
    }
}

function login($mUsername,$mPassword){
    global $koneksi;
    $username = $koneksi->cekString($mUsername);
    $password = $koneksi->cekString($mPassword);
    $password = md5($password);
    $sql = "SELECT `username`,`password` FROM user WHERE `username`='$username' AND `password`='$password'";
    if ($hasil = $koneksi->query($sql)){
        if(count($hasil) == 1){
             return true;
        }else{
             return false;
        }
    }
}

function logout(){
    if(isset($_SESSION['admin'])){
        unset($_SESSION['admin']);
        session_destroy();
    }
    return true;
}

function getPageName(){
    return $_SERVER['SCRIPT_NAME'];
}

function getPengguna($id = null){
    global $koneksi;
    if($id == null){
        $username = $_SESSION['admin'];
        $sql = "SELECT * FROM user WHERE username = '$username'";
    }else{
        $sql = "SELECT * FROM user WHERE id_user = '$id'";
    }
    return $koneksi->singleQuery($sql);
}

function printError($error, $mirror = true){
    if($mirror == false){
        return "<div class='col-md-12'><p class='alert alert-success'>".$error."</p></div>";
    }
    if(!empty($error)){
        return "<div class='col-md-12'><p class='alert alert-danger'>".$error."</p></div>";
    }
}

function printPesan(){
    if(isset($_SESSION['pesan'])){
        $pesan = $_SESSION['pesan'];
        unset($_SESSION['pesan']);
        if(isset($_SESSION['error']) && $_SESSION['error'] == true){
            $_SESSION['error'] = false;
            return "<div class='alert alert-danger'>". $pesan ."</div>";
        }
        return "<div class='alert alert-success'>". $pesan ."</div>";
    }
}

function hapusData($table,$key,$id){
    global $koneksi;
    $table = $koneksi->cekString($table);
    $key = $koneksi->cekString($key);
    $id = $koneksi->cekString($id);
    $sql = "DELETE FROM `$table` WHERE `$key` = '$id'";
    if($koneksi->run($sql)){
        if($table == "kategori_post"){
            $_SESSION['pesan'] = 'Berhasil Menghapus Kategori';
            header('Location: kategori.php');
        }
        if($table == "post"){
            $_SESSION['pesan'] = 'Berhasil Menghapus Berita';
            header('Location: berita.php');
        }
        if($table == "galeri"){
            $sql = "DELETE FROM `gambar_galeri` WHERE `id_galeri` = $id";
            if($koneksi->run($sql)){
                $_SESSION['pesan'] = 'Berhasil Menghapus Galeri';
                header('Location: galeri.php');
            }
        }
        if($table == 'gambar_galeri'){
            $_SESSION['pesan'] = 'Berhasil Menghapus Gambar Galeri';
                header('Location: galeri.php');
        }
        if($table == 'user'){
            $_SESSION['pesan'] = 'Berhasil Menghapus Pengguna';
                header('Location: pengguna.php');
        }
        if($table == 'upload_file'){
            $_SESSION['pesan'] = 'Berhasil Menghapus Berkas';
            header('Location: berkas.php');
        }
        if($table == 'banner'){
            $_SESSION['pesan'] = 'Berhasil Menghapus Banner';
            header('Location: pengaturan_banner.php');
        }
        if($table == 'pengumuman'){
            $_SESSION['pesan'] = 'Berhasil Menghapus Pengumuman';
            header('Location: pengumuman.php');
        }
        if($table == 'link_terkait'){
            $_SESSION['pesan'] = 'Berhasil Menghapus Link';
            header('Location: link.php');
        }
        if($table == 'page'){
            $_SESSION['pesan'] = 'Berhasil Menghapus Halaman';
            header('Location: halaman.php');
        }
        if($table == 'menu'){
            $_SESSION['pesan'] = 'Berhasil Menghapus Menu';
            header('Location: menu.php');
        }
        if($table == 'jabatan'){
            $_SESSION['pesan'] = 'Berhasil Menghapus Jabatan';
            header('Location: jabatan.php');
        }
        if($table == 'perangkat_desa'){
            $_SESSION['pesan'] = 'Berhasil Menghapus Perangkat';
            header('Location: perangkat.php');
        }
    }
}

function pagination($data, $records_per_page = 10){
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

function uploadFiles($file, $name = null){
    if($file['error'] == 0){
        $storageImage = dirname(dirname(__DIR__))."/assets/uploads/gambar/";
        $storageFile = dirname(dirname(__DIR__))."/assets/uploads/document/";
        
        $fileName = $file['name'];
        $filePath = $file['tmp_name'];
        $fileExtension = $file['type'];

        $allowedImage = ["image/jpeg","image/png","image/jpg"];
        $allowedDoc = ["application/pdf","application/msword","application/wps-office.doc","application/doc",
                        "application/docx","application/odt","application/rtf","application/xls","application/xlsx",
                        "application/ods","application/zip","application/wps-office.docx","application/msword.doc"
                        ,"application/msword.docx","application/msword.xlsx","application/msword.xls","application/msword.pdf"];
                        
        if(in_array($fileExtension, $allowedImage)){
            $fileDotExtension = '.'.substr($fileExtension, 6 ,5);
            $fileNameFinal = ($name != null) ? $name.$fileDotExtension : time().$fileDotExtension;
            $fileFinalPath = $storageImage.$fileNameFinal;
            if(move_uploaded_file($filePath, $fileFinalPath)){
                return '/assets/uploads/gambar/'.$fileNameFinal;
            }
        }
        if(in_array($fileExtension, $allowedDoc)){
            $fileDotExtension = '.'.substr($fileExtension, 12 ,5);
            if(strpos($fileName, 'doc')){
                $fileDotExtension = '.doc';
            }else if(strpos($fileName, 'docx')){
                $fileDotExtension = '.docx';
            }else if(strpos($fileName, 'pdf')){
                $fileDotExtension = '.pdf';
            }else if(strpos($fileName, 'zip')){
                $fileDotExtension = '.zip';
            }else if(strpos($fileName, 'rar')){
                $fileDotExtension = '.rar';
            }else if(strpos($fileName, 'xls')){
                $fileDotExtension = '.xls';
            }else if(strpos($fileName, 'xlsx')){
                $fileDotExtension = '.xls';
            }
            $fileNameFinal = ($name != null) ? $name.$fileDotExtension : time().$fileDotExtension;
            $fileFinalPath = $storageFile.$fileNameFinal;
            if(move_uploaded_file($filePath, $fileFinalPath)){
                return '/assets/uploads/document/'.$fileNameFinal;
            }
        }
    }

    return false;
}

function formatUrl($url){
    if(substr($url, 0, 4) != 'http'){
        $url = 'http://'.$url;
    }
    return $url;
}