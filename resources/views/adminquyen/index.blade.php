@extends('adminindex')
@section('indexquyen')
<div class="mt-4">
<h2>Quyền người dùng</h2>
    <div class="mt-4">
        <a class="btn btn-primary" href="{{route('adminquyen.create')}}">Thêm quyền người dùng</a>
        <div>
            @if(Session::has('thongbao'))
                {{Session::get('thongbao')}}
            @endif
        </div>
    <table class="mt-4 table table-hover">
        <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">tên quyền</th>
            <th scope="col">Chức năng</th>

        </tr>
        </thead>
        <tbody>

        @foreach ($quyens as $item)
            <tr>
                <td >{{ $item->id }}</td>
                <td>{{ $item->TenQuyen }}</td>
                <td>{{ $item->ChucNang }}</td>
                <td>
                    <form action="{{route('adminquyen.destroy',$item->id)}}" method="post">
                        <a href="{{route('adminquyen.edit',$item->id)}}">sửa</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit">xóa</button>
                    </form>
                </td>
            </tr>
        @endforeach

        </tbody>

    </table>
        {{ $quyens->links()}}
</div>
@endsection
