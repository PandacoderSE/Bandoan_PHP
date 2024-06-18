<?php
    class UserModel extends DB{
        public function get(){
            $sql = "SELECT * FROM tbl_user";
            return mysqli_query($this->con,$sql);
        }
        public function dtl($id){
            $sql = "DELETE FROM tbl_user WHERE id_user=$id";
            $qr=mysqli_query($this->con,$sql);
            $kq=false;
            if($qr){
            $kq= true;
            }else{
            $kq=false;
            }
            return json_encode($kq);
            }  
    
    }
    ?>