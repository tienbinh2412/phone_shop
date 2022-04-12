<?php
if(!empty($_POST)){
    $cart = [];
	if(isset($_COOKIE['cart'])) {
		$json = $_COOKIE['cart'];
		$cart = json_decode($json, true);
	}
	if($cart ==null || count($cart) == 0) {
		header('Location: products.php');
		die();
	}
    $userId = $_SESSION['userId'];
    $sql = "select * from users where id = '".$userId."' ";
    $result = executeResult($sql);
	$orderDate = date('Y-m-d H:i:s');
    $note = $_POST['note'];

    $sql = "insert into orders(user_id,order_date,note) values ('$userId', '$orderDate','$note')";
	execute($sql);

    $sql = "select * from orders where order_date = '$orderDate'";
	$order = executeResult($sql);
	$orderId = $order[0]['id'];
	$idList = [];
	foreach ($cart as $item) {
		$idList[] = $item['id'];
	}
	if(count($idList) > 0) {
		$idList = implode(',', $idList);
		//[2, 5, 6] => 2,5,6

		$sql = "select * from products where id in ($idList)";
		$cartList = executeResult($sql);
	} else {
		$cartList = [];
	}

	foreach ($cartList as $item) {
		$num = 0;
		foreach ($cart as $value) {
			if($value['id'] == $item['id']) {
				$num = $value['num'];
				break;
			}
		}
		$sql = "insert into order_details(order_id, product_id, num, price) values ($orderId, ".$item['id'].", $num, ".$item['price'].")";
		execute($sql);
	}

	header('Location: ../user/complete.php');
	setcookie('cart', '[]', time()-1000, '/');
}