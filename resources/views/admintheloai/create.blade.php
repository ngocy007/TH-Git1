@extends('adminindex')
@section('createtheloai')
    <form action="{{route('admintheloai.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <h2>Thêm Thể Loại Truyện</h2>

        <table class="mt-4 table table-hover">
            <tr style="background-color: lightcoral">
                <td>
                    <span style="font-size: 20px">Tên Loại</span>
                </td>
                <td>
                    <input class="form-control" type="text" required name="TenLoai" placeholder="">
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
