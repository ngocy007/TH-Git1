@extends('adminindex')
@section('2122')
<?php
$connect = mysqli_connect('localhost','root','','ql_ban_sua',);
mysqli_set_charset($connect,'utf8');
if(!$connect)
{
    die("connect failed ". mysqli_connect_error());
}
$id = $_GET["id"] ?? "";

if (!empty($id))
{
   $sql = "select * from khach_hang where Ma_khach_hang = '$id'";
   $result = mysqli_query($connect,$sql);
}
else die("phai truyen id");
if (isset($_GET["submit"]))
{
   $sql2 = "select So_hoa_don from hoa_don where Ma_khach_hang ='$id'";
   $result2 = mysqli_query($connect,$sql2);
   if (mysqli_num_rows($result2) > 0)
   {
      $error = "da mua hang k xoa dc";
   }
   else
   {
     $sqldel = "delete from khach_hang where Ma_khach_hang = '$id' ";
     $resultdel = mysqli_query($connect,$sqldel);
   }
}
?>
<style>
    body{
        display: flex;
        justify-content: center;
        align-items: start;
    }
    th:has(h1){
      background-color: #fecc66;
    }
    tr:has(button)
    {
        background-color: #fee2a8;
        text-align: center;

    }
    table{
        width: 70%;
        text-align: center;
        background-color: #feebca;
        border: white solid 1px;
    }
</style>

<?php
if (isset($result))
{
   if(mysqli_num_rows($result) === 1) :
      $each = mysqli_fetch_array($result);
      ?>
      <form action="" method="GET">
         <table align="center">
            <tr>
               <th colspan="2"><h1>THONG TIN KHACH HANG</h1></th>
            </tr>
            <tr>
               <td> Ma kh : </td>
               <td>
                  <input readonly type="text" value="<?php echo $each["Ma_khach_hang"] ?>">
               </td>
            </tr>
            <tr>
               <td> ten kh : </td>
               <td>
                  <input  type="text" value="<?php echo $each["Ten_khach_hang"] ?>">
               </td>
            </tr>
            <tr>
               <td> phai : </td>
               <td>
                  <input  type="text" value="<?php echo $each["Phai"] == 0 ? "Nam" : "Nu" ?>">
               </td>
            </tr>
            <tr>
               <td> dia chi : </td>
               <td>
                  <input  type="text" value="<?php echo $each["Dia_chi"] ?>">
               </td>
            </tr>
            <tr>
               <td> dien thoai : </td>
               <td>
                  <input  type="text" value="<?php echo $each["Dien_thoai"] ?>">

               </td>
            </tr>
            <tr>
               <td> email : </td>
               <td>
                  <input  type="text" value=" <?php echo $each["Email"] ?>">

               </td>
            </tr>
            <tr>
               <td colspan="2">
                  <button type="submit" name="submit">
                     xoa
                  </button>
                   <a href="javascript:window.history.back(-1);">Trở về</a>
               </td>
            </tr>
         </table>
      </form>
   <?php else: ?>
   <h1>id loi</h1>
   <?php endif;
}

?>
<?php echo $error ?? "" ?>
@endsection



