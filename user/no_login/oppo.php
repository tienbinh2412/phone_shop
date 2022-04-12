<?php
  require_once('../../db/dbhelpers.php');
  require_once('../../db/util.php');
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
<input type="number" name="userID" id="id" value="<?=$_SESSION['userId']?>" style="display:none">
    <div class="row">
      <?php
        $sql = "select count(id) as number from products where type = 'OP' ";
        $result_number = executeResult($sql);
        $number =0;
        if($result_number !=null && count($result_number)>0){
          $number = $result_number[0]['number'];
        }
        $pages = ceil($number/8);
        $current_page = 1;
        if(isset($_GET['page'])){
          $current_page = $_GET['page'];
        }
        $index = ($current_page-1)*9;
        $sql = "select * from products where type = 'OP' limit $index, 9";
        $result = executeResult($sql);
        foreach($result as $item){
          echo'
          <div class="col-md-4 col-sm-6 col-xs-10">
            <a href="detail.php?id='.$item['id'].'"><img src="'.$item['thumbnail'].'" style="width:80%; height:80%;" alt=""></a>
            <a href="detail.php?id='.$item['id'].'"><p>'.$item['title'].'</p></a>
            <p style="color: red;">'.number_format($item['price'],0,",",".").' đ</p>
          </div>
          ';
        }
      ?>
        
    
    </div>
    <div class="row">
      <div class="pagination" style="display:flex;justify-content:center;">
        <?php
          for($i=0; $i < $pages ; $i++){
            echo('
              <a href="?page='.($i+1).'">'.($i+1).'</a>
            ');
          }
        ?>
      </div>
    </div>
</div>
<?php
    include_once('../../layout/no_login/footer.php');
?>
