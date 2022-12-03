@extends('adminindex')
@section('pf4')
<?php
$d = 20;
if(isset($_GET["submit"]))
{
    $toan = $_GET["toan"];
    $ly = $_GET["ly"];
    $hoa = $_GET["h"];
    $d = $_GET["d"];
    if (
        is_numeric($toan) &&  is_numeric($ly) && is_numeric($hoa)
        && $hoa >= 0 && $ly >= 0 && $toan >= 0
        &&  $hoa <= 10 && $ly <= 10 && $toan <= 10
    )
    {
        if ($toan === 0 || $ly === 0 || $hoa === 0)
        {
            $s = "rot";

        }
        else
        {
            $tong = $toan + $ly + $hoa;
            $s =  $tong >= $d ? "dau" : "rot";
        }

    }
    else $s = "sai du lieu";

}


if(isset($_GET["reset"]))
{
    header('location:daihoc.php');
}


?>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dai hoc</title>
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
                    <h2>ket qua dai hoc</h2>
                </th>
            </tr>

            <tr>
                <td class="right">
                    toan :
                </td>
                <td>
                    <input type="text" name="toan" width="30" value="<?php  echo $toan ?? ""?>">
                </td>
            </tr>

            <tr>
                <td class="right">
                    Ly :
                </td>
                <td>
                    <input type="text" name="ly" width="30" value="<?php  echo $ly ?? ""?>">
                </td>
            </tr>

            <tr>
                <td class="right">
                    hoa
                </td>
                <td>
                    <input type="text" name="h" width="30" value="<?php  echo $hoa ?? ""?>">
                </td>
            </tr>
            <tr>
                <td class="right">
                    diem chuan:
                </td>
                <td>
                    <input style="color: red;"
                           type="text" name="d"  width="30" value="<?php  echo $d ?>"  >
                </td>
            </tr>
            <tr>
                <td class="right">
                    tong
                </td>
                <td>
                    <input style="background-color: lightyellow"  type="text" readonly name="hoa" width="30" value="<?php  echo $tong ?? ""?>"  >
                </td>
            </tr>


            <tr>
                <td class="right">
                    ket qua
                </td>
                <td>
                    <input style="background-color: lightyellow" type="text" name="s" width="30" readonly
                           value="<?php echo $s ?? "" ?> "
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
