<?php 
	
	class result extends controller {
		// phần tìm kiếm 
		public function product(){
            if(isset($_POST['submit'])){
                $name = $_POST['k'];
            }

			$this->view("layout",
		[
            "pages"=>"result",
			"type"=>$this->model("CategoryModel")->get(),
			"get"=>$this->model("ProductModel")->get4(),
            "timkiem"=>$this->model("ProductModel")->timkiem($name)
		]);
		}

	}

 ?>