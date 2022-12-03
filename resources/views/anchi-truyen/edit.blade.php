@extends('master')
@section('main')
    @push('styles')
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
            integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
        </script>
        <script src="{{ asset('js_layout_chi/bootstrap-multiselect.min.js') }}"></script>
        <link rel="stylesheet" href="{{ asset('css_phamanchi/bootstrap-multiselect.min.css') }}">
    @endpush

    <h3>Sửa đổi truyện {{ $truyen->TenTruyen }}</h3>
    <p>Sửa đổi các thông tin chi tiết truyện</p>
    <form action="../update/{{ $truyen->id }}" method="post" enctype="multipart/form-data"
        style="background-color: rgb(234, 238, 234); padding: 20px">
        @csrf
        @method('PUT')
        <form>
            {{-- <label for="name">Tên truyện</label> --}}
            <div class="form-floating mb-4">
                <input type="text" id="TenTruyen" class="form-control" placeholder="Tên truyện" name="TenTruyen"
                    value="{{ $truyen->TenTruyen }}" required>
                <label for="TenTruyen">Tên truyện</label>
            </div>
            <div class="form-outline mb-4 ">
                <label class="form-label pull-left" id="" for="Image">Ảnh minh họa</label>
                <input type="file" id="Image" class="form-control" style="border: solid 1px grey;" name="AnhDaiDien"
                    value="{{ public_path('images\\' . $truyen->AnhDaiDien) }}" />
            </div>
            <div class="form-floating mb-4">
                <textarea class="form-control" id="MoTa" name="MoTa" placeholder="Mô tả tóm tắt nội dung truyện"
                    style="height: 100px;" required>{{ $truyen->MoTa }}</textarea>
                <label for="MoTa">Mô tả tóm tắt nội dung truyện</label>
            </div>

            <label for="TrangThai">Trạng thái</label>
            <select id="TrangThai" class="form-select mb-4" name="TrangThai" required>
                <option value="ngừng" {{ $truyen->TrangThai == 'ngừng' ? 'selected' : '' }}>ngừng</option>
                <option value="đang ra" {{ $truyen->TrangThai == 'đang ra' ? 'selected' : '' }}>đang ra</option>
                <option value="hoàn thành" {{ $truyen->TrangThai == 'hoàn thành' ? 'selected' : '' }}>hoàn thành</option>
            </select>
            <div class="form-floating mb-4" >
                <input type="text" id="TenTacGia" class="form-control" placeholder="Tên tác giả" name="TenTacGia"
                    value="{{ $truyen->TenTacGia }}" required>
                <label for="TenTacGia">Tên tác giả</label>
            </div>

            <!-- Note the missing multiple attribute! -->
            <label for="multiple-selected">Thể loại</label>
            <div class="form-floating mb-4">
                <select id="multiple-selected" multiple="multiple" required>
                    @foreach ($theloais as $item)
                        <option value="{{ $item->id }}"
                            @foreach ($getloai as $nameloai)
                        {{ $nameloai->id == $item->id ? 'selected' : '' }} @endforeach>
                            {{ $item->TenLoai }}</option>
                    @endforeach
                </select>

                <!-- Build your select: -->
                <script type="text/javascript">
                    $(document).ready(function() {
                        $('#multiple-selected').multiselect({
                            checkboxName: function(option) {
                                return 'theloai[]';
                            },
                            enableClickableOptGroups: true,
                            enableCollapsibleOptGroups: true,

                            selectAllName: 'select-all-name',
                            includeSelectAllOption: true,
                            // enableFiltering: true,

                            buttonWidth: '400px',
                            dropRight: true,
                            maxHeight: 400,
                        });
                    });
                </script>
            </div>

            <button type="button" class="btn btn-primary mb-4" style="background-color: gray"><a href="../" style="color: white; text-decoration: none">Quay lại</a></button>
            <button type="submit" class="btn btn-primary mb-4">Lưu lại thay đổi</button>
        </form>
    @endsection
