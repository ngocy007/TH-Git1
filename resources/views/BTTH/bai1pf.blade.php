@extends('adminindex')
    @section('pf1')
<?php

if (isset($_GET["submit"]))
{
    $d = $_GET['chieudai'];
    $r = $_GET['chieurong'];
    if (empty($d) || empty($r) || !is_numeric($d) || !is_numeric($r)  || $d < 0 || $r < 0)
    {
        $s = 'sai du lieu';
    }
    else if($r > $d) {
        $s = "chieu rong phai be hon chieu dai";
    }
    else
    {
        $s = $d * $r;
    }
}
if (isset($_GET['reset']))
{
    header('location:Hcn2.php');
}

?>
    <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dien tich hinh chu nhat</title>
</head>
<style>
    body {
        width: 100%;
    }

    .container {
        width: 100%;
    }

    form {
        text-align: center;
    }

    table {
        width: auto;
        text-align: center;
    }

    td {
        text-align: left;
    }

    .right {
        text-align: left;
    }
</style>
<!-- nguyen duong, ko trong, rong<dai -->

<body>
<div class="container">
    <form action="" method="GET">
        <table style="background-color: bisque;width: 70%" align="center">
            <tr>
                <th colspan="2" style="background-color: burlywood;">
                    <h2>DIỆN TÍCH HÌNH CHỮ NHẬT</h2>
                </th>
            </tr>
            <tr>
                <td class="right">
                    Chiều dài :
                </td>
                <td>
                    <input type="text" name="chieudai" width="30"
                           value="<?php echo $d ?? '' ?>">
                </td>
            <tr>
                <td class="right">
                    Chiều rộng :
                </td>
                <td>
                    <input type="text" name="chieurong" width="30"
                           value="<?php echo $r ?? '' ?>">
                </td>
            </tr>
            <tr>
                <td class="right">
                    Diện tích :
                </td>
                <td>
                    <input type="text"  width="30" readonly style="background-color: pink;"
                           value="<?php echo $s ?? '' ?>">
                </td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: center;">
                    <input type="submit" name="submit" value="Tính">
                    <input type="submit" name="reset" value="reset">
                </td>
            </tr>
        </table>
    </form>
</div>
<a href="{{route('BTTH.create')}}">Trở về</a>
</body>

</html>
@endsection
