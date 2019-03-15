<?php
require "Database.php";
class Account{
    public function save(){
        try {
            $email = $this->test_input($_POST['email']);
            $password = $this->test_input($_POST['password']);
            $repassword = $this->test_input($_POST['repassword']);
            $pattern = '/^[A-z]{1}[A-z0-9!#$%^&*()_+-.]+[A-z0-9]{1}\@[A-z0-9]{3,10}\.[A-z0-9]{1,10}[.A-z0-9]*$/';
            if ((strlen($email) > 255) || (strlen($email) == 0)){
                return false;
            }
            if ((strlen($password) > 50) || (strlen($password) < 6)){
                return false;
            }
            if ((strlen($repassword) > 50) || (strlen($repassword) < 6)){
                return false;
            }
            if (!preg_match($pattern, $email)){
                return false;
            }
            if ($password !== $repassword){
                return false;
            }
            $conn = Database::connect();
            $sql = "INSERT INTO users (mail_address, password)
            VALUES ('$email', '$password')";
            $conn->exec($sql);
            return true;
        }
        catch (PDOException $e){
            echo $sql . "<br>" . $e->getMessage();
        }
    }
    public function test_input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }    
}
if (isset($_POST['email'])){
    $account = new Account();
    if ($account->save()){
        header("location: LoginPdo.php?dangki=1");
    } else {
        echo "không thể lưu vào csdl";
    }
}
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <title></title>
    </head>
    <body>
        <form id="myForm" method="post" action="RegisterPdo.php">
          <div class="form-group">
            <label for="email">Email address:</label>
            <input type="text" class="form-control" id="email" name="email">
          </div>
          <div class="form-group">
            <label for="pwd">Password:</label>
            <input type="password" class="form-control" id="pwd" name="password">
          </div>
          <div class="form-group">
            <label for="repwd">Repassword:</label>
            <input type="password" class="form-control" id="repwd" name="repassword">
          </div>            
          <div class="checkbox">
            <label><input type="checkbox"> Remember me</label>
          </div>
          <button type="button" class="btn btn-default" onclick="myFunction()">Submit</button>
        </form>
    </body>
</html>
<script>
function myFunction() {
    var email = document.getElementById("email");
    var password = document.getElementById("pwd");
    var repassword = document.getElementById("repwd");
    var email_pat = /^[A-z]{1}[A-z0-9!#$%^&*()_+-.]+[A-z0-9]{1}\@[A-z0-9]{3,10}\.[A-z0-9]{1,10}[.A-z0-9]*$/;
    var error = "";
    /*
    if ((email.value.length > 255) || (email.value.length == 0))
        error += "tên tài khoản phải < 255 kí tự và > 0\n";
    if (!email_pat.test(email.value))
        error += "không đúng định dạng mail\n";
    if ((password.value.length > 50) || (password.value.length < 6))
        error += "mật khẩu phải có độ dài >6 và <50";
    if ((repassword.value.length > 50) || (repassword.value.length < 6))
        error += "mật khẩu phải có độ dài >6 và <50";
    if (repassword.value !== password.value)
        error += "password và repassword phải giống nhau";
    */
    if (1 == 1){
        document.getElementById("myForm").submit();
    } else {
        alert(error);
    }
}
</script>