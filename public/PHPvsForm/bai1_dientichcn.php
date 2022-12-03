<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php

define("PI",3.14);
if(isset($_POST['submit']))
{
    $d=$_POST['cd'];
    $r=$_POST['cr'];
    if(isset($r) and is_numeric($r) and $r >0 and isset($d) and is_numeric($d) and $d >0)
    {
        $s=($r+$d)/2;

    }
    else
    {
        $s="chiều dài và rộng là số dương";

    }
}
?>
<form action="" method= "post" name="cdiện tích chữ nhật">
    <table align ="center" style="background-color: lightgreen">
        <tr style="background-color:orange"><td colspan ="2"><h1>DIỆN TÍCH HÌNH CHỮ NHẬT</h1></td></tr>
        <tr>
            <td>
                Chiều dài:
            </td>
            <td>
                <input type="text" name="cd" value="<?php if(isset($d)) echo $d; ?>">
            </td>
        </tr>
        <tr>
            <td>
                Chiều rộng:
            </td>
            <td>
                <input type="text" name="cr" value="<?php if(isset($r)) echo $r; ?>">
            </td>
        </tr>
        <tr>
            <td>
                Diện tích:
            </td>
            <td>
                <input style="background-color:lightpink" type="text" name="dt" value="<?php if(isset($s)) echo $s; else echo ""; ?>" readonly>
            </td>
        </tr>
        <tr>
            <td align="center" colspan="2">
                <input type="submit" value="tính" name="submit">
                <input type="submit" value="clear" name="reset">
            </td>

        </tr>
    </table>
</form>
</body>
</html>