<?php

	class mHome extends Model{

		function __construct(){
			parent::__construct();
			
		}

	function login($usuario,$password){
 	 try{
     $sql="SELECT * FROM usuarios WHERE nickname=? AND contra=?";
     $this->query($sql);
     $this->bind(1,$usuario);
     $this->bind(2,$password);
     $this->execute();
     if($this->rowCount()==1){
          $datos=$this->single();
           Session::set('islogged',TRUE);
           Session::set('usuario',$usuario);
           Session::set('id_usr', $datos[0]['id_usuario']);
           Session::set('tipo', $datos[0]['Rol']);
           return TRUE;
     }
     else {
         Session::set('islogged',FALSE);
          return FALSE;}
    }catch(PDOException $e){
       echo "Error:".$e->getMessage();
   	}
	}
 

 
	}