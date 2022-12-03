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

    <h3>Thêm chương mới</h3>
    <p>Tạo chương mới cho truyện</p>
    <form action="../../{{ $idTruyen }}/update/{{ $chuong->id }}" method="post" enctype="multipart/form-data"
        style="background-color: rgb(234, 238, 234); padding: 20px">
        @csrf
        @method('PUT')
        <form>
            <div class="form-floating mb-4">
                <input type="text" id="TenChuong" class="form-control" placeholder="Tên chương" name="TenChuong" value="{{ $chuong->TenChuong }}" required>
                <label for="TenChuong">Tên chương</label>
            </div>
            
            <div class="form-floating mb-4">
                <textarea class="form-control" id="NoiDung" name="NoiDung" placeholder="Nội dung truyện"
                    style="height: 500px;" required>{{ $chuong->NoiDung }}</textarea>
                <label for="NoiDung">Nội dung truyện</label>
            </div>

            <button type="button" class="btn btn-primary mb-4" style="background-color: gray"><a href="../" style="color: white; text-decoration: none">Quay lại</a></button>
            <button type="submit" class="btn btn-primary mb-4">Tạo</button>
        </form>
    @endsection
