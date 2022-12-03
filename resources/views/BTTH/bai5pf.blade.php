@extends('adminindex')
@section('pf5')
<?php

if(isset($_GET["submit"]) ) //&& $_POST["hk"] > $_POST["hs"]
{
    $hs = $_GET["hs"];
    $hk = $_GET["hk"];
    $dhs = explode(":",$hs);
    $dhk = explode(":",$hk);
    $kqhs = $dhs[0] + round($dhs[1]/60,2) ;
    $kqhk = $dhk[0] + round($dhk[1]/60,2) ;


    if($kqhk > $kqhs )
    {

        if( $kqhs < 10  || $kqhk < 10 ) $s = "khong trong h lam viec";
        else
        {

            if($kqhs >= 10 && $kqhk <= 17)
            {
                $s = ($kqhk - $kqhs)* 20000;

            }else if($kqhs > 17 && $kqhk <= 24)
            {
                $s = ($kqhk - $kqhs) * 45000;
            }
            else
            {
                $s = (17 - $kqhs)*20000 + (24 - $kqhk)*45000;
            }
        }
    }
    else $s = "gio ket thuc phai lon hon gio lam viec";
}

?>

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
        <table style="background-color: forestgreen;" align="center">
            <tr>
                <th colspan="2" style="background-color: darkgreen;">
                    <h2 style="color: aliceblue">Tinh Tien Karaoke</h2>
                </th>
            </tr>

            <tr>
                <td class="right">
                    gio bat dau :
                </td>
                <td>
                    <input type="time" name="hs" width="30" value="<?php echo $hs ?? "" ?>"  >
                    (h)
                </td>
            </tr>

            <tr>
                <td class="right">
                    gio ket thuc:
                </td>
                <td>
                    <input type="time" name="hk" width="30" value="<?php echo $hk ?? "" ?>"  >
                    (h)
                </td>
            </tr>

            <tr>
                <td class="right">
                    so tien thanh toan :
                </td>
                <td>
                    <input style="background-color: yellow" type="text" name="s" width="30" readonly
                           value="<?php echo $s ?? "" ?> "
                    >
                    (VND)
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
