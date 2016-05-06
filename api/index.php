<?php
	require 'vendor/autoload.php';
    require 'db.php';

	\Slim\Slim::registerAutoloader();

	$app = new \Slim\Slim();

	$app->get('/users/', 'mostrarUsers');
	$app->post('/users/', 'insertarUser');
    //echo "Hello, $x";
    function mostrarUsers()
    {
    	//echo "Mostrar usuarios";

        $sql="SELECT * FROM usuarios";
        $dbh=getDB();
        //echo "conectado";
        $stmt=$dbh->prepare($sql);
        $stmt->execute();
        $result=$stmt->fetchAll();
        header('Content-Type', 'application/json');
        echo json_encode($result);


       /*function getUser($id) {
            $sql = "SELECT * FROM usuarios";
            try {
                $dbCon = getConnection();
                $stmt = $dbCon->prepare($sql);  
                $stmt->bindParam("id", $id);
                $stmt->execute();
                $user = $stmt->fetchObject();  
                $dbCon = null;
                echo json_encode($user); 
            } catch(PDOException $e) {
                echo '{"error":{"text":'. $e->getMessage() .'}}'; 
            }
        }*/
    }

    function insertarUser()
    {
    	//echo "Insertar usuario";
        $request=\Slim\Slim::getInstance()->request();
        $user=$request->params();
        /*var_dump($user);
        die;*/
        $v1=$user["nickname"];
        $v2=$user["email"];
        $v3=$user["nombre"];
        $v4=$user["apellidos"];
        $v5=$user["contra"];
        $v6=$user["telefono"];
        $v7=$user["ciudad"];


        $sql="INSERT INTO usuarios (nickname, email, nombre, apellidos, contra, telefono, ciudad) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $dbh=getDB();
        $stmt=$dbh->prepare($sql);
        $stmt->bindParam(1,$v1);
        $stmt->bindParam(2,$v2);
        $stmt->bindParam(3,$v3);
        $stmt->bindParam(4,$v4);
        $stmt->bindParam(5,$v5);
        $stmt->bindParam(6,$v6);
        $stmt->bindParam(7,$v7);
        $stmt->execute();
    }

	$app->run();