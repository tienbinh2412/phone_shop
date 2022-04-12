<?php
if(!empty($_POST)){
    if(isset($_POST['fullname'])){
        $fullname = $_POST['fullname'];
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

    if($fullname != '' && $phone_number !='' && $address !='' && $email !=''){
        $sql = "update users set fullname = '".$fullname."',phone_number = '".$phone_number."', address = '".$address."', email = '".$email."' where id = '".$_SESSION['userId']."'";
        executeResult($sql);
        header("location: ../user/product.php");
    }

}