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
<!-- body -->
<div class="container" style="min-height: 500px;">
	<div class="row">
		<h1 style="text-align: center; color: red">Khách hàng phải đăng nhập mới xem tracking được.</h1>
	</div>
</div>
<?php
    include_once('../../layout/no_login/footer.php');
?>
