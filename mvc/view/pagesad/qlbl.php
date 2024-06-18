<form action="">
        <div class="details">
            <div class="recentOrders">
                <div class="cardHeader">
                    <h2>Quản lý bình luận</h2>
                </div>
                <table>
                <thead>
                <tr>
                    <td>STT</td>
                    <td>Tên</td>
                    <td>email</td>
                    <td>Ngày cmt</td>
                    <td>Nội dung</td>
                    <td>Thực hiện</td>
                </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    while($row = mysqli_fetch_array($data['cmt'])){
                    ?>
                    <tr>
                        <td><?php echo $i++?></td>
                        <td><?php echo $row['hten']?></td>
                        <td><?php echo $row['email']?></td>
                        <td><?php echo $row['ngaycmt']?></td>
                        <td><?php echo $row['noidung']?></td>
                        <td>  <a onclick="return confirm('Bạn có muốn xóa ko')" href="comment/dlt/<?php echo $row['id'];?> " class="ic dlt">
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