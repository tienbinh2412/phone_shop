<!DOCTYPE html>
<html lang="en">
<head>
  <title>Phone Shop TB</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<style>
  .pagination a {
  color: black;
  float: left;
  padding: 8px 16px;
  text-decoration: none;
  transition: background-color .3s;
}
.pagination a:hover:not(.active) {background-color: #ddd;} 
</style>
<body>

<nav class="navbar navbar-inverse" >
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="../user/product.php" >PHONE SHOP TB</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="../user/product.php">Trang chủ</a></li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Sản phẩm<span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="iPhone.php">iPhone</a></li>
          <li><a href="oppo.php">Oppo</a></li>
          <li><a href="samsung.php">Samsung</a></li>
        </ul>
      </li>
      <li><a href="tracking.php">Tracking</a></li>
      <li><a href="contact.php">Contact</a></li>
    </ul>
    <?php
    $cart =[];

    if(isset($_COOKIE['cart'])){
        $json = $_COOKIE['cart'];
        $cart = json_decode($json, true);
    }
    $count = 0;
    $userId = $_SESSION['userId'];
    foreach($cart as $item){
        if($userId == $item['userId']){
          $count += $item['num'];
        }
        else{
          $count =0;
        } 
    }
    ?>
    <a href="cart.php">
      <button type="button" class=" btn btn-default" style=" margin-top: 7px">
        Cart 
        <span class="badge">
            <?=$count ?>
        </span></button>
    </a>
    <ul class="nav navbar-nav navbar-right"><li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-user" style="font-size:18px"></i> <?=$_SESSION['username']?><span class="caret"></span></a>
      <ul class="dropdown-menu">
        <li><a href="user_infor.php"><i class="fa fa-user" style="font-size:18px"></i> Thông tin cá nhân</a></li>
        <li><a href="change_password.php"><i class="fas fa-key"></i> Đổi mật khẩu</a></li>
        <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Đăng xuất</a></li>
      </ul>
      
    </ul>
  </div>
</nav>
  