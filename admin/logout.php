<?php

include 'function/init.php';
if(logout()){
    header('Location: login.php');
}