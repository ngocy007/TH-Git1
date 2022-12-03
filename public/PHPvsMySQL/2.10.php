<?php
include 'db.php';

$squeryls = "select * from loai_sua";
$squeryhs = "select * from hang_sua";

$resultls = mysqli_query($conn,$squeryls);
$resulths = mysqli_query($conn,$squeryhs);

$ls = null;
$hs = null;
if(isset($_GET['submit']) )
{
    if(empty($_GET['q'])) die("không được để trống");

   $q = $_GET['q'];
   $ls = $_GET['ls'];
   $hs = $_GET['hs'];

   $sql = "select * from sua,hang_sua,loai_sua
    where Ten_sua like '%$q%' and hang_sua.Ma_hang_sua = '$hs' and loai_sua.Ma_loai_sua = '$ls'
    and sua.Ma_loai_sua = loai_sua.Ma_loai_sua and sua.Ma_hang_sua = hang_sua.Ma_hang_sua";


   $result = mysqli_query($conn,$sql);

}


?>

    <style>
        ul{
            display: flex;
            list-style: none;
            justify-content: space-between;
        }
        img{
            width: 200px;
            height: 200px;
        }

        table{
            width: 70%;
            border-collapse: collapse;
            border: 3px solid #ab5828;
        }
        td, th {
            border: 1px solid #828282 ;
            text-align: left;
            padding: 8px;
        }
        h4{
            text-align: center;
            color: #ff6303;
            font-weight: bold;
            font-size:20px ;
            padding: 20px;
        }
        th{
            background-color: lightpink;
        }
        td:has(img){
            display: flex;
            justify-content: center;
            align-items: center;

        }
        form{
            width: 100%;
            text-align: center;
            border: white solid 1px;
        }
        td:has(h2){
            color: #e87132;
            font-style: italic;
            text-align: center;
            background-color: #ffeee6;
        }
    </style>

   <form action="" method="get">
       <table align="center">
           <tr>
               <td style="background-color: lightpink;text-align: center"><h1>TÌM KIẾM THÔNG TIN SỮA</h1></td>
           </tr>
           <tr>
               <td style="text-align: center">
                   Loại sữa: <select name="ls" id="">
                       <?php foreach ($resultls as $item ) :?>
                           <option value="<?php echo $item['Ma_loai_sua'] ?>"
                               <?php echo $item['Ma_loai_sua'] == $ls ? "selected" : ""  ?>
                           >
                               <?php echo $item['Ten_loai'] ?>
                           </option>
                       <?php endforeach;?>
                   </select>
                   Hãng sữa:
                   <select name="hs" id="">
                       <?php foreach ($resulths as $item ) :?>
                           <option value="<?php echo $item['Ma_hang_sua'] ?>"
                               <?php echo $item['Ma_hang_sua'] == $hs  ? "selected" : ""  ?>
                           >
                               <?php echo $item['Ten_hang_sua'] ?>
                           </option>
                       <?php endforeach;?>
                   </select>
               </td>
           </tr>
           <tr>
               <td style="text-align: center">
                   Tên sữa: <input type="text" name="q" value="<?php echo $q ?? "" ?>">
                   <button type="submit" name="submit"> Tìm kiếm</button>
               </td>
           </tr>
       </table>
   </form>



<?php if(!isset($result)) :?>

<?php elseif(mysqli_num_rows($result) == 0):?>
   <h1>Không tìm thây</h1>
<?php else:?>
   <h4>đã tìm thấy <?php echo mysqli_num_rows($result) ?> kết quả</h4>
   <table align="center" class="x-tb">
      <?php if(mysqli_num_rows($result)!==0) :?>
         <?php foreach ($result as $item ) :?>
            <tr class="x-tr" >
               <td class="x-td" colspan="2">
                  <h2>
                     <?php echo $item['Ten_sua'] ?>
                  </h2>
               </td>
            </tr>
            <tr class="x-tr" >
               <td class="x-td">
                   <img src="./imges/<?php echo $item['Hinh'] ?> ">

               </td>
               <td class="x-td">
                  <strong> Thành phần dinh dưỡng</strong>
                  <br>
                  <?php echo $item['TP_Dinh_Duong'] ?>
                  <br>
                  <strong> Lợi ích</strong>
                  <br>
                  <?php echo $item['Loi_ich'] ?>
                  <p><strong style="color: red">Trọng lượng: </strong > <?php echo $item['Trong_luong']?> gr
                     - <strong style="color: red">Đơn giá: <?php echo $item['Don_gia'] ?> VND</strong>
                  </p>
               </td>
            </tr>
         <?php endforeach;?>

      <?php endif;?>
   </table>

<?php endif;?>