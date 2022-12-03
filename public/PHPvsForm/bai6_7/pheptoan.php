<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>pheptoan.php</title>
    <link href='css.css' rel="stylesheet" type="text/css">
</head>

<body>
    <?php
    if (isset($_POST["submit"])) {
        $so1 = filter_input(INPUT_POST, 'a', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $so2 = filter_input(INPUT_POST, 'b', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        switch ($_POST["phep_tinh"]) {
            case "Cong": {
                    $pheptinh = "Cong";
                    $ketqua = $so1 + $so2;
                    break;
                }
            case "Tru": {
                    $pheptinh = "Tru";
                    $ketqua = $so1 - $so2;
                    break;
                }
            case "Nhan": {
                    $pheptinh = "Nhan";
                    $ketqua = $so1 * $so2;
                    break;
                }
            case "Chia": {
                    $pheptinh = "Chia";
                    if ($so2 == 0)
                        $ketqua = 'Không thể chia cho 0, hãy nhập lại';
                    else 
                        $ketqua = $so1 / $so2;
                    break;
                }
            default:
                echo "Sai phep toan. Can nhap lai";
        };
    }
    ?>

    <table align="center">
        <tr>
            <td colspan="2">
                <h1>PHEPSP TÍNH TÊN 2 SỐ
                </h1>
            </td>
        <tr>
            <td class="pheptinh">Phép tính đã chọn: </td>
            <td class="pheptinh">
                <p> <?php echo $pheptinh ?></p>
            </td>
        </tr>
        <tr>
            <td class="so">so thứ nhất: </td>
            <td>
                <input type="text" name="so1" value="<?php echo $so1 ?>">
            </td>
        </tr>
        <tr>
            <td class="so">Số thứ hai: </td>
            <td>
                <input type="text" name="so2" value="<?php echo $so2 ?>">
            </td>
        </tr>
        <tr>
            <td class="so">Kết quả: </td>
            <td> <input type="text" name="ketqua" value="<?php echo $ketqua ?>"> </td>
        </tr>
        <tr>
            <td></td>
            <td><a href="javascript:window.history.back(-1);">trở về</a></td>
        </tr>
    </table>

</body>

</html>