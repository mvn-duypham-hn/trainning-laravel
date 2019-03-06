<?php
session_start();
if (isset($_COOKIE['status'])) {
    header('Location: LoginSuccessEmail.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login Form</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="bootstrap-4.3.1/dist/css/bootstrap.min.css">
    <script src="jquery-3.3.1.min.js"></script>
    <script src="bootstrap-4.3.1/dist/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
    <h2>Login form</h2>
    <form method="post" action="LoginEmail.php">
        <div class="form-group">
            <label for="email">Email:</label> <input type="email"
                                                     class="form-control" placeholder="Enter email" name="email"
                                                     value="
					<?php
                                                     if (isset($_COOKIE['user'])) {
                                                         echo $_COOKIE['user'];
                                                     }
                                                     ?>"
                                                     required>
        </div>
        <div class="form-group">
            <label for="pwd">Password:</label> <input type="password"
                                                      class="form-control" placeholder="Enter password" name="password"
                                                      value="<?php
                                                      if (isset($_COOKIE['pass'])) {
                                                          echo $_COOKIE['pass'];
                                                      }
                                                      ?>"
                                                      required>
        </div>
        <div class="form-group form-check">
            <label class="form-check-label"> <input class="form-check-input"
                                                    type="checkbox" name="remember" value=""
                    <?php
                    if (isset($_COOKIE['user'])) {
                        echo 'checked';
                    }
                    ?>
                > Remember me
            </label>
        </div>
        <button type="submit" class="btn btn-primary" name="submit">Login</button>
    </form>
</div>
<?php
require("Account.php");
require_once("Connection.php");

$account = new Account();

if (isset($_POST["submit"])) {
    $account->email = $_POST["email"];
    $account->password = $_POST["password"];
    $sql = "select * from users where mail_address = '$account->email' and password = '$account->password'";
    $query = mysqli_query($conn, $sql);
    $num_rows = mysqli_num_rows($query);
    if ($num_rows === 0) {
        echo 'Invalid Username or Password!';
    } else {
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

        header('Location: LoginSuccessEmail.php');
        }
    }


?>
</body>
</html>
