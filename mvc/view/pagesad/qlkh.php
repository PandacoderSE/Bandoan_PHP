<form action="user">
        <div class="details">
            <div class="recentOrders">
                <div class="cardHeader">
                    <h2>Quản lý khách hàng</h2>
                </div>
<table>
    <thead>
    <tr>
        <td>STT</td>
        <td>Name</td>
        <td>Email</td>
        <td>Tác vụ</td>
    </tr>
    </thead>
    <tbody>
    <form action="user" method="post">
    <?php 
        $i=1;
  		while ($row = mysqli_fetch_array($data["user"])) {?>
  		  <tr>
        <td><?php echo $i++; ?></td>
        <td><?php echo $row['username']?></td>
        <td><?php echo $row['email_user'];?></td>
        <td>
        <a onclick="return confirm('Bạn có muốn xóa ko')" href="user/dlt/<?php echo $row['id_user'];?> " class="ic dlt">
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