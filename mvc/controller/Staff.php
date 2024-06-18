<?php 
	
	class Staff extends controller {

		public function product(){
			$this->view("admin",[
			"pages"=>"qlnv",
			"type"=>$this->model("StaffModel")->get()
			]);
			}
		public function view_isad(){
			$this->view("admin",[
			"pages"=>"themad",
			"type"=>$this->model("StaffModel")->get()
			]);
			}
		public function insertad(){
			if(isset($_POST['themad'])){
			if(empty($_POST)){
				$er=true;
				$this->view("admin",[
				"pages"=>"themad",
				"type"=>$this->model("StaffModel")->get(),
				"er"=>$er]);
			}else{
				$ten = $_POST['ten'];
				$pass = md5($_POST['password']);
				$email = $_POST['email'];
				$lever = $_POST['chucvu'];
				$kq = $this->model("StaffModel")->Insert($ten,$pass,$email,$lever);
				$this->view("admin",[
				"pages"=>"themad",
				"result"=>$kq,
				"type"=>$this->model("StaffModel")->get()
			]);
			}
		}}
		public function dlt($id){
			$kq=$this->model("StaffModel")->dtl($id);
			$this->view("admin",[
			"pages"=>"qlnv",
			"type"=>$this->model("StaffModel")->get()
			]);
			}
	}
 ?>