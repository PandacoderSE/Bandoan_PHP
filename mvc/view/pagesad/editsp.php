<div class="details">
   <div class="cardHeader">
      <h2> Sửa sản phẩm</h2>
      <a href="manageproduct" class="btn btnthem" >Trở về</a>
   </div>
   <?php
                            if(isset($data['result'])){
                                if($data["result"]=="true"){?>
                                <h3 style="color:rgb(0, 162, 255);text-align: center;/* margin-bottom: 20px; */">
                                    <?php echo " Sửa thành công";?>
                                </h3>
                                <?php
                                }
                                else{?>
                                    <h3 style="color:red;text-align: center;/* margin-bottom: 20px; */">
                                    <?php echo " Sửa thất bại";?>
                                </h3>
                                <?php
                                }
                            }
                        ?>
                <?php
                    if(isset($data['er'])){
                        if($data['er']=="true"){?>
                            <h3 style="color:red;text-align: center;/* margin-bottom: 20px; */">
                            <?php echo "Không được bỏ trống"?>
                            </h3>
                        <?php
                        }
                    }
                ?>
    <?php
    if(isset($data['editsp'])){
        while ($row = mysqli_fetch_array($data["editsp"])){?>
   <form method="post" action="manageproduct/update/<?php echo $row['id_product']?>" enctype="multipart/form-data">
      <table>
      <tr>
         <td style="display: block;margin-top: 35px;text-align: -webkit-center;">
            <div class="containert">
               <div class="wrapper">
               <div class="image">
               <img src="public\img\<?php echo $row['thumbnail']?>" alt="">
               </div>
               <div class="content">
               <div class="icon">
               <i class="fas fa-cloud-upload-alt"></i>
               </div>
               <div class="textthem">
               No file chosen, yet!
               </div>
               </div>
               <div id="cancel-btn">
               <i class="fas fa-times"></i>
               </div>
               <div class="file-name">
               File name here
               </div>
               </div>
               <input type="file" name="avatar" id="default-btn" hidden/>
               <p onclick="defaultBtnActive()" id="custom-btn">Chọn tệp</p>
            </div>
         </td>
      <td>
      <div class="wrapperr">
         <header>Điền thông tin</header>
            <div class="dbl-field">
            <div class="field">
            <input type="text" name="masp" value="<?php echo $row['code_product']?>" disabled >
            </div>
            <div class="field">
            <input type="text" name="tensp"  value="<?php echo $row['name_product']?>">
            </div>
            </div>
            <div class="dbl-field">
            <div class="field">
            <input type="text" name="gia" value="<?php echo $row['regular_price']?>">
            </div>
          
            </div>
            <div class="dbl-field">
            <div class="field">
            <input type="date" name="date" id="dateField" value="<?php echo $row['deta_product']?>">
            </div>
            </div>
            <div class="message">
            <textarea name="mota"><?php echo $row['mota']?></textarea>
            </div>
         
            <div class="button-area">
               <button name="editsp" value="UPLOAD"> Sửa</button>
            </div>
         </div>
      </td>
    </tr>
   </table>
   </form>
   <?php
    }
}
    ?>
</div>
