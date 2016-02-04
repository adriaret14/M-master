<!DOCTYPE html>
<html>
<head>
	<title><?= $title; ?></title>
    <link rel="stylesheet"  type="text/css" href="<?= APP_W.'pub/css/m.css'; ?>">
    <script src="<?= APP_W.'pub/js/jquery.min.js'; ?>"></script>
    <script src="<?= APP_W.'pub/js/app.js'; ?>"></script>
</head>
<body>
	<header>
		<h1> View -<?= $title; ?></h1>
		<div id="login_div">
		<form action="home/login" method="post">
		User:<input type="text" name="usuario"><br>
		Password:<input type="password" name="password"><br>
		<a href="#">Forgot your password?</a><input class="but" type="button" value="Register"><input class="but" type="submit" value="Log In">
		</form>
		</div>
	</header>
	
