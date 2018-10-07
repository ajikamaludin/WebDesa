<?php

function redirectPengguna($pesan, $error = false){
    if($error){
        $_SESSION['error'] = true; 
    }
    $_SESSION['pesan'] = $pesan;
    header('Location: pengguna.php');
    return;
}

function tampilanPengguna(){
    global $koneksi;
    $sql = "SELECT * FROM user ORDER BY `id_user` DESC";
    return $koneksi->query($sql);
}

function tambahPengguna($nama, $email, $username, $password, $foto){
    global $koneksi;
    $nama = $koneksi->cekString($nama);
    $email = $koneksi->cekString($email);
    $username = $koneksi->cekString($username);
    $password = $koneksi->cekString($password);
    $password = md5($password);
    $foto = uploadFiles($foto);
    
    if($foto == false || empty($foto)){
        $pesan = 'Gagal Menambahkan Pengguna, Terjadi Kesalahan';
        redirectPengguna($pesan, true);
    }

    if(!empty($nama) && !empty($email) && !empty($username) && !empty($password) && !empty($foto) ){
        $sql = "INSERT INTO `user` 
            (`nama`, `email`, `username`, `password`, `foto`) 
            VALUES ('$nama', '$email', '$username', '$password', '$foto');";
        if($koneksi->run($sql)){
            $pesan = 'Berhasil Menambahkan Pengguna';
            redirectPengguna($pesan);
        }
    }else{
        return "Tidak ada yang boleh kosong";
    }
}