<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "truyen";
$conn = mysqli_connect($servername, $username, $password, $database);
mysqli_set_charset($conn, 'utf8');

$resuil = "SELECT * FROM users,Quyen Where users.MaQuyen=Quyen.id ";
