<h1>
    day la ds helo
</h1>

<table>
    <tr>
        <td>id</td>
        <td>name</td>
        <td>name2</td>
    </tr>

    @foreach($quyen as $item)
        <tr>
            <td>{{$item->id}}</td>
            <td>{{$item->tenquyen}}</td>
            <td>{{$item->address}}</td>
        </tr>
    @endforeach
</table>