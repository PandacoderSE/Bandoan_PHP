<h2 style="text-align: center;">Giày</h2>
<table>
    <thead>
        <tr>
            <td>STT</td>
            <td>Tên danh mục</td>
            <td>Thực hiện</td>
        </tr>
    </thead>
    <tbody>
    <?php 
        $i=1;
  		while ($row = mysqli_fetch_array($data["typeg"])) {?>
  		  <tr>
            <td><?php echo $i++; ?></td>
            <td><?php echo $row['tendm_giay'];?></td>
            <td>
            <a href="category/editdmg/<?php echo $row['id_dm_giay'];?> " class="ic edit">
                <ion-icon name="create-outline"></ion-icon>
            </a>
            <a onclick="return confirm('Bạn có muốn xóa ko')" href="category/dltgiay/<?php echo $row['id_dm_giay'];?> " class="ic dlt">
                <ion-icon name="trash-outline" ></ion-icon>
            </a>
        </td>
        </tr>

  		<?php
  		}
  	 ?>
    </tbody>
</table>