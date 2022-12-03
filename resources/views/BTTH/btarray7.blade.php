@extends('adminindex')
    @section('ar7')
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

if (isset($_GET['submit'])) {
    $duonglich = $_GET['duonglich'];
    $mangcan = array("Quý", "Giáp", "Ất", "Bính", "Đinh", "Mậu", "Kỷ", "Canh", "Tân", "Nhâm");
    $mangchi = array("Hợi", "Tý", "Sửu", "Dần", "Mão", "Thìn", "Tỵ", "Ngọ", "Mùi", "Thân", "Dậu", "Tuất");
    $manghinh = array("hoi.png", "ty.png", "suu.png", "dan.png", "mao.png", "thin.jpg", "ti.jfif", "ngo.png", "mui.png", "than.png", "dau.png", "tuat.jpg");
    $namtinh=$duonglich-3;
    $can = $namtinh%10;
    $chi = $namtinh%12;
    $namal = $mangcan[$can];
    $namal = $namal." ".$mangchi[$chi];
    $hinh = $manghinh[$chi];
    $hinhanh = "<img style='wtdth:100px;height: 100px' src='images/$hinh'>";
}

?>
<form method="GET" action="" name="formtinhnamamlich">
    <table align="center" style="background-color: #74b9ff;width: 70%;">
        <tr style="background-color: #0984e3; color: white">
            <td colspan="3" align="center">TÍNH NĂM ÂM LỊCH</td>
        </tr>
        <tr>
            <td>Năm dương lịch</td>
            <td> </td>
            <td>Năm âm lịch</td>
        </tr>
        <tr>
            <td>
                <input type="text" style="width: 80%;margin-left:30px" name="duonglich" value="<?php if(isset($duonglich)) echo $duonglich; ?>">
            </td>
            <td align="center">
                <input type="submit" style="background-color: #fab1a0; color: red; width:70%;margin-right:30px" name="submit" value=" =>">
            </td>
            <td>
                <input type="text" style="background-color: #fab1a0; color: red; width:80%" name="amlich" readonly
                       value="<?php if(isset($namal)) echo $namal;  ?>">
            </td>
        </tr>
        <tr>
            <td colspan="3" align="center"><?php if(isset($hinhanh)) echo $hinhanh; ?></td>
        </tr>
    </table>
</form>
<a href="{{route('BTTH.index')}}">Trở về</a>
</body>
</html>
@endsection
