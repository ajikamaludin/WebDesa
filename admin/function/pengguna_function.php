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

function ubahPassword($id, $password){
    global $koneksi;
    $id = $koneksi->cekString($id);
    $password = $koneksi->cekString($password);
    $password = md5($password);
    if(!empty($id) && !empty($password)){
        $sql = "UPDATE user SET `password` = '$password' WHERE id_user = ".$id;
        if($koneksi->run($sql)){
            $pesan = 'Berhasil Mengubah Password Pengguna';
            redirectPengguna($pesan);
            return;
        }
    }
    $pesan = 'Gagal Mengubah Password Pengguna, Terjadi Kesalahan';
    redirectPengguna($pesan, true);
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
        $sql = "SELECT * FROM user WHERE email = '$email' OR username = '$username' ";
        $user = count($koneksi->query($sql));
        if($user > 0){
            $pesan = 'Gagal Menambahkan Pengguna, Terjadi Kesalahan : Pada Gambar';
            redirectPengguna($pesan, true);
            return;
        }
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

function ubahPengguna($id, $nama, $email, $username, $foto, $foto_lama){
    
    global $koneksi;
    $id = $koneksi->cekString($id);
    $nama = $koneksi->cekString($nama);
    $email = $koneksi->cekString($email);
    $username = $koneksi->cekString($username);

    if($foto['error'] == 4){
        $foto = $foto_lama;
    }else{
        $foto = uploadFiles($foto);
    
        if($foto == false || empty($foto)){
            $pesan = 'Gagal Mengubah Pengguna, Terjadi Kesalahan : Pada Gambar';
            redirectPengguna($pesan, true);
        }
    }

    if(!empty($nama) && !empty($email) && !empty($username) && !empty($foto) ){
        $sql = "UPDATE `user` SET 
            `nama` = '$nama', `email` = '$email', `username` = '$username', `foto` = '$foto'
            WHERE `user`.`id_user` = $id";
        if($koneksi->run($sql)){
            $pesan = 'Berhasil Mengubah Pengguna';
            redirectPengguna($pesan);
        }
    }else{
        return "Tidak ada yang boleh kosong";
    }
}
