@extends('adminindex')
@section('22')
<?php
$connect = mysqli_connect('localhost','root','','ql_ban_sua',);
mysqli_set_charset($connect,'utf8');
if(!$connect)
{
    die("connect failed ". mysqli_connect_error());
}

$sql = 'select * from khach_hang';

$result = mysqli_query($connect,$sql);
if(!$result) {
   die("loi");
}
mysqli_close($connect);
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
        background-color: #fee0c1;
    }


</style>
<table >
   <tr>
      <th>Ma kh</th>
      <th>ten kh</th>
      <th>phai</th>
      <th>dia chi</th>
      <th>dien thoai</th>
      <th>email</th>
   </tr>

   <?php if(mysqli_num_rows($result)!==0) :?>


      <?php foreach ($result as $item ) :?>
         <tr>
            <td><?php echo $item['Ma_khach_hang'] ?> </td>
            <td><?php echo $item['Ten_khach_hang'] ?> </td>
            <td><?php echo $item['Phai'] ?> </td>
            <td><?php echo $item['Dia_chi'] ?> </td>
            <td><?php echo $item['Dien_thoai'] ?> </td>
            <td><?php echo $item['Email'] ?> </td>
         </tr>
      <?php endforeach;?>

   <?php else:?>
      <tr><td>k co du lieu</td></tr>
   <?php endif;?>
</table>
<a href="javascript:window.history.back(-1);">Trở về</a>
@endsection


