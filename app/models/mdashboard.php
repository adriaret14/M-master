<?php

	class mDashboard extends Model{
		function __construct(){
			parent::__construct();
		}
		function nu($nick,$mail,$pass,$nombre,$apellidos,$telf,$ciudad,$tipo)
		{
			try{
				$sql="SELECT * FROM usuarios WHERE nickname=?";
			    $this->query($sql);
			    $this->bind(1,$nick);
			    $this->execute();
			    if($this->rowCount()==1)
			    {
			    	//El nick ya existe
			    }
			    else
			    {
			    	$sql2="SELECT * FROM usuarios WHERE email=?";
			     	$this->query($sql2);
			     	$this->bind(1,$mail);
			    	$this->execute();
			    	if($this->rowCount()==1)
			    	{
			    		//El email ya existe
			    	}
			    	else
			    	{
			    		$sql5="INSERT INTO usuarios (nickname, email, nombre, apellidos, contra, telefono, ciudad, Rol) VALUES (?, ?, ?, ?, ?, ?, 1, ?)";
			    		$this->query($sql5);
			    		$this->bind(1,$nick);
			    		$this->bind(2,$mail);
			    		$this->bind(3,$nombre);
			    		$this->bind(4,$apellidos);
			    		$this->bind(5,$pass);
			    		$this->bind(6,$telf);
			    		$this->bind(7,$tipo);
			    		$this->execute();
			    	}
			    }

			}
			catch(PDOException $e){
		       echo "Error:".$e->getMessage();
		   	}
		}
		function du($nick)
		{
			try {
				$sql="DELETE FROM usuarios WHERE nickname=?";
				$this->query($sql);
	     		$this->bind(1,$nick);
	     		$this->execute();
			} 
			catch(PDOException $e){
		       echo "Error:".$e->getMessage();
		   	}
		}
		function uu($busc,$nick,$mail,$pass,$nombre,$apellidos,$telf,$ciudad,$tipo)
		{
			try{
				if($nick!=null)
				{
					$sql="UPDATE usuarios SET nickname=? WHERE nickname=?";
					$this->query($sql);
					$this->bind(1,$nick);
					$this->bind(2,$busc);
					$this->execute();
				}
				if($mail!=null)
				{
					$sql="UPDATE usuarios SET email=? WHERE nickname=?";
					$this->query($sql);
					$this->bind(1,$mail);
					$this->bind(2,$busc);
					$this->execute();
				}
				if($pass!=null)
				{
					$sql="UPDATE usuarios SET contra=? WHERE nickname=?";
					$this->query($sql);
					$this->bind(1,$pass);
					$this->bind(2,$busc);
					$this->execute();
				}
				if($nombre!=null)
				{
					$sql="UPDATE usuarios SET nombre=? WHERE nickname=?";
					$this->query($sql);
					$this->bind(1,$nombre);
					$this->bind(2,$busc);
					$this->execute();
				}
				if($apellidos!=null)
				{
					$sql="UPDATE usuarios SET apellidos=? WHERE nickname=?";
					$this->query($sql);
					$this->bind(1,$apellidos);
					$this->bind(2,$busc);
					$this->execute();
				}
				if($telf!=null)
				{
					$sql="UPDATE usuarios SET telefono=? WHERE nickname=?";
					$this->query($sql);
					$this->bind(1,$telf);
					$this->bind(2,$busc);
					$this->execute();
				}
				if($ciudad!=null)
				{
					$sql="UPDATE usuarios SET ciudad=? WHERE nickname=?";
					$this->query($sql);
					$this->bind(1,$ciudad);
					$this->bind(2,$busc);
					$this->execute();
				}
				if($tipo!=null)
				{
					$sql="UPDATE usuarios SET Rol=? WHERE nickname=?";
					$this->query($sql);
					$this->bind(1,$tipo);
					$this->bind(2,$busc);
					$this->execute();
				}
				
			}
			catch(PDOException $e){
		       echo "Error:".$e->getMessage();
		   	}
		}
	}