<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Them Truyen</h1>
    <form action="store" method="post" enctype="multipart/form-data">
        @csrf
        <input type="text" name="TenTruyen">
        <input type="file" name="AnhDaiDien">
        <input type="text" name="MoTa">
        <input type="text" name="TrangThai">
        <input type="text" name="TenTacGia">
        <input type="text" name="MaNguoiDung">
        <button type="submit">submit</button>
    </form>
</body>
</html>