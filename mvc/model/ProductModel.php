<?php
	class ProductModel extends DB {
   public function get(){
    $sql ="SELECT *FROM product,category_product WHERE product.cate_id = category_product.id ";
    return mysqli_query($this->con,$sql);
    }
public function getid(){
    $sql ="SELECT *FROM category_product";
    return mysqli_query($this->con,$sql);
    }   

    public function getpl($id){
        $sql ="SELECT *FROM product WHERE id_loai='$id'";
        return mysqli_query($this->con,$sql);
        }  
public function InsertSP($tensp,$masp,$hinhanh,$gia,$mota,$danhmuc,$date){
    //tương tác CSDL
    $sql = "SELECT * FROM product WHERE code_product='$masp'";
    $query = mysqli_query($this->con,$sql);
    $num = mysqli_num_rows($query);
    $kq = false;
    //kiem tra su ton tai cua ma sp
    if($num == 0){
        $sql_themspn = "INSERT INTO product(name_product,code_product,regular_price,mota,cate_id, thumbnail,date_product) 
        VALUES ('$tensp','$masp','$gia','$mota','$danhmuc','$hinhanh','$date')";
        $them = mysqli_query($this->con,$sql_themspn);
        if($them){
            $kq = true;
        }else{
            $kq = false;
        }
        }else{
        echo "<script type='text/javascript'>alert('Mã sản phẩm đã tồn ');</script>";
        }
    return json_encode($kq);
    }  
public function edit($id){
    $sql ="SELECT *FROM product WHERE id_product=$id";
    return mysqli_query($this->con,$sql);
    } 
public function dtl($id){
    $sql = "DELETE FROM product WHERE id_product=$id";
    $qr=mysqli_query($this->con,$sql);
    $kq=false;
    if($qr){
    $kq= true;
    }else{
    $kq=false;
    }
    return json_encode($kq);
    }  

public function udsp($id,$tensp,$gia,$mota,$date){  
        $sql = "UPDATE product 
        SET name_product='$tensp',regular_price='$gia',mota='$mota',date_product='$date' 
        WHERE id_product=$id ";
        $qr=mysqli_query($this->con,$sql);
        $kq=false;
        if($qr){
            $kq= true;
        }else{
            $kq=false;
        }
        return json_encode($kq);
        }
    public function udspch($id,$tensp,$gia,$mota,$date,$hinhanh){  
        $sql = "UPDATE product SET name_product='$tensp',regular_price='$gia',mota='$mota',thumbnail='$hinhanh',date_product='$date' WHERE id_product=$id ";
        $qr=mysqli_query($this->con,$sql);
        $kq=false;
        if($qr){
            $kq= true;
        }else{
            $kq=false;
        }
        return json_encode($kq);
        } 
    public function get_spdm($id,$Oder){
        $sql ="SELECT *FROM product,category_product WHERE product.cate_id = category_product.id
        AND product.cate_id='$id' ORDER BY product.regular_price $Oder ";
        return mysqli_query($this->con,$sql);
        }
    public function ctsp($id){
            $sql ="SELECT *FROM product WHERE id_product = '$id'";
            return mysqli_query($this->con,$sql);
            }
    public function smalimg($id){
        $sql ="SELECT *FROM smal_img WHERE id_product = '$id' ";
            return mysqli_query($this->con,$sql);
            }
    public function splq($cate_id){
        $sql ="SELECT *FROM product WHERE cate_id = '$cate_id' ";
                    return mysqli_query($this->con,$sql);
     }

     public function get4(){
         $sql = "SELECT * FROM `product` ORDER BY `id_product` DESC LIMIT 4";
         return mysqli_query($this->con,$sql);
     }
    public function timkiem($name){
        $sql = "SELECT * FROM product,category_product where name_product like '%$name%' AND product.cate_id = category_product.id";
        return mysqli_query($this->con,$sql);
    }
        }     
?>  