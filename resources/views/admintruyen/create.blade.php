@extends('adminindex')
@section('createtruyen')
    <form action="{{route('admintruyen.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <h2>Thêm Mới Truyện</h2>

        <table class="mt-4 table table-hover">
            <tr style="background-color: lightcoral">
                <td>
                    <span style="font-size: 20px">Tên Truyện</span>
                </td>
                <td>
                    <input class="form-control" type="text" required name="TenTruyen" placeholder="">
                </td>

            </tr>
            <tr style="background-color: lightcoral">
                <td>
                    <span style="font-size: 20px">Ảnh Đại Diện</span>
                </td>
                <td>
                    <input class="form-control" type="text" required name="AnhDaiDien" placeholder="">
                </td>

            </tr>
            <tr style="background-color: lightcoral">
                <td>
                    <span style="font-size: 20px">Đánh Giá</span>
                </td>
                <td>
                    <input class="form-control" type="number" step="any" required name="DanhGiaTB" placeholder="">
                </td>

            </tr>
            <tr style="background-color: lightcoral">
                <td>
                    <span style="font-size: 20px">Lượt xem</span>
                </td>
                <td>
                    <input class="form-control" type="number" required name="LuotXem" placeholder="">
                </td>

            </tr>
            <tr style="background-color: lightcoral">
                <td>
                    <span style="font-size: 20px">Mô Tả</span>
                </td>
                <td >
                    <textarea  style="height: 70px;width: 100%" type="text" required name="MoTa" placeholder=""></textarea>
                </td>

            </tr>
            <tr style="background-color: lightcoral">
                <td>
                    <span style="font-size: 20px">Trạng Thái</span>
                </td>
                <td>
                    <select name="TrangThai" id="" class="form-select" aria-label="Default select example">
                        <option value="ngung">Ngừng</option>
                        <option value="dang ra">Đang Ra</option>
                        <option value="hoan thanh">Hoàn Thành</option>
                    </select>
                </td>

            </tr>
            <tr style="background-color: lightcoral">
                <td>
                    <span style="font-size: 20px">Tác Giả</span>
                </td>
                <td>
                    <input class="form-control" type="text" required name="TenTacGia" placeholder="">
                </td>

            </tr>
            <tr style="background-color: lightcoral">
                <td>
                    <span style="font-size: 20px">Người dăng truyện</span>
                </td>
                <td>
                    <select name="MaNguoiDung" id="" class="form-select" aria-label="Default select example">
                        @foreach( $user as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                    </select>
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
