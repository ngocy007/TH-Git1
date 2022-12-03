<?php
include 'db.php';

$squerysotrang = 'select * from hang_sua,sua,loai_sua
where sua.Ma_hang_sua = hang_sua.Ma_hang_sua and loai_sua.Ma_loai_sua = sua.Ma_loai_sua';
$result_so_trang = mysqli_query($conn,$squerysotrang);
$i=1;

//phan trang

$page = $_GET['page'] ?? 1;
$results_per_page = 2;
$page_first_result = ($page-1) * $results_per_page;
$number_of_result = mysqli_num_rows($result_so_trang);
$number_of_page = ceil ($number_of_result / $results_per_page);

$squery = 'select * from hang_sua,sua,loai_sua
where sua.Ma_hang_sua = hang_sua.Ma_hang_sua and loai_sua.Ma_loai_sua = sua.Ma_loai_sua limit ' . $page_first_result. ',' . $results_per_page ;
$result = mysqli_query($conn,$squery);

mysqli_close($conn);
?>
<style>
    ul{
        display: flex;
        list-style: none;
        justify-content: space-between;
    }
    img{
        width: 200px;
        height: 200px;
    }

    table{
        width: 70%;
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

<table align="center">
   <tr>
      <th colspan="2"><h1>THÔNG TIN CÁC SẢN PHẨM</h1></th>
   </tr>
   <?php if(mysqli_num_rows($result)!==0) :?>
      <?php foreach ($result as $item ) :?>
         <tr>
            <td>
               <img src="./imges/<?php echo $item['Hinh'] ?> ">

            </td>
            <td>
                <strong> Thành Phần dinh dưỡng</strong>
                <br>
               <?php echo $item['TP_Dinh_Duong'] ?>
                <br>
                <strong> Lợi ích</strong>
                <br>
               <?php echo $item['Loi_ich'] ?>
                <p><strong style="color: red">Trọng Lượng: </strong> <?php echo $item['Trong_luong']?> gr
                    - <strong style="color: red">Đơn giá: <?php echo $item['Don_gia'] ?> VND</strong>
                </p>
            </td>
         </tr>
      <?php endforeach;?>
   <?php endif;?>
    <tr>
        <td style="text-align: center" colspan="2">
            <?php if($page  > 1)  :?>

                <a href="<?php echo $_SERVER['PHP_SELF'] . '?page='. ($_GET['page']-1)   ?>" >
                    back
                </a>
            <?php else:?>
                <a href="<?php echo $_SERVER['PHP_SELF'] . '?page='.'1'   ?>" >
                    back
                </a>
            <?php endif;?>
            <?php while ($number_of_page >= $i) :?>
                <a href="<?php echo $_SERVER['PHP_SELF'].'?page='.$i ?>" >
                    <?php echo $i++ ?>
                </a>
            <?php endwhile;?>
            <?php if($page < $number_of_page) :?>

                <a href="<?php echo $_SERVER['PHP_SELF'] . '?page='. ($page+1)   ?>" >
                    next
                </a>
            <?php else:?>
                <a href="<?php echo $_SERVER['PHP_SELF'] . '?page='.$number_of_page   ?>" >
                    next
                </a>
            <?php endif;?>
        </td>
    </tr>
</table>



