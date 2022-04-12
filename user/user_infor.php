<?php
  session_start();
  require_once('../db/util.php');
  require_once('../db/dbhelpers.php');
  include_once('../layout/header.php');
  require_once('../api/process_user_infor.php');
  $user = validateToken();
  if($user == null){
    header("location: ../index.php");
    die();
  }
  
  $sql = "select * from users where id = '".$_SESSION['userId']."'";
  $result = executeResult($sql);

  $fullname= $result[0]['fullname'];
  $phone_number = $result[0]['phone_number'];
  $address = $result[0]['address'];
  $email = $result[0]['email'];
?>
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
  background-color: #dddddd;
}

* {
  box-sizing: border-box;
}



/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Overwrite default styles of hr */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for the submit button */
.editbtn {
  background-color: #04AA6D;
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.editbtn:hover {
  opacity: 1;
}

/* Add a blue text color to links */
a {
  color: dodgerblue;
}

/* Set a grey background color and center the text of the "sign in" section */
.signin {
  background-color: #f1f1f1;
  text-align: center;
}
</style>

<form method="post">
    <div class="container" style="padding: 16px; background-color: white;">
        <h1>Thông tin khách hàng</h1>
        <p>Khách hàng có thể xem lại thông tin cá nhân và chỉnh sửa nếu có sai sót.</p>
        <hr>
        <label for="fullname"><b>Họ tên</b></label>
        <input type="text" placeholder="Enter name" name="fullname" id="fullname" value="<?=$fullname?>" required>

        <label for="phone_number"><b>Số điện thoại</b></label>
        <input type="text" placeholder="Enter phone" name="phone_number" id="phone_number" value="<?=$phone_number?>" required>
        
        <label for="address"><b>Địa chỉ</b></label>
        <input type="text" placeholder="Enter address" name="address" id="address" value="<?=$address?>" required>

        <label for="email"><b>Email</b></label>
        <input type="text" placeholder="Enter Email" name="email" id="email" value="<?=$email?>" required>
        <hr>

        <button type="submit" onclick="" class="editbtn">Sửa thông tin</button>
    </div>
</form>

<?php
  include_once("../layout/footer.php");
?>
