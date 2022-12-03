<?php
include 'db.php';

$squery = "select * from khach_hang";
$result = mysqli_query($conn,$squery);

?>
<style>
    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }
    td, th {
        border: 1px solid black;
        text-align: left;
        padding: 8px;

    }
    th{
        color: red;
    }
    tr:nth-child(even) {
        background-color: #f8e2bd;
    }
    /*tr:nth-child(odd) {*/
    /*    background-color: deepskyblue;*/
    /*}*/

</style>

<table border="1" style="width: 100%;overflow-x: scroll">
   <tr>
      <th>Mã KH</th>
      <th>Tên khách hàng</th>
      <th>Giới tính</th>
      <th>Địa chỉ</th>
      <th>Số điện thoại</th>
      <th>Email</th>
      <th>🖊️</th>
      <th>❌</th>
   </tr>
   <?php foreach ($result as $item ) :?>
      <tr>
         <td><?php echo $item["Ma_khach_hang"]?></td>
         <td><?php echo $item["Ten_khach_hang"]?></td>
         <td><?php echo $item["Phai"] == 0 ? "Nam" : "Nu" ?></td>
         <td><?php echo $item["Dia_chi"]?></td>
         <td><?php echo $item["Dien_thoai"]?></td>
         <td><?php echo $item["Email"]?></td>
         <td>
            <a href="2.12.sua.php?id=<?php echo $item["Ma_khach_hang"] ?>">sửa</a>
         </td>
         <td>
            <a href="<?php
            echo str_replace('2.12.index','2.12.xoa',$_SERVER['PHP_SELF'])."?id=".
                $item["Ma_khach_hang"];
            ?>">xóa</a>
         </td>
      </tr>
   <?php endforeach;?>
</table>
