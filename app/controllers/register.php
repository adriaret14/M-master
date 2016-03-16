<?php

	class Register extends Controller{
		protected $model;
		protected $view;

		function __construct($params){
			parent::__construct($params);
			$this->model=new mRegister();
			$this->view= new vRegister();
		}

		function registrar()
		{
			//La funcion de registro del controlador donde cojeremos los datos del formulario de registro y se los pasaremos a la funcion del modelo
			if((!empty($_POST['nick'])) && (!empty($_POST['mail'])) && (!empty($_POST['pass'])) && (!empty($_POST['nombre'])) && (!empty($_POST['apellidos'])) && (!empty($_POST['ciudad'])))
			{
				$nick=filter_input(INPUT_POST, 'nick', FILTER_SANITIZE_STRING);
				$mail=filter_input(INPUT_POST, 'mail', FILTER_SANITIZE_STRING);
				$pass=filter_input(INPUT_POST, 'pass', FILTER_SANITIZE_STRING);
				$nombre=filter_input(INPUT_POST, 'nombre', FILTER_SANITIZE_STRING);
				$apellidos=filter_input(INPUT_POST, 'apellidos', FILTER_SANITIZE_STRING);
				$telf=filter_input(INPUT_POST, 'telf', FILTER_SANITIZE_STRING);
				$ciudad=filter_input(INPUT_POST, 'ciudad', FILTER_SANITIZE_STRING);


				$user=$this->model->registrar($nick,$mail,$pass,$nombre,$apellidos,$telf,$ciudad);

				if ($user== TRUE){
               	// se ha registrado correctamente	
              	//header('Location:'.APP_W.'home');
              	$output=array('redirect'=>APP_W.'home');
             	 $this->ajax_set($output);
         		}
        		else{
             	// no se ha podido hacer el registro(email ya en uso, nicknane ya en uso,...) 
               	//header('Location:'.APP_W.'register');
        		$output=array('redirect'=>APP_W.'register');
             	$this->ajax_set($output);
             }
			}
		}
	}