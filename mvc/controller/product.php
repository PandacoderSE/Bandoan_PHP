<?php 
	
	class product extends controller {

		public function product(){
			$Oder = "";

			if(isset($_GET['id'])){
				$id = $_GET['id'];
			}
			$this->view("layout",[
                "pages"=>"product",
				"getsp"=>$this->model("ProductModel")->get(),
				"type"=>$this->model("CategoryModel")->get(),
				"lsp_dm"=>$this->model("ProductModel")->get_spdm($id,$Oder),
				"name"=>$this->model("ProductModel")->get_spdm($id,$Oder),
            ]);
		}

	}

 ?>