@extends('adminindex')
@section('indextruyen')
<div class="mt-4">
<h2>Danh Sách Truyện</h2>
    <div class="mt-4">
        <a class="btn btn-primary" href="{{route('admintruyen.create')}}">Thêm mới truyện</a>
        <div>
            @if(Session::has('thongbao'))
                {{Session::get('thongbao')}}
            @endif
        </div>
    <table class="mt-4 table table-hover">
        <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">Tên truyện</th>
            <th scope="col">Ảnh đại diện</th>
            <th scope="col">Đánh giá</th>
            <th scope="col">Lượt Xem</th>
            <th scope="col">Mô tả</th>
            <th scope="col">Trạng Thái</th>
            <th scope="col">Tác Giả</th>
            <th scope="col">Được đăng bởi</th>

        </tr>
        </thead>
        <tbody>

        @foreach ($truyens as $item)
            <tr>
                <td >{{ $item->id }}</td>
                <td>{{ $item->TenTruyen }}</td>
                <td><img src="{{asset('storage/'.$item->AnhDaiDien)}}" class="card-img-top" alt="..."></td>
                <td>{{ $item->DanhGiaTB }}</td>
                <td>{{ $item->LuotXem }}</td>
                <td>{{ $item->MoTa }}</td>
                <td>{{ $item->TrangThai }}</td>
                <td>{{ $item->TenTacGia }}</td>
                @foreach($item->User as $t)
                    <td>
                        {{$t->name}}
                    </td>
                @endforeach
                <td>
                    <form action="{{route('admintruyen.destroy',$item->id)}}" method="post">
                        <a href="{{route('admintruyen.edit',$item->id)}}">sửa</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit">xóa</button>
                    </form>
                </td>
            </tr>
        @endforeach

        </tbody>

    </table>
        {{ $truyens->links()}}
</div>
@endsection
