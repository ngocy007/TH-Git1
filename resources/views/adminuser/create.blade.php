@extends('adminindex')
@section('createuser')
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <form action="{{route('adminuser.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <h2>Thêm người dùng</h2>

        <table class="mt-4 table table-hover">
            <tr style="background-color: lightcoral">
                <td>
                    <span style="font-size: 20px">Tên người dùng</span>
                </td>
                <td>
                    <input class="form-control" type="text" required name="name" placeholder="">
                </td>

            </tr>
            <tr style="background-color: lightcoral">
                <td>
                    <span style="font-size: 20px">email</span>
                </td>
                <td>
                    <input class="form-control" type="text" required name="email" placeholder="">
                </td>

            </tr>
            <tr style="background-color: lightcoral">
                <td>
                    <span style="font-size: 20px">Anh dai dien</span>
                </td>
                <td>
                    <input class="form-control" id="" type="file" name="profile" placeholder="">
                </td>

            </tr>
            <tr style="background-color: lightcoral">
                <td>
                    <span style="font-size: 20px">Password</span>
                </td>
                <td>
                    <input class="form-control" id="password" type="text" required name="password" placeholder="">
                </td>

            </tr>

            <tr style="background-color: lightcoral">
                <td>
                    <span style="font-size: 20px">NickName</span>
                </td>
                <td>
                    <input class="form-control" type="text" required name="NickName" placeholder="">
                </td>

            </tr>
            <tr style="background-color: lightcoral">
                <td>
                    <span style="font-size: 20px">SDT</span>
                </td>
                <td>
                    <input class="form-control" type="text" required name="SDT" placeholder="">
                </td>

            </tr>
            <tr style="background-color: lightcoral">
                <td>
                    <span style="font-size: 20px">Tên Quyền</span>
                </td>
                <td>
                    <select name="MaQuyen" id="" class="form-select" aria-label="Default select example">
                        @foreach( $quyens as $item)
                            <option value="{{$item->id}}">{{$item->TenQuyen}}</option>
                        @endforeach
                    </select>
                </td>

            </tr>
            <tr>
                <td>
                    <button class="btn btn-primary" type="submit">lưu</button>
                    <button type="reset" class="btn btn-primary">reset</button>
                </td>

            </tr>
        </table>
    </form>
    <a href="javascript:window.history.back(-1);">Trở về</a>
    </html>
@endsection
