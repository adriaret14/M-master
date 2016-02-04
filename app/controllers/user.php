<?php

	class User extends Controller{
		protected $model;
		protected $view;

		public function __construct($params){
			parent::__construct($params);
			$this->model=new mUser();
			$this->view=new vUser();
		}

		function home(){

		}
	}