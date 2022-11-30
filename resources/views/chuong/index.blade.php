<a href="create/{{ $idTruyen }}">Them chuong</a>
<table>
    <tr>
        <th>MaTruyen</th>
        <th>SoChuong</th>
        <th>TenChuong</th>
        <th>NoiDung</th>
    </tr>
    @foreach ($chuongs as $item)
            <tr>
                <td>{{ $item->MaTruyen }}</td>
                <td>{{ $item->SoChuong }}</td>
                <td>{{ $item->TenChuong }}</td>
                <td>{{ $item->NoiDung }}</td>

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
