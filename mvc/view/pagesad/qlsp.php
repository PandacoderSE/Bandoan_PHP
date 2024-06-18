
        <div class="details">
            <div class="recentOrders">
                <div class="cardHeader">
                    <h2>Quản lý thực đơn</h2>
                    <a href="manageproduct/view_issp" class="btn btnthem" >Thêm sản phẩm</a>
                </div>
                <div class="search-box" style="margin: 15px 0;font-size: 20px;">
                <form  action="manageproduct"  method="POST">
                <button style="font-size: 20px;padding: 10px;border: none;background: white;cursor: pointer;" name="submit">  
                    <ion-icon name="search-outline"></ion-icon>
                </button>
                    <input type="text" class="form-control" placeholder="Search&hellip;" name="k" style="font-size: 20px;border: none;border-bottom: 1px solid;padding: 5px;">
                </form>
                </div>
        <table>
            <thead>
            <tr>
                    <td>STT</td>
                    <td>MaSP</td>
                    <td>Tên sản phẩm</td>
                    <td>Hình ảnh</td>
                    <td>Giá</td>
                    <td>Ngày tạo</td>
                    <td>Danh mục</td>
                    <td>Tác vụ</td>
            </tr>
            </thead>
            <tbody>
            <form action="manageproduct" method="post">
            <?php 
                $i=1;
                while ($row = mysqli_fetch_array($data["getsp"])) {?>
                    <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $row['code_product'];?></td>
                    <td><?php echo $row['name_product'];?></td>
                    <td><img style="width: 50px;object-fit: cover;"src="public/img/<?php echo $row['thumbnail']?>" alt=""></td>
                    <td><?php echo number_format($row['regular_price']);?></td>
                    <td><?php echo $row['date_product']?></td>
                    <td><?php echo $row['cate_name']?></td>
                    <td>
                    <a href="manageproduct/editsp/<?php echo $row['id_product'];?>" class="ic edit">
                        <ion-icon name="create-outline"></ion-icon>
                    </a>
                    <a onclick="return confirm('Bạn có muốn xóa ko')" href="manageproduct/dlt/<?php echo $row['id_product'];?> " class="ic dlt">
                        <ion-icon name="trash-outline" ></ion-icon>
                    </a>
                    </td>
                        </tr>

                <?php
                }
            ?>
            </form>
            </tbody>
        </table>
                    </div>
                </div>
        