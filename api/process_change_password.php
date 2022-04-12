<?php
if(!empty($_POST)){
    if(isset($_POST['password'])){
        $password= $_POST['password'];
        $password = getPwdSecurity($password);
    }
    if(isset($_POST['new_password'])){
        $new_password= $_POST['new_password'];
        $new_password = getPwdSecurity($new_password);
    }
    if(isset($_POST['re_new_password'])){
        $re_new_password= $_POST['re_new_password'];
        $re_new_password = getPwdSecurity($re_new_password);
    }
    $password  = str_replace('\'', '\\\'', $password); 
    $new_password  = str_replace('\'', '\\\'', $new_password); 
    $re_new_password  = str_replace('\'', '\\\'', $re_new_password); 
    $check_password = "select password from users where id = '".$_SESSION['userId']."'";
    $result = executeResult($check_password);
    $check_pass = $result[0]['password'];
    if($password == $check_pass && $new_password == $re_new_password ){
        $sql = "update users set password = '".$new_password."' where id = '".$_SESSION['userId']."'";
        execute($sql);
        header("Location: ../user/product.php");
    }
    else if($password != $check_pass){
        echo("Bạn đã nhập sai mật khẩu cũ!");
    }
}