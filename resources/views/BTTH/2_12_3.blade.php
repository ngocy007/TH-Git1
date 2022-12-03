@extends('adminindex')
@section('2123')
<?php

$connect = mysqli_connect('localhost','root','','ql_ban_sua',);
mysqli_set_charset($connect,'utf8');
if(!$connect)
{
    die("connect failed ". mysqli_connect_error());
}

$id = $_GET["id"] ?? "";

if (!empty($id)) {
   $sql    = "select * from khach_hang where Ma_khach_hang = '$id'";
   $result = mysqli_query($connect, $sql);
} else {
   die("phai co id");
}
if (isset($_GET["submit"])) {
   $ten   = $_GET["ten"];
   $gt    = $_GET["gt"];
   $dc    = $_GET["dc"];
   $dt    = $_GET["dt"];
   $email = $_GET["email"];


   if (empty($ten) || empty($dc) || empty($dt) || empty($email) || !str_contains($email,'@')) {
      $error = "<h2>dien day du thong tin or sai du lieu</h2>";
   }


   $sql2 = "update khach_hang
            set  khach_hang.Ten_khach_hang = '$ten',
                khach_hang.Phai = '$gt',
                khach_hang.Dia_chi = '$dc',
                khach_hang.Dien_thoai = '$dt',
                khach_hang.Email = '$email'
            where khach_hang.Ma_khach_hang = '$id'";

   if (!mysqli_query($connect,$sql2))
   {
       die("loi");
   }
   header('location:2_12_1.blade.php');
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
        width: 70%;
        text-align: center;
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
           <table align="center">
               <tr>
                   <th colspan="2"><h1>THONG TIN KHACH HANG</h1></th>
               </tr>
               <tr>
                   <td> Ma kh :</td>
                   <td>
                       <input type="text" value="<?php
                       echo $each["Ma_khach_hang"] ?>">
                   </td>
               </tr>
               <tr>
                   <td> ten kh :</td>
                   <td>
                       <input type="text" name="ten" value="<?php
                       echo $each["Ten_khach_hang"] ?>">
                   </td>
               </tr>
               <tr >
                   <td> phai :</td>
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
                           nu
                       </label>
                   </td>
               </tr>
               <tr>
                   <td> dia chi :</td>
                   <td>
                       <input type="text" name="dc" value="<?php
                       echo $each["Dia_chi"] ?>">
                   </td>
               </tr>
               <tr>
                   <td> dien thoai :</td>
                   <td>
                       <input type="text" name="dt" value="<?php
                       echo $each["Dien_thoai"] ?>">

                   </td>
               </tr>
               <tr>
                   <td> email :</td>
                   <td>
                       <input type="email" name="email" value=" <?php
                       echo $each["Email"] ?>">

                   </td>
               </tr>
               <tr>
                   <td colspan="2">
                       <button type="submit" name="submit">
                           sua
                       </button>
                       <a href="javascript:window.history.back(-1);">Trở về</a>
                   </td>
               </tr>
           </table>
       </form>
   <?php
   else: ?>
       <h1>id loi</h1>
   <?php
   endif;
}

?>
<?php
echo $error ?? "" ?>
@endsection





