<?php

function assets($file){
    return 'http://'.$_SERVER['HTTP_HOST'].'/assets/admin_assets/'.$file;
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

function printError($error){
    if(!empty($error)){
        return "<div class='col-md-12'><p class='alert alert-danger'>".$error."</p></div>";
    }
}

function printPesan(){
    if(isset($_SESSION['pesan'])){
        $pesan = $_SESSION['pesan'];
        unset($_SESSION['pesan']);
        if(isset($_SESSION['error'])){
            unset($_SESSION['error']);
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
        if($table = "kategori_post"){
            $_SESSION['pesan'] = 'Berhasil Menghapus Data';
            header('Location: kategori.php');
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