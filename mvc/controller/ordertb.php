<?php 
	
	class ordertb extends controller {

		public function product(){
			if(isset($_POST['submit'])){
				$name = $_POST['Name'];
				$sdt = $_POST['Phone'];
				$sl = $_POST['slban'];
				$ngay = $_POST['ngaydat'];
				$kq = $this->model("ordertbModel")->insert($name, $sdt , $sl , $ngay);
				$this->view("layout",[
					'pages'=>'ordertb',
					"type"=>$this->model("CategoryModel")->get(),
					"kqtb"=>$kq
				]);
			}
			else{

			
			$this->view("layout",[
                'pages'=>'ordertb',
				"type"=>$this->model("CategoryModel")->get()
            ]);
		}
		}

	}

 ?>