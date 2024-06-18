<?php
    class CartModel extends DB{
        public function get($user_name){
            $sql ="SELECT *FROM tbl_cart WHERE userName ='$user_name'  ";
            return mysqli_query($this->con,$sql);
            }     
        public function insert($id,$ten,$sl,$gia,$hinhanh,$user_name){
            $sql = "SELECT * FROM tbl_cart WHERE id_product='$id' AND userName ='$user_name'";
            $query = mysqli_query($this->con,$sql);
            $num = mysqli_num_rows($query);
            $kq = false;
            //kiem tra su ton tai cua ma sp
            if($num == 0){
                $sql_themspn = "INSERT INTO `tbl_cart`(`id_product`, `tensp`, `soluong`, `dongia`, `hinhanhsp`,`userName`) VALUES ('$id','$ten','$sl','$gia','$hinhanh','$user_name')";
                $them = mysqli_query($this->con,$sql_themspn);
                if($them){
                    $kq = true;
                    
                }else{
                    $kq = false;
                }
            }else{
                    
                    foreach ($query as $row):
                    $soluong = $row['soluong'] + $sl ;
                     $new = "UPDATE tbl_cart SET soluong='$soluong'  WHERE id_product='$id' AND userName='$user_name' ";
                    endforeach;
                     $them = mysqli_query($this->con,$new);
                     
                     if($them){
                         $kq = true;
                     }else{
                         $kq = false;
                     }
                }
            return json_encode($kq);
        }
    
        public function dlt($id){
            $sql = "DELETE FROM tbl_order WHERE `tbl_order`.`id` = $id";
            $qr=mysqli_query($this->con,$sql);
            $kq=false;
            if($qr){
            $kq= true;
            }else{
            $kq=false;
            }
            return json_encode($kq);
            }  
        public function update($sl,$id,$user_name){
                $sql = "UPDATE `tbl_cart` SET `soluong`='$sl' WHERE id_product=$id AND userName='$user_name'";
                $qr=mysqli_query($this->con,$sql);
                $kq=false;
                if($qr){
                $kq= true;
                }else{
                $kq=false;
                }
                return json_encode($kq);
                }   
        public function order($name,$sdt,$diachi,$tong,$tien){
            $sql = "INSERT INTO `tbl_order`( `ten`, `sdt`, `diachi`, `tong`, `tien`) VALUES ('$name','$sdt','$diachi','$tong','$tien')";
            return mysqli_query($this->con,$sql);
        }
        public function dltall(){
            $sql = "DELETE FROM tbl_cart";
            return mysqli_query($this->con,$sql);
        }
        public function getod(){
            $sql = "SELECT * FROM tbl_order";
            return mysqli_query($this->con,$sql);
        }
       
    }   
?>  