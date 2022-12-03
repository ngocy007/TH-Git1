@extends('adminindex')
@section('pf81')
<?php

$name = !empty($_GET["name"]) ? $_GET["name"] : "0" ;
$add = $_GET["add"] ?? "";
$phone = $_GET["phone"] ?? "";
$sex = $_GET["sex"] ?? "";
$con = $_GET["con"] ?? "";



$php = $_GET["php"] ?? "";
$mysql = $_GET["mysql"] ?? "";
$asp = $_GET["asp"] ?? "";
$ccna = $_GET["ccna"] ?? "";
$secu = $_GET["secu"] ?? "";

$ss =


$content = $_GET["content"] ?? "";



?>

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

<h2>Đăng nhập thành công</h2>
<h2> Ho va ten : <?php echo $name?> </h2>
<h2> Address : <?php echo $add ?>  </h2>
<h2> Phone : <?php echo $phone ?>  </h2>
<h2> Gender : <?php echo $sex ?>  </h2>
<h2> Country : <?php echo $con ?> </h2>
<h2> Study : <?php echo $con ?> </h2>
<h2> Note : <?php echo $content ?>  </h2>
<a href="javascript:window.history.back(-1);">Trở về</a>
</body>
</html>
@endsection
