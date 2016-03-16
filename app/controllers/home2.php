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
			$anun=$this->model->crear($t,$d,$p);
			if($anun == TRUE)
			{
				//insertado correctamente
				header('Location:'.APP_W.'home2');
				//$this->json_out(array('msg'=>'ok'));
			}
			else
			{
				//no insertado
				echo "ERROR AL INSERTAR";
				header('Location:'.APP_W.'home2');

			}
		}
	}
		
}
