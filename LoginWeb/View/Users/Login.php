<?php
session_start();
if (isset($_COOKIE['status'])) {
    header('Location: LoginSuccess.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login Form</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../assets/bootstrap.min.css">
    <script src="../assets/jquery-3.3.1.min.js"></script>
    <script src="../assets/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
    <h2>Login form</h2>
    <form method="post" action="../../Controller/LoginController.php">
        <div class="form-group">
            <label for="email">Email:</label> <input type="email"
                                                     class="form-control" placeholder="Enter email" name="email"
                                                     value=""
                                                     required>
            <font color="red">
                <?php if (isset($_COOKIE['error'])) {
                    echo $_COOKIE['error'];
                }
                ?>
            </font>


        </div>
        <div class="form-group">
            <label for="pwd">Password:</label> <input type="password"
                                                      class="form-control" placeholder="Enter password" name="password"
                                                      value=""
                                                      required>
        </div>
        <div class="form-group form-check">
            <label class="form-check-label"> <input class="form-check-input"
                                                    type="checkbox" name="remember" value=""

                > Remember me
            </label>
        </div>
        <button type="submit" class="btn btn-primary" name="submit">Login</button>
    </form>
</div>
</body>
</html>