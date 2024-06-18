<?php 
	
	class payment extends controller {
        public function product(){
			if(isset($_POST['submit'])){
				$tong = $_POST['tong'];
				$tien = $_POST['tien'];
				$name = $_POST['Name'];
				$sdt = $_POST['Phone'];
				$diachi = $_POST['diachi'];
				$kq = $this->model("CartModel")->order($name,$sdt,$diachi,$tong,$tien);
				$this->model("CartModel")->dltall();
			}
			$user_name =$_SESSION['username'];
			$this->view("layout",[
				"pages"=>"cart",
				"type"=>$this->model("CategoryModel")->get(),
				"typen"=>$this->model("CategoryModel")->get(),
				"typeg"=>$this->model("CategoryModel")->get(),
				"getcart"=>$this->model("CategoryModel")->getcart($user_name),
				"cart_get"=>$this->model("CartModel")->get($user_name),
                "kq"=>$kq
			]);
		}
    }
    ?>