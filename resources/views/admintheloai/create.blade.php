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
                    <button class="btn btn-primary" type="submit">lưu</button>
                    <button type="reset" class="btn btn-primary">reset</button>

                </td>

            </tr>
        </table>
    </form>
    <a href="javascript:window.history.back(-1);">Trở về</a>
@endsection
