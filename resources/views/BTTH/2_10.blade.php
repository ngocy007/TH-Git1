@extends('adminindex')
@section('210')
<?php
$connect = mysqli_connect('localhost','root','','ql_ban_sua',);
mysqli_set_charset($connect,'utf8');
if(!$connect)
{
    die("connect failed ". mysqli_connect_error());
}

$sqlls = "select * from loai_sua";
$sqlhs = "select * from hang_sua";

$resultls = mysqli_query($connect,$sqlls);
$resulths = mysqli_query($connect,$sqlhs);

$ls = null;
$hs = null;
if(isset($_GET['submit']) )
{
    if(empty($_GET['q'])) die("k dc de trong");

   $q = $_GET['q'];
   $ls = $_GET['ls'];
   $hs = $_GET['hs'];

   $sql = "select * from sua,hang_sua,loai_sua
    where Ten_sua like '%$q%' and hang_sua.Ma_hang_sua = '$hs' and loai_sua.Ma_loai_sua = '$ls'
    and sua.Ma_loai_sua = loai_sua.Ma_loai_sua and sua.Ma_hang_sua = hang_sua.Ma_hang_sua";


   $result = mysqli_query($connect,$sql);

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
       h4{
           text-align: center;
           color: #ff6303;
           font-weight: bold;
           background-color: #feece2;
           font-size:20px ;
           padding: 20px;
       }
       th{
           background-color: #ffeee6;
       }
       .x-td:has(img){
           display: flex;
           justify-content: center;
           align-items: center;

       }
       form{
           width: 100%;
           text-align: center;
           background-color: #fecccd;
           border: white solid 1px;
       }
       .x-td:has(h2){
           color: #e87132;
           font-style: italic;
           text-align: center;
           background-color: #ffeee6;
       }

   </style>

   <form action="" method="get">
      <h1>Tim kiem thong tin</h1>
      loai sua:
      <select name="ls" id="">
         <?php foreach ($resultls as $item ) :?>
            <option value="<?php echo $item['Ma_loai_sua'] ?>"
                <?php echo $item['Ma_loai_sua'] == $ls ? "selected" : ""  ?>
            >
               <?php echo $item['Ten_loai'] ?>
            </option>
         <?php endforeach;?>
      </select>
      hang sua:
      <select name="hs" id="">
         <?php foreach ($resulths as $item ) :?>
            <option value="<?php echo $item['Ma_hang_sua'] ?>"
            <?php echo $item['Ma_hang_sua'] == $hs  ? "selected" : ""  ?>
            >
               <?php echo $item['Ten_hang_sua'] ?>
            </option>
         <?php endforeach;?>
      </select>
      <br> <br>
      ten sua: <input type="text" name="q" value="<?php echo $q ?? "" ?>">
      <button type="submit" name="submit"> tim kiem</button>
   </form>

<a href="javascript:window.history.back(-1);">Trở về</a>

<?php if(!isset($result)) :?>

<?php elseif(mysqli_num_rows($result) == 0):?>
   <h1>khong tim thay</h1>
<?php else:?>
   <h4>da tim ra <?php echo mysqli_num_rows($result) ?> ket qua</h4>
   <table class="x-tb" style="width: 100%" align="center">
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
                  <img src="./Hinh_sua/<?php echo $item['Hinh'] ?> " alt=""  srcset="">

               </td>
               <td class="x-td">
                  <strong> Thanh phan dinh duong</strong>
                  <br>
                  <?php echo $item['TP_Dinh_Duong'] ?>
                  <br>
                  <strong> loi ich</strong>
                  <br>
                  <?php echo $item['Loi_ich'] ?>
                  <p><strong>trong luong: </strong> <?php echo $item['Trong_luong']?> gr
                     - <strong>Don gia: <?php echo $item['Don_gia'] ?> VND</strong>
                  </p>
               </td>
            </tr>
         <?php endforeach;?>

      <?php endif;?>
   </table>
<a href="javascript:window.history.back(-1);">Trở về</a>
<?php endif;?>
@endsection

