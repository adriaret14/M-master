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
			if((isset($_POST['nick'])) && (isset($_POST['mail'])) && (isset($_POST['pass'])) && (isset($_POST['nombre'])) && (isset($_POST['apellidos'])) && (isset($_POST['ciudad'])))
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
               	echo '<script language="javascript">alert("Te has registrado correctamente!");</script>';	
              	header('Location:'.APP_W.'home');
         		}
        		else{
             	// no se ha podido hacer el registro(email ya en uso, nicknane ya en uso,...)
               	echo '<script language="javascript">alert("Error! Ya existe el usuario con ese nickname o email.");</script>'; 
               	header('Location:'.APP_W.'register');
             }
			}
		}
	}