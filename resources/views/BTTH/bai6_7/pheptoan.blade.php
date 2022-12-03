@extends('adminindex')
@section('pf6_71')
<?php

function ischeck($a,$b, $phep)
{
    if( !is_numeric($a) || !is_numeric($b) )
    {
        return false;
    }
    if ($phep == "chia" && $b == 0)
    {
        return  false;
    }

    return true;
}

if (isset($_GET["phep"]) && isset($_GET["a"])  && isset($_GET["a"])  )
{

    $phep = $_GET["phep"];
    $a = $_GET["a"];
    $b = $_GET["b"];

    if($phep == "cong" ) $s = $a + $b;
    if($phep == "tru" ) $s = $a - $b;
    if($phep == "nhan" ) $s = $a * $b;
    if($phep == "chia" ) $s = $a / $b;

}
?>
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

<form action="{{url('bai6_7pf1')}}" method="GET">
    @csrf
    <table style="width: 70%" align="center">
        <tr >
            <th colspan="2">
                <h1 style="color: cornflowerblue">PHEP TINH TREN HAI SO</h1>
            </th>
        </tr>
        <tr style="color: red">
            <td class="right">Chon phep tinh :</td>
            <td>
                <?php
                if (isset($_GET["phep"]))
                {
                    echo $phep;
                }

                ?>
            </td>

        </tr>
        <tr>
            <td class="right" style="color: cornflowerblue">so thu nhat :</td>
            <td>
                <input style="width: 100%;" type="text" value="<?php if (isset($_GET["a"])) echo $a;?>" name="a">
            </td>

        <tr>
            <td class="right" style="color: cornflowerblue">so thu hai :</td>
            <td>
                <input style="width: 100%;" type="text"  value="<?php if (isset($_GET["a"])) echo $b;?>"  name="b">
            </td>
        </tr>

        <tr>
            <td class="right" style="color: cornflowerblue">kết quả :</td>
            <td>
                <input style="width: 100%;" type="text"  value="<?php if (isset($s)) echo $s;?>"  name="b">
            </td>
        </tr>
        <a href="javascript:window.history.back(-1);">Trở về</a>
        <tr align="center">
            <td colspan="2">

            </td>
        </tr>

    </table>

</form>

</body>
</html>
@endsection
