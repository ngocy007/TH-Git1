<?php

$connect = mysqli_connect('localhost','root','','ql_ban_sua',);
mysqli_set_charset($connect,'utf8');
if(!$connect)
{
   die("connect failed ". mysqli_connect_error());
}

