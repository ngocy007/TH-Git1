@extends('adminindex')
    @section('ar6')
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

function swap(&$t, &$p) {
    $tam=$t;
    $t=$p;
    $p=$tam;
}
function sapxep(&$mangso,$tang)
{
    foreach ($mangso as $key => &$value) {
        foreach ($mangso as $ke => &$va) {
            if($va<$value && $tang==true)
            {
                swap($va,$value);
            }
            if($va>$value && $tang==false){
                swap($value,$va);
            }
        }
    }
    return $mangso;
}

if(isset($_GET['submit']))
{
    $dayso=$_GET['dayso'];
    $mangso=explode(",",$dayso);
    $mangtang = sapxep($mangso,false);
    $manggiam=sapxep($mangso,true);
}

?>

<form action="" method="GET">
    @csrf
    <table align="center" style="background-color: #319a98;width: 70%;">
        <tr>
            <th colspan="2" align="center" style="background-color: #3dc1d3;color:white">SẮP XẾP MẢNG</th>
        </tr>
        <tr>
            <td>Nhập mảng</td>
            <td>
                <input type="text" name="dayso" value="<?php if (isset($dayso)) { echo $dayso;}?>">
            </td>
        </tr>
        <tr>
            <td> </td>
            <td>
                <input style="font-size: 15px;color: darkslategrey; background-color: #d1ded4;" type="submit" name="submit" value="Sắp xếp tăng/giảm"><b style="color: red">(*)</b>
            </td>
        </tr>
        <tr style="background-color: lightgreen;">
            <td style="color: red;">Sau khi sắp xếp</td><td></td>
        </tr>
        <tr style="background-color: lightgreen;">
            <td>Tăng dần</td>
            <td>
                <input type="text" value="<?php if(isset($mangtang)) print implode(', ',$mangtang) ?>">
            </td>
        </tr>
        <tr style="background-color: lightgreen;">
            <td>Giảm dần</td>
            <td>
                <input type="text" value="<?php if(isset($manggiam)) print implode(', ',$manggiam) ?>">
            </td>
        </tr>
        <tr align="center">
            <td colspan="2"><b>(*)</b> Các số được nhập cách nhau bằng dấu ","</td>
        </tr>
    </table>
</form>
<a href="javascript:window.history.back(-1);">Trở về</a>
</body>
</html>
@endsection
