<?php 
	
	class details extends controller {
		// phần kết nối chi tiết sản phẩm 
		public function product(){
			if(isset($_GET['id'])){
				$id = $_GET['id'];
			}
			$this->view("layout",[
				'pages'=>'details',
				'getsp'=>$this->model('ProductModel')->get(),
				"details"=>$this->model("ProductModel")->edit($id),
				"type"=>$this->model("CategoryModel")->get(),
				"get"=>$this->model("ProductModel")->get4()
			]);
			
		}

	}

 ?>