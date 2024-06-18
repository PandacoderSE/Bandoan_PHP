<form action="">
        <div class="details">
            <div class="recentOrders">
                <div class="cardHeader">
                    <h2>Quản lý đơn hàng</h2>
                </div>
<table>
    <thead>
    <tr>
        <td>STT</td>
        <td>Tên</td>
        <td>SDT</td>
        <td>Địa chỉ</td>
        <td>Số lượng</td>
        <td>Tổng tiền</td>
        <td>Thao tác</td>
    </tr>
    </thead>
    <tbody>
    <?php
                    $i = 1;
                    while($row = mysqli_fetch_array($data['type'])){
                    ?>
                    <tr>
                        <td><?php echo $i++?></td>
                        <td><?php echo $row['ten']?></td>
                        <td><?php echo $row['sdt']?></td>
                        <td><?php echo $row['diachi']?></td>
                        <td><?php echo $row['tong']?></td>
                        <td><?php echo number_format($row['tien'])?></td>
                     
                        <td> 
                            <a class="ic edt" href="order/datails/<?php echo $row['id'];?>"><ion-icon name="eye-outline"></ion-icon></a>
                            <a onclick="return confirm('Bạn có muốn xóa ko')" href="order/dlt/<?php echo $row['id'];?> " class="ic dlt">
            <ion-icon name="trash-outline" ></ion-icon>
        </a></td>
                    </tr>
                    <?php
                    }
                    ?>
  
    </tbody>
</table>
            </div>
        </div>
        </form>