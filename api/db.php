<?php

	function getDB(){
        /*Localhost*/

		$usuario="appfretanun";
		$password="1234";
        //freddyanuncios


        /*Vesta*/

        /*$usuario="afret_admin";
        $password="123456789";
        afret_fanuncios*/

		$conn = new PDO('mysql:host=localhost;dbname=freddyanuncios', $usuario, $password);
        return $conn;
		//$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}

