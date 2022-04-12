<?php
    session_start();
    require_once("../db/dbhelpers.php");
    require_once("../db/util.php");
    include_once("../layout/header.php");
    
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
<div class="container" style="min-height: 500px;">
	<div class="row">
		<div class="col-md-12">
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>STT</th>
						<th>Hình ảnh</th>
						<th>Tên</th>
						<th>Số lượng</th>
						<th>Giá</th>
						<th>Tổng tiền</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
<?php
    $count = 0;
    $total = 0 ;
	foreach ($result as $item) {
        $num = 0;
        foreach($cart as $value){
            if($value['id'] == $item['id']) {
				$num = $value['num'];
				break;
			}
        }
        $total += $num*$item['price'];
        echo('
            <tr>
                <td>'.(++$count).'</td>
                <td><img src="'.$item['thumbnail'].'" style="height: 100px"/></td>
				<td>'.$item['title'].'</td>
				<td>'.$num.'</td>
				<td>'.number_format($item['price'], 0, ',', '.').'</td>
				<td>'.number_format($num*$item['price'], 0, ',', '.').'</td>
				<td><button class="btn btn-danger" onclick="deleteCart('.$item['id'].')">Delete</button></td>
            </tr>
        ');
    }
?>
				</tbody>
			</table>
			<p style="font-size: 30px; color: red">
				Total: <?=number_format($total, 0, ',', '.')?>
			</p>

			<a href="checkout.php">
				<button class="btn btn-success" style="width: 100%; font-size: 32px;">Checkout</button>
			</a>
		</div>
	</div>
</div>
<script type="text/javascript">
	function deleteCart(id) {
        option = confirm("Bạn có muốn xóa sản phẩm này không?")
        if(!option){
            return ;
        }
        console.log(id)
		$.post('../api/cookie.php', {
			'action': 'delete',
			'id': id
		}, function(data) {
            alert(data)
			location.reload()
		})
	}
</script>
<?php
    include_once("../layout/footer.php");
?>
