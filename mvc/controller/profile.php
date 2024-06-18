<?php 
	
	class profile extends controller {

		public function product(){

			$this->view("layout",[
                "pages"=>"profile",
				"type"=>$this->model("CategoryModel")->get()
            ]);
		}

	}

 ?>