<?php


include 'function/init.php';

$menus = $koneksi->query('SELECT * FROM menu');


echo "<pre>";
print_r($menus);
echo "</pre>";
