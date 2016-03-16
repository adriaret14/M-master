<?php

	class mHome2 extends Model{

		function __construct(){
			parent::__construct();
			
		}
		function crear($t,$d,$p)
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
					$sql="INSERT INTO anuncios(usuario, titulo, descripcion) VALUES(?, ?, ?)";
					$this->query($sql);
					$this->bind(1,$_SESSION['id_usr']);
				    $this->bind(2,$t);
				    $this->bind(3,$d);
				    /*$this->bind(3,$p);*/
				    $this->execute();
				    $this->endtransaction();
				    return TRUE;
				}
			}
			catch(PDOException $e)
			{
			    echo "Error:".$e->getMessage();
			}

	}

}