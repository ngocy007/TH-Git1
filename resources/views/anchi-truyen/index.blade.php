@extends('master')
@section('main')
    @push('styles')
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css_phamanchi/truyen_index.css') }}">
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
    @endpush
    <a id="themtruyen" href="anchi-truyen/create">

    <button type="button" class="btn btn-outline-primary waves-effect" class="themtruyen">
            <span id="icon-create">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                    class="bi bi-file-plus" viewBox="0 0 20 20">
                    <path
                        d="M8.5 6a.5.5 0 0 0-1 0v1.5H6a.5.5 0 0 0 0 1h1.5V10a.5.5 0 0 0 1 0V8.5H10a.5.5 0 0 0 0-1H8.5V6z" />
                    <path
                        d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm10-1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1z" />
                </svg>
            </span>
            <span>Thêm truyện mới</span>
    </button>
  </a>

    <h3>Truyện của tôi</h3>
    <p>Danh sách truyện đã đăng</p>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="main-box clearfix">
                    <div class="table-responsive">
                        <table class="table user-list">
                            <thead>
                                <tr style="text-align: center">
                                    <th><span>Ảnh</span></th>
                                    <th><span>Truyện</span></th>
                                    <th><span>Ngày cập nhật</span></th>
                                    <th class="text-center"><span>Trạng thái</span></th>
                                    <th><span>Số lượt xem</span></th>
                                    <th><span>Chức năng</span></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($truyens as $item)
                                    <tr>
                                        <td>
                                            @if (str_contains($item->AnhDaiDien,'https:'))
                                                <img src="{{$item->AnhDaiDien}}"
                                                     alt="{{$item->TenTruyen}}" />
                                            @else
                                                <img src="{{ asset('images/' . $item->AnhDaiDien) }}" alt="">
                                            @endif
                                        </td>
                                        <td>
                                            <a href="anchi-chuong/{{ $item->id }}"
                                                class="user-link">{{ $item->TenTruyen }}</a>
                                            <span class="user-subhead">{{ $item->TenTacGia }}</span><br>
                                            <span>
                                                @foreach ($theloais as $tl)
                                                    @if ($item->id == $tl->id)
                                                        {{ $tl->TenLoai }}
                                                    @endif
                                                @endforeach
                                            </span>
                                        </td>
                                        <td>
                                            {{ $item->updated_at }}
                                        </td>
                                        <td class="text-center">
                                            <span>{{ $item->TrangThai }}</span>
                                        </td>
                                        <td class="text-center">
                                            {{ $item->LuotXem }}
                                        </td>
                                        <td style="width: 20%; text-align: center">
                                            <a href="{{route('xemtruyen',['id'=>$item->id])}}" class="table-link">
                                                <span class="fa-stack">
                                                    <i class="fa fa-square fa-stack-2x"></i>
                                                    <i class="fa fa-search-plus fa-stack-1x fa-inverse"></i>
                                                </span>
                                            </a>
                                            <a href="anchi-truyen/edit/{{ $item->id }}" class="table-link">
                                                <span class="fa-stack">
                                                    <i class="fa fa-square fa-stack-2x"></i>
                                                    <i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
                                                </span>
                                            </a>

                                            <a href="anchi-truyen/submit-delete/{{ $item->id }}" class="table-link">
                                              <span class="fa-stack">
                                                <i class="fa fa-square fa-stack-2x danger"></i>
                                                <i class="fa fa-trash-o fa-stack-1x fa-inverse"></i>
                                              </span>
                                          </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="pagination pull-right">
                        {{ $truyens->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
