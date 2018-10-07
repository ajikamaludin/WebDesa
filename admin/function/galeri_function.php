<?php

function redirectGaleri($pesan, $error = false){
    if($error){
        $_SESSION['error'] = true; 
    }
    $_SESSION['pesan'] = $pesan;
    header('Location: galeri.php');
    return;
}

function tampilanGaleri(){
    return null;
}