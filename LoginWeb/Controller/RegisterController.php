<?php
require("../Object/Users.php");
require_once('../Model/Connect.php');
$account = new Account;

if (isset($_POST['submit'])) {
    $account->email = $_POST["email"];
    $account->password = $_POST["password"];
    $account->cfpassword = $_POST["cfpassword"];
    if (($account->check() === true)
        && $account->Result() === true
    ) {
        $sql = "select * from users where mail_address = '$account->email'";
        $kt = mysqli_query($conn, $sql);

        if (mysqli_num_rows($kt) > 0) {
            echo 'Email has already existed';
        } else {
            $sql = "INSERT INTO users(mail_address,password) VALUES ('$account->email','$account->password')";
            mysqli_query($conn, $sql);
            header('Location: ../View/Users/Login.html');
        }
    }
}
?>
