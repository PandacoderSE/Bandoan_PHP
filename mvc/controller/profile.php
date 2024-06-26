<?php 
	
	class profile extends controller {
		// đẩy phần thông tin của hàng 
		public function product(){

			$this->view("layout",[
                "pages"=>"profile",
				"type"=>$this->model("CategoryModel")->get()
            ]);
		}

	}

 ?>