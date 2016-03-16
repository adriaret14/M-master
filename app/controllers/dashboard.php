<?php

	class Dashboard extends Controller{
		protected $model;
		protected $view;
		
		function __construct($params){
			parent::__construct($params);
			$this->model=new mDashboard();
			$this->view= new vDashboard();
			
			//echo 'Hello controller!';
		}
		function home(){
			//Coder::codear($this->conf);
		}
		function nu()
		{
			if((!empty($_POST['nick'])) && (!empty($_POST['mail'])) && (!empty($_POST['pass'])) && (!empty($_POST['nombre'])) && (!empty($_POST['apellidos'])) && (!empty($_POST['telf'])) && (!empty($_POST['ciudad']))  && (!empty($_POST['tipo'])))
			{
				$nick=filter_input(INPUT_POST, 'nick', FILTER_SANITIZE_STRING);
				$mail=filter_input(INPUT_POST, 'mail', FILTER_SANITIZE_STRING);
				$pass=filter_input(INPUT_POST, 'pass', FILTER_SANITIZE_STRING);
				$nombre=filter_input(INPUT_POST, 'nombre', FILTER_SANITIZE_STRING);
				$apellidos=filter_input(INPUT_POST, 'apellidos', FILTER_SANITIZE_STRING);
				$telf=filter_input(INPUT_POST, 'telf', FILTER_SANITIZE_STRING);
				$ciudad=filter_input(INPUT_POST, 'ciudad', FILTER_SANITIZE_STRING);
				$tipo=filter_input(INPUT_POST, 'tipo', FILTER_SANITIZE_STRING);



				$this->model->nu($nick,$mail,$pass,$nombre,$apellidos,$telf,$ciudad,$tipo);

				/*if ($user== TRUE){
               	// se ha registrado correctamente	
              	//header('Location:'.APP_W.'home');
              	$output=array('redirect'=>APP_W.'dashboard');
             	$this->ajax_set($output);
         		}
        		else{
             	// no se ha podido hacer el registro(email ya en uso, nicknane ya en uso,...) 
               	//header('Location:'.APP_W.'register');
        		$output=array('redirect'=>APP_W.'dashboard');
             	$this->ajax_set($output);
             }*/
			}
		}
		function du()
		{
			if(!empty($_POST['dusearch']))
			{
				$nick=filter_input(INPUT_POST, 'dusearch', FILTER_SANITIZE_STRING);
				$this->model->du($nick);
			}
		}
		function uu()
		{
			
			$busc=filter_input(INPUT_POST, 'uusearch', FILTER_SANITIZE_STRING);
			
			$nick=filter_input(INPUT_POST, 'nick', FILTER_SANITIZE_STRING);
			$mail=filter_input(INPUT_POST, 'mail', FILTER_SANITIZE_STRING);
			$pass=filter_input(INPUT_POST, 'pass', FILTER_SANITIZE_STRING);
			$nombre=filter_input(INPUT_POST, 'nombre', FILTER_SANITIZE_STRING);
			$apellidos=filter_input(INPUT_POST, 'apellidos', FILTER_SANITIZE_STRING);
			$telf=filter_input(INPUT_POST, 'telf', FILTER_SANITIZE_STRING);
			$ciudad=filter_input(INPUT_POST, 'ciudad', FILTER_SANITIZE_STRING);
			$tipo=filter_input(INPUT_POST, 'tipo', FILTER_SANITIZE_STRING);
			
			$this->model->uu($busc,$nick,$mail,$pass,$nombre,$apellidos,$telf,$ciudad,$tipo);
		}
	}