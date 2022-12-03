<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Bài 6</title>
    <link href='css.css' rel="stylesheet" type="text/css">
</head>

<body>

    <form action="pheptoan.php" method="POST">
        <table align="center">
            <tr>
                <td colspan="2">
                    <h1 STYLE="color: blue">
                        PHÉP TÍNH TRÊN 2 SỐ
                    </h1>
                </td>
            <tr>
                <td class="pheptinh">Chọn phép tính: </td>
                <td style="color: red" class="second-right">
                    <input type="radio" name="phep_tinh" value="Cong" required>Cộng
                    <input type="radio" name="phep_tinh" value="Tru"> Trừ
                    <input type="radio" name="phep_tinh" value="Nhan"> Nhân
                    <input type="radio" name="phep_tinh" value="Chia"> chia
                </td>
            </tr>
            <tr>
                <td class="so">Số thứ nhất: </td>
                <td>
                    <input type="number" step="any" name="a" value="<?php echo $a ?? '' ?>">
                </td>
            </tr>
            <tr>
                <td class="so">số thứ hai: </td>
                <td>
                    <input type="number" step="any" name="b" value="<?php echo $b ?? '' ?>">
                </td>
            </tr>
            <tr>
                <td></td>
                <td> <input type="submit" name="submit" value="Tính"> </td>
            </tr>
            </tr>
        </table>
    </form>

</body>

</html>