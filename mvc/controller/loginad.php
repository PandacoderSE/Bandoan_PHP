<?php 
	
	class loginad extends controller {

		public function product(){
			$this->view("login");
			if(empty($_POST['user']) || empty($_POST['password'])){
			}
			else{
				// xử lý code từ view login
				$un = $_POST['user'];
				//Mã hóa pass
				$pass = $_POST['password'];
				$pass = md5($pass);
				//gọi đến hàm login_user từ model
				$check = $this->model("loginadmodel")->login_user($un,$pass);
			}
		
	}}

 ?>