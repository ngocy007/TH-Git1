<?php

include 'db.php';
$ls    = null;
$hs    = null;
$squeryls = "select * from loai_sua";
$squeryhs = "select * from hang_sua";

$resultls = mysqli_query($conn, $squeryls);
$resulths = mysqli_query($conn, $squeryhs);

$kt = 0;


if (isset($_POST['submit'])) {
   $ms = $_POST['ms'];
   $ts = $_POST['ts'];
   $hs = $_POST['hs'];
   $ls = $_POST['ls'];
   $tl = $_POST['tl'];
   $dg = $_POST['dg'];
   $tp = $_POST['tp'];
   $li = $_POST['li'];
   $pa = $_POST['pa'];


   if (empty(trim($ms)) || empty(trim($ts)) || empty(trim($hs)) || empty(trim($ls)) || empty(trim($tp))
       || !is_numeric(trim($dg)) || !is_numeric(trim($tl)) || empty(trim($li)) || empty(trim($pa))) {
      $erro = "<h3> không hợp lệ </h3>";
   } else {
      $folder = "imges/";
      //tao duong dan
      $file_name = basename($_FILES["fileToUpload"]["name"]);
      $path      = $folder.$file_name;

      $sql = "insert into sua (Ma_sua, Ten_sua, Ma_hang_sua, Ma_loai_sua, Trong_luong, Don_gia, TP_Dinh_Duong, Loi_ich, Hinh)
            values ('$ms','$ts','$hs','$ls',$tl,$dg,'$tp','$li','$file_name')";


      $result = mysqli_query($conn, $sql);

      if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $path)) {
         $kt = 1;
      } else {
         $kt = -1;
      }
   }
}
?>


<form action="" method="post" enctype="multipart/form-data">
    <table  align="center" style="width: 40%;background-color: lightpink">
        <tr>
            <th style="background-color: hotpink" colspan="2">THÊM SỮA MỚI</th>
        </tr>
        <tr>
            <td>
                Mã sữa:
            </td>
            <td>
                <input type="text" name="ms" value="<?php
                echo $ms ?? "" ?>">
            </td>
        </tr>
        <tr>
            <td>
                Tên sữa:
            </td>
            <td>
                <input type="text" name="ts" value="<?php
                echo $ts ?? "" ?>">
            </td>
        </tr>
        <tr>
            <td>
                Hãng sữa:
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
                Loại sữa:
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
                Trọng lượng:
            </td>
            <td>
                <input type="text" name="tl" value="<?php
                echo $tl ?? "" ?>">
            </td>
        </tr>
        <tr>
            <td>
                Đơn giá:
            </td>
            <td>
                <input type="text" name="dg" value="<?php
                echo $dg ?? "" ?>">
            </td>
        </tr>
        <tr>
            <td>
                Thành phần dinh dưỡng:
            </td>
            <td>
                <textarea name="tp" id="" cols="30" rows="10"><?php
                   echo $tp ?? "" ?></textarea>
            </td>
        </tr>
        <tr>
            <td>
                Lợi ích:
            </td>
            <td>
                <textarea name="li" id="" cols="30" rows="10"><?php
                   echo $li ?? "" ?></textarea>
            </td>
        </tr>
        <tr>
            <td>
                Hình ảnh:
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
                <button type="submit" name="submit">Thêm mới</button>
            </td>
        </tr>
    </table>
</form>

<?php
echo $erro ?? "" ?>

<?php
if (isset($result)) {
   if ($result) :?>
        <h4 style="text-align: center">Kết quả sau khi thêm thành công</h4>
       <table align="center" style="width: 50%;border: 1px" >
           <tr>
               <td style="background-color: lightpink;text-align: center" colspan="2">
                   <h2>
                      <?php echo $ts ?>
                   </h2>
               </td>
           </tr>
           <tr class="x-tr" >
               <td class="x-td">
                   <img style="width: 200px" src="./imges/<?php echo $file_name ?> " alt=""  srcset="">

               </td>
               <td class="x-td">
                   <strong> Thành phần dinh dưỡng</strong>
                   <br>
                  <?php echo $tp ?>
                   <br>
                   <strong> Lợi ích</strong>
                   <br>
                  <?php echo $li ?>
                   <p><strong>Trọng lượng: </strong> <?php echo $tl?> gr
                       - <strong>Đơn giá: <?php echo $dg ?> VND</strong>
                   </p>
               </td>
           </tr>
       </table>
   <?php else: ?>
       <h1>loi</h1>
   <?php endif;
} ?>

<script>
    function getInfo() {
        const fileUpload = document.getElementById("fileUpload");
        const file = document.getElementById("file");
        file.value = fileUpload.value;
    }
</script>



