<?php 
	
	class admin extends controller {

			// phần kết nối trang admin 
		public function product(){
			$this->view("admin",[
				'pages'=>'home'
			]
			);
		}

	}

 ?>