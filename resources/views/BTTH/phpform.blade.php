
@extends('adminindex')
@section('pf')
    <table>
            <h2>BÀI TẬP THỰC HÀNH PHP AND FORM</h2>
            <table class="mt-4 table table-hover">
                <tr>
                    <td>
                        <a href="{{url('bai1pf')}}">BÀI TÂP 1</a>
                    </td>
                    <td>
                        <a href="{{url('bai2pf')}}">BÀI TẬP 2</a>
                    </td>
                    <td>
                        <a href="{{url('bai3pf')}}">BÀI TẬP 3</a>
                    </td>
                    <td>
                        <a href="{{url('bai4pf')}}">BÀI TẬP 4</a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="{{url('bai5pf')}}">BÀI TẬP 5</a>
                    </td>
                    <td>
                        <a href="{{url('bai6_7pf')}}">BÀI TẬP 6_7</a>
                    </td>
                    <td>
                        <a href="{{url('bai8pf')}}">BÀI TẬP 8</a>
                    </td>
                </tr>
            </table>
    </table>
@endsection
