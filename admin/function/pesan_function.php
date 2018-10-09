<?php

function tampilanPesan(){
    global $koneksi;
    $sql = "SELECT * FROM pesan ORDER BY id_pesan DESC";
    return $koneksi->query($sql);
}