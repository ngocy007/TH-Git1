@extends('adminindex')
@section('28')
<?php
$connect = mysqli_connect('localhost','root','','ql_ban_sua',);
mysqli_set_charset($connect,'utf8');
if(!$connect)
{
    die("connect failed ". mysqli_connect_error());
}

$sql_so_trang = 'select * from hang_sua,sua,loai_sua
where sua.Ma_hang_sua = hang_sua.Ma_hang_sua and loai_sua.Ma_loai_sua = sua.Ma_loai_sua';
$result_so_trang = mysqli_query($connect,$sql_so_trang);
$j=1;
if(!$result_so_trang) {
   die("loi");
}
//phan trang

$page = $_GET['page'] ?? 1;
$results_per_page = 2;
$page_first_result = ($page-1) * $results_per_page;
$number_of_result = mysqli_num_rows($result_so_trang);
$number_of_page = ceil ($number_of_result / $results_per_page);

$sql = 'select * from hang_sua,sua,loai_sua
where sua.Ma_hang_sua = hang_sua.Ma_hang_sua and loai_sua.Ma_loai_sua = sua.Ma_loai_sua
limit ' . $page_first_result. ',' . $results_per_page ;
$result = mysqli_query($connect,$sql);

mysqli_close($connect);
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

<table align="center">
   <tr>
      <th colspan="2"><h1>Thong tin cac san pham</h1></th>
   </tr>
   <?php if(mysqli_num_rows($result)!==0) :?>
      <?php foreach ($result as $item ) :?>
         <tr>
            <td>
               <img src="./Hinh_sua/<?php echo $item['Hinh'] ?> " alt=""  srcset="">

            </td>
            <td>
                <strong> Thanh phan dinh duong</strong>
                <br>
               <?php echo $item['TP_Dinh_Duong'] ?>
                <br>
                <strong> loi ich</strong>
                <br>
               <?php echo $item['Loi_ich'] ?>
                <p><strong>trong luong: </strong> <?php echo $item['Trong_luong']?> gr
                    - <strong>Don gia: <?php echo $item['Don_gia'] ?> VND</strong>
                </p>
            </td>
         </tr>
      <?php endforeach;?>

   <?php endif;?>
</table>
<ul>
    <li>
       <?php if($page  > 1)  :?>

           <a href="<?php echo $_SERVER['PHP_SELF'] . '?page='. ($_GET['page']-1)   ?>" >
               back
           </a>
       <?php else:?>
           <a href="<?php echo $_SERVER['PHP_SELF'] . '?page='.'1'   ?>" >
               back
           </a>
       <?php endif;?>
    </li>
   <?php while ($number_of_page >= $j) :?>
       <li>
           <a href="<?php echo $_SERVER['PHP_SELF'].'?page='.$j ?>" >
              <?php echo $j++ ?>
           </a>
       </li>
   <?php endwhile;?>
    <li>
       <?php if($page < $number_of_page) :?>

           <a href="<?php echo $_SERVER['PHP_SELF'] . '?page='. ($page+1)   ?>" >
               next
           </a>
       <?php else:?>
           <a href="<?php echo $_SERVER['PHP_SELF'] . '?page='.$number_of_page   ?>" >
               next
           </a>
       <?php endif;?>
    </li>
</ul>
<a href="javascript:window.history.back(-1);">Trở về</a>
@endsection

