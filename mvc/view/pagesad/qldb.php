<form action="">
        <div class="details">
            <div class="recentOrders">
                <div class="cardHeader">
                    <h2>Quản lý đặt bàn</h2>
                </div>
                <table>
                <thead>
                <tr>
                    <td>STT</td>
                    <td>Tên</td>
                    <td>SDT</td>
                    <td>Số lượng</td>
                    <td>Ngày giờ</td>
                    <td>Thực hiện</td>
                </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    while($row = mysqli_fetch_array($data['ordertb'])){
                    ?>
                    <tr>
                        <td><?php echo $i++?></td>
                        <td><?php echo $row['hten']?></td>
                        <td><?php echo $row['sdt']?></td>
                        <td><?php echo $row['sluong']?></td>
                        <td><?php echo $row['ngay']?></td>
                        <td>  <a onclick="return confirm('Bạn có muốn xóa ko')" href="table/dlt/<?php echo $row['id'];?> " class="ic dlt">
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