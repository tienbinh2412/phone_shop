<?php
$username = $password = '';
$userId= '';
$username_session = '';
if(!empty($_POST)){
    if(isset($_POST['username'])){
        $username = $_POST['username'];
        
    }
    if(isset($_POST['password'])){
        $password = $_POST['password'];
        
    }
    $username = str_replace('\'', '\\\'', $username);
    $password  = str_replace('\'', '\\\'', $password);  
    if($username !='' && $password != ''){
        $password = getPwdSecurity($password);
        $sql = "select * from users where username = '$username' and password = '$password' ";
        $result = executeResult($sql);
        if($result != null and count($result)>0){
            $userId = $result[0]['id'];
            $_SESSION['userId']=$userId;
            $username_session = $result[0]['username'];
            $_SESSION['username'] = $username_session;
            $_SESSION['password'] = $password;
            $token = getPwdSecurity(time().$result[0]['username']);
            setcookie('token',$token,time()+24*60*60);
            $sql = "UPDATE users set token = '$token' where id = ".$result[0]['id']." ";
            execute($sql);
            
            header("location: ../user/product.php");
        }
    }
    
}