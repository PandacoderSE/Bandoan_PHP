<form action="category">
        <div class="details">
            <div class="recentOrders">
                <div class="cardHeader">
                    <h2>Quản lý danh mục</h2>
                    <a href="category/view_isdm" class="btn btnthem" >Thêm danh mục</a>
                </div>
<table>
    <thead>
    <tr>
        <td>STT</td>
        <td>Tên danh mục</td>
        <td>Tác vụ</td>
    </tr>
    </thead>
    <tbody>
    <form action="category" method="post">
    <?php 
        $i=1;
  		while ($row = mysqli_fetch_array($data["type"])) {
        ?>
  		  <tr>
        <td><?php echo $i++; ?></td>
        <td><?php echo $row['cate_name'];?></td>
        <td>
        <a href="category/edit/<?php echo $row['id'];?> " class="ic edit">
            <ion-icon name="create-outline"></ion-icon>
        </a>
        <a onclick="return confirm('Bạn có muốn xóa ko')" href="category/dlt/<?php echo $row['id'];?> " class="ic dlt">
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