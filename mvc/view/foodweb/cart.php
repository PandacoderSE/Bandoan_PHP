<?php
    if(isset($data['kq'])== true){
        ?>
        <script>
             swal("Thành công!", "Giỏ hàng của bạn đang được duyệt!", "success");

        </script>
        <?php
    }
?>

<div class="banner">
    <div class="img">
        <img src="public\img\123.png" class="img-fluid" alt="">
    </div>
</div>
<!-- search -->
<div class="search-area">
    <div class="container">
    <div class="row">
    <div class="col-sm-12">
    <div class="search_box">
    <form  action="result"  method="POST">
            <input type="text" name="k" class="text_field" placeholder="Bạn đang tìm kiếm nội dung gì ?">
            <div class="search__select select-wrap">
            <span class="fal fa-chevron-down"></span>
            </div>
            <button name="submit" class="search-btn btn--lg">Tìm kiếm</button>
        </form>
    </div>
    </div>
    </div>
    </div>
    </div>
    <section class="pricing02 cid-rKZuj2eVgJ" id="pricing02-12" style="margin-top: 60px;">
    <section class="form01 cid-rKZBPrHeRE" id="form01-21" style="padding-top: 0px;">
   
    <div class="container">
    <h2 style="
    margin-bottom: 60px;
" class="mbr-section-title align-center mbr-exbold mbr-fonts-style mbr-black display-2">
                Giỏ hàng của bạn</h2>

    <form  class="cart-content-left" action="cart/update" method="post">

    <table class="table" style="text-align: center;

">
  <thead>
    <tr>
      <th scope="col">Tên món ăn</th>
      <th scope="col">Số lượng</th>
      <th scope="col">Đơn giá</th>
      <th scope="col">Thành tiền</th>
      <th  scope="col"> Thao tác</th>
    </tr>
  </thead>
  <tbody>
  <?php
    $i =0;
    $tongtien =0;
    while ($row = mysqli_fetch_array($data["cart_get"])) {
    $i++;
    $thanhtien= $row['soluong'] *$row['dongia'];
    $tongtien += $thanhtien;
 ?>
    <tr>
                      
                        <td><p style="line-height: 1.4;font-weight:bold;"><?php echo $row['tensp'] ?></p></td>
                        <td><input type="number" name="soluong[]" value="<?php echo $row['soluong']?>" min="1"  style="width: 50px;padding: 5px !important;margin-bottom: 20px ;"></td>
                        <td><p><?php echo number_format($row['dongia'])  ?><sup>đ</sup></p></td>
                        <td><p style="font-weight:bold ;"><?php echo number_format($thanhtien)?><sup>đ</sup></p></td>
                        <td>
                        <a onclick="return confirm('Bạn có muốn xóa ko')" href="cart/dlt/<?php echo $row['id_cart']?>" style="font-size: 30px;">
                        <ion-icon name="close-circle-outline"></ion-icon>
                        </a>
                        </td>
    </tr>
    <input type="hidden" name="id[]" value="<?php echo $row['id_product']?>">
    <?php
    }
    ?>
  </tbody>
  
  
</table>

<div>
  <button name="up" style="float: right; border: none;background: orange;padding: 15px; border-radius: 20px;margin-bottom: 15px;font-weight: 800;">Cập nhật giỏ hàng</button>
  </div>
</form>

  
<div class="container" style="
    margin-top: 80px;
">
        <div class="row">
            <div class="col-lg-6 my-auto md-pb mbr-form" data-form-type="formoid">
            <ul class="lienhe">
                    <li style="font-family:  'Barlow', sans-serif;font-size: 25px;font-weight: 800;">Hóa Đơn</li>
                     <li>Tổng tiền: <?php echo number_format($tongtien)?> VND</li>
                    <li> <a href="http://localhost/banthucpham/home">Tiếp tục mua</a> </li>
               
                </ul>

            </div>


            <div class="col-lg-6 col-md-12">
                <!--Formbuilder Form-->
                <form action="payment" method="POST" class="mbr-form form-with-styler" data-form-title="Form Name">
                    
                    <input type="hidden" name="tong" value="<?php echo $i?>">
                    <input type="hidden" name="tien" value="<?php echo $tongtien?>">
                   
                  

                    <div class="dragArea form-row">
                        <div class="col-lg-12">
                            <h5 class="align-left mbr-fonts-style display-7"><strong>Điền thông tin</strong>
                            </h5>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 form-group" data-for="Name">
                            <input type="text" name="Name" placeholder="Tên" data-form-field="Name" required="required" class="form-control display-7" value="" id="Name-form01-21">
                        </div>
                        <div data-for="Phone" class="col-lg-12 col-md-12 col-sm-12 form-group">
                            <input type="tel" name="Phone" placeholder="SDT" data-form-field="Phone" class="form-control display-7" required="required" value="" id="Phone-form01-21">
                        </div>
                      
                        <div data-for="Message" class="col-lg-12 col-md-12 col-sm-12 form-group">
                            <textarea name="diachi" placeholder="Địa chỉ (số nhà - số đường - phường)" data-form-field="Message" required="required" class="form-control display-7" id="Message-form01-21"></textarea>
                        </div>
                        <div class="col-auto"><button name="submit" onclick="return confirm('Bạn có chắc không')" class="btn btn-success display-4">Xác nhận</button></div>
                    </div>
                </form>
            </div>
          
        </div>

    </div>
            </div>

</section>
</section>
