@extends('adminindex')
    @section('ar4')
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
function timkiem($mangso,$so)
{
    $ketqua="Không tìm thấy ".$so."trong mảng";
    foreach ($mangso as $key => $value) {
        if($so==$value) {
            $ketqua="Tìm thấy ".$so." tại vị trí thứ ".++$key." của mảng";
        }
    }
    return $ketqua;
}

function xuatmang($mang)
{
    if(isset($mang)) {print implode(", ", $mang);}
}

if(isset($_GET["submit"]))
{
    $dayso = $_GET["dayso"];
    $so = $_GET["so"];
    $mangso = explode(",", $dayso);
    $ketqua = timkiem($mangso,$so);
}

?>

<form method="GET" action="" name="formtimkiem">
    <table bgcolor="#d1ded4" align="center" style="width: 70%;">
        <tr bgcolor="#35979d">
            <th style="color:white;text-align: center" colspan="2">TÌM KIẾM</th>
        </tr>
        <tr>
            <td>Nhập mảng</td>
            <td><input type="text" style="width: 80%" name="dayso" value="<?php if (isset($_GET["dayso"])) {
                    echo $_GET["dayso"];} ?> " >
            </td>
        </tr>
        <tr>
            <td>Nhập số cần tìm</td>
            <td>
                <input type="text" style="width: 20%" name="so" value="<?php if (isset($_GET["so"])) echo $_GET["so"]?>">
            </td>
        </tr>
        <tr>
            <td>  </td>
            <td>
                <input type="submit" style="background-color: cadetblue; font-size: 20px;" name="submit"  value="Tìm kiếm">
            </td>
        </tr>
        <tr>
            <td>Mảng</td>
            <td>
                <input type=text style="width: 80%" readonly value="<?php if(isset($mangso)) xuatmang($mangso); ?>">
            </td>
        </tr>
        <tr>
            <td>Kết quả tìm kiếm</td>
            <td>
                <input type=text style="background-color: #cbfcfa; width: 80%; color: red" value="<?php if(isset($so) && isset($mangso)) echo timkiem($mangso,$so); ?>">
            </td>
        </tr>
        <tr align="center">
            <td colspan="2" readonly style="background: #74b9ff">(Các phần tử trong mảng sẽ cách nhau dấu ",")</td>
        </tr>
    </table>
</form>
<a href="javascript:window.history.back(-1);">Trở về</a>
</body>
</html>
@endsection
