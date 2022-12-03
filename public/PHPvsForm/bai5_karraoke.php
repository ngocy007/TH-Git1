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


    if (isset($_POST['submit'])) {
        $B = $_POST['B'];
        $K = $_POST['K'];
        $TT = $_POST['TT'];
        if ($B >= $K)
            $TT = "giờ KT  > giờ BĐ";
        elseif ($B > 24 || $K > 24)
            $TT = "Nhập sai giờ";
        elseif ($B < 10 || $K < 10)
            $TT = ((17 < $K) ? ((17 - 10) * 20000 + ($K - 17) * 45000) : ($K - 10) * 20000) > 0 ? (17 < $K) ? ((17 - 10) * 20000 + ($K - 17) * 45000) : ($K - 10) * 20000 : "Giờ nghỉ";
        else $TT = (17 < $K) ? ((17 - $B) * 20000 + ($K - 17) * 45000) : ($K - $B) * 20000;
    }
    ?>
    <form action="" method="post">
        <table align="center" style="background-color: lightblue">
            <tr style="background-color:orange; text-align:center">
                <td colspan="3">
                    <h1>Tính Tiền Karaoke</h1>
                </td>
            </tr>
            <tr>
                <td>
                    Giờ bắt đầu:
                </td>
                <td>
                    <input type="number" step="any" name="B" value="<?php if (isset($B)) echo $B;
                                                        else echo ""; ?>">
                </td>
                <td>
                    (h)
                </td>
            </tr>
            <tr>
                <td>
                    Giờ kết thúc:
                </td>
                <td>
                    <input type="number" step="any" name="K" value="<?php if (isset($K)) echo $K;
                                                        else echo ""; ?>">
                </td>
                <td>
                    (h)
                </td>

            </tr>

            <tr>
                <td>
                    Tiền thanh toán:
                </td>
                <td>
                    <input type="text" name="TT" value="<?php if (isset($TT)) echo $TT ?>" readonly>
                </td>
                <td>
                    (VND)
                </td>

            </tr>

            <tr>
                <td align="center" colspan="2">
                    <input type="submit" value="Tính tiền" name="submit">
                    <input type="submit" value="clear" name="reset">
                </td>

            </tr>
        </table>
    </form>
</body>

</html>