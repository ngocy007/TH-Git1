@extends('adminindex')
@section('272')
<?php

if(!isset($_GET['item']))
{
   die("k co san pham do");
}
$id = $_GET['item'];
$connect = mysqli_connect('localhost','root','','ql_ban_sua',);
mysqli_set_charset($connect,'utf8');
if(!$connect)
{
    die("connect failed ". mysqli_connect_error());
}
$sql = "select * from sua
where sua.Ma_sua ='".$id."'";

$result = mysqli_query($connect,$sql);
$each = mysqli_fetch_array($result);


if(!$result) {
   die("loi");
}

?>
<style>

    img{
        width: 200px;
        height: 200px;
    }
    table{
        width: 100%;
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
<table>
   <tr>
      <th colspan="2"><h1>About</h1></th>
   </tr>
   <?php if(mysqli_num_rows($result)!==0) :?>
         <tr>
            <td>
               <img src="./Hinh_sua/<?php echo $each['Hinh'] ?> " alt=""  srcset="">
            </td>
            <td>
               <strong> Thanh phan dinh duong</strong>
               <br>
               <?php echo $each['TP_Dinh_Duong'] ?>
               <br>
               <strong> loi ich</strong>
               <br>
               <?php echo $each['Loi_ich'] ?>
                <p><strong>trong luong: </strong> <?php echo $each['Trong_luong']?> gr
                - <strong>Don gia: <?php echo $each['Don_gia'] ?> VND</strong>
                </p>
            </td>
         </tr>
      <tr>
          <td style="text-align: right"> <a href="javascript:window.history.back(-1);">trở về</a></td>
          <td></td>
      </tr>
   <?php endif;?>
</table>
<a href="javascript:window.history.back(-1);">Trở về</a>
@endsection
