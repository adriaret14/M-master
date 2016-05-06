<?php
	
	class Home2 extends Controller{
		protected $model;
		protected $view;
		
		function __construct($params){
			parent::__construct($params);
			$this->model=new mHome2();
			$this->view= new vHome2();
			
			//echo 'Hello controller!';
		}
		function home(){
			//Coder::codear($this->conf);
	}
	function crear()
	{
		
		//Funcion utilizada para crear un anuncio
		if((isset($_POST['t_anun'])) && (isset($_POST['d_anun'])) && (isset($_POST['p_anun'])))
		{
			$t=filter_input(INPUT_POST, 't_anun', FILTER_SANITIZE_STRING);
			$d=filter_input(INPUT_POST, 'd_anun', FILTER_SANITIZE_STRING);
			$p=filter_input(INPUT_POST, 'p_anun', FILTER_SANITIZE_STRING);
			$f=filter_input(INPUT_POST, 'f_anun', FILTER_SANITIZE_STRING);
			$anun=$this->model->crear($t,$d,$p,$f);
			if($anun == TRUE)
			{
				//insertado correctamente
				header('Location:'.APP_W.'home2');
				//$this->json_out(array('msg'=>'ok'));
				/*$output=array('redirect'=>APP_W.'home2');
             	$this->ajax_set($output);*/
			}
			else
			{
				//no insertado
				//echo "ERROR AL INSERTAR";
				header('Location:'.APP_W.'home2');
				/*$output=array('redirect'=>APP_W.'home2');
             	$this->ajax_set($output);*/

			}
		}
	}
	function mostrar()
	{
		$resultado=$this->model->mostrar();
		if($resultado!=null)
		{
			//echo $resultado;
			//$output=array($resultado);
			$this->ajax_set($resultado);
			//var_dump($resultado);
		}
	}
	function valorar(){
		$x1=$_POST['id_a'];
		$x2=$_SESSION['id_usr'];

		$valora=$this->model->valorar($x1, $x2);

		if($valora == TRUE)
		{
				//insertado correctamente
				//header('Location:'.APP_W.'home2');
				//$this->json_out(array('msg'=>'ok'));
				$this->ajax_set(1);
		}
		else
		{
			$this->ajax_set(2);
		}
	}
		
}
