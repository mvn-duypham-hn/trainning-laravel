<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Login Form</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet"
	href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
<script
	src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script
	src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<h2>Login form</h2>
		<form method="post" action="Login.php">
			<div class="form-group">
				<label for="email">Email:</label> <input type="email"
					class="form-control" placeholder="Enter email" name="email"
					value="<?php if(isset($_COOKIE['user'])){echo $_COOKIE['user'];} ?>">
			</div>
			<div class="form-group">
				<label for="pwd">Password:</label> <input type="password"
					class="form-control" placeholder="Enter password" name="password"
					value="<?php if(isset($_COOKIE['pass'])){echo $_COOKIE['pass'];} ?>">
			</div>
			<div class="form-group form-check">
				<label class="form-check-label"> <input class="form-check-input"
					type="checkbox" name="remember" value=""
					<?php if(isset($_COOKIE['user'])){echo 'checked';} ?>> Remember me
				</label>
			</div>
			<button type="submit" class="btn btn-primary" name="submit">Login</button>
		</form>
	</div>
<?php
require ("Account.php");

$account = new Account();

if (isset($_POST["submit"])) {
    $account->email = $_POST["email"];
    $account->password = $_POST["password"];
    if (isset($_POST['remember'])) {
        setcookie('user', $account->email, time() + 3600, '/', '', 0, 0);
        setcookie('pass', $account->password, time() + 3600, '/', '', 0, 0);
    } else {
        setcookie('user', $account->email, time() - 3600, '/', '', 0, 0);
        setcookie('pass', $account->password, time() - 3600, '/', '', 0, 0);
    }
    if (($account->Check()) === true) {

        header('Location: LoginSuccess.php');
    } else {

        header('Location: Login.php');
    }
}
?>
</body>
</html>
