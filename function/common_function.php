<?php

function assets($file){
    return 'http://'.$_SERVER['HTTP_HOST'].'/assets/'.$file;
}