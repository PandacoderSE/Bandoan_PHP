<?php 

	class category extends controller {

	public function product(){
		$this->view("admin",[
		"pages"=>"qldmsp",
		"type"=>$this->model("CategoryModel")->get()
		]);
		}
	
	public function view_isdm(){
		$this->view("admin",[
		"pages"=>"themdm",
		"type"=>$this->model("CategoryModel")->get()
		]);
		}
	public function insertdm(){
		if(isset($_POST['btnthem'])){
		if(empty($_POST['tendanhmuc'])){
			$er=true;
			$this->view("admin",[
			"pages"=>"themdm",
			"type"=>$this->model("CategoryModel")->get(),
			"er"=>$er]);
		}else{
			$ten = $_POST['tendanhmuc'];
			$kq = $this->model("CategoryModel")->Insert($ten);
			$this->view("admin",[
			"pages"=>"themdm",
			"result"=>$kq,
			"type"=>$this->model("CategoryModel")->get()
		]);
		}
	}}
	public function edit($id){
		$this->view('admin',[
		'pages'=>"editdm",
		"edit"=> $this->model("CategoryModel")->edit($id),
		]);
		}
	public function update($id){
		if(isset($_POST['editdm'])){
		if(empty($_POST)){
			$er=true;
			$this->view("admin",[
			"pages"=>"themdm",
			"edit"=> $this->model("CategoryModel")->edit($id),
			"er"=>$er]);
		}else{
			$ten = $_POST['tendanhmuc'];
			$kq = $this->model("CategoryModel")->update($id,$ten);
			$this->view("admin",[
			"pages"=>"editdm",
			"edit"=> $this->model("CategoryModel")->edit($id),
			"result"=>$kq]);
		}
		}
		}
	public function dlt($id){
		$kq=$this->model("CategoryModel")->dtl($id);
		$this->view("admin",[
		"pages"=>"qldmsp",
		"type"=>$this->model("CategoryModel")->get()
		]);
		}
	}
 ?>