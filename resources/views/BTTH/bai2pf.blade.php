@extends('adminindex')
@section('pf2')
<?php
const Pi = 3.14;



if(isset($_GET["submit"]) )
{
    $r = $_GET["bankin"];
    if ( is_numeric($r) && $r >= 0)
    {
        $cv = 2*Pi*$r;
        $dt = Pi *$r*$r;
    }else
    {
        $r = "sai du lieu";
    }

}


if(isset($_GET["reset"]) ) header('location:tron.php');


?>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dien tich tron</title>
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
        margin: auto;
        height: auto;
    }

    td {
        text-align: left;
    }

    .right {
        text-align: left;
    }
</style>


<body>

<div class="container">
    <form action="" method="GET">
        <table style="background-color: bisque;width: 70%" align="center">
            <tr>
                <th colspan="2" style="background-color: burlywood;">
                    <h2>DIỆN TÍCH HÌNH TRÒN</h2>
                </th>
            </tr>
            <tr>
                <td class="right">
                    Ban Kinh :
                </td>
                <td>
                    <input type="text" name="bankin" width="30"  value="<?php echo $r ?? '' ?>">
                </td>
            <tr>
                <td class="right">
                    Dien Tich :
                </td>
                <td>
                    <input type="number" style="background-color: pink;" name="dientich" width="30"  readonly value="<?php echo $dt ?? "" ?>">
                </td>
            </tr>
            <tr>
                <td class="right">
                    Chu Vi :
                </td>
                <td>
                    <input type="text" name="dientich" width="30" readonly style="background-color: pink;" value="<?php echo $cv ?? "" ?>">
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
<a href="javascript:window.history.back(-1);">Trở về</a>
</body>

</html>
@endsection
