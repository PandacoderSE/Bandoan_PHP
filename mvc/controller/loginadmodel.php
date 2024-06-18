<?php 

	class loginadmodel extends DB {

		public function login_user($un,$pass){
			//tương tác vs CSDL
			$sql = "SELECT * FROM tbl_admin WHERE username='$un' and pwad='$pass'";
			$query = mysqli_query($this->con,$sql);
			$msg = false;
			$num = mysqli_num_rows($query);
			//Kiểm tra sự tồn tại username và password từ CSDL
			if($num == 0){
				$msg =  false;
				echo "<script type='text/javascript'>alert('Invalid username or password');</script>";
			}else{
				$msg = true;
				$_SESSION["user"] = $un;
				header('location: ../banthucpham/admin');
			}
			return json_encode($msg);
			}
	}

 ?>