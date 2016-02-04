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
			    			//Hay que hacer un insert en la tala usuarios para completar el registro

			    			return TRUE;
			    		}
			      }

			     
		    }catch(PDOException $e)
		    {
		       echo "Error:".$e->getMessage();
		   	}
		}
	}