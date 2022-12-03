<?php
include 'db.php';
if(isset($_GET['submit']) and !empty($_GET['q']))
{

   $q = $_GET['q'];
   $squery = "select * from sua where Ten_sua like '%$q%'";
   $result = mysqli_query($conn,$squery);
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
    <table align="center" >
        <tr>
            <td style="background-color: hotpink;text-align: center"><h1>TÌM KIẾM THÔNG TIN SỬA</h1></td>
        </tr>
        <tr>
            <td style="background-color: lightpink;text-align: center">Tên sửa: <input type="text" name="q" value="<?php echo $q ?? "" ?>"> <button type="submit" name="submit"> Tìm kiếm</button></td>
        </tr>
    </table>
</form>



<?php if(!isset($result)) :?>

<?php elseif(mysqli_num_rows($result) == 0):?>
    <h1>không tìm thấy</h1>
<?php else:?>
    <h4>tìm thấy <?php echo mysqli_num_rows($result) ?> kết quả </h4>
   <table align="center">
      <?php if(mysqli_num_rows($result)!==0) :?>
         <?php foreach ($result as $item ) :?>
          <tr >
              <td colspan="2">
                  <h2>
                     <?php echo $item['Ten_sua'] ?>
                  </h2>
              </td>
          </tr>
            <tr>
               <td>
                   <img src="./imges/<?php echo $item['Hinh'] ?> ">
               </td>
               <td>
                  <strong> Thành phần dinh dưỡng</strong>
                  <br>
                  <?php echo $item['TP_Dinh_Duong'] ?>
                  <br>
                  <strong> lợi ích</strong>
                  <br>
                  <?php echo $item['Loi_ich'] ?>
                  <p><strong style="color: red">Trọng lượng: </strong> <?php echo $item['Trong_luong']?> gr
                     - <strong style="color: red">Đơn giá: <?php echo $item['Don_gia'] ?> VND</strong>
                  </p>
               </td>
            </tr>
         <?php endforeach;?>

      <?php endif;?>
   </table>

<?php endif;?>