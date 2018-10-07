<?php
session_start();
$PATH = dirname(__DIR__);
include $PATH.'/db/Koneksi.php';
include $PATH.'/vendor/autoload.php';
use Cocur\Slugify\Slugify;

$koneksi = new Koneksi();
$pagination =  new Zebra_Pagination();
$slugify = new Slugify();

function dd($string){
    die(var_dump($string));
    return;
}

