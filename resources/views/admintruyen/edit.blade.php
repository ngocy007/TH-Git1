@extends('adminindex')
@section('edittruyen')
    <form action="{{route('admintruyen.update',$truyen->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <h1>Chỉnh sửa Truyện</h1>

        <table class="mt-4 table table-hover">
            <th>
                <tr>
                    <td>
                        <span class="input-group-text" >Tên truyện</span>
                    </td>
                    <td>
                        <input class="form-control" type="text" required name="TenTruyen"  value="{{$truyen->TenTruyen}}" placeholder="">
                    </td>
                </tr>
                <tr>
                    <td>
                        <span class="input-group-text" >Ảnh Đại Diện</span>
                    </td>
                    <td>
                        <input class="form-control" type="text" required name="AnhDaiDien"  value="{{$truyen->AnhDaiDien}}" placeholder="">
                    </td>
                </tr>
                <tr>
                    <td>
                        <span class="input-group-text" >Đánh Giá</span>
                    </td>
                    <td>
                        <input class="form-control" type="text" required name="DanhGiaTB"  value="{{$truyen->DanhGiaTB}}" placeholder="">
                    </td>
                </tr>
                <tr>
                    <td>
                        <span class="input-group-text" >Lượt Xem</span>
                    </td>
                    <td>
                        <input class="form-control" type="text" required name="LuotXem"  value="{{$truyen->LuotXem}}" placeholder="">
                    </td>
                </tr>
                <tr>
                    <td>
                        <span class="input-group-text" >Mô Tả</span>
                    </td>
                    <td>
                        <input class="form-control" type="text" required name="MoTa"  value="{{$truyen->MoTa}}" placeholder="">
                    </td>
                </tr>
                <tr>
                    <td>
                        <span class="input-group-text" >TRạng Thái</span>
                    </td>
                    <td>
                        <input class="form-control" type="text" required name="TrangThai"  value="{{$truyen->TrangThai}}" placeholder="">
                    </td>
                </tr>
                <tr>
                    <td>
                        <span class="input-group-text" >Tên Tác giả</span>
                    </td>
                    <td>
                        <input class="form-control" type="text" required name="LuotXem"  value="{{$truyen->LuotXem}}" placeholder="">
                    </td>
                </tr>
                <tr>
                    <td>
                        <span class="input-group-text" >Người Đăng</span>
                    </td>
                    <td>
                        <select name="MaNguoiDung" id="" class="form-select" aria-label="Default select example">
                            @foreach( $user as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
            </th>
        </table>
        <div class="input-group mb-3">
            <button type="submit">luu</button>
        </div>

    </form>
@endsection
