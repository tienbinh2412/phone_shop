<?php
  session_start();
  require_once('../db/util.php');
  require_once('../db/dbhelpers.php');
  include_once('../layout/header.php');
  require_once('../api/process_change_password.php');
  $user = validateToken();
  if($user == null){
    header("location: ../index.php");
    die();
  }
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
        <h1>Đổi mật khẩu</h1>
        <p>Khách hàng có thể đổi mật khẩu cá nhân tại đây.</p>
        <hr>
        <label for="password"><b>Mật khẩu cũ</b></label>
        <input type="password" placeholder="nhập mật khẩu cũ" name="password" id="password" value="" required>

        <label for="new_password"><b>Mật khẩu mới</b></label>
        <input type="password" placeholder="nhập mật khẩu mới" name="new_password" id="new_password" value="" required>
        
        <label for="re_new_password"><b>Nhập lại mật khẩu mới</b></label>
        <input type="password" placeholder="nhập lại mật khẩu mới" name="re_new_password" id="re_new_password" value="" required>

        <hr>

        <button type="submit" onclick="change_password()" class="editbtn">Đổi mật khẩu</button>
    </div>
</form>
<script>
    function change_password(){
        var password = document.getElementById('password').value;
        var new_password = document.getElementById('new_password').value;
        var re_new_password = document.getElementById('re_new_password').value;

        if(password ===""){
          alert("vui lòng nhập mật khẩu cũ")
          document.getElementById('password').focus()
          return false
        }
        else if(new_password === '' || re_new_password === ''){
          alert("vui lòng nhập mật khẩu mới đầy đủ")
          document.getElementById('new_password').focus()
          return false
        }
        else if(new_password.lenght <8 || new_password.lenght >20){
          alert("mật khẩu phải từ 8 - 20 kí tự")
          document.getElementById('new_password').focus()
          return false
        }
        else if(new_password != re_new_password){
          alert("Bạn hãy nhập đúng mật khẩu cần đổi")
          document.getElementById('re_new_password').focus()
          return false
        }
        else{
          alert('đổi mật khẩu thành công')
          return true
        }
    }
</script>
<?php
  include_once("../layout/footer.php");
?>
