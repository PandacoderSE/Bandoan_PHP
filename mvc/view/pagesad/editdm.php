<?php
    if(isset($data['edit'])){
    while ($row = mysqli_fetch_array($data["edit"])){?>
    <form action="category/update/<?php echo $row['id']?>"" method="post">
            <div class="details">
                <div class="recentOrders">
                    <div class="cardHeader">
                        <h2>Sửa danh mục sản phẩm</h2>
                        <a href="category" class="btn btnthem" >Trở về</a>
                    </div>
                    <div class="modalthem jsmdt">
                    <?php
                                if(isset($data['result'])){
                                    if($data["result"]=="true"){?>
                                    <h3 style="color:rgb(0, 162, 255);margin-bottom: 20px;">
                                        <?php echo "Sửa thành công";?>
                                    </h3>
                                    <?php
                                    }
                                    else{?>
                                        <h3 style="color:red; margin-bottom: 20px;">
                                        <?php echo "Sửa thất bại";?>
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
                                    <input type="text" name="tendanhmuc" value="<?php echo $row['cate_name'];?>">
                                </div>
                               
                                <button name="editdm">Sửa </button> 
                            </div>
                        </div>
                </div>
            </div>
            </form>
    <?php
    }
}
    ?>
    