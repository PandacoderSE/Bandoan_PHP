<form action="Staff">
        <div class="details">
            <div class="recentOrders">
                <div class="cardHeader">
                    <h2>Quản lý nhân viên</h2>
                    <a href="Staff/view_isad" class="btn btnthem" >Thêm nhân viên</a>
                </div>
<table>
    <thead>
    <tr>
        <td>STT</td>
        <td>Name</td>
        <td>Email</td>
        <td>Chức vụ</td>
        <td>Tác vụ</td>
    </tr>
    </thead>
    <tbody>
    <form action="Staff" method="post">
    <?php 
        $i=1;
  		while ($row = mysqli_fetch_array($data["type"])) {?>
  		  <tr>
        <td><?php echo $i++; ?></td>
        <td><?php echo $row['username']?></td>
        <td><?php echo $row['email'];?></td>
        <td><?php if($row['lever']==0){
            echo "Admin";
            }else{
            echo "Nhân viên";
            }?></td>
        <td>
        <a onclick="return confirm('Bạn có muốn xóa ko')" href="Staff/dlt/<?php echo $row['id_admin'];?> " class="ic dlt">
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
        </form>