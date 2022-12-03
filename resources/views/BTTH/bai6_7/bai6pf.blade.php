@extends('adminindex')
@section('pf6_7')
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

<form action="{{url('bai6_7pf1')}}" method="GET">
    @csrf
    <table style="width: 70%" align="center">
        <tr >
            <th colspan="2">
                <h1 style="color: cornflowerblue">PHEP TINH TREN HAI SO</h1>
            </th>
        </tr>
        <tr style="color: red">
            <td class="right">Chon phep tinh :</td>
            <td >
                <input type="radio" checked name="phep" value="cong"> cong
                <input type="radio" name="phep" value="tru"> tru
                <input type="radio" name="phep" value="nhan"> nhan
                <input type="radio" name="phep" value="chia"> chia
            </td>
        </tr>
        <tr>
            <td class="right" style="color: cornflowerblue">so thu nhat :</td>
            <td>
                <input style="width: 100%;" type="text" name="a">
            </td>

        <tr>
            <td class="right" style="color: cornflowerblue">so thu hai :</td>
            <td>
                <input style="width: 100%;" type="text" name="b">
            </td>
        </tr>

        <tr align="center">
            <td colspan="2">
                <input type="submit" value="Tinh" >
            </td>
        </tr>

    </table>

</form>
<a href="{{route('BTTH.create')}}">quay trở về</a>
</body>
</html>
@endsection
