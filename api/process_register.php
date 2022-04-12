<?php
$fullname = $password = $phone_number = $address = $email = $username = "";
if(!empty($_POST)){
    if(isset($_POST['fullname'])){
        $fullname = $_POST['fullname'];
    }
    if(isset($_POST['password'])){
        $password = $_POST['password'];
        $password = getPwdSecurity($password);
    }
    if(isset($_POST['phone_number'])){
        $phone_number = $_POST['phone_number'];
    }
    if(isset($_POST['address'])){
        $address = $_POST['address'];
    }
    if(isset($_POST['email'])){
        $email = $_POST['email'];
    }
    if(isset($_POST['username'])){
        $username = $_POST['username'];
    }
    $username = str_replace('\'', '\\\'', $username);
	$phone      = str_replace('\'', '\\\'', $phone);
	$email  = str_replace('\'', '\\\'', $email);
    $password  = str_replace('\'', '\\\'', $password);
    $fullname  = str_replace('\'', '\\\'', $fullname);
    $address  = str_replace('\'', '\\\'', $address);

    $sql = "INSERT INTO USERS(USERNAME,PASSWORD,FULLNAME,PHONE_NUMBER,EMAIL,ADDRESS) VALUES('".$username."','".$password."','".$fullname."','".$phone_number."','".$email."','".$address."')";
    execute($sql);
    header("location: ../user/login.php");
}