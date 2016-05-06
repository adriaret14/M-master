
<!DOCTYPE html>
<html>
<head>
	<title><?= $title; ?></title>
    <link rel="stylesheet"  type="text/css" href="<?= APP_W.'pub/css/m.css'; ?>">
    <script src="<?= APP_W.'pub/js/jquery.min.js'; ?>"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="<?= APP_W.'pub/js/app.js'; ?>"></script>
    <script src="pub/js/gmaps.js"></script>
</head>
<body>
	<header>
	<h2 id="logo"><a href="<?= APP_W.'home2'; ?>">Mark It</a></h2> 
	<div id="ses">
		<?php
			if(isset($_SESSION['usuario']))
			{
				echo 'Loged as, '.$_SESSION['usuario'].' | <a href="'.APP_W.'home/logout">Logout</a>';
			}
		?>
	</div>

	
	</header>
	
