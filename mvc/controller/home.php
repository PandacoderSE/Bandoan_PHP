<?php 
	
	class home extends controller {

		public function product(){
			if (isset($_POST['submit'])){
				if(!empty($_POST['Name']) || !empty($_POST['Email']) || !empty($_POST['Message'])){
                $name = $_POST["Name"];
                $email = $_POST['Email'];
                $nd = $_POST['Message'];
				$ngaycmt = $_POST['ngaycmt'];
				$kq = $this->model("CmtModel")->insert($name,$email,$nd,$ngaycmt);
				
			}
			$this->view("layout",
			[
				"type"=>$this->model("CategoryModel")->get(),
				"get"=>$this->model("ProductModel")->get4(),
				"kq"=>$kq,
				"cmt"=>$this->model("CmtModel")->getcmt(),
			]);
            
		}else{
			$this->view("layout",
			[
				"type"=>$this->model("CategoryModel")->get(),
				"get"=>$this->model("ProductModel")->get4(),
				"cmt"=>$this->model("CmtModel")->getcmt(),
			]);
            
		}

		
		}

	}

 ?>