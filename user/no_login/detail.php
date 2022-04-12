<?php
require_once('../../db/dbhelpers.php');
require_once('../../db/util.php');
if(isset($_GET['id'])){
    $id= $_GET['id'];
    $sql = "select * from products where id = '".$id."'";
    $product = executeResult($sql);
}
else{
    die();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Phone Shop TB</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
      <a class="navbar-brand" href="../../index.php" >PHONE SHOP TB</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="../../index.php">Trang chủ</a></li>
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
    <ul class="nav navbar-nav navbar-right">
      <li><a href="user/register.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      <li><a href="user/login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    </ul>
  </div>
</nav>

<div class="container">
<input type="number" name="userID" id="id" value="<?=$userId?>" style="display:none">
    <div class="col-md-5 col-10">
        <img src="<?=$product[0]['thumbnail']?>" style="width: 100%;">        
    </div>
    <div class="col-md-7 col-10">
        <p><?=$product[0]['title']?></p>
        <p style="color: red;"><?=number_format($product[0]['price'],0,",",".")?> đ</p>
        <button name="add" class="btn btn-success" style="width: 100%;" disabled>Add to cart</button>
    </div>
    <div class="col-md-12 col-12">
        <p style="text-align: center;"><?=$product[0]['content']?></p>
        <p style="text-align: center;"><?=$product[0]['content']?></p>
        <p style="text-align: center;"><?=$product[0]['content']?></p>
        <p style="text-align: center;"><?=$product[0]['content']?></p>
    </div>
</div>

<?php
    include_once('../../layout/no_login/footer.php');
?>