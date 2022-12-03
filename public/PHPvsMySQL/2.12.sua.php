<?php

include 'db.php';

$id = $_GET["id"] ?? "";

if (!empty($id)) {
   $squery    = "select * from khach_hang where Ma_khach_hang = '$id'";
   $result = mysqli_query($conn, $squery);
} else {
   die("phải vào trang index lấy id trước");
}
if (isset($_POST["submit"])) {
   $ten   = $_POST["ten"];
   $gt    = $_POST["gt"];
   $dc    = $_POST["dc"];
   $dt    = $_POST["dt"];
   $email = $_POST["email"];


   if (empty($ten) || empty($dc) || empty($dt) || empty($email) || !str_contains($email,'@')) {
      $error = "<h2>điền dầy đủ dữ liệu</h2>";
   }


   $squery2 = "update khach_hang
            set  khach_hang.Ten_khach_hang = '$ten',
                khach_hang.Phai = '$gt',
                khach_hang.Dia_chi = '$dc',
                khach_hang.Dien_thoai = '$dt',
                khach_hang.Email = '$email'
            where khach_hang.Ma_khach_hang = '$id'";

   if (!mysqli_query($conn,$squery2))
   {
       die("lỗi");
   }
   header('location:2.12.index.php');
}
?>
<style>
    body {
        display: flex;
        justify-content: center;
        align-items: start;
    }

    th:has(h1) {
        background-color: #fecc66;
    }

    tr:has(button) {
        background-color: #fee2a8;
        text-align: center;

    }

    table {
        width: 100%;
        text-align: left;
        background-color: #feebca;
        border: white solid 1px;
    }
    .radio{
        display: flex;
        justify-content: start;
        align-items: center;
    }
</style>

<?php
if (isset($result)) {
   if (mysqli_num_rows($result) === 1) :
      $each = mysqli_fetch_array($result);
      ?>
       <form action="" method="post">
           <table>
               <tr>
                   <th colspan="2"><h1>CẬP NHẬT THÔNG TIN KHÁCH HÀNG</h1></th>
               </tr>
               <tr>
                   <td> Mã KH :</td>
                   <td>
                       <input type="text" value="<?php
                       echo $each["Ma_khach_hang"] ?>">
                   </td>
               </tr>
               <tr>
                   <td> Tên khách hàng :</td>
                   <td>
                       <input type="text" name="ten" value="<?php
                       echo $each["Ten_khach_hang"] ?>">
                   </td>
               </tr>
               <tr >
                   <td> Giới tính :</td>
                   <td class="radio">
                       <input type="radio" id="nam"
                           <?php
                           echo $each["Phai"] === '0' ? "checked" : "" ?>
                              name="gt" value="0">

                       <label for="nam">
                           nam
                       </label>

                       <input type="radio" id="nu"
                           <?php
                           echo $each["Phai"] === '1' ? "checked" : "" ?>
                              name="gt" value="1">

                       <label for="nu">
                           nữ
                       </label>
                   </td>
               </tr>
               <tr>
                   <td> Địa chỉ :</td>
                   <td>
                       <input type="text" name="dc" value="<?php
                       echo $each["Dia_chi"] ?>">
                   </td>
               </tr>
               <tr>
                   <td> So điện thoại :</td>
                   <td>
                       <input type="text" name="dt" value="<?php
                       echo $each["Dien_thoai"] ?>">

                   </td>
               </tr>
               <tr>
                   <td> Email :</td>
                   <td>
                       <input type="email" name="email" value=" <?php
                       echo $each["Email"] ?>">

                   </td>
               </tr>
               <tr>
                   <td colspan="2">
                       <button type="submit" name="submit">
                           Cập nhật
                       </button>
                       <a href="2.12.index.php">
                           quay lại
                       </a>
                   </td>
               </tr>
           </table>
       </form>
   <?php
   else: ?>
       <h1> lỗi mã</h1>
   <?php
   endif;
}

?>
<?php
echo $error ?? "" ?>




