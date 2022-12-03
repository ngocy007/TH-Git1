<?php
include 'db.php';

$squery = 'select * from hang_sua,sua,loai_sua
where sua.Ma_hang_sua = hang_sua.Ma_hang_sua and loai_sua.Ma_loai_sua = sua.Ma_loai_sua';

$result = mysqli_query($conn,$squery);
$i=0;
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
        text-align: center;
        padding: 8px;
    }


</style>

<table align="center" style="height: auto;width: 70%">
   <tr>
      <th colspan="5" style="background-color: lightpink" ><h1>THÔNG TIN CÁC SẢN PHẨM</h1></th>
   </tr>
   <?php if(mysqli_num_rows($result)!==0) :?>
      <?php foreach ($result as $item ) :?>

         <?php if ($i===0) {echo '<tr>';}  $i++?>
               <td>
                  <strong><?php echo $item['Ten_sua'] ?> </strong>
                  <br>
                  <?php echo  $item['Trong_luong'] . '-' . $item['Don_gia'].' VND' ?>
                  <img src="./imges/<?php echo $item['Hinh'] ?> " alt=""  srcset="">
               </td>

         <?php if ($i===5) {echo '</tr>';$i=0;}?>
      <?php endforeach;?>

   <?php endif;?>
</table>




