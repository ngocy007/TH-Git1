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
            $r=$_POST['bk'];
            if(isset($r) and is_numeric($r) and $r >0)
            {
                $s=PI*$r*$r;
                 $p=PI*2*$r;
            }
            else
            {
                $r="bán kính là số dương";

            }
        }
    ?>
    <form action="" method= "post" name="chuvi và diện tích hình tròn">
        <table align ="center" style="background-color: lightgreen">
            <tr style="background-color:orange"><td colspan ="2"><h1>diện tích và chu vi hình tròn</h1></td></tr>
            <tr>
                <td>
                    Bán kính:
                </td>
                <td>
                    <input type="text" name="bk" value="<?php if(isset($r)) echo $r; ?>">
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
                <td>
                    Chu vi:
                </td>
                <td>
                    <input style="background-color:lightpink" type="text" name="cv" value="<?php if(isset($p)) echo $p; else echo ""; ?>" readonly>
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