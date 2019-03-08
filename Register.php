<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Register Form</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="bootstrap-4.3.1/dist/css/bootstrap.min.css">
    <script src="jquery-3.3.1.min.js"></script>
    <script src="bootstrap-4.3.1/dist/js/bootstrap.min.js"></script>
    <script language="JavaScript" src="ValidateEmail.js"></script>
</head>
<body>
<div class="container">
    <h2>Register form</h2>
    <form method="post" action="Register.php"  onsubmit="return ValidateEmail()>
        <div class="form-group">
            <label for="email">Email:</label> <input type="email"
                                                     class="form-control" 
                                                     id="email"
													 placeholder="Enter email" name="email"
                                                     value=""
                                                     required>
            <p><font color="red" id="email_error"></font></p>
        </div>
        <div class="form-group">
            <label for="pwd">Password:</label> <input type="password"
                                                      class="form-control" 
                                                      id="password"
                                                      placeholder="Enter password" name="password"
                                                      value="" required>
            <p><font color="red" id="password_error"></font></p>
        </div>
        <div class="form-group">
            <label for="cfpwd">Confirm Password:</label> <input type="password"
                                                                class="form-control" 
                                                                id="cfpassword"
                                                                placeholder="Confirm Password"
                                                                name="cfpassword"
                                                                value="" required>
            <p><font color="red" id="cfpassword_error"></font></p>
            </label>
        </div>
        <button type="submit" class="btn btn-danger" name="submit">Register</button>
    </form>
</div>
<?php
require("Account.php");
require_once('Connection.php');

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
            header('Location: Login.php');
        }
    }
}

?>
</body>
</html>