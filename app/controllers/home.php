<?php
	
	class Home extends Controller{
		protected $model;
		protected $view;
		
		function __construct($params){
			parent::__construct($params);
			$this->model=new mHome();
			$this->view= new vHome();
			
			//echo 'Hello controller!';
		}
		function home(){
			//Coder::codear($this->conf);
	}

 	function login(){
   if(isset($_POST['usuario'])){
         $usuario=filter_input(INPUT_POST, 'usuario', FILTER_SANITIZE_STRING);
         $password=filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING); 
         $user=$this->model->login($usuario,$password);
         if ($user== TRUE){
          //Comprobar si el usuario es admin o no
              if($_SESSION['tipo']==1)
              {
                $output=array('redirect'=>APP_W.'dashboard');
                $this->ajax_set($output);
              }
              else
              {
                $output=array('redirect'=>APP_W.'home2');
                $this->ajax_set($output);
              }
          }
          else{ 
             $output=array('redirect'=>APP_W.'register');
             $this->ajax_set($output);
          }
    }
  }
  function logout(){
    Session::destroy();
    header('Location:'.APP_W.'home');
  }
}