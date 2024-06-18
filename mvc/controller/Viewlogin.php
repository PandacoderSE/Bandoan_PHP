 <?php 
	class Viewlogin extends controller {
		public function product(){
			$this->view("foodweb/login");
		}
		public function login(){
			$un = $_POST['user'];
			$pass = md5($_POST['password']);
			$kq = $this->model("LoginModel")->loginuser($un,$pass);
			$this->view("foodweb/login",[
				"kq"=>$kq
			]);
		}
}
 ?>