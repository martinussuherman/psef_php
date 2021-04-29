<?php
    if(empty($_COOKIE['sid'])){
        include('cek_login.php');
    }else{
        include('main.php');
    }
