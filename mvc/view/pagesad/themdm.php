<form action="category/insertdm" method="post">
        <div class="details">
            <div class="recentOrders">
                <div class="cardHeader">
                    <h2>Thêm danh mục sản phẩm</h2>
                    <a href="category" class="btn btnthem" >Trở về</a>
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
                <div class="hmdthem">
                        <lable class="loai">Điền thông tin:</lable>
                        <p id="null"></p>
                            <div class="noidung">
                                <label>Tên danh mục:</label>
                                <input type="text" name="tendanhmuc">
                            </div>
                            <button name="btnthem">Thêm </button> 
                        </div>
                    </div>
            </div>
        </div>
        </form>