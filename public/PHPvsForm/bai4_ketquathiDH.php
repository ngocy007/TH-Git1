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
            $toan=$_POST['toan'];
            $ly=$_POST['ly'];
            $hoa=$_POST['hoa'];
            $dc=$_POST['dc'];
            $td=$_POST['td'];
            $kq=$_POST['kqt'];

            if(isset($toan) and isset($ly) and isset($hoa) and isset($dc) and $toan<=10 and $toan>=0 and $ly <=10 and $ly >=0 and $hoa <=10 and $hoa >=0 and $dc <= 30  and $dc >0)
            {
                
                 $td=$toan + $ly + $hoa;
                 if($toan >0 and $ly >0 and $hoa >0 and $td >=$dc)
                 {
                    $kq="Đậu";
                 }
                 else{
                    $kq="Rớt";
                 }
            }
            else
            {
                $kq="lỗi: 0<= điểm <=10 or không được bỏ trống";
                if(empty($dc))
                {
                    $dc="không được bỏ trống";
                }


            }
        }
    ?>
    <form action="" method= "post" name="kết qua thi đại học">
        <table align ="center" style="background-color: lightblue">
            <tr style="background-color:orange; text-align:center"><td colspan ="2"><h1>Kết Quả Thi Đại Học</h1></td></tr>
            <tr>
                <td>
                    Toán:
                </td>
                <td>
                    <input type="number" step="any" name="toan" value="<?php if(isset($toan)) echo $toan;else ""; ?>">
                </td>
            </tr>
            <tr>
                <td>
                    Lý:
                </td>
                <td>
                    <input type="number" step="any" name="ly" value="<?php if(isset($ly)) echo $ly;else echo ""; ?>">
                </td>
            </tr>
            <tr>
                <td>
                    Hóa:
                </td>
                <td>
                    <input type="number" step="any" name="hoa" value="<?php if(isset($hoa)) echo $hoa;else echo ""; ?>">
                </td>
            </tr>
            <tr>
                <td>
                    Điểm chuẩn:
                </td>
                <td>
                    <input style="color:red" type="text" name="dc" value="<?php if(isset($dc)) echo $dc;else echo ""; ?>">
                </td>
            </tr>
            <tr>
                <td>
                    Tổng Điểm:
                </td>
                <td>
                    <input type="text" name="td" value="<?php if(isset($td)) echo $td;else echo ""; ?>" readonly>
                </td>
            </tr>
            <tr>
                <td>
                    Kết quả thi:
                </td>
                <td>
                    <input type="text" name="kqt" value="<?php if(isset($kq)) echo $kq;else echo ""; ?>" readonly>
                </td>
            </tr>

            <tr>
                <td align="center" colspan="2">
                    <input type="submit" value="xem kết quả" name="submit">
                    <input type="submit" value="reset" name="reset">
                </td>
                
            </tr>
            
        </table>
    </form>
</body>
</html>