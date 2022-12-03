@extends('adminindex')
@section('29')
<?php
$connect = mysqli_connect('localhost','root','','ql_ban_sua',);
mysqli_set_charset($connect,'utf8');
if(!$connect)
{
    die("connect failed ". mysqli_connect_error());
}
if(isset($_GET['submit']) and !empty($_GET['q']))
{

   $q = $_GET['q'];
   $sql = "select * from sua where Ten_sua like '%$q%'";
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

       table{
           width: 100%;
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
           background-color: #feece2;
           font-size:20px ;
           padding: 20px;
       }
       th{
           background-color: #ffeee6;
       }
       td:has(img){
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
       td:has(h2){
           color: #e87132;
           font-style: italic;
           text-align: center;
            background-color: #ffeee6;
       }
   </style>

<form action="" method="get">
   <h1>Tim kiem thong tin</h1>
   ten sua: <input type="text" name="q" value="<?php echo $q ?? "" ?>">
   <button type="submit" name="submit"> tim kiem</button>
</form>

<a href="javascript:window.history.back(-1);">Trở về</a>

<?php if(!isset($result)) :?>

<?php elseif(mysqli_num_rows($result) == 0):?>
    <h1>khong tim thay</h1>
<?php else:?>
    <h4>da tim ra <?php echo mysqli_num_rows($result) ?> ket qua</h4>
   <table>
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
                  <img src="./Hinh_sua/<?php echo $item['Hinh'] ?> " alt=""  srcset="">

               </td>
               <td>
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

