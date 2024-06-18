<?php 
	class Viewregister extends controller {
		public function product(){
			$this->view("foodweb/register");
		}
        public function register(){
			$un = $_POST['fullname'];
			$pass = md5($_POST['password']);
			$email = $_POST['email'];
			$kq = $this->model("LoginModel")->Register_user($un,$email,$pass);
			$this->view("foodweb/register",[
				"kq"=>$kq
			]);
		}
    }
        ?>