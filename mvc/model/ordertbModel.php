<?php
    class ordertbModel extends DB{
    public function insert($name, $sdt , $sl , $ngay){
        $sql_them = "INSERT INTO `ordertb`( `hten`, `sdt`, `sluong`, `ngay`) 
        VALUES ('$name','$sdt','$sl','$ngay')";
        return mysqli_query($this->con,$sql_them);
    }
        public function get(){
            $sql = "SELECT * FROM `ordertb`";
            return mysqli_query($this->con,$sql);
        }
   
  
    public function dtl($id){
        $sql = "DELETE FROM `ordertb` WHERE id=$id";
        $qr=mysqli_query($this->con,$sql);
        $kq=false;
        if($qr){
        $kq= true;
        }else{
        $kq=false;
        }
        return json_encode($kq);
        }
        public function get_id($id,$Oder){
            $sql ="SELECT *FROM ,category_product WHERE product.cate_id = category_product.id
            AND product.cate_id='$id' ORDER BY product.regular_price $Oder ";
            return mysqli_query($this->con,$sql);
            }    
        
        }

?>