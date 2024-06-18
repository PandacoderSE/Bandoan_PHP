<?php 
	
	class manageproduct extends controller {

	public function product(){
		if(isset($_POST['submit'])){
			$name = $_POST['k'];
			$this->view("admin",[
				"pages"=>"qlsp",
				"getsp"=>$this->model('ProductModel')->timkiem($name)
				
				]);
		}else{
			$this->view("admin",[
				"pages"=>"qlsp",
				"getsp"=>$this->model('ProductModel')->get()
				
				]);
		}
		
	}

	public function view_issp(){
		$this->view("admin",[
		"pages"=>"themsp",
		"getsp"=>$this->model('ProductModel')->get(),
		"getid"=>$this->model('ProductModel')->getid(),
		]);
		}
	public function insert(){
		if(isset($_POST['themsp'])){
			if(empty($_POST['tensp']) || empty($_POST['masp']) || empty($_FILES['avatar'])|| empty($_POST['gia']) || empty($_POST['mota']) || empty($_POST['danhmuc'])|| empty( $_POST['date'])){
				$er=true;
				$this->view("admin",[
				"pages"=>"themsp",
				"getid"=>$this->model('ProductModel')->getid(),
				"er"=>$er]);
			}else{
		$tensp=$_POST['tensp'];
		$masp= $_POST['masp'];
		$hinhanh = $_FILES['avatar']['name'];
		$hinhanh_tmp = $_FILES['avatar']['tmp_name'];
		move_uploaded_file($hinhanh_tmp,'public/img/'.$hinhanh);
		$gia= $_POST['gia'];
		$mota= $_POST['mota'];
		$danhmuc= $_POST['danhmuc'];
		$date = $_POST['date'];
		$kq = $this->model('ProductModel')->InsertSP($tensp,$masp,$hinhanh,$gia,$mota,$danhmuc,$date);
		$this->view("admin",[
		"pages"=>"themsp",
		"result"=>$kq,
		"getid"=>$this->model('ProductModel')->getid(),
		]);
		}}

		}
	public function editsp($id){
		$this->view('admin',[
		'pages'=>"editsp",
		"editsp"=> $this->model("ProductModel")->edit($id),
		]);
		}
	public function dlt($id){
		$kq=$this->model("ProductModel")->dtl($id);
		$this->view("admin",[
		"pages"=>"qlsp",
		"getsp"=>$this->model("ProductModel")->get()
		]);
		}
		//(empty($_POST['tensp']) || empty($_POST['masp']) || empty($_POST['gia']) || empty($_POST['mota']) || empty( $_POST['date'])
	public function update($id){
			if(isset($_POST['editsp'])){
				$tensp=$_POST['tensp'];
				$gia= $_POST['gia'];
				$mota= $_POST['mota'];
				$date = $_POST['date'];
				$hinhanh = $_FILES['avatar']['name'];
				$hinhanh_tmp = $_FILES['avatar']['tmp_name'];
				move_uploaded_file($hinhanh_tmp,'public/img/'.$hinhanh);
				if($hinhanh!=''){
					$kq = $this->model("ProductModel")-> udspch($id,$tensp,$gia,$mota,$date,$hinhanh);
					$this->view("admin",[
					"pages"=>"editsp",
					"edit"=> $this->model("ProductModel")->edit($id),
					"getid"=>$this->model('ProductModel')->getid(),
					"editsp"=> $this->model("ProductModel")->edit($id),
					"result"=>$kq]);
				}else{
					$kq = $this->model("ProductModel")->udsp($id,$tensp,$gia,$mota,$date);

					$this->view("admin",[
						"pages"=>"editsp",
						"edit"=> $this->model("ProductModel")->edit($id),
						"editsp"=> $this->model("ProductModel")->edit($id),
						"result"=>$kq]);
				}
				
		}}
		// else{
			
		}
		
			

 ?>