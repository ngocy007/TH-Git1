@extends('adminindex')
    @section('ar2')

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
if (isset($_GET["submit"])) {
    $dayso = $_GET["dayso"];
    $mangso = explode(",", $dayso);
    $tong = 0;
    foreach ($mangso as $key => $value) {
        $tong += $value;
    }

}
?>
<table bgcolor="#ccd9cf" align="center" class="mt-4 table table-hover" style="width: 70%">
    <form action="" method="GET" align="center">
        @csrf
        <th colspan="2" style="text-align: center; background-color: #2e9495;">NHẬP VÀ TÍNH TRÊN DÃY SỐ</th>
        <tr>
            <td>Nhập dãy số:</td>
            <td><input type="text" name="dayso" value="<?php if (isset($_GET["dayso"]))
            {
                    echo $_GET["dayso"];
                }
                ?>"><b style="color: red">(*)</b></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" style="font-size:15px; background-color: #fad390;" name="submit"
                       value="Tổng dãy số"></td>
        </tr>
        <tr>
        <td>Tổng dãy sô:</td>
        <td><input type="text" style="background-color: #b8e994;color: red;" name="tongdayso" readonly
                   value="<?php if (isset($tong)) {
                       echo $tong;
                   } ?>"></td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: center;"><b style="color: red">(*)</b>Các số được nhập cách nhau dấu phẩy
                ","
            </td>
        </tr>
    </form>
</table>
<a href="javascript:window.history.back(-1);">Trở về</a>
</body>
</html>
@endsection
