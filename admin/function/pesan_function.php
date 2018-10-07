<?php

function tampilanPesan(){
    global $koneksi;
    $sql = "SELECT * FROM pesan";
    return $koneksi->query($sql);
}