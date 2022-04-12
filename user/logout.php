<?php
$token = '';

if (isset($_COOKIE['token'])) {
    require_once("../db/dbhelpers.php");
    require_once("../db/util.php");
    $token = $_COOKIE['token'];
    $sql   = "UPDATE users SET token = '' where token = '$token'";
    execute($sql);
}

setcookie('token','',time()-7*24*60*60,'/');
setcookie('cart','',time()-7*24*60*60,'/');
session_destroy();
header("Location: ../index.php");