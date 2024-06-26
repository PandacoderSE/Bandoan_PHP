<?php 

	class App{

		protected $controller ="home";
		protected $action ="product";
		protected $param =[];

		function __construct(){

			$arr = $this->UrlProcess();
			// xử lý controller
			if (file_exists("./mvc/controller/".$arr[0].".php")) {
				
				$this->controller = $arr[0];
				unset($arr[0]);
			}
			require_once "./mvc/controller/".$this->controller.".php";
			$this->controller = new $this->controller;
			// xử lý function
			if (isset($arr[1])) {
				if (method_exists($this->controller, $arr[1])) {
					$this->action = $arr[1];
				}
				unset($arr[1]);
			}
			//xử lý tham số
			$this->param = $arr?array_values($arr):[];
			call_user_func_array([$this->controller,$this->action], $this->param);
		}

		function UrlProcess(){

			if (isset($_GET["url"])) {
			return	explode("/", filter_var(trim($_GET["url"],"/")));
			}
		}
	}

 ?>