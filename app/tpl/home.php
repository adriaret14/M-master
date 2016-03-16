<?php
	if(!isset($_SESSION['user']))
	{
		include'cover.php';
	}
	else
	{
		include 'home2.php';
	}
?>

