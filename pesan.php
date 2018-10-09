<?php
include 'function/init.php';
if(!isset($_POST['submit'])){
    header('Location: index.php');
}
$nama = $_POST['nama'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];
if(tambahPesan($nama, $email, $subject, $message)){
    header('Location: index.php');
    return;
}
header('Location: 404.php');
return;
?>