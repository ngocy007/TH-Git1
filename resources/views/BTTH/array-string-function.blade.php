@extends('adminindex')
@section('array')
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
        <form action="#">
            <table>
                <div class="mt-4">
                    <h2>BÀI TẬP THỰC HÀNH ARRAY-STRING-FUNCTION</h2>
                    <table class="mt-4 table table-hover" align="center">
                        <tr>
                            <td>
                                <a href="{{url('btarray1')}}">BÀI TÂP 1</a>
                            </td>
                            <td>
                                <a href="{{url('btarray2')}}">BÀI TẬP 2</a>
                            </td>
                            <td>
                                <a href="{{url('btarray3')}}">BÀI TẬP 3</a>
                            </td>
                            <td>
                                <a href="{{url('btarray4')}}">BÀI TẬP 4</a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a href="{{url('btarray5')}}">BÀI TẬP 5</a>
                            </td>
                            <td>
                                <a href="{{url('btarray6')}}">BÀI TẬP 6</a>
                            </td>
                            <td>
                                <a href="{{url('btarray7')}}">BÀI TẬP 7</a>
                            </td>
                        </tr>
                    </table>
                </div>
            </table>
        </form>
    </div>
    </body>
    </html>
@endsection
