@extends('adminindex')
@section('indextheloai')
    <h2>Thể loại truyện</h2>
    <div class="mt-4">
        <a class="btn btn-primary" href="{{route('admintheloai.create')}}">Thêm Thể Loại</a>
        <div>
            @if(Session::has('thongbao'))
                {{Session::get('thongbao')}}
            @endif
        </div>
        <table class="mt-4 table table-hover">
            <thead>
            <tr>

                <th scope="col">id</th>
                <th scope="col">ten loai</th>

            </tr>
            </thead>
            <tbody>

            @foreach ($theloais as $item)
                <tr>

                    <td >{{ $item->id }}</td>
                    <td>{{ $item->TenLoai }}</td>
                    <td>
                        <form action="{{route('admintheloai.destroy',$item->id)}}" method="post">
                            <a href="{{route('admintheloai.edit',$item->id)}}">sua</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit">xoa</button>
                        </form>
                    </td>

                </tr>
            @endforeach

            </tbody>

        </table>

            {{ $theloais->links()}}
    </div>
@endsection
