@extends('adminindex')
    @section('ar5')
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php
function thaythe($mangso,$canthaythe,$thaythe)
{
    foreach ($mangso as $key => &$value) {
        if($canthaythe==$value) {
            $value=$thaythe;
        }
    }
    return $mangso;
}
if(isset($_GET['submit']))
{
    $dayso=$_GET['dayso'];
    $mangso=explode(",",$dayso);
    $canthaythe=$_GET['canthaythe'];
    $thaythe=$_GET['thaythe'];
    $mangmoi=thaythe($mangso,$canthaythe,$thaythe);
}
?>
<form method="GET" action="" name="formthaythe">
    <table bgcolor="" align="center" style="width: 70%;">
        <tr style="color: white" bgcolor="#990099">
            <th colspan="2">THAY THẾ</th>
        </tr>
        <tr style="background-color:#fed3f0">
            <td width="30%">Nhập các phần tử</td>
            <td>
                <input style="width: 80%" type="text" name="dayso" value="<?php if (isset($dayso)) { echo $dayso; } ?>">
            </td>
        </tr>
        <tr style="background-color:#fed3f0">
            <td>Giá trị cần thay thế</td>
            <td>
                <input type="text" name="canthaythe" value="<?php if (isset($canthaythe)) { echo $canthaythe;} ?>">
            </td>
        </tr>
        <tr style="background-color:#fed3f0">
            <td>Giá trị thay thế</td>
            <td>
                <input type="text" name="thaythe" value="<?php if (isset($thaythe)) { echo $thaythe; } ?>">
            </td>
        </tr>
        <tr style="background-color:#fed3f0">
            <td> </td>
            <td>
                <input  type="submit" name="submit" style="background-color: #feff9c; font-size:20px" value="Thay thế">
            </td>
        </tr>
        <tr style="background-color: #fdf5ff">
            <td>Mảng cũ</td>
            <td>
                <input type="text"  readonly style="background-color:#ea8685; color:white; width: 80%" value="<?php if(isset($mangso)) print implode('  ',$mangso); ?>">
            </td>
        </tr>
        <tr style="background-color: #fdf5ff">
            <td>Mảng sau khi thay thế</td>
            <td>
                <input type="text" readonly style="background-color:#ea8685; color:white; width: 80%" value="<?php if(isset($_GET['submit'])) print implode('  ',$mangmoi); ?>">
            </td>
        </tr>
        <tr style="background-color: #fdf5ff">
            <td style="text-align: center" colspan="2">(<strong style="color: red;">Ghi chú:</strong> Các phần tử trong mảng sẽ cách nhau bằng dấu ",")</td>
        </tr>
    </table>
</form>
<a href="javascript:window.history.back(-1);">Trở về</a>
</body>
</html>
@endsection
