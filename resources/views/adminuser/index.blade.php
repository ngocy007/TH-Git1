@extends('adminindex')
@section('indexuser')
    @include('db')
    <div class="mt-4">
        <h2>người dùng</h2>
        <div class="mt-4">
            <a class="btn btn-primary" href="{{route('adminuser.create')}}">Thêm quyền người dùng</a>
            <div>
                @if(Session::has('thongbao'))
                    {{Session::get('thongbao')}}
                @endif
            </div>
            <table class="mt-4 table table-hover">
                <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Tên người dùng</th>
                    <th scope="col">Anhr dai dien</th>
                    <th scope="col">Email</th>
                    <th scope="col">NickNamr</th>
                    <th scope="col">SDT</th>
                    <th scope="col">Tên Quyền</th>

                </tr>
                </thead>
                <tbody>

                @foreach ($users as $item)

                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                            <td><img src="{{asset('storage/'.$item->profile_photo_path)}}" class="card-img-top" alt="..."></td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->NickName }}</td>
                            <td>{{ $item->SDT }}</td>
                            @foreach($item->Quyen as $k)
                            <td>{{ $k->TenQuyen }}</td>
                            @endforeach
                            <td>
                                <form action="{{route('adminuser.destroy',$item->id)}}" method="post">
                                    <a href="{{route('adminuser.edit',$item->id)}}">sửa</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">xóa</button>
                                </form>
                            </td>
                        </tr>
                @endforeach

                </tbody>

            </table>
            {{ $users->links()}}
        </div>
@endsection
