<?php
  require_once('db/config.php');
  require_once('db/util.php');
  require_once('db/dbhelpers.php');
  require_once('layout/no_login/header.php');
  $user = validateToken();
    if($user != null){
        header("location: user/product.php");
        die();
    }
?>

  
<div class="container">
    <div class="row">
      <?php
        $sql = "select count(id) as number from products ";
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
        $sql = "select * from products limit $index, 9";
        $result = executeResult($sql);
        foreach($result as $item){
          echo'
          <div class="col-md-4 col-sm-6 col-xs-10">
            <a href="user/no_login/detail.php?id='.$item['id'].'"><img src="'.$item['thumbnail'].'" style="width:80%; height:80%;" alt=""></a>
            <a href="user/no_login/detail.php?id='.$item['id'].'"><p>'.$item['title'].'</p></a>
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
 require_once('layout/no_login/footer.php');
?>
