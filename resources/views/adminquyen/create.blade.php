@extends('adminindex')
@section('createquyen')
    <form action="{{route('adminquyen.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <h2>Thêm quyền người dùng</h2>

        <table class="mt-4 table table-hover">
            <tr style="background-color: lightcoral">
                <td>
                    <span style="font-size: 20px">Tên Quyền</span>
                </td>
                <td>
                    <input class="form-control" type="text" required name="TenQuyen" placeholder="">
                </td>

            </tr>
            <tr style="background-color: lightcoral">
                <td>
                    <span style="font-size: 20px">Chức năng</span>
                </td>
                <td>
                    <input class="form-control" type="text" required name="ChucNang" placeholder="">
                </td>

            </tr>
            <tr>
                <td>
                    <button type="submit" class="btn btn-primary">lưu</button>
                    trở về
                </td>

            </tr>
        </table>
    </form>
@endsection
