<?php

	class mHome2 extends Model{

		function __construct(){
			parent::__construct();
			
		}
		function crear($t,$d,$p, $f)
		{
			try
			{
				

			    $this->begintransaction();

			    if(empty($t) || empty($d) || empty($p))
			    {
			    	$this->canceltransaction();
			    	return FALSE;
			    }
			    else
			    {
			    	if(empty($f))
			    	{
						$sql="INSERT INTO anuncios(usuario, titulo, descripcion, foto_1, precio) VALUES(?, ?, ?, 'https://media.creativemornings.com/uploads/user/avatar/17464/logo-camara_blog.jpg', ?)";
						$this->query($sql);
						$this->bind(1,$_SESSION['id_usr']);
					    $this->bind(2,$t);
					    $this->bind(3,$d);
					    $this->bind(4,$p);
					    $this->execute();
					    $this->endtransaction();
					    return TRUE;
			    	}
			    	else
			    	{
			    		$sql="INSERT INTO anuncios(usuario, titulo, descripcion, foto_1, precio) VALUES(?, ?, ?, ?, ?)";
						$this->query($sql);
						$this->bind(1,$_SESSION['id_usr']);
					    $this->bind(2,$t);
					    $this->bind(3,$d);
					    $this->bind(4,$f);
					    $this->bind(5,$p);
					    $this->execute();
					    $this->endtransaction();
					    return TRUE;
			    	}
					
				}
			}
			catch(PDOException $e)
			{
			    echo "Error:".$e->getMessage();
			}

	}
	function mostrar()
	{
		$sql="SELECT * FROM anuncios";
		$this->query($sql);
		$this->execute();
		if($this->rowCount()>0)
		{
			//Hay usuarios que mostrar
			return $this->resultset();
		}
		//$this->resultset();
	}
	function valorar($x1, $x2){
		$sql1="SELECT * FROM valoraciones WHERE anuncio=? and usuario=?";
		$this->query($sql1);
		$this->bind(1,$x1);
		$this->bind(2,$x2);
		$this->execute();
		if($this->rowCount()>0)
		{
			return FALSE;
		}

		$sql="INSERT INTO valoraciones(anuncio, usuario) VALUES (?, ?)";
		$this->query($sql);
		$this->bind(1,$x1);
		$this->bind(2,$x2);
		$this->execute();
		/*if($this->rowCount()>0)
		{*/
			return TRUE;
		/*}*/
	}

}