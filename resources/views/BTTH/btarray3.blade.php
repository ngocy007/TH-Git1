@extends('adminindex')
    @section('ar3')
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
#var_dump($so);
if (isset($_GET['submit'])) {
    $so =$_GET['n'];
    $so +=0;
    $mang = array();
    $max = 0;
    $min = 0;
    $tong = 0;
    function taomang($so)
    {
        for ($i = 0; $i < $so; $i++) {
            $mang[$i] = rand(0, 20);
        }
        #var_dump($mang);
        return $mang;
    }

    function xuatmang($mang)
    {
        if (isset($mang)) {
            print implode("   ", $mang);
        };
        //return implode("    ",$mang);
    }
    function tinhtong($mang)
    {
        $sum = 0;
        foreach ($mang as $key => $value) {
            $sum += $value;
        }
        return $sum;
    }
    function timmin($mang)
    {
        $min = $mang[0];
        foreach ($mang as $key => $value) {
            if ($min > $value) {
                $min = $value;
            }
        }
        return $min;
    }
    function timmax($mang)
    {
        $max = $mang[0];
        foreach ($mang as $key => $value) {
            if ($max < $value) {
                $max = $value;
            }
        }
        return $max;
    }
    if ($so >= 0 && is_int($so)) {
        $mang = taomang($so);
        $tong = tinhtong($mang);
        $min = timmin($mang);
        $max = timmax($mang);
    } else {
        echo "Số nhập vào không phải số nguyên dương";
    }
}
?>
<form action="" method="GET">
    @csrf
    <table style="border: 1px solid #c44569; width: 70%;" align="center"  >
        <th style="text-align: center; background-color: #990099; color:white" colspan=2>PHÁT SINH MẢNG VÀ TÍNH TOÁN</th>
        <tr style="background-color: lightpink;">
            <td>Nhập số phần tử: </td>
            <td>
                <input type="number" step = "any" name="n" style="font-size:20px" required value="<?php if (isset($so)) echo $so; ?> ">
            </td>
        </tr>
        <tr  style="background-color: lightpink;">
            <td> </td>
            <td>
                <input type="submit" name="submit" style="font-size:20px;background-color: lightgoldenrodyellow;" value="Phát sinh và tính toán">
            </td>
        </tr>
        <tr>
            <td>Mảng: </td>
            <td>
                <input type="text" style="background-color: hotpink;width:90%" readonly value="<?php if (isset($mang)) echo xuatmang($mang); ?>">
            </td>
        </tr>
        <tr>
            <td>GTLN (Max) trong mảng: </td>
            <td>
                <input type="text" name="max" style="background-color: hotpink;" readonly value="<?php if (isset($max)) echo $max; ?> ">
            </td>
        </tr>
        <tr>
            <td>GTNN (Min) trong mảng: </td>
            <td>
                <input type="text" name="min" style="background-color: hotpink;" readonly value="<?php if (isset($min)) echo $min; ?>">
            </td>
        </tr>
        <tr>
            <td>Tổng mảng: </td>
            <td>
                <input type="text" name="tong" style="background-color: hotpink;" readonly value="<?php if (isset($tong)) echo $tong; ?>">
            </td>
        </tr>
        <tr align="center">
            <td colspan="2">(<b style="color:red">Ghi chú</b> Tất cả giá trị trong mảng sẽ từ 0 đến 20)</td>
        </tr>
    </table>
</form>
<a href="{{route('BTTH.index')}}">Trở về</a>
</body>
</html>
@endsection
