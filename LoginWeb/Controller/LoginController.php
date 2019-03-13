<?php
require("../Object/Users.php");
require_once("../Model/Connect.php");

$account = new Account();

if (isset($_POST["submit"])) {
    $account->email = $_POST["email"];
    $account->password = $_POST["password"];
    $sql = "select * from users where mail_address = '$account->email' and password = '$account->password'";
    $query = mysqli_query($conn, $sql);
    $num_rows = mysqli_num_rows($query);
    if ($num_rows === 0) {
        setcookie('error', 'INVALID USERNAME OR PASSWORD!', time() + 1000, '/', '', 0, 0);
        header('Location: ../View/Users/Login.php');
    } else {
        setcookie('error','INVALID USERNAME OR PASSWORD',time() + 0,'/','',0,0);
        if (isset($_POST['remember'])) {
            setcookie('status', 1, time() + 1000, '/', '', 0, 0);
            setcookie('user', $account->email, time() + 1000, '/', '', 0, 0);
            setcookie('pass', $account->password, time() + 1000, '/', '', 0, 0);
        } else {
            setcookie('user', $account->email, time() + 0, '/', '', 0, 0);
            setcookie('pass', $account->password, time() + 0, '/', '', 0, 0);
        }

        $_SESSION['email'] = $_POST["email"];
        $_SESSION['password'] = $_POST["password"];

        header('Location: ../View/Users/LoginSuccess.php');
    }
}


?>