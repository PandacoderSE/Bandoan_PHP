<?php 
	
	class comment extends controller {
		// phần kêt nối comment 
		public function product(){
          
			$this->view("admin",[
				"pages"=>"qlbl",
                "cmt"=>$this->model("CmtModel")->getcmt(),
			]);
		}
		public function dlt($id){
			$kq=$this->model("CmtModel")->dtl($id);
			$this->view("admin",[
			"pages"=>"qlbl",
			"cmt"=>$this->model("CmtModel")->getcmt(),
			]);
			}
	}
 ?>