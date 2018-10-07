<?php

class Koneksi
{
    public $username = 'root';
    public $password = 'eta';
    public $host = 'localhost'; //127.0.0.1
    public $database = 'web_desa';

    public $data;
    public $table;

    public $koneksi;

    public function __construct()
    {
        try{
            $this->koneksi = mysqli_connect($this->host,$this->username, $this->password, $this->database) or die('Koneksi Bermasalah');
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }

    public function run($sql)
    {
        return mysqli_query($this->koneksi, $this->cekString($sql));
    }

    public function query($sql)
    {
        $table = mysqli_query($this->koneksi, $this->cekString($sql));
        while($data = mysqli_fetch_assoc($table)){
            $datas[] = $data;
        }
        return $datas;
    }

    public function singleQuery($sql)
    {
        $table = mysqli_query($this->koneksi, $this->cekString($sql));
        $this->data = mysqli_fetch_assoc($table);
        return $this->data;
    }

    public function cekString($string)
    {
        $data = mysqli_real_escape_string($this->koneksi, $string);
        if($data){
            return $string;
        }else{
            return $data;
        }
    }

    public function __destruct()
    {
        $this->koneksi = mysqli_close($this->koneksi);
    }
}