<?php 
	
	class table extends controller {
			//quản lý bên admin
		public function product(){
          
			$this->view("admin",[
				"pages"=>"qldb",
                "ordertb"=>$this->model("ordertbModel")->get(),
			]);
		}
		public function dlt($id){
			$kq=$this->model("ordertbModel")->dtl($id);
			$this->view("admin",[
			"pages"=>"qldb",
            "ordertb"=>$this->model("ordertbModel")->get(),
			]);
			}
	}
 ?>