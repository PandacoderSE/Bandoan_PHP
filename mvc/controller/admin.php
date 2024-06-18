<?php 
	
	class admin extends controller {

		public function product(){
			$this->view("admin",[
				'pages'=>'home'
			]
			);
		}

	}

 ?>