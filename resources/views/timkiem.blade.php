@extends('master')

@push('styles')
    <link rel="stylesheet" href="{{asset('y/css/all-destop.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

@endpush
@section('main')
    <div id="bookGrid" class="container">
        <!---->
        <div class="page-content rounded-2">
            <div class="row">
                <div class="col-3">
                    <aside>
                        <div class="border-bottom">
                            <div class="font-weight-semibold mb-2">Đã chọn</div>
                            <ul class="list-facet list-unstyled d-flex flex-wrap m-0">
                                @if ($request->filled('l'))
                                    @if (count($theloais) > 0)
                                        @foreach($theloais as $row)
                                            <li>
                                                <a href="{{  url()->full()."&l="}}" class="item rounded">
                                                    <small>{{$row->TenLoai}}</small>
                                                </a>
                                            </li>
                                        @endforeach

                                    @endif
                                @endif
                                @if ($request->filled('sta'))
                                    @if ($request->input('sta')==1)
                                        <li>
                                            <a href="{{  url()->full()."&sta=" }}" class="item rounded">
                                                <small>Hoàn Thành</small>
                                            </a>
                                        </li>
                                    @elseif ($request->input('sta')==2)
                                        <li>
                                            <a href="{{  url()->full()."&sta=" }}" class="item rounded">
                                                <small>Đang ra</small>
                                            </a>
                                        </li>

                                    @endif
                                @endif
                            </ul>
                        </div>
                        <div class="py-2 border-bottom">
                            <div class="font-weight-semibold mt-1 mb-2">Thể loại</div>
                            <ul class="list-facet list-unstyled d-flex flex-wrap m-0">
                                @if (count($theloai) > 0)
                                    @foreach($theloai as $row)
                                        <li>
                                            <a href="{{  url()->full()."&l=".$row->id }}" class="item rounded">
                                                <small>{{$row->TenLoai}}</small>
                                            </a>
                                        </li>
                                    @endforeach

                                @endif
                            </ul>
                        </div>
                        <div class="py-2 border-bottom">
                            <div class="font-weight-semibold mt-1 mb-2">Tình trạng</div>
                            <ul class="list-facet list-unstyled d-flex flex-wrap m-0">
                                <li>
                                    <a href="{{  url()->full()."&sta=2" }}" class="item rounded">
                                        <small>Đang ra</small>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{  url()->full()."&sta=1"}}" class="item rounded">
                                        <small>Hoàn thành</small>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="py-2 border-bottom">
                            <ul class="list-facet list-unstyled d-flex flex-wrap m-0">
                                <li>
                                    <a href="/timkiem?q=" class="item rounded">
                                        <small>Reset</small>
                                    </a>
                                </li>
                            </ul>
                        </div>

                    </aside>
                </div>
                <div class="col-9">
                    <div class="d-flex align-items-center mb-3">
                        <ul class="list-unstyled m-0 d-flex flex-wrap">
                            <li class="nh-dropdown dropdown">
                                <a
                                    href="{{  url()->full()."&sort=1" }}"
                                    role="button"
                                    class="d-block dropdown-toggle pr-4"
                                >
                                    <span class="ml-2 font-weight-semibold">Mới cập nhật</span>
                                </a>
                            </li>
                            <li class="nh-dropdown dropdown">
                                <a
                                    href="{{  url()->full()."&sort=2" }}"
                                    role="button"
                                    class="d-block dropdown-toggle pr-4"
                                >
                                    <span class="ml-2 font-weight-semibold">Mới đăng</span>
                                </a>
                            </li>
                            <li class="nh-dropdown dropdown">
                                <a
                                    href="{{  url()->full()."&sort=3" }}"
                                    role="button"
                                    class="d-block dropdown-toggle pr-4"
                                >
                                    <span class="ml-2 font-weight-semibold">Lượt đọc</span>
                                </a>
                            </li>
                            <li class="nh-dropdown dropdown">
                                <a
                                    href="{{  url()->full()."&sort=4" }}"
                                    role="button"
                                    class="d-block dropdown-toggle pr-4"
                                >
                                    <span class="ml-2 font-weight-semibold">Cất giữ</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="row mb-3">
                        @if (count($truyens) > 0)
                            @foreach($truyens as $row)
                                <div class="col-6">
                                    <div class="media border-bottom py-4">
                                        <a
                                            href="{{route('xemtruyen',['id'=>$row->id])}}"
                                            class="nh-thumb nh-thumb--90 shadow mr-3"
                                        ><img
                                                alt=""
                                                width="72"
                                                src="{{$row->AnhDaiDien}}"
                                                lazy="loaded"
                                            />
                                        </a>
                                        <div class="media-body">
                                            <h2 class="fz-body mb-2">
                                                <a href="{{route('xemtruyen',['id'=>$row->id])}}" class="d-block">
                                                    {{ $row->TenTruyen }}
                                                </a>
                                            </h2>
                                            <div class="text-secondary text-overflow-2-lines fz-14 mb-3">
                                                {{ $row->MoTa }}
                                            </div>
                                            <div class="d-flex align-items-start">
                                                <div>
                                                    <div class="d-flex align-items-center fz-13 mr-4 mb-1">
                                                        <span class="icon-wrapper mr-2">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                                                                <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"/>
                                                            </svg>
                                                        </span>
                                                        <span class="truncate-140">{{$row->TenTacGia}} </span>
                                                    </div>
                                                    <div class="d-flex align-items-center fz-13 mr-4">
                                                        <span class="icon-wrapper mr-2">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                                                <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                                                                <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                                                            </svg>
                                                        </span>
                                                        {{$row->LuotXem}}
                                                    </div>
                                                </div>
                                                <span
                                                    class="d-inline-block border border-primary small px-2 text-primary ml-auto truncate-100"
                                                    style="cursor: pointer">
                                                    {{$row->TrangThai}}
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <a href="#" class="list-group-item list-group-item-action active" aria-current="true">
                                <div class="d-flex w-100 justify-content-between">
                                    <h5 class="mb-1">Không có dữ liệu</h5>

                                </div>
                            </a>
                        @endif

                    </div>
                    {!! $truyens->appends(['q' => request()->query('q'),'l' => request()->query('l')])->links() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
