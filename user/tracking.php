<?php
  session_start();
  require_once('../db/util.php');
  require_once('../db/dbhelpers.php');
  include_once('../layout/header.php');
  $user = validateToken();
  if($user == null){
    header("location: ../index.php");
    die();
  }

  $sql = "select * from order_details,orders,products where order_details.order_id= orders.id and order_details.product_id = products.id and orders.user_id = '".$_SESSION['userId']."'";
  $result = executeResult($sql);
  $sql_user = "select fullname from users where id = '".$_SESSION['userId']."'";  
  $fullname = executeResult($sql_user);
?>
<style>
.gradient-custom {
  background: whitesmoke !important;
  min-height: 500px;
}
</style>

<section class="h-100 gradient-custom">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-10 col-xl-8">
        <div class="card" style="border-radius: 10px;">
          <div class="card-header px-4 py-5">
            <h5 class="text-muted mb-0">Cảm ơn khách hàng <span style="color: #a8729a;"><?= $fullname[0]['fullname']?></span> đã mua hàng tại shop chúng tôi!</h5>
          </div>
          <div class="card-body p-4">
            <div class="d-flex justify-content-between align-items-center mb-4">
              <p class="lead fw-normal mb-0" style="color: #a8729a;">Lịch sử order</p>
            </div>
            <?php
            foreach($result as $item){
                echo'
                <div class="card shadow-0 border mb-4">
                    <div class="card-body">
                    <div class="row">
                        <div class="col-md-2">
                        <img src="'.$item['thumbnail'].'" style="width:100%; height:100%;" class="img-fluid" alt="Phone">
                        </div>
                        <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                        <p class="text-muted mb-0">'.$item['title'].'</p>
                        </div>
                        <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                        <p class="text-muted mb-0 small">'.date_format(date_create($item['order_date']),"d/m/Y").'</p>
                        </div>
                        <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                        <p class="text-muted mb-0 small">Loại: '.$item['type'].'</p>
                        </div>
                        <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                        <p class="text-muted mb-0 small">Số lượng: '.$item['num'].'</p>
                        </div>
                        <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                        <p class="text-muted mb-0 small">Giá: '.number_format($item['num']*$item['price'], 0, ',', '.').'đ</p>
                        </div>
                    </div>
                    <hr class="mb-4" style="background-color: #e0e0e0; opacity: 1;">
                    </div>
                </div>
  
                ';
            }
            ?>
           

           
        </div>
      </div>
    </div>
  </div>
</section>

<?php
  include_once("../layout/footer.php");
?>