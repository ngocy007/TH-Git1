@extends('adminindex')
@section('editquyen')
    <form action="{{route('adminquyen.update',$quyen->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <h1>Chỉnh sửa Quyền</h1>

        <table class="mt-4 table table-hover">
            <th>

                <tr>
                    <td>
                        <span class="input-group-text" >Tên Quyền</span>
                    </td>
                    <td>
                        <input class="form-control" type="text" required name="TenQuyen"  value="{{$quyen->TenQuyen}}" placeholder="">
                    </td>
                </tr>
                <tr>
                    <td>
                        <span class="input-group-text" >Chức năng</span>
                    </td>
                    <td>
                        <input class="form-control" type="text" required name="ChucNang"  value="{{$quyen->ChucNang}}" placeholder="">
                    </td>
                </tr>
            </th>
        </table>
        <div class="input-group mb-3">
            <button class="btn btn-primary" type="submit">lưu</button>
            <button type="reset" class="btn btn-primary">reset</button>
        </div>

    </form>
    <a href="javascript:window.history.back(-1);">Trở về</a>
@endsection
