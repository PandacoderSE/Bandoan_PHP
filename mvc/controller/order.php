<?php 
	
	class order extends controller {

		public function product(){
			$this->view("admin",[
				"pages"=>"qldh",
				"type"=>$this->model('CartModel')->getod()
			]);
		}
		public function dlt($id){
			$kq=$this->model('CartModel')->dlt($id);
			$this->view("admin",[
			"pages"=>"qldh",
			"type"=>$this->model('CartModel')->getod()
			]);
			}
		public function datails($id){
			$this->view("admin",[
				"pages"=>"orderdetails"
			]);
		}
	}
 ?>