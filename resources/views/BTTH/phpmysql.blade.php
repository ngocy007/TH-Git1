@extends('adminindex')
@section('psql')
            <h2>BÀI TẬP THỰC HÀNH PHP AND MYSQL</h2>
            <table class="mt-4 table table-hover">
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
@endsection
