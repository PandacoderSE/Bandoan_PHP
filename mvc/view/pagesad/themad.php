<form action="Staff/insertad" method="post" >
        <div class="details">
            <div class="recentOrders">
                <div class="cardHeader">
                    <h2>Thêm nhân viên</h2>
                    <a href="Staff" class="btn btnthem" >Trở về</a>
                </div>
                <div class="modalthem jsmdt">
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
                 <div class="wrapperr">
         <header>Điền thông tin</header>
            <div class="dbl-field">
            <div class="field">
            <input type="text" name="ten" placeholder="Tên admin">
            </div>
            <div class="field">
            <input type="text" name="email"  placeholder="Email">
            <span class="form-message"></span>
            </div>
            </div>
            <div class="dbl-field">
            <div class="field">
            <input type="text" name="password" placeholder="Password">
            </div>
                </div>
                <h3 style="margin-bottom: 10px;">Chức vụ</h3>
            <select name="chucvu" style="padding: 15px;width: 300px;">
                 <option value="0">Admin</option>       
                 <option value="1">Nhân viên</option>        
            </select>
            <div class="button-area" style="display: block;">
               <button name="themad">Thêm</button>
            </div>
         </div>
            </div>
        </div>
        </form>