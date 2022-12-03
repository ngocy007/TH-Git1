<?php
$id = $_GET['item'];
include 'db.php';
$squery = "select * from sua
where sua.Ma_sua ='".$id."'";

$result = mysqli_query($conn,$squery);
$each = mysqli_fetch_array($result);

?>
<style>

    img{
        width: 200px;
        height: 200px;
    }
    table{
        width: 50%;
        border-collapse: collapse;
        border: 5px #bb4c00 groove;
    }
    td, th {
        border: 1px solid black;
        text-align: center;
        padding: 8px;
    }
    h1{
        text-align: center;
        color: #ff6303;
        font-weight: bold;
    }
    tr > td:nth-child(2)
    {
        text-align: left;
    }
    p{
        text-align: right;
    }
    th{
        background-color: #ffeee6;
    }
</style>
<table align="center">
   <tr>
      <th colspan="2"><h1><?php echo $each['Ten_sua'] ?></h1></th>
   </tr>
   <?php if(mysqli_num_rows($result)!==0) :?>
         <tr>
            <td>
               <img src="./imges/<?php echo $each['Hinh'] ?> " alt=""  srcset="">
            </td>
            <td>
               <strong> Thành phần dinh dưỡng</strong>
               <br>
               <?php echo $each['TP_Dinh_Duong'] ?>
               <br>
               <strong> loi ich</strong>
               <br>
               <?php echo $each['Loi_ich'] ?>
                <p><strong>trọng lượng: </strong> <?php echo $each['Trong_luong']?> gr
                - <strong>đơn giá: <?php echo $each['Don_gia'] ?> VND</strong>
                </p>
            </td>
         </tr>
      <tr>
          <td style="text-align: right"> <a href="javascript:window.history.back(-1);">quay về</a></td>
          <td></td>
      </tr>
   <?php endif;?>
</table>

