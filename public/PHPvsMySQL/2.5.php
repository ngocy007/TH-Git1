<?php
include 'db.php';
$squery = 'select * from hang_sua,sua,loai_sua
where sua.Ma_hang_sua = hang_sua.Ma_hang_sua and loai_sua.Ma_loai_sua = sua.Ma_loai_sua';
$result = mysqli_query($conn,$squery);
?>
<style>
    img{
       width: 200px;
       height: 200px;
    }

    table{
        width: 100%;
        border-collapse: collapse;
        border: 1px solid black;
    }
    td, th {
        border: 1px solid black;
        text-align: left;
        padding: 8px;
    }
    h1{
        text-align: center;
        color: #ff6303;
        font-weight: bold;
    }
    th{
        background-color: #ffeee6;
    }
    td:has(img){
        display: flex;
        justify-content: center;
        align-items: center;

    }
</style>

<table align="center" style="width: 50%;height: auto">
   <tr>
       <th colspan="2"><h1>Thông tin các sản phẩm</h1></th>
   </tr>
   <?php if(mysqli_num_rows($result)!==0) :?>
      <?php foreach ($result as $item ) :?>
          <tr>
             <td>
                <img style="height: 100px;width: 100px"src="/imges/<?php echo $item['Hinh'] ?> " alt=""  srcset="">

             </td>
             <td>
                <strong><?php echo $item['Ten_sua'] ?> </strong>
                 <br>
                nha san xuat:<?php echo $item['Ten_hang_sua'] ?>
                 <br>
                 <?php echo $item['Ten_loai'] . '-' . $item['Trong_luong'] . '-' . $item['Don_gia'] ?>
             </td>
          </tr>
      <?php endforeach;?>

   <?php endif;?>
</table>



