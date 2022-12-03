@extends('adminindex')
@section('2121')
<?php
$connect = mysqli_connect('localhost','root','','ql_ban_sua',);
mysqli_set_charset($connect,'utf8');
if(!$connect)
{
    die("connect failed ". mysqli_connect_error());
}

$sql = "select * from khach_hang";
$result = mysqli_query($connect,$sql);

?>
<style>
    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 70%;
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

<table border="1" style="overflow-x: scroll" align="center">
   <tr>
      <th>ma kh</th>
      <th>ten kh</th>
      <th>gioi tinh</th>
      <th>dia chi</th>
      <th>so dien thoai</th>
      <th>email</th>
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
            <a href="{{url('2_123')}}?id=<?php echo $item["Ma_khach_hang"] ?>">sua</a>
         </td>
         <td>
             <a href="{{url('2_122')}}?id=<?php echo $item["Ma_khach_hang"] ?>">xoa</a>
         </td>
      </tr>
   <?php endforeach;?>
</table>
<a href="javascript:window.history.back(-1);">Trở về</a>
@endsection
