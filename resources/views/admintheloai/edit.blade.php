@extends('adminindex')
@section('edittheloai')
    <form action="{{route('admintheloai.update',$theloai->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <h1>Chỉnh sửa thể loại</h1>

        <table class="mt-4 table table-hover">
            <th>

                <tr>
                    <td>
                        <span class="input-group-text" >Tên loại</span>
                    </td>
                    <td>
                        <input class="form-control" type="text" required name="TenLoai"  value="{{$theloai->TenLoai}}" placeholder="">
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
