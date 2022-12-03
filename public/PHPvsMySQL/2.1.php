<?php
include 'db.php';
$query = "SELECT * FROM hang_sua ";
$result = mysqli_query($conn, $query);

?>
<h1 style="text-align:center; color:blue">THÔNG TIN HÃNG SỮA</h1>
<table align="center" border="1" style="width: 70%">

    <tr>
        <th>Mã HS</th>
        <th>Tên hãng sửa</th>
        <th>địa chỉ</th>
        <th>số điện thoại</th>
    </tr>
    <?php while ($row = mysqli_fetch_array($result)) :?>
        <tr>
            <td><?php echo $row["Ma_hang_sua"]?></td>
            <td><?php echo $row["Ten_hang_sua"] ?> </td>
            <td><?php echo $row["Dia_chi"] ?> </td>
            <td><?php echo $row["Dien_thoai"] ?> </td>
        </tr>
    <?php endwhile;?>
</table>

<?php
mysqli_free_result($result);
mysqli_close($conn);
