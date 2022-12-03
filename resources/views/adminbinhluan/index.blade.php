@extends('adminindex')
@section('indexbinhluan')
<div class="mt-4">
<h2>Danh sách các bình luận</h2>
    <div class="mt-4">
        <div>
            @if(Session::has('thongbao'))
                {{Session::get('thongbao')}}
            @endif
        </div>
    <table class="mt-4 table table-hover" style="width: 100px">
        <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">Nội dung</th>
            <th scope="col">Đánh giá</th>
            <th scope="col">Tên Truyện</th>
            <th scope="col">Người bình luận</th>

        </tr>
        </thead>

        @foreach ($binhluan as $item)
            <tr>
                <td >{{ $item->id }}</td>
                <td>{{ $item->NoiDungBL }}</td>
                <td>{{ $item->DanhGia }}</td>
                @foreach($item->Truyen as $t)
                    <td>
                        {{$t->TenTruyen}}
                    </td>
                @endforeach
                @foreach($item->User as $u)
                    <td>
                        {{$u->name}}
                    </td>
                @endforeach

                <td>
                    <form action="{{route('adminbinhluan.destroy',$item->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit">xóa</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
        {{ $binhluan->links()}}
</div>
@endsection
