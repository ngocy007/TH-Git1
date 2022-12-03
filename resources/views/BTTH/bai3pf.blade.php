@extends('adminindex')
@section('pf3')
<?php
$price = 20000;
if(isset($_GET["submit"]) )
{
    $name = $_GET["name"];
    $oldnum = $_GET["oldnum"];
    $newnum = $_GET["newnum"];
    $price = $_GET["price"];
    if (
        is_numeric($_GET["oldnum"]) &&  is_numeric($_GET["newnum"])
        && $_GET["oldnum"] > 0 && $_GET["newnum"] > 0
        && ($_GET["newnum"] - $_GET["oldnum"]) > 0
    )
    {
        $s = ($newnum - $oldnum) * $price;
    }
    else {
        $s = "sai du lieu";
    }
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
        width: 70%;
        text-align: center;
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
        <table style="background-color: bisque;" align="center">
            <tr>
                <th colspan="2" style="background-color: burlywood;">
                    <h2>THANH TOAN TIEN DIEN</h2>
                </th>
            </tr>

            <tr>
                <td class="right">
                    Ten chu ho :
                </td>
                <td>
                    <input type="text" name="name" width="30" value="<?php echo  $name ?? ""?>"  >
                </td>
            </tr>

            <tr>
                <td class="right">
                    chi so cu :
                </td>
                <td>
                    <input type="text" name="oldnum" width="30" value="<?php echo  $oldnum ?? ""?>"  >
                </td>
            </tr>

            <tr>
                <td class="right">
                    chi so moi :
                </td>
                <td>
                    <input type="text" name="newnum" width="30" value="<?php echo  $newnum ?? ""?>"  >
                </td>
            </tr>

            <tr>
                <td class="right">
                    don gia :
                </td>
                <td>
                    <input type="text" name="price"  width="30" value="<?php echo $price ?? '' ?>"  >
                </td>
            </tr>

            <tr>
                <td class="right">
                    so tien thanh toan :
                </td>
                <td>
                    <input style="background-color: pink" type="text" name="s" width="30" readonly
                           value="<?php echo $s ?? '' ?> "
                    >
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
