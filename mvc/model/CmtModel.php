<?php
    class CmtModel extends DB{
    public function Insert($name,$email,$nd,$ngaycmt){
        $sql_them = "INSERT INTO `comment`( `hten`, `email`, `noidung`, `ngaycmt`) VALUES ('$name','$email','$nd','$ngaycmt')";
        return mysqli_query($this->con,$sql_them);
    }
        public function getcmt(){
            $sql = "SELECT * FROM `comment` ORDER BY 'id' ASC LIMIT 5 OFFSET 0";
            return mysqli_query($this->con,$sql);
        }
   
  
    public function dtl($id){
        $sql = "DELETE FROM `comment` WHERE id=$id";
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