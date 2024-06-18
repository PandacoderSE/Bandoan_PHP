<?php 

	class DB {

		public $con;
		protected $server = "localhost";
		protected $username = "root";
		protected $passowrd = "";
		protected $dbName = "banthucpham";

		function __construct(){

			$this->con = mysqli_connect($this->server,$this->username,$this->passowrd);
			mysqli_select_db($this->con,$this->dbName);
			mysqli_query($this->con,"SET NAMES 'utf8' ");
		}
	}

 ?>