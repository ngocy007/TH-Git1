@extends('adminindex')
    @section('ar1')
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
$mang = array();
$sochan=0;
$nhohon=0;
$tongsoam=0;
function taomang($so)
{
    $mang = array();
    for ($i = 0; $i < $so; $i++) {
        $mang[$i] = rand(-1000, 1000);
    }
    return $mang;
}

function xuatmang($mang)
{
    if (isset($mang)) {
        print implode("   ", $mang);
    }
}

function demsochan($mang)
{
    $sochan = 0;
    foreach ($mang as $key => $value) {
        if ($value % 2 == 0) {
            $sochan += 1;
        }
    }
    return $sochan;
}

function demhonkhong($mang)
{
    $nhohon = 0;
    foreach ($mang as $key => $value) {
        if ($value < 100) {
            $nhohon += 1;
        }
    }
    return $nhohon;
}

function tongsoam($mang)
{
    $tongsoam = 0;
    $dem = 0;
    foreach ($mang as $key => $value) {
        if ($value < 0) {
            $tongsoam += $value;
            $dem++;
        }
    }
    if ($dem == 0) echo "Khong ton tai so am trong mang";
    return $tongsoam;
}

function bangkhong($mang)
{
    $bangkhong = array();
    foreach ($mang as $key => $value) {
        $j = 0;
        if ($value == 0) {
            $bangkhong[$j++] = $key;
        }
    }
    return $bangkhong;
}

function sapxep($mang)
{
    $mangsx = $mang;
    #var_dump($mangsx);
    for ($i = 0; $i < count($mang) - 1; $i++) {
        for ($j = $i + 1; $j < count($mang); $j++) {
            if ($mangsx[$i] > $mangsx[$j]) {
                $tam = 0;
                $tam = $mangsx[$i];
                $mangsx[$i] = $mangsx[$j];
                $mangsx[$j] = $tam;
            }
        }
    }
    #var_dump($mangsx);
    return $mangsx;
}

function simple_quick_sort($arr)
{
    if (count($arr) <= 1) {
        return $arr;
    } else {
        $pivot = $arr[0];
        $left = array();
        $right = array();
        for ($i = 1; $i < count($arr); $i++) {
            if ($arr[$i] < $pivot) {
                $left[] = $arr[$i];
            } else {
                $right[] = $arr[$i];
            }
        }
        return array_merge(simple_quick_sort($left), array($pivot), simple_quick_sort($right));
    }
}

?>
<div style="float: left;width: 50%">
    <form action="" method="GET">
        @csrf
        <table style="background-color: #b8e994;width: 100%" align="center" class="mt-4 table table-hover">
            <h2 style="text-align: center;" colspan=2 bgcolor="#c44569">Ki???m Tra N</h2>
            <tr>
                <td>Nh???p n:</td>
                <td>
                    <input bgcolor="yellow" type="Number" step="any" name="number" required value="<?php if (isset($so)) echo $so;else echo ""; ?>">
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" style="font-size:20px; background-color: #FC427B;" name="submit" value="Th???c hi???n">
                </td>
            </tr>
        </table>
    </form>
    <a href="{{route('BTTH.index')}}">Tr??? v???</a>
</div>
<?php
if (isset($_GET['submit'])) {
    $so = $_GET['number'];
    $so += 0;
    if ($so > 0 && is_int($so)) {
        $mang = taomang($so);
        $sochan = demsochan($mang);
        $nhohon = demhonkhong($mang);
        $tongsoam = tongsoam($mang);
        $bangkhong = bangkhong($mang);
        $mangsx = simple_quick_sort($mang);
?>
        <div>
            <h1 style="text-align: center">K???t qu???</h1>
            <table boder="radius" class="mt-4 table table-hover" style="width: 50%">
                <tr>
                    <td>M???ng ph??t sinh:</td>
                    <td>
                        <textarea cols="20" rows="4"
                                  readonly><?php if (isset($mang)) {
                                print implode(", ", $mang);
                            } ?> </textarea>
                    </td>
                </tr>
                <tr>
                    <td>T???ng s??? ch???n trong m???ng:</td>
                    <td>
                        <input type="text" name="sochan" readonly value="<?php if (isset($sochan)) echo $sochan; ?>">
                    </td>
                </tr>
                <tr>
                    <td>S??? ph???n t??? nh??? h??n 100:</td>
                    <td>
                        <input type="text" name="nhohon" readonly value="<?php if (isset($nhohon)) echo $nhohon; ?>">
                    </td>
                </tr>
                <tr>
                    <td>T???ng s??? ??m:</td>
                    <td>
                        <input type="text" name="tongsoam" readonly value="<?php if (isset($tongsoam)) echo $tongsoam; ?>">
                    </td>
                </tr>
                <tr>
                    <td>V??? tr?? c??c ph???n t??? b???ng 0:</td>
                    <td>
                        <textarea cols="20" rows="4"
                                  readonly><?php if (isset($bangkhong)) {
                                print implode(", ", $bangkhong);
                            } ?> </textarea>
                    </td>
                </tr>
                <tr>
                    <td>M???ng ???? s???p x???p:</td>
                    <td>
                        <textarea cols="20" rows="4"
                                  readonly><?php if (isset($mangsx)) {
                                print implode(", ", $mangsx);
                            } ?> </textarea>
                    </td>
                </tr>
            </table>
        </div>
<?php
    } else {
        ?> <p style="color:red;text-align: center"><?php echo "S??? nh???p v??o kh??ng ph???i s??? nguy??n d????ng!"?></p><?php
    }
}
?>
</body>
</html>
@endsection
