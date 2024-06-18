<?php
    class CategoryModel extends DB{
    public function Insert($ten){
        //tương tác CSDL
        $sql = "SELECT * FROM category_product WHERE cate_name='$ten'";
        $query = mysqli_query($this->con,$sql);
        $num = mysqli_num_rows($query);
        $kq = false;
        //kiem tra su ton tai cua ten danh muc
        if($num == 0){
        $sql_them = "INSERT INTO category_product(cate_name) VALUE ('$ten')";
        $them = mysqli_query($this->con,$sql_them);
        if($them){
        $kq = true;
        }else{
        $kq = false;
        }
        }else{
        echo "<script type='text/javascript'>alert('Tên danh mục đã tồn tại');</script>";
        }
        return json_encode($kq);
        }
    public function get(){
        $sql ="SELECT * FROM category_product ";
        return mysqli_query($this->con,$sql);
        }
        public function getcart(){
            $sql ="SELECT *FROM tbl_cart";
            return mysqli_query($this->con,$sql);
            }
        public function get_textdm($id){
            $sql = "SELECT * FROM category_product WHERE id='$id'";
            return mysqli_query($this->con,$sql); 
            }
    public function edit($id){
        $sql = "SELECT * FROM category_product WHERE id='$id'";
        return mysqli_query($this->con,$sql); 
        }
    public function update($id,$ten){  
        $sql = "UPDATE category_product SET cate_name='$ten' WHERE id=$id";
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
        $sql = "DELETE FROM category_product WHERE id=$id";
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