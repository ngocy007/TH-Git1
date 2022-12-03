<style type="text/css">
    table.table-style-three {
        font-family: verdana, arial, sans-serif;
        font-size: 11px;
        color: #333333;
        border-width: 1px;
        border-color: #FFFFFF;
        border-collapse:collapse;
    }
    table.table-style-three th {
        border-width: 1px;
        padding: 8px;
        border-style: solid;
        border-color: #333333;
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
        border-color: #333333;
        background-color: #ffffff;
    }
</style>
<?php
include 'db.php';
$query = "SELECT * FROM khach_hang";
$result = mysqli_query($conn,$query);
?>
<h1 style="text-align:center;">THÔNG TIN KHÁCH HÀNG</h1>
<table class="table-style-three" align="center" style="width: 70%">

    <tr>
        <th>Mã khách hàng</th>
        <th>Tên khách hàng</th>
        <th>Giới tính</th>
        <th>Địa chỉ</th>
        <th>số điện thoại</th>
    </tr>
    <?php while ($row = mysqli_fetch_array($result)) :?>
        <tr >
            <td><?php echo $row["Ma_khach_hang"] ?> </td>
            <td><?php echo $row["Ten_khach_hang"] ?> </td>
            <td><img style="width:50px; float:inherit" src="<?php if($row["Phai"]==0) echo "./imges/boy.jfif"; else echo "./imges/girl.jfif"?>" alt=""></td>
            <td><?php echo $row["Dia_chi"] ?> </td>
            <td><?php echo $row["Dien_thoai"] ?> </td>
        </tr>
    <?php endwhile;?>
</table>

<?php
//dong ket noi
mysqli_free_result($result);
mysqli_close($conn); 