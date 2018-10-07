<?php


include 'function/init.php';

$users = $koneksi->query('SELECT `username`,`password` FROM user');

foreach($users as $user){
    echo $user['username'].'<br>';
}

echo $PATH;
