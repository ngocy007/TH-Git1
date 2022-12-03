<style type="text/css">
    table.table-style-three {
        font-family: verdana, arial, sans-serif;
        font-size: 11px;
        color: #333333;
        border-width: 1px;
        border-color: #3A3A3A;
        border-collapse: collapse;
    }
    table.table-style-three th {
        border-width: 1px;
        padding: 8px;
        border-style: solid;
        border-color: #FFA6A6;
        background-color: #FFFFFF;
        color: red;
    }
    table.table-style-three tr:hover td {
        cursor: pointer;
    }
    table.table-style-three tr:nth-child(even) td{
        background-color: lightpink;
    }
    table.table-style-three td {
        border-width: 1px;
        padding: 8px;
        border-style: solid;
        border-color: #FFA6A6;
        background-color: #ffffff;
    }
</style>
<?php
include 'db.php';
//phan trang
$rowsPerPage=5;
if ( ! isset($_GET['page']))
    $_GET['page'] = 1;
$offset =($_GET['page']-1)*$rowsPerPage;
//$query="Select * from sua LIMIT $offset, $rowsPerPage";
$query="SELECT `sua`.`Ten_sua`, `sua`.`Trong_luong`, `sua`.`Don_gia`, `hang_sua`.`Ten_hang_sua`, `loai_sua`.`Ten_loai` 
FROM sua CROSS JOIN hang_sua CROSS JOIN loai_sua WHERE `sua`.`Ma_hang_sua`=`hang_sua`.`Ma_hang_sua` and `sua`.`Ma_loai_sua`= `loai_sua`.`Ma_loai_sua` LIMIT $offset, $rowsPerPage;";
$result = mysqli_query($conn,$query);
if (!$result ) die ('<br> <b>Query failed</b>');
$numRows= mysqli_num_rows($result);
$maxPage = ceil($numRows / $rowsPerPage);
if($numRows<>0)
{
    echo "<div style='overflow-x: auto;'>
         <table class='table-style-three' align='center'>
            <tr style='background:pink;'><th colspan='6'><p class='center'>THÔNG TIN SỮA</p></th></tr>
            <tr>
                <th class='center'>STT</th>
                <th>Tên Sữa</th>
                <th>Hãng Sữa</th>
                <th>Loại Sữa</th>
                <th>Trọng Lượng</th>
                <th>Đơn giá</th>	
		    </tr>";
    $temp=$_GET['page']*$rowsPerPage;// danh so thu tu
    if($temp<=$rowsPerPage) $num=0;
    else $num=$temp-$rowsPerPage;
    while($rows=mysqli_fetch_array($result))
    {
        $num++;
        echo "<tr>";
            echo "<td>".$num."</td>";
            echo "<td>{$rows['Ten_sua']}</td>";
            echo "<td>{$rows['Ten_hang_sua']}</td>";
            echo "<td>{$rows['Ten_loai']}</td>";
            echo "<td>{$rows['Trong_luong']} gram</td>";
            echo "<td>{$rows['Don_gia'] } VNĐ</td>";
        echo "</tr>";
    }
    $re = mysqli_query($conn, 'select * from sua');
    $numRows = mysqli_num_rows($re);
    $maxPage = floor($numRows/$rowsPerPage) + 1;
    echo "<tr>";
    echo "<td colspan='6' style='background-color:white;text-align:center'>";
    if ($_GET['page'] > 1){
        echo "<a  href=" .$_SERVER['PHP_SELF']."?page=".($_GET['page']-1).">Back</a> "; //gắn thêm nút Back
    }
    for ($i=1 ; $i<=$maxPage ; $i++)
    {
        if ($i == $_GET['page'])
        {
            echo '<b class="center">'.$i.'</b> '; //trang hiện tại sẽ được bôi đậm
        }
        else {
            echo "<a  href=" . $_SERVER['PHP_SELF'] . "?page=" . $i . "> " . $i . "</a> ";
        }
    }
    if ($_GET['page'] < $maxPage) {
        echo "<a href=" . $_SERVER['PHP_SELF'] . "?page=" . ($_GET['page'] + 1) . ">Next</a>";  //gắn thêm nút Next
    }
    echo "</td>";
    echo "</tr>";
    echo"</table class='table-style-three' align='center'> </div>";
//    echo 'Tong so trang la: '.$maxPage;
}
mysqli_close($conn);
?>