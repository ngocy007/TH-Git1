@extends('adminindex')
@section('pf8')
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

<form action="{{url('bai8pf1')}}" method="GET" >
    <table style="width: 70%" align="center">
        <tr>
            <h1>Enter Your Information</h1>
        </tr>
        <tr>
            <td class="right">full name</td>
            <td>
                <input type="text" name="name">
            </td>
        </tr>
        <tr>
            <td class="right">address</td>
            <td>
                <input type="text" name="add">
            </td>
        </tr>
        <tr>
            <td class="right">phone</td>
            <td>
                <input type="text" name="phone">
            </td>
        </tr>
        <tr>
            <td class="right">gender</td>
            <td>
                <input type="radio" name="sex" value="nam" checked> Nam
                <input type="radio" name="sex" value="nu"> Nu
            </td>
        </tr>
        <tr>
            <td class="right">country</td>
            <td>
                <select name="con">
                    <option value="Viet Nam">Viet Nam</option>
                    <option value="My">My</option>
                    <option value="Trung Quoc">Trung Quoc</option>
                </select>
            </td>

        </tr>
        <tr>
            <td class="right">study</td>
            <td>
                <input type="checkbox" name="php" value="php" > PHP
                <input type="checkbox" name="mysql" value="mysql" > MySQL
                <input type="checkbox" name="asp" value="asp" > ASP.NET
                <input type="checkbox" name="ccna" value="ccna" > CCNA
                <input type="checkbox" name="secu" value="secu" > Security+
            </td>
        </tr>
        <tr>
            <td>Note</td>
            <td >
                <textarea name="content" rows="5" style="width: 100%"></textarea>
            </td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type="submit" value="gui">
                <input type="reset" value="huy">
            </td>
        </tr>
    </table>
</form>
<a href="javascript:window.history.back(-1);">Trở về</a>
</body>
</html>
@endsection
