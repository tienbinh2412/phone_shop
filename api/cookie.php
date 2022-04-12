<?php
$action = $num = $id = $userId = "";
$cart=[];
if(!empty($_POST)){
    if(isset($_POST['action'])){
        $action = $_POST['action'];
    }
    if(isset($_POST['num'])){
        $num = $_POST['num'];
    }
    if(isset($_POST['id'])){
        $id = $_POST['id'];
    }
    if(isset($_POST['userId'])){
        $userId = $_POST['userId'];
    }

    if(isset($_COOKIE['cart'])){
        $json = $_COOKIE['cart'];
        $cart = json_decode($json, true);
    }

    switch ($action) {
        case 'add':
            $find = false;
            for($i = 0; $i< count($cart);$i++){
                if($cart[$i]['id']==$id){
                    $cart[$i]['num'] += $num;
                    $find = true;
                    break;
                }
            }
            if(!$find){
                $cart[]=[
                    'id' => $id,
                    'num' => $num,
                    'userId' => $userId
                ];
            }
            setcookie('cart',json_encode($cart),time()+1*60*60,'/');
            break;
        case 'delete':
            for ($i=0; $i < count($cart); $i++) { 
                if($cart[$i]['id'] == $id) {
                    array_splice($cart, $i, 1);
                    break;
                }
            }
            setcookie('cart', json_encode($cart), time() + 30*24*60*60, '/');
            break;
    }
}