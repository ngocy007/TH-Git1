@extends('layout_themtruyen.layout_create_truyen')
@section('content')
<a href="truyen/create">Them truyen</a>
<table>
    <tr>
        <th>TenTruyen</th>
        <th>AnhDaiDien</th>
        <th>MaNguoiDung</th>
    </tr>
    @foreach ($truyens as $item)
            <tr>
                <td><a href="chuong/{{ $item->id }}">{{ $item->TenTruyen }}</a></td>
                <td>{{ $item->AnhDaiDien }}</td>
                <td>{{ $item->MaNguoiDung }}</td>

                <td><a href="voucher/edit/{{ $item->id }}">Edit</a></td>
                <td>
                    <form action="voucher/destroy/{{ $item->id }}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit">Xoa</button>
                    </form>
                </td>
            </tr>
    @endforeach
</table>
@endsection