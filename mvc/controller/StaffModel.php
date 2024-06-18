<?php
    class StaffModel extends DB{
    public function Insert($ten,$pass,$email,$lever){
        //tương tác CSDL
        $sql = "SELECT * FROM tbl_admin WHERE username='$ten'";
        $query = mysqli_query($this->con,$sql);
        $num = mysqli_num_rows($query);
        $kq = false;
        //kiem tra su ton tai cua ten danh muc
        if($num == 0){
        $sql_them = "INSERT INTO `tbl_admin`( `username`, `pwad`, `email`, `lever`) VALUES ('$ten','$pass','$email','$lever')";
        $them = mysqli_query($this->con,$sql_them);
        if($them){
        $kq = true;
        }else{
        $kq = false;
        }
        }else{
        echo "<script type='text/javascript'>alert('Tên admin đã tồn tại');</script>";
        }
        return json_encode($kq);
        }
    public function get(){
        $sql ="SELECT *FROM tbl_admin";
        return mysqli_query($this->con,$sql);
        }
    public function edit($id){
        $sql = "SELECT * FROM tbl_admin WHERE id_admin='$id'";
        return mysqli_query($this->con,$sql); 
        }
    public function update($id,$ten,$pass,$email,$lever){  
        $sql = "UPDATE `tbl_admin` SET `username`='$ten',`pwad`='$pass',`email`='$email',`lever`='$lever' WHERE id_admin=$id";
        $qr=mysqli_query($this->con,$sql);
        $kq=false;
        if($qr){
        $kq= true;
        }else{
        $kq=false;
        }
        return json_encode($kq);
        }
    public function dtl($id){
        $sql = "DELETE FROM tbl_admin WHERE id_admin=$id";
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