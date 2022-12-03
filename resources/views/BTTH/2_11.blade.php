@extends('adminindex')
@section('211')
<?php

$connect = mysqli_connect('localhost','root','','ql_ban_sua',);
mysqli_set_charset($connect,'utf8');
if(!$connect)
{
    die("connect failed ". mysqli_connect_error());
}
$ls    = null;
$hs    = null;
$sqlls = "select * from loai_sua";
$sqlhs = "select * from hang_sua";

$resultls = mysqli_query($connect, $sqlls);
$resulths = mysqli_query($connect, $sqlhs);

$kt = 0;


if (isset($_GET['submit'])) {
   $ms = $_GET['ms'];
   $ts = $_GET['ts'];
   $hs = $_GET['hs'];
   $ls = $_GET['ls'];
   $tl = $_GET['tl'];
   $dg = $_GET['dg'];
   $tp = $_GET['tp'];
   $li = $_GET['li'];
   $pa = $_GET['pa'];


   ////////////////////////them anh/////////////////////////

   if (
           empty(trim($ms)) || empty(trim($ts)) || empty(trim($hs)) || empty(trim($ls)) || empty(trim($tp))
           || !is_numeric(trim($dg)) || !is_numeric(trim($tl)) || empty(trim($li)) || empty(trim($pa))) {
      $erro = "<h3> du lieu k hop le </h3>";
   } else {
      $folder = "Hinh_sua/";
      //tao duong dan
      $file_name = basename($_FILES["fileToUpload"]["name"]);
      $path      = $folder.$file_name;

      $sql = "insert into sua (Ma_sua, Ten_sua, Ma_hang_sua, Ma_loai_sua, Trong_luong, Don_gia, TP_Dinh_Duong, Loi_ich, Hinh)
            values ('$ms','$ts','$hs','$ls',$tl,$dg,'$tp','$li','$file_name')";


      $result = mysqli_query($connect, $sql);

      if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $path)) {
         $kt = 1;
      } else {
         $kt = -1;
      }
   }
}
?>

<style>
    .x-tb{
        width: 100%;
        border-collapse: collapse;
        border: 3px solid #ab5828;
    }
    .x-td, .x-th {
        border: 1px solid #828282 ;
        text-align: center;
        padding: 8px;
    }
    .x-td:has(img){
        display: flex;
        justify-content: center;
        align-items: center;

    }
    .x-td:has(h2){
        color: #e87132;
        font-style: italic;
        text-align: center;
        background-color: #ffeee6;
    }

</style>

<form action="" method="GET" enctype="multipart/form-data">
    <table style="width: 100%">
        <tr>
            <th colspan="2">Them sua moi</th>
        </tr>
        <tr>
            <td>
                ma sua:
            </td>
            <td>
                <input type="text" name="ms" value="<?php
                echo $ms ?? "" ?>">
            </td>
        </tr>
        <tr>
            <td>
                ten sua:
            </td>
            <td>
                <input type="text" name="ts" value="<?php
                echo $ts ?? "" ?>">
            </td>
        </tr>
        <tr>
            <td>
                hang sua
            </td>
            <td>
                <select name="hs" id="">
                   <?php
                   foreach ($resulths as $item) : ?>
                       <option value="<?php
                       echo $item['Ma_hang_sua'] ?>"
                           <?php
                           echo $item['Ma_hang_sua'] == $hs ? "selected" : "" ?>
                       >
                          <?php
                          echo $item['Ten_hang_sua'] ?>
                       </option>
                   <?php
                   endforeach; ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>
                loai sua:
            </td>
            <td>
                <select name="ls" id="">
                   <?php
                   foreach ($resultls as $item) : ?>
                       <option value="<?php
                       echo $item['Ma_loai_sua'] ?>"
                           <?php
                           echo $item['Ma_loai_sua'] == $ls ? "selected" : "" ?>
                       >
                          <?php
                          echo $item['Ten_loai'] ?>
                       </option>
                   <?php
                   endforeach; ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>
                trong luong
            </td>
            <td>
                <input type="text" name="tl" value="<?php
                echo $tl ?? "" ?>">
            </td>
        </tr>
        <tr>
            <td>
                don gia
            </td>
            <td>
                <input type="text" name="dg" value="<?php
                echo $dg ?? "" ?>">
            </td>
        </tr>
        <tr>
            <td>
                thanh phan dinh duong
            </td>
            <td>
                <textarea name="tp" id="" cols="30" rows="10"><?php
                   echo $tp ?? "" ?></textarea>
            </td>
        </tr>
        <tr>
            <td>
                loi ich
            </td>
            <td>
                <textarea name="li" id="" cols="30" rows="10"><?php
                   echo $li ?? "" ?></textarea>
            </td>
        </tr>
        <tr>
            <td>
                hinh anh:
            </td>
            <td>
                <input type="text" id="file" readonly name="pa" value="<?php
                echo $pa ?? "" ?>">
                <input type="file" id="fileUpload" onchange="getInfo()" name="fileToUpload">
            </td>
        </tr>
        <tr>
            <td></td>
            <td>
                <button type="submit" name="submit">them moi</button>
            </td>
        </tr>
    </table>
</form>

<?php
echo $erro ?? "" ?>

<?php
if (isset($result)) {
   if ($result) :?>
        <h1>them moi thanh cong</h1>
       <table class="x-tb">
           <tr class="x-tr" >
               <td class="x-td" colspan="2">
                   <h2>
                      <?php echo $ts ?>
                   </h2>
               </td>
           </tr>
           <tr class="x-tr" >
               <td class="x-td">
                   <img src="./Hinh_sua/<?php echo $file_name ?> " alt=""  srcset="">

               </td>
               <td class="x-td">
                   <strong> Thanh phan dinh duong</strong>
                   <br>
                  <?php echo $tp ?>
                   <br>
                   <strong> loi ich</strong>
                   <br>
                  <?php echo $li ?>
                   <p><strong>trong luong: </strong> <?php echo $tl?> gr
                       - <strong>Don gia: <?php echo $dg ?> VND</strong>
                   </p>
               </td>
           </tr>
       </table>
   <?php else: ?>
       <h1>loi</h1>
<a href="javascript:window.history.back(-1);">Trở về</a>
   <?php endif;
} ?>

<script>
    function getInfo() {
        const fileUpload = document.getElementById("fileUpload");
        const file = document.getElementById("file");
        file.value = fileUpload.value;
    }
</script>

@endsection


