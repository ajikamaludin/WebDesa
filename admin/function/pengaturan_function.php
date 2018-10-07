<?php

function getPengaturan(){
    global $koneksi;
    $sql = "SELECT * FROM pengaturan";
    $data = $koneksi->singleQuery($sql);
    if($data == null){
        $sqlNew = "INSERT INTO `pengaturan` (`nama`, `logo`, `kontak`, `alamat`, `email`, `facebook`, `twitter`, `instagram`, `deskripsi`) VALUES ('nama web', 'logo-web.png', '+62840', 'Jl. Setia Budi', 'admin@email', 'fb.com/gaya', 'tw.com/gaya', '@ig', 'deskripsi')";
        if($koneksi->run($sqlNew)){
            $data = $koneksi->singleQuery($sql);
        }
    }
    return $data;
}

function setPengaturan($nama, $logo, $kontak, $alamat, $email, $fb, $tw, $ig, $deskripsi, $file){
    global $koneksi;
    
    $nama = $koneksi->cekString($nama);
    $logo = $koneksi->cekString($logo);
    $kontak = $koneksi->cekString($kontak);
    $alamat = $koneksi->cekString($alamat);
    $email = $koneksi->cekString($email);
    $fb = $koneksi->cekString($fb);
    $tw = $koneksi->cekString($tw);
    $ig = $koneksi->cekString($ig);
    $deskripsi = $koneksi->cekString($deskripsi);

    $newLogo = uploadFiles($file);
    if($newLogo != false){
        $logo = $newLogo;
    }

    $sql = "UPDATE pengaturan SET 
        nama = '$nama', logo = '$logo', kontak = '$kontak', 
        alamat = '$alamat', email = '$email', facebook = '$fb', 
        twitter = '$tw', instagram = '$ig', deskripsi = '$deskripsi'";
    if($koneksi->run($sql)){
        return true;
    }else{
        return 'Terjadi kesalahan';
    }
}

function tampilanBanner(){
    global $koneksi;
    $sql = "SELECT * FROM banner";
    return $koneksi->query($sql);
}

function tambahBanner($file){
    global $koneksi;
    $banner = count(tampilanBanner());
    if($banner >= 7){
        return 'Banner Sudah mencapai batas silahkan hapus kemudian tambahkan lagi';
    }
    
    $file = uploadFiles($file);
    
    if($file != false){
       
       $sql = "INSERT INTO `banner` (`gambar`) VALUES ('$file');";
       if($koneksi->run($sql)){
            return 'Berhasil Menambah Banner';
       }
    }
    return 'Terjadi Kesalahan Saat Menambah Banner';
}