<?php 
	
	class user extends controller {

		public function product(){
			$this->view("admin",[
				"pages"=>"qlkh",
				"user"=>$this->model("UserModel")->get()
			]);
		}
		public function dlt($id){
			$kq=$this->model("UserModel")->dtl($id);
			$this->view("admin",[
			"pages"=>"qlkh",
			"user"=>$this->model("UserModel")->get()
			]);
			}
	}
 ?>