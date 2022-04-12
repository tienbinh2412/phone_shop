<?php
session_start();
require_once("../db/dbhelpers.php");
require_once("../db/util.php");
include_once("../layout/header.php");
require_once("../api/process_checkout.php");
$userId = $_SESSION['userId'];
$sql = "select * from users where id = '".$userId."' ";
$result = executeResult($sql);
$fullname = $result[0]['fullname'];
$email = $result[0]['email'];
$phone_number = $result[0]['phone_number'];
$address = $result[0]['address'];
$cart =[];

if(isset($_COOKIE['cart'])){
    $json = $_COOKIE['cart'];
    $cart = json_decode($json, true);
}
$idCart=[];
foreach($cart as $item){
    $idCart[] = $item['id'];
}
if(count($idCart)>0){
    $idCart = implode(',',$idCart);
    $sql = "select * from products where id in ($idCart)";
    $result = executeResult($sql);
}
else{
    $result = [];
}
?>
<!-- body -->
<form method="post">
<div class="container">
	<div class="row">
		<div class="col-md-5">
			<h3>Shipping Information</h3>
			<div class="form-group">
			  <label for="usr">Name:</label>
			  <input required="true" type="text" class="form-control" disabled="disabled" id="usr" name="fullname" value="<?= $fullname ?>">
			</div>
			<div class="form-group">
			  <label for="email">Email:</label>
			  <input required="true" type="email" class="form-control" disabled="disabled" id="email" name="email" value="<?= $email ?>">
			</div>
			<div class="form-group">
			  <label for="phone_number">Phone Number:</label>
			  <input type="text" class="form-control" id="phone_number" disabled="disabled" name="phone_number" value="<?= $phone_number ?>">
			</div>
			<div class="form-group">
			  <label for="address">Address:</label>
			  <input type="text" class="form-control" id="address" disabled="disabled" name="address" value="<?= $address ?>">
			</div>
			<div class="form-group">
			  <label for="note">Note:</label>
			  <textarea class="form-control" rows="3" name="note" id="note"></textarea>
			</div>
		</div>
		<div class="col-md-7">
			<h3>Cart</h3>
			<table class="table table-bordered table-responsive">
				<thead>
					<tr>
						<th>No</th>
						<th>Title</th>
						<th>Num</th>
						<th>Price</th>
						<th>Total</th>
					</tr>
				</thead>
				<tbody>
<?php
	$count = 0;
	$total = 0;
	foreach ($result as $item) {
		$num = 0;
		foreach ($cart as $value) {
			if($value['id'] == $item['id']) {
				$num = $value['num'];
				break;
			}
		}
		$total += $num*$item['price'];
		echo '
			<tr>
				<td>'.(++$count).'</td>
				<td>'.$item['title'].'</td>
				<td>'.$num.'</td>
				<td>'.number_format($item['price'], 0, ',', '.').'</td>
				<td>'.number_format($num*$item['price'], 0, ',', '.').'</td>
			</tr>';
	}
?>
				</tbody>
			</table>
			<p style="font-size: 30px; color: red">
				Total: <?=number_format($total, 0, ',', '.')?>
			</p>

			<button class="btn btn-success" style="width: 100%; font-size: 32px;">Complete</button>
		</div>
	</div>
</div>
</form>
<?php
    require_once("../layout/footer.php");
?>