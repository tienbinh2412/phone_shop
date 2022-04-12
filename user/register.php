<?php
    require_once("../db/config.php");
    require_once("../db/dbhelpers.php");
    require_once("../db/util.php");
    require_once("../api/process_register.php");
    $user = validateToken();
    if($user != null){
        header("location: product.php");
        die();
    }
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
  background-color: black;
}

* {
  box-sizing: border-box;
}

/* Add padding to containers */
.container {
  padding: 16px;
  background-color: white;
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
.registerbtn {
  background-color: #04AA6D;
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.registerbtn:hover {
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
</head>
<script>
    function btnRegister(){
        var password = document.getElementById('password').value 
        var re_password = document.getElementById('password-repeat').value 
        if(password ===""){
          alert("vui lòng nhập mật khẩu")
          document.getElementById('password').focus()
        }
        else if(password.length <8 || password.length >20){
          alert("Password phải từ 8-20 kí tự")
          document.getElementById('password').focus()
        }
        else if(password != re_password){
          alert("bạn vui lòng nhập đúng mật khẩu đã tạo!")
          document.getElementById('password-repeat').focus()
        }
    }
</script>
<body>

<form method="post">
  <div class="container">
    <h1>Đăng ký tài khoản khách hàng</h1>
    <p>Vui lòng điền đầy đủ thông tin để đăng ký tài khoản cá nhân.</p>
    <hr>

    <label for="fullname"><b>Họ tên</b></label>
    <input type="text" placeholder="Enter name" name="fullname" id="fullname" required>

    <label for="phone_number"><b>Số điện thoại</b></label>
    <input type="text" placeholder="Enter phone" name="phone_number" id="phone_number" required>
    
    <label for="address"><b>Địa chỉ</b></label>
    <input type="text" placeholder="Enter address" name="address" id="address" required>

    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" id="email" required>

    <label for="username"><b>User name</b></label>
    <input type="text" placeholder="Enter username" name="username" id="username" required>

    <label for="password"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" id="password" required>

    <label for="password-repeat"><b>Repeat Password</b></label>
    <input type="password" placeholder="Repeat Password" name="password-repeat" id="password-repeat" required>
    <hr>

    <button type="submit" onclick="btnRegister()" class="registerbtn">Đăng ký</button>
  </div>
  
  <div class="container signin">
    <p>Bạn đã có tài khoản đăng nhập? <a href="login.php">Đăng nhập</a>.</p>
  </div>
</form>

</body>
</html>
