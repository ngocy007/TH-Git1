
@extends('adminindex')
@section('21')
<?php
$connect = mysqli_connect('localhost','root','','ql_ban_sua',);
mysqli_set_charset($connect,'utf8');
if(!$connect)
{
    die("connect failed ". mysqli_connect_error());
}
$sql = 'select * from hang_sua';
$result = mysqli_query($connect,$sql);
if(!$result) {
   die("loi");
}
?>
<table border="1" style="width: 100%" align="center">
   <tr>
      <th>Ma hs</th>
      <th>ten hs</th>
      <th>dia chi</th>
      <th>dien thoai</th>
      <th>email</th>
   </tr>

<?php if(mysqli_num_rows($result)!==0) :?>

   <?php foreach ($result as $item ) :?>
       <tr>
          <td><?php echo $item['Ma_hang_sua'] ?> </td>
          <td><?php echo $item['Ten_hang_sua'] ?> </td>
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

