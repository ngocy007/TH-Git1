@extends('adminindex')
@section('24')
<?php
$connect = mysqli_connect('localhost','root','','ql_ban_sua',);
mysqli_set_charset($connect,'utf8');
if(!$connect)
{
    die("connect failed ". mysqli_connect_error());
}

$sql_so_trang = 'select * from sua,hang_sua,loai_sua
where sua.Ma_hang_sua = hang_sua.Ma_hang_sua and sua.Ma_loai_sua = loai_sua.Ma_loai_sua ';

$result = mysqli_query($connect,$sql_so_trang);
if(!$result) {
   die("loi");
}

// cong thuc phan trang
$j = 1;
$page = $_GET['page'] ?? 1;
$results_per_page = 2;
$page_first_result = ($page-1) * $results_per_page;

// lay tong so trang
$number_of_result = mysqli_num_rows($result);
$number_of_page = ceil ($number_of_result / $results_per_page);
$sql = 'select * from sua,hang_sua,loai_sua
where sua.Ma_hang_sua = hang_sua.Ma_hang_sua and sua.Ma_loai_sua = loai_sua.Ma_loai_sua
limit ' . $page_first_result. ',' . $results_per_page ;
$result2 = mysqli_query($connect,$sql);

// tinh stt
$temp = $page*$results_per_page;
if ($temp <= $results_per_page) $num = 1;
else $num=($temp-$results_per_page+1);


mysqli_close($connect);
?>

<style>
    ul{
        display: flex;

        justify-content: space-between;
    }
    li{
        list-style: none;
    }
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
        text-align: center;
        font-weight: bold;
    }
    tr:nth-child(even) {
        background-color: #fee0c1;
    }
</style>
<table >
   <tr>
      <th>so tt</th>
      <th>ten sua</th>
      <th>hang sua</th>
      <th>loai sua</th>
      <th>trong luong</th>
      <th>don gia</th>
   </tr>

   <?php if(mysqli_num_rows($result2)!==0) :?>


      <?php foreach ($result2 as $item ) :?>
         <tr>
            <td><?php echo $num++ ?> </td>
            <td><?php echo $item['Ten_sua'] ?> </td>
            <td><?php echo $item['Ten_hang_sua'] ?> </td>
            <td><?php echo $item['Ten_loai'] ?> </td>
            <td><?php echo $item['Trong_luong'] ?> </td>
            <td><?php echo $item['Don_gia'] ?> </td>
         </tr>
      <?php endforeach;?>

   <?php else:?>
      <tr><td>k co du lieu</td></tr>
   <?php endif;?>
</table>


<ul>
   <li>
      <?php if($page  > 1 )  :?>

          <a href="<?php echo $_SERVER['PHP_SELF'] . '?page=' . ($_GET['page']-1)   ?>" >
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

           <a href="<?php echo $_SERVER['PHP_SELF'] . '?page=' . ($page+1) ?>" >
               next
           </a>
       <?php else:?>
           <a href="<?php echo $_SERVER['PHP_SELF'] . '?page='.$number_of_page   ?>" >
               back
           </a>
       <?php endif;?>
    </li>
</ul>
<a href="javascript:window.history.back(-1);">Trở về</a>
@endsection


