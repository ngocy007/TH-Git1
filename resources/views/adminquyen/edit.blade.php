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
            <button type="submit">lưu</button>
        </div>

    </form>
@endsection
