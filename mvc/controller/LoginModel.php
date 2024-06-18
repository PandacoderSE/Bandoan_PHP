<?php 

	class LoginModel extends DB {
		public function loginuser($un,$pass){
			$sql = "SELECT * FROM tbl_user WHERE username='$un' AND pwus='$pass' ";
			$query = mysqli_query($this->con,$sql);
			$kq = false;
			$num = mysqli_num_rows($query);
			if($num > 0){
				$kq =  true;
				$_SESSION['username'] = $un;
			}else{
				$msg =false;
			}
			return json_encode($kq);
			}
			public function Register_user($un,$email,$pass){
				//tương tác CSDL
				$sql = "SELECT * FROM tbl_user WHERE username='$un'";
				$query = mysqli_query($this->con,$sql);
				$num = mysqli_num_rows($query);
				$kq = false;
				//kiểm tra sự tồn tại của username
				if($num == 0){
					//ko trùng
					$sqlt = "INSERT INTO tbl_user(username,email_user,pwus) VALUES('$un','$email','$pass')";
					$them = mysqli_query($this->con,$sqlt);
					if($them){
						//them thanh cong
						$kq = true;
					}else{
						//thất bại
						$kq = false;
	
					}
				}else{
					
				}
				return json_encode($kq);
				}
			public function checkun($un){
				$sql = "SELECT * FROM tbl_user WHERE username='$un'";
				$query = mysqli_query($this->con,$sql);
				$num = mysqli_num_rows($query);
				$kq = false;
				if($num>0){
					$kq = true;
				}
				return json_encode($kq);
			}
	
	}

 ?>