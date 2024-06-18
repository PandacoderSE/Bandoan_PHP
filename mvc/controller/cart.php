 <?php 
	
	class cart extends controller {

		public function product(){
			if(isset($_POST['cartup'])){
				$id = $_POST['idsp'];
				$ten =$_POST['tensp'];
				$gia= $_POST['giasp'];
				if(empty($_POST['soluong'])){
					$soluong = 1;
				}else{
					$soluong = $_POST['soluong'];
				}
				$hinhanh = $_POST['hinhanhsp'];
				$user_name =$_SESSION['username'];
		
				$this->model('CartModel')->insert($id,$ten,$soluong,$gia,$hinhanh,$user_name);
			
				$this->view("layout",[
					"pages"=>"cart",
					"type"=>$this->model("CategoryModel")->get(),
					"typen"=>$this->model("CategoryModel")->get(),
					"typeg"=>$this->model("CategoryModel")->get(),
					"getcart"=>$this->model("CategoryModel")->getcart($user_name),
					"cart_get"=>$this->model("CartModel")->get($user_name),
				]);
			}
			else{
				$user_name =$_SESSION['username'];
				$this->view("layout",[
					"pages"=>"cart",
					"type"=>$this->model("CategoryModel")->get(),
					"typen"=>$this->model("CategoryModel")->get(),
					"typeg"=>$this->model("CategoryModel")->get(),
					"getcart"=>$this->model("CategoryModel")->getcart($user_name),
					"cart_get"=>$this->model("CartModel")->get($user_name),
				]);
			}
		}
		public function dlt($id){
			$user_name =$_SESSION['username'];
			$this->model("CartModel")->dlt($id,$user_name);
			$this->view("layout",[
				"pages"=>"cart",
				"type"=>$this->model("CategoryModel")->get(),
				"typen"=>$this->model("CategoryModel")->get(),
				"typeg"=>$this->model("CategoryModel")->get(),
				"getcart"=>$this->model("CategoryModel")->getcart($user_name),
				"cart_get"=>$this->model("CartModel")->get($user_name),
			]);
			}
		public function update(){
			$user_name =$_SESSION['username'];
			
			if(isset($_POST['up'])){
				for($i = 0; $i < count($_POST['id']); $i++){
					$id = $_POST['id'][$i];
					$sl = $_POST['soluong'][$i];
					$this->model("CartModel")->update($sl,$id,$user_name);
				}
			$this->view("layout",[
					"pages"=>"cart",
					"type"=>$this->model("CategoryModel")->get(),
					"typen"=>$this->model("CategoryModel")->get(),
					"typeg"=>$this->model("CategoryModel")->get(),
					"getcart"=>$this->model("CategoryModel")->getcart($user_name),
					"cart_get"=>$this->model("CartModel")->get($user_name),
				]);
			}
		}
	}


 ?>
 