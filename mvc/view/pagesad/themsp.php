<div class="details">
   <div class="cardHeader">
      <h2>Thêm sản phẩm</h2>
      <a href="manageproduct" class="btn btnthem" >Trở về</a>
   </div>
   <?php
                            if(isset($data['result'])){
                                if($data["result"]=="true"){?>
                                <h3 style="color:rgb(0, 162, 255);margin-bottom: 20px;">
                                    <?php echo "Thêm thành công";?>
                                </h3>
                                <?php
                                }
                                else{?>
                                    <h3 style="color:red; margin-bottom: 20px;">
                                    <?php echo "Thêm thất bại";?>
                                </h3>
                                <?php
                                }
                            }
                        ?>
                <?php
                    if(isset($data['er'])){
                        if($data['er']=="true"){?>
                            <h3 style="color:red;margin-bottom: 20px;">
                            <?php echo "Không được bỏ trống"?>
                            </h3>
                        <?php
                        }
                    }
                ?>
   <form method="post" action="manageproduct/insert" enctype="multipart/form-data" autocomplete="off">
      <table>
      <tr>
         <td style="display: block;margin-top: 35px;text-align: -webkit-center;">
            <div class="containert">
               <div class="wrapper">
               <div class="image">
               <img src="" alt="">
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
            <input type="text" name="masp" placeholder="Mã sản phẩm" >
            </div>
            <div class="field">
            <input type="text" name="tensp"  placeholder="Tên sản phẩm">
            </div>
            </div>
            <div class="dbl-field">
            <div class="field">
            <input type="number" name="gia" placeholder="Giá">
            </div>

            </div>
            <div class="dbl-field">
            <div class="field">
            <input type="date" name="date" id="dateField" >
            </div>
            </div>
            <div class="message">
            <textarea name="mota" placeholder="Mô tả"></textarea>
            </div>
            <div class="status">
            </select>
            <h3>Danh mục</h3>
            <select name="danhmuc">
               <?php
               while ($row = mysqli_fetch_array($data["getid"])) {
                  echo '<option value="'.$row['id'].'">'.$row['cate_name'].'</option>';
               }
               ?>
            </select>
            </div>
            <div class="button-area">
               <button name="themsp" value="UPLOAD">Thêm</button>
            </div>
         </div>
      </td>
    </tr>
   </table>
   </form>
</div>
