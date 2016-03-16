<?php
	/**
	 *  vHome
	 *  Prepares and loads the corresponding Template
	 *  @author Toni
	 * 
	 * */
	class vHome2 extends View{

		function __construct(){
			parent::__construct();

			$this->tpl=Template::load('home2',$this->view_data);
			
		}

	}