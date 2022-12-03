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
                                    <a href="javascript:void(0)" class="item rounded">
                                        <small>Đang ra</small>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)" class="item rounded">
                                        <small>Hoàn thành</small>
                                    </a>
                                </li>
                            </ul>
                        </div>

                    </aside>
                </div>
                <div class="col-9">
                    <!-- <div class="d-flex align-items-center mb-3">
                      <ul class="list-unstyled m-0 d-flex flex-wrap">
                        <li class="nh-dropdown dropdown">
                          <a
                            href="javascript:void(0)"
                            role="button"
                            id="js-genres"
                            data-toggle="dropdown"
                            aria-haspopup="true"
                            aria-expanded="false"
                            class="d-block dropdown-toggle pr-4 text-primary"
                            ><span class="ml-2 font-weight-semibold">Mới cập nhật</span></a
                          >
                          <div
                            aria-labelledby="js-genres"
                            class="dropdown-menu dropdown-menu-right"
                          >
                            <a href="javascript:void(0);" class="dropdown-item active"
                              >Mới cập nhật</a
                            >
                            <a href="javascript:void(0);" class="dropdown-item">Mới đăng</a>
                          </div>
                        </li>
                        <li class="nh-dropdown dropdown">
                          <a
                            role="button"
                            data-toggle="dropdown"
                            aria-haspopup="true"
                            aria-expanded="false"
                            class="d-block dropdown-toggle pr-4"
                            ><span class="ml-2 font-weight-semibold">Lượt đọc</span></a
                          >
                          <div
                            aria-labelledby="js-depute"
                            class="dropdown-menu dropdown-menu-right"
                          >
                            <a href="javascript:void(0);" class="dropdown-item"
                              >Lượt đọc [ngày]</a
                            >
                            <a href="javascript:void(0);" class="dropdown-item"
                              >Lượt đọc [tuần]</a
                            >
                            <a href="javascript:void(0);" class="dropdown-item"
                              >Lượt đọc [tháng]</a
                            >
                            <a href="javascript:void(0);" class="dropdown-item"
                              >Lượt đọc [toàn]</a
                            >
                          </div>
                        </li>
                        <li class="nh-dropdown dropdown">
                          <a
                            role="button"
                            data-toggle="dropdown"
                            aria-haspopup="true"
                            aria-expanded="false"
                            class="d-block dropdown-toggle pr-4"
                            ><span class="ml-2 font-weight-semibold">Điểm đánh giá</span></a
                          >
                          <div
                            aria-labelledby="js-depute"
                            class="dropdown-menu dropdown-menu-right"
                          >
                            <a href="javascript:void(0);" class="dropdown-item"
                              >Lượt đánh giá</a
                            >
                            <a href="javascript:void(0);" class="dropdown-item"
                              >Điểm đánh giá</a
                            >
                          </div>
                        </li>
                        <li class="nh-dropdown dropdown">
                          <a
                            href="javascript:void(0);"
                            class="d-block pr-4 font-weight-semibold"
                          >
                            Cất giữ
                          </a>
                        </li>
                        <li class="nh-dropdown dropdown">
                          <a
                            href="javascript:void(0);"
                            class="d-block pr-4 font-weight-semibold"
                          >
                            Yêu thích
                          </a>
                        </li>
                        <li class="nh-dropdown dropdown">
                          <a
                            role="button"
                            data-toggle="dropdown"
                            aria-haspopup="true"
                            aria-expanded="false"
                            class="d-block dropdown-toggle pr-4"
                            ><span class="ml-2 font-weight-semibold">Đề cử</span></a
                          >
                          <div
                            aria-labelledby="js-depute"
                            class="dropdown-menu dropdown-menu-right"
                          >
                            <a href="javascript:void(0);" class="dropdown-item"
                              >Đề cử [ngày]</a
                            >
                            <a href="javascript:void(0);" class="dropdown-item"
                              >Đề cử [tuần]</a
                            >
                            <a href="javascript:void(0);" class="dropdown-item"
                              >Đề cử [tháng]</a
                            >
                            <a href="javascript:void(0);" class="dropdown-item"
                              >Đề cử [toàn]</a
                            >
                          </div>
                        </li>
                        <li class="nh-dropdown dropdown">
                          <a
                            href="javascript:void(0);"
                            class="d-block pr-4 font-weight-semibold"
                          >
                            Bình luận
                          </a>
                        </li>
                        <li class="nh-dropdown dropdown">
                          <a
                            href="javascript:void(0);"
                            class="d-block pr-4 font-weight-semibold"
                          >
                            Số chương
                          </a>
                        </li>
                      </ul>
                    </div> -->
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
                                                            <i class="nh-icon icon-user-edit"></i>
                                                        </span>
                                                        <span class="truncate-140">{{$row->TenTacGia}} </span>
                                                    </div>
                                                    <div class="d-flex align-items-center fz-13 mr-4">
                                                        <span class="icon-wrapper mr-2">
                                                            <i class="nh-icon icon-menu small">

                                                            </i>
                                                        </span>
                                                        TBD chương
                                                    </div>
                                                </div>
                                                <span class="d-inline-block border border-primary small px-2 text-primary ml-auto truncate-100" style="cursor: pointer">
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
