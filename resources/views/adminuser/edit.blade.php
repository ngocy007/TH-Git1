@extends('adminindex')
@section('edituser')
    <form action="{{route('adminuser.update',$user->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <h1>Chỉnh sửa người dùng</h1>
        <table class="mt-4 table table-hover">
            <th>
                <tr>
                    <td>
                        <span class="input-group-text" >tên Người dùng</span>
                    </td>
                    <td>
                        <input class="form-control" type="text" required name="name"  value="{{$user->name}}" placeholder="">
                    </td>
                </tr>
                <tr>
                    <td>
                        <span class="input-group-text" >Email</span>
                    </td>
                    <td>
                        <input class="form-control" type="text" required name="email"  value="{{$user->email}}" placeholder="">
                    </td>
                </tr>
                <tr>
                    <td>
                        <span class="input-group-text" >NikName</span>
                    </td>
                    <td>
                        <input class="form-control" type="text" required name="NickName"  value="{{$user->NickName}}" placeholder="">
                    </td>
                </tr>
                <tr>
                    <td>
                        <span class="input-group-text" >SDT</span>
                    </td>
                    <td>
                        <input class="form-control" type="text" required name="SDT"  value="{{$user->SDT}}" placeholder="">
                    </td>
                </tr>

                <tr>
                    <td>
                        <span class="input-group-text" >Cấp quền</span>
                    </td>
                    <td>
                        <select name="MaQuyen" id="" class="form-select" aria-label="Default select example">
                            @foreach($quyen as $item)
                                <option value="{{$item->id}}">{{$item->TenQuyen}}</option>

                            @endforeach
                        </select>
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
