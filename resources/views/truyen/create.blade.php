@extends('master')
@section('content')
@push('scripts')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="{{ asset('js_layout_chi/bootstrap-multiselect.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css_phamanchi/bootstrap-multiselect.min.css') }}">

@endpush
    <h1>Them Truyen</h1>
    <form action="store" method="post" enctype="multipart/form-data">
        @csrf
        <input type="text" name="TenTruyen">
        <input type="file" name="AnhDaiDien">
        <input type="text" name="MoTa">
        <input type="text" name="TrangThai">
        <input type="text" name="TenTacGia">
        <input type="text" name="MaNguoiDung">

        <input type="checkbox"  class="form-control" name="theloai[]" aria-label="Text input with checkbox" value="1">
        <input type="checkbox"  class="form-control" name="theloai[]" aria-label="Text input with checkbox" value="2">


        <!-- Note the missing multiple attribute! -->
        <select id="multiple-selected" multiple="multiple">
            @foreach ($theloais as $item)
                <option value="{{ $item->id }}">{{ $item->TenLoai }}</option>
            @endforeach
        </select>
        <!-- Build your select: -->
        <script type="text/javascript">
            $(document).ready(function() {
            $('#multiple-selected').multiselect(
                {
                    checkboxName: function(option) {
                        return 'theloai[]';
                    },
                    selectAllName: 'select-all-name',
                    includeSelectAllOption: true,
                    enableFiltering: true
                }
            );
        });
        </script>

        <button type="submit">submit</button>
    </form>
@endsection