<?php

	/**
	 *  vDashboard
	 *  Prepares and loads the corresponding Template
	 *  @author Adria
	 * 
	 * */
	class vDashboard extends View{

		function __construct(){
			parent::__construct();

			$this->tpl=Template::load('dashboard',$this->view_data);
			
		}

	}