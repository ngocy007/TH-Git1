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
        if(isset($_POST['submit']))
        {
            $dg=$_POST['dg'];
            $csc=$_POST['csc'];
            $csm=$_POST['csm'];
            $tt=$_POST['tt'];
            $ch=$_POST['ch'];
            if(isset($csc) and isset($csm) and $csc>0 and $csm >0 and $csm > $csc)
            {
                
                 $tt=($csm - $csc)*$dg;
            }
            else
            {
                $tt="chỉ số mới phải lớn hơn chỉ số cũ và lớn hơn 0 ";


            }
        }
    ?>
    <form action="" method= "post" name="tính tiền điện">
        <table align ="center" style="background-color: lightblue">
            <tr style="background-color:orange; text-align:center"><td colspan ="3"><h1>Thanh Toán Tiền Điện</h1></td></tr>
            <tr>
                <td>
                    Tên chủ hộ:
                </td>
                <td>
                    <input type="text" name="ch" value="<?php if(isset($ch)) echo $ch; else echo ""; ?>">
                </td>
            </tr>
            <tr>
                <td>
                    Chỉ số cũ:
                </td>
                <td>
                    <input type="number" step="any" name="csc" value="<?php if(isset($csc)) echo $csc; else echo ""; ?>">
                </td>
                <td>
                    (Kw)
                </td>
            </tr>
            <tr>
                <td>
                    Chỉ số mới:
                </td>
                <td>
                    <input type="number" step ="any" name="csm" value="<?php if(isset($csm)) echo $csm; else echo ""; ?>">
                </td>
                <td>
                    (Kw)
                </td>
            </tr>
            <tr>
                <td>
                    Đơn giá:
                </td>
                <td>
                    <input style="color:red" type="text" name="dg" value="20000">
                </td>
                <td>
                    (VND)
                </td>
            </tr>
            <tr>
                <td>
                    Số tiền thanh toán:
                </td>
                <td>
                    <input style="background-color:lightpink" type="text" name="tt" value="<?php if(isset($tt)) echo $tt; ?>" readonly>
                </td>
                <td>
                    (VND)
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