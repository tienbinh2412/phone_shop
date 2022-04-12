<?php
session_start();
require_once("../db/dbhelpers.php");
require_once("../db/util.php");
include_once("../layout/header.php");
require_once("../api/cookie.php");
$userId = $_SESSION['userId'];
$user = validateToken();
if($user == null){
    echo('<p>vui lòng <a href="login.php">đăng nhập</a> để vào trang web</p>');
    die();
}
if(isset($_GET['id'])){
    $id= $_GET['id'];
    $sql = "select * from products where id = '".$id."'";
    $product = executeResult($sql);
}
else{
    die();
}
?>
<div class="container">
<input type="number" name="userID" id="id" value="<?=$userId?>" style="display:none">
    <div class="col-md-5 col-10">
        <img src="<?=$product[0]['thumbnail']?>" style="width: 100%;">        
    </div>
    <div class="col-md-7 col-10">
        <p><?=$product[0]['title']?></p>
        <p style="color: red;"><?=number_format($product[0]['price'],0,",",".")?> đ</p>
        <button name="add" class="btn btn-success" style="width: 100%;" onclick="addToCart(<?=$id?>,<?=$userId?>)">Add to cart</button>
    </div>
    <div class="col-md-12 col-12">
        <p style="text-align: center;"><?=$product[0]['content']?></p>
        <p style="text-align: center;"><?=$product[0]['content']?></p>
        <p style="text-align: center;"><?=$product[0]['content']?></p>
        <p style="text-align: center;"><?=$product[0]['content']?></p>
    </div>
</div>
<script>
    function addToCart(id,userId){
        $.post('../api/cookie.php',{
            'id' : id,
            'num' : 1,
            'action' : 'add',
            'userId' : userId
        },function(data){
            location.reload()
        })
    }
</script>
<?php
  include_once("../layout/footer.php");
?>