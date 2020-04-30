<?php
session_start();
?>
<!DOCTYPE html>
<form id="myForm" method="post" action="Login.php">
    First name:<br>
    <input id="username" type="text" name="username" value='<?php
    if(isset($_POST['remember'])){
        echo $_POST['username'];
    } else {
        if(isset($_POST['username'])){
            echo "";
        } else {
            if(isset($_COOKIE['remember'])){
                echo explode(',', $_COOKIE['remember'])[0];
            }
        }
    }
    ?>'
    required>
    <br>
    Password:<br>
    <input id="password" type="text" name="password" value='<?php
    if(isset($_POST['remember'])){
        echo $_POST['password'];
    } else {
        if(isset($_POST['password'])){
            echo "";
        } else {
            if(isset($_COOKIE['remember'])){
                echo explode(',', $_COOKIE['remember'])[1];
            }
        }
    }
    ?>'
    required>
    <br><br>
    <input type="checkbox" name="remember" <?php
    if(isset($_POST['remember'])){
        echo "checked";
    } else {
        if(isset($_POST['username'])){
            echo "";
        } else {
            if(isset($_COOKIE['remember'])){
                echo "checked";
            }
        }
    }
    ?>
    >Remember<br>
    <input type="button" value="Submit" onclick="myFunction()">
</form>
<?php
class UserAccount
{
    //put your code here
    public function logIn()
    {   
        $username = explode('@', $_POST['username'])[0];
        if(strcmp($username . "_123", $_POST['password']) === 0){
            $_SESSION['username'] = $username;
            header('Location: LoginSuccess.php');
        } else {
            echo "Sai t�i kho?n m?t kh?u";
        }
    }
    public function logOut()
    {
        unset($_SESSION['username']);
    }
    public function validate()
    {
        
    }
    public function remember()
    {
        $info = $_POST['username'] . "," . $_POST['password'];
        setcookie('remember', $info, time() + 86400 * 30);
    }
    public function noremember()
    {
        setcookie('remember', '', time() - 3600);
    }
}
$useraccount = new UserAccount();
if(isset($_POST['username'])){
    if(isset($_POST['remember'])){
        $useraccount->remember();
    }else{
        $useraccount->noremember();
    }
    $useraccount->logIn();
}
if(isset($_GET['logout'])){
    $useraccount->logOut();
}
?>
<script>
function myFunction() {
    var username = document.getElementById("username");
    var password = document.getElementById("password");
    var email_pat = /^[A-z]{1}[A-z0-9!#$%^&*()_+-.]+[A-z0-9]{1}\@[A-z0-9]{3,10}\.[A-z0-9]{1,10}[.A-z0-9]*$/;
    var error = "";
    if((username.value.length > 255) || (username.value.length == 0))
        error += "tên tài khoản phải < 255 kí tự và > 0\n";
    if (!email_pat.test(username.value))
        error += "không đúng định dạng mail\n"
    if((password.value.length > 50) || (password.value.length < 6))
        error += "mật khẩu phải có độ dài >6 và <50";
    if(error == ""){
        document.getElementById("myForm").submit();
    } else {
        alert(error);
    }
}
</script>
