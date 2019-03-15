<!DOCTYPE html>
<?php
session_start();
if (isset($_SESSION['email'])){
    if (isset($_GET['logout'])){
?>
        <html>
            <head>
                <meta charset="UTF-8">
                <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
                <title></title>
            </head>
            <body>
                <form id="myForm" method="post" action="LoginPdo.php">
                  <div class="form-group">
                    <label for="email">Email address:</label>
                    <input type="text" class="form-control" id="email" name="email" value='<?php
                    if(isset($_POST['remember'])){
                        echo $_POST['email'];
                    } else {
                        if(isset($_POST['email'])){
                            echo "";
                        } else {
                            if(isset($_COOKIE['remember'])){
                                echo explode(',', $_COOKIE['remember'])[0];
                            }
                        }
                    }
                    ?>'
                    >
                  </div>
                  <div class="form-group">
                    <label for="pwd">Password:</label>
                    <input type="password" class="form-control" id="pwd" name="password" value='<?php
                    if(isset($_POST["remember"])){
                        echo $_POST["password"];
                    } else {
                        if(isset($_POST["password"])){
                            echo "";
                        } else {
                            if(isset($_COOKIE["remember"])){
                                echo explode(",", $_COOKIE["remember"])[1];
                            }
                        }
                    }
                    ?>'
                    >
                  </div>            
                  <div class="checkbox">
                    <label><input type="checkbox" name="remember" <?php
                    if(isset($_POST['remember'])){
                        echo "checked";
                    } else {
                        if(isset($_POST['email'])){
                            echo "";
                        } else {
                            if(isset($_COOKIE['remember'])){
                                echo "checked";
                            }
                        }
                    }
                    ?>
                    >Remember<br>
                    </label>
                  </div>
                  <button type="button" class="btn btn-default" onclick="myFunction()">Submit</button>
                </form>
            </body>
        </html>
<?php
    } else {
    header("location: LoginSuccessPdo.php");
    }
} else {
?>

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
            <form id="myForm" method="post" action="LoginPdo.php">
                <div class="form-group">
                    <label for="email">Email address:</label>
                    <input type="text" class="form-control" id="email" name="email" value='<?php
                    if(isset($_POST['remember'])){
                        echo $_POST['email'];
                    } else {
                        if(isset($_POST['email'])){
                            echo "";
                        } else {
                            if(isset($_COOKIE['remember'])){
                                echo explode(',', $_COOKIE['remember'])[0];
                            }
                        }
                    }
                    ?>'
                    >
                </div>
                <div class="form-group">
                    <label for="pwd">Password:</label>
                    <input type="password" class="form-control" id="pwd" name="password" value='<?php
                    if(isset($_POST["remember"])){
                        echo $_POST["password"];
                    } else {
                        if(isset($_POST["password"])){
                            echo "";
                        } else {
                            if(isset($_COOKIE["remember"])){
                                echo explode(",", $_COOKIE["remember"])[1];
                            }
                        }
                    }
                    ?>'
                    >
                </div>            
                <div class="checkbox">
                    <label><input type="checkbox" name="remember" <?php
                    if(isset($_POST['remember'])){
                        echo "checked";
                    } else {
                        if(isset($_POST['email'])){
                            echo "";
                        } else {
                            if(isset($_COOKIE['remember'])){
                                echo "checked";
                            }
                        }
                    }
                    ?>
                    >Remember<br>
                    </label>
                </div>
              <button type="button" class="btn btn-default" onclick="myFunction()">Submit</button>
            </form>
        </body>
    </html>
<?php
}
require "Database.php";
class Account2{
    public function check(){
        try {
            $email = $this->test_input($_POST['email']);
            $password = $this->test_input($_POST['password']);
            $pattern = '/^[A-z]{1}[A-z0-9!#$%^&*()_+-.]+[A-z0-9]{1}\@[A-z0-9]{3,10}\.[A-z0-9]{1,10}[.A-z0-9]*$/';
            if ((strlen($email) > 255) || (strlen($email) == 0)){
                return false;
            }
            if ((strlen($password) > 50) || (strlen($password) < 6)){
                return false;
            }
            if (!preg_match($pattern, $email)){
                return false;
            }
            $conn = Database::connect();
            $sql = "SELECT mail_address, password FROM users";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
            foreach (($stmt->fetchAll()) as $k=>$v){ 
                if (($v['mail_address'] == $_POST['email']) && ($v['password'] == $_POST['password']))
                    return true;
            }
            return false;
        }
        catch (PDOException $e){
            echo "Error: " . $e->getMessage();
        }
    }
    public function login(){
        $_SESSION['email'] = $_POST['email'];
        header('Location: LoginSuccessPdo.php');
    }
    public function logOut()
    {
        unset($_SESSION['email']);
    }
    public function remember()
    {
        $info = $_POST['email'] . "," . $_POST['password'];
        setcookie('remember', $info, time() + 86400 * 30);
    }
    public function noremember()
    {
        setcookie('remember', '', time() - 3600);
    }
    public function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
}
$account = new Account2();
if (isset($_POST['email'])){
    if (isset($_POST['remember'])){
        $account->remember();
    } else {
        $account->noremember();
    }
    if ($account->check()){
        $account->login();
    } else {
        echo "sai tài khoản hoặc mật khẩu";
    }
}
if (isset($_GET['logout'])){
    $account->logOut();
}
?>
<script>
function myFunction() {
    var email = document.getElementById("email");
    var password = document.getElementById("pwd");
    var email_pat = /^[A-z]{1}[A-z0-9!#$%^&*()_+-.]+[A-z0-9]{1}\@[A-z0-9]{3,10}\.[A-z0-9]{1,10}[.A-z0-9]*$/;
    var error = "";
    /*
    if ((email.value.length > 255) || (email.value.length == 0))
        error += "tên tài khoản phải < 255 kí tự và > 0\n";
    if (!email_pat.test(email.value))
        error += "không đúng định dạng mail\n";
    if ((password.value.length > 50) || (password.value.length < 6))
        error += "mật khẩu phải có độ dài >6 và <50";
    */
    if (1 == 1){
        document.getElementById("myForm").submit();
    } else {
        alert(error);
    }
}
</script>