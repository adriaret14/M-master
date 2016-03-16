<?php

	class mRegister extends Model{

		function __construct(){
			parent::__construct();

		}

		function registrar($nick,$mail,$pass,$nombre,$apellidos,$telf,$ciudad)
		{
			//Aquí se realizarán las operaciones necesarias y/o consultas con la base de datos, para después devolver un "control" al controlador para que decida que vista mostrar
			try{
			     $sql1="SELECT * FROM usuarios WHERE nickname=?";
			     $this->query($sql1);
			     $this->bind(1,$nick);
			     $this->execute();

			     if($this->rowCount()==1)
			     {
			     	echo "entramos";
			           	//Session::set('islogged',TRUE);
			           	//Session::set('usuario',$usuario);
			           	//return TRUE;

			     		//YA EXISTE EL NICKNAME
			     		return FALSE;
			     }
			     else 
			     {
			         	//Session::set('islogged',FALSE);
			         	//return FALSE;
			     		$sql2="SELECT * FROM usuarios WHERE email=?";
			     		$this->query($sql2);
			     		$this->bind(1,$nick);
			    		$this->execute();

			    		if($this->rowCount()==1)
			    		{
			    			//YA EXISTE EL EMAIL
			    			return FALSE;
			    		}
			    		else
			    		{
			    			//SE REGISTRARÁ
			    			/*$sql_aux="SELECT * FROM ciudades WHERE NOMBRE=?";
			    			$this->query($sql_aux);
			    			$this->bind(1, $ciudad);
			    			$this->execute();
			    			if($this->rowCount()==1)
			     			{
			     				$aux1="SELECT id_ciudad FROM ciudades WHERE NOMBRE=?";
			     			}
			     			else
			     			{
			     				$sql3="INSERT INTO ciudades VALUES (".$ciudad.", 1)";
			    				$aux1=$this->lastInsertId();
			     			}

			    			$sql3="INSERT INTO ciudades VALUES (".$ciudad.", 1)";*/
			    			$sql4="INSERT INTO usuarios (nickname, email, nombre, apellidos, contra, telefono, ciudad) VALUES (?, ?, ?, ?, ?, ?, 1)";
			    			$this->query($sql4);
			    			$this->bind(1,$nick);
			    			$this->bind(2,$mail);
			    			$this->bind(3,$nombre);
			    			$this->bind(4,$apellidos);
			    			$this->bind(5,$pass);
			    			$this->bind(6,$telf);
			    			$this->execute();

			    			return TRUE;
			    		}
			      }

			     
		    }catch(PDOException $e)
		    {
		       echo "Error:".$e->getMessage();
		   	}
		}
	}