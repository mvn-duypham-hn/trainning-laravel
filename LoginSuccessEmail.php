<?php
echo 'Dang nhap thanh cong!';
?>
<html>
<head>
    <title>LogOut Page</title>
    <meta charset="utf-8">
</head>
<title>LoginSuccess!</title>
<body>
<form method="POST" action="LoginSuccessEmail.php">
    <input type="submit" name="btn_submit" value="Log Out">
</form>
<?php
if (isset($_POST["btn_submit"])) {
    session_destroy;
    setcookie('status', 1, time() + 0, '/', '', 0, 0);
    header('Location: LoginEmail.php');
}
?>
</body>
</html>