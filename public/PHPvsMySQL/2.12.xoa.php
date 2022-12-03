<?php
include 'db.php';
$id = $_GET["id"] ?? "";

if (!empty($id))
{
   $squery = "select * from khach_hang where Ma_khach_hang = '$id'";
   $result = mysqli_query($conn,$squery);
}
else die("phải vào trang index lấy id trước");
if (isset($_POST["submit"]))
{
   $squery2 = "select So_hoa_don from hoa_don where Ma_khach_hang ='$id'";
   $result2 = mysqli_query($conn,$squery2);
   if (mysqli_num_rows($result2) > 0)
   {
      $error = "Khách hàng đã mua hàng nên không thể xóa được";
   }
   else
   {
     $squerydel = "delete from khach_hang where Ma_khach_hang = '$id' ";
     $resultdel = mysqli_query($conn,$squerydel);
     $error = "xóa thành công";
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
        width: 100%;
        text-align: left;
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
      <form action="" method="post">
         <table>
            <tr>
               <th colspan="2"><h1>THÔNG TIN KHÁCH HÀNG</h1></th>
            </tr>
            <tr>
               <td> Mã Khách hàng : </td>
               <td>
                  <input readonly type="text" value="<?php echo $each["Ma_khach_hang"] ?>">
               </td>
            </tr>
            <tr>
               <td> Tên khách hàng : </td>
               <td>
                  <input  type="text" value="<?php echo $each["Ten_khach_hang"] ?>">
               </td>
            </tr>
            <tr>
               <td> Giới tính : </td>
               <td>
                  <input  type="text" value="<?php echo $each["Phai"] == 0 ? "Nam" : "Nu" ?>">
               </td>
            </tr>
            <tr>
               <td> Địa chỉ : </td>
               <td>
                  <input  type="text" value="<?php echo $each["Dia_chi"] ?>">
               </td>
            </tr>
            <tr>
               <td> Số điện thoại : </td>
               <td>
                  <input  type="text" value="<?php echo $each["Dien_thoai"] ?>">

               </td>
            </tr>
            <tr>
               <td> Email : </td>
               <td>
                  <input  type="text" value=" <?php echo $each["Email"] ?>">

               </td>
            </tr>
            <tr>
               <td colspan="2">
                  <button type="submit" name="submit">
                     xóa
                  </button>
                  <a href="2.12.index.php">
                     quay lại
                  </a>
               </td>
            </tr>
         </table>
          <strong style="color: red"><?php echo $error ?? "" ?></strong>
      </form>
   <?php else: ?>
   <h1>lỗi mã</h1>
   <?php endif;
}






