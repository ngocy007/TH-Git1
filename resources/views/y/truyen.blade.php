@extends('master')

@push('styles')
    <link rel="stylesheet" href="{{asset('y/css/all-destop.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@endpush


@section('main')
    @php
        use Illuminate\Support\Carbon;
      $now = Carbon::now();
    @endphp
    <div class="page-content rounded-2">
        <div class="row no-gutters">
            <div class="col-12">
                <div class="media">
                    <div class="mr-4 text-center">
                        <div class="nh-thumb nh-thumb--210 shadow">
                            <img src="{{$truyens->AnhDaiDien}}"
                                 alt="{{$truyens->TenTruyen}}" />
                        </div>
                    </div>
                    <div class="media-body">
                        <div class="d-flex justify-content-start mb-3">
                            <h1 class="h3 mr-2">
                                <a href="https://metruyencv.com/truyen/cuu-tinh-ba-the-quyet">
                                    {{$truyens->TenTruyen}}
                                </a>
                            </h1>
                        </div>
                        <ul class="list-unstyled mb-4">
                            <li class="d-inline-block border border-secondary px-3 py-1 text-secondary rounded-3 mr-2 mb-2">
                                <a href="https://metruyencv.com/tac-gia/5391" class="text-secondary">
                                    {{$truyens->TenTacGia}}
                                </a>
                            </li>
                            <li class="d-inline-block border border-danger px-3 py-1 text-danger rounded-3 mr-2 mb-2">
                                {{$truyens->TrangThai}}
                            </li>
                            {{--                        <li class="d-inline-block border border-primary px-3 py-1 text-primary rounded-3 mr-2 mb-2">--}}
                            {{--                            <a href="https://metruyencv.com/truyen?genre=3" class="text-primary">--}}
                            {{--                                Huyền Huyễn--}}
                            {{--                            </a>--}}
                            {{--                        </li>--}}
                            @foreach($truyens->loais as $l)
                                <li class="d-inline-block border border-success px-3 py-1 text-success rounded-3 mr-2 mb-2">
                                    <a href="https://metruyencv.com/truyen?tag=11" class="text-success">
                                        {{$l->TenLoai}}
                                    </a>
                                </li>
                            @endforeach

                        </ul>
                        <ul class="list-unstyled d-flex mb-4">
                            <li class="mr-5">
                                <div class="font-weight-semibold h4 mb-1">{{count($truyens->chuongs)}}</div>
                                <div>Chương</div>
                            </li>
                            <li class="mr-5">
                                <div class="font-weight-semibold h4 mb-1">
                                    {{count($truyens->timechuongs)}}
                                </div>
                                <div>Chương/tuần</div>
                            </li>
                            <li class="mr-5">
                                <div class="font-weight-semibold h4 mb-1">{{$truyens->LuotXem}}</div>
                                <div>Lượt đọc</div>
                            </li>
                            <li class="mr-5">
                                <div id="bookmarkedValue" class="font-weight-semibold h4 mb-1">
                                    {{count($truyens->users)}}
                                </div>
                                <div>Cất giữ</div>
                            </li>
                        </ul>
                        <div class="d-flex align-items-center mb-4">
                            <i class="fa mr-1 fa-star" style="color: rgb(255,192,0)"></i>
                            <i class="fa mr-1 fa-star" style="color: rgb(255,192,0)"></i>
                            <i class="fa mr-1 fa-star" style="color: rgb(255,192,0)"></i>
                            <i class="fa mr-1 fa-star-o" style="color: rgb(255,192,0)"></i>
                            <span class="d-inline-block ml-2">
                            <span class="font-weight-semibold">
                                4.56
                            </span>
                            /5
                        </span>

                            <span class="d-inline-block text-secondary ml-1">(24 đánh giá)</span>
                        </div>
                        <ul class="list-unstyled d-flex align-items-center">
                            <li id="reading-book" class="mr-3 w-150">

                                    @if ($chuong === 0)
                                        @if (!is_null($newtruyen))
                                        <a href="{{route('doctruyen',['id_truyen'=>$truyens->id,'id_chuong'=>1])}}"
                                           class="cursor-pointer btn btn-primary btn-md btn-block btn-shadow font-weight-semibold d-flex align-items-center justify-content-center"
                                           style="color: rgb(255, 255, 255)">
                                            <i class="fa fa-book mr-2"></i
                                            >Đọc truyện
                                        </a>
                                    @else
                                        <a href=""
                                           class="cursor-pointer btn btn-primary btn-md btn-block btn-shadow font-weight-semibold d-flex align-items-center justify-content-center"
                                           style="color: rgb(255, 255, 255)">
                                          Đợi
                                        </a>
                                        @endif

                                    @else
                                        <a href="{{route('doctruyen',['id_truyen'=>$truyens->id,'id_chuong'=>$chuong])}}"
                                           class="cursor-pointer btn btn-danger btn-md btn-block btn-shadow font-weight-semibold d-flex align-items-center justify-content-center"
                                           style="color: rgb(255, 255, 255)">
                                            <i class="fa fa-book mr-2"></i
                                            >Đọc tiếp
                                        </a>
                                    @endif
                            </li>
                            <li id="bookmark" class="mr-3 w-150">
                                <a class="btn btn-outline-secondary btn-md btn-block font-weight-semibold d-flex align-items-center justify-content-center"
                                   href="{{route('theogioi',['id'=>$truyens->id])}}"
                                >
                                    @auth
                                        @if( $f===0 )
                                            <i class="fa fa-bookmark-o mr-2"></i>
                                        @else
                                            <i class="fa fa-bookmark mr-2"></i>
                                        @endif
                                    @else

                                        <i class="fa fa-bookmark-o mr-2"></i>
                                    @endauth
                                    Đánh dấu
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="page-content rounded-2">
        <div id="js-nh-tab" role="tablist" class="nav nav-tabs nh-nav-tabs mb-4">
            <a id="nav-tab-intro" onclick="pageTab(0)"  data-toggle="tab"
               href="#nav-intro" role="tab" aria-controls="nav-intro" aria-selected="true"
               class="nav-item nav-link px-0 py-3 mr-4 active">
                <span class="h4 m-0">Giới thiệu</span>
            </a>
            <a id="nav-tab-chap" onclick="pageTab(1)" data-toggle="tab" href="#nav-chap" role="tab" aria-controls="nav-chap" aria-selected="false" class="nav-item nav-link px-0 py-3 mr-4">
                <span class="h4 m-0">D.s chương</span>
                <span class="counter rounded-3 px-2 py-1 ml-1">
                {{count($truyens->chuongs)}}
            </span>
            </a>
            <a id="nav-tab-comment" onclick="pageTab(2)" data-toggle="tab" href="#nav-comment" role="tab" aria-controls="nav-comment"
               aria-selected="false" class="nav-item nav-link px-0 py-3 mr-4">
                <span class="h4 m-0">Bình luận</span>
                <span class="counter rounded-3 px-2 py-1 ml-1">
                {{count($truyens->comments)}}
            </span>
            </a>
        </div>

        <div id="js-nh-tabContent" class="tab-content nh-tab-content">
            <div id="nav-intro"  role="tabpanel" aria-labelledby="nav-tab-intro" class="tab-pane fade active show">
                <div class="row">
                    <div class="col-8">
                        <div class="mb-4">
                            <div class="content">
                                <p>
                                    {{$truyens->MoTa}}
                                </p>
                            </div>
                        </div>
                        <table class="table border-bottom mb-4 mt-5">
                            <tbody>
                            <tr>
                                <td class="font-weight-semibold" style="width: 130px;">Chương mới</td>
                                <td>
                                    <ul class="list-unstyled m-0">
                                        <li class="media">
                                            @if (!is_null($newtruyen))
                                                <div class="media-body">
                                                    <a href="{{route('doctruyen',['id_truyen'=>$truyens->id,'id_chuong'=>$newtruyen->SoChuong])}}">
                                                        Chương {{$newtruyen->SoChuong}} : {{$newtruyen->TenChuong}}</a>
                                                </div>
                                                <div class="pl-3">
                                                    {{($now->diffInDays($newtruyen->created_at) ) <= 0 ? $now->diffInHours($newtruyen->created_at) . ' Tiếng trước' : " ngày trước" ;}}
                                                </div>
                                            @else
                                                <div class="media-body">
                                                    Truyện chưa có chương.
                                                </div>
                                            @endif
                                        </li>
                                    </ul>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <div class="mt-5"></div>
                    </div>
                    <div  class="col-4">
                        <section  id="bookAuthor" class="nh-section">
                            <div  class="d-flex py-1 border-bottom mb-2">
                                <h2  class="h4 m-0 py-2">
                                    Cùng tác giả
                                </h2>
                                <a  href="/tac-gia/7750" class="mt-2 ml-auto text-primary">
                                    Xem tất cả
                                </a>
                            </div>
                            <ul  class="list-unstyled m-0">
                                @foreach($truyenSam as $t)
                                    <li  class="media align-items-center py-2 mb-1">
                                        <a
                                                href="{{route('xemtruyen',['id'=>$t->id])}}"
                                                class="nh-thumb nh-thumb--32 shadow mr-3">
                                            <img
                                                    alt="{{$t->TenTruyen}}" width="32"
                                                    src="{{$t->AnhDaiDien}}">
                                        </a>
                                        <div  class="media-body">
                                            <h2  class="fz-body mb-1">
                                                <a  href="{{route('xemtruyen',['id'=>$t->id])}}">
                                                    {{$t->TenTruyen}}
                                                </a>
                                            </h2>
                                            <div  class="text-secondary d-flex align-items-center small">
                                                <i class="fa fa-book mr-2"></i>

                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </section>
                    </div>
                </div>
            </div>
            <div id="nav-chap" style="display: none" role="tabpanel" class="tab-pane fade active show">
                <div id="chapter-list">
                    <div >
                        <div  class="d-flex align-items-center mb-3">
                            <h4 >Danh sách chương</h4>
                            <button  class="btn btn-white ml-auto px-3">
                                <i class="nh-icon icon-sort-asc h4 m-0 float-left"></i>
                            </button>
                        </div>
                        <div  class="nh-section mb-4">
                            <div  class="row mt-2">
                                @foreach($truyens->chuongs()->orderBy('SoChuong')->get() as $chuong)
                                    <div class="col-4 border-bottom-dashed">
                                        <a href="{{route('doctruyen',['id_truyen'=>$truyens->id,'id_chuong'=>$chuong->SoChuong])}}"
                                           class="media py-2 mb-1">
                                            <div  href="tien-nhan-chi-muon-nam/chuong-1" class="media-body">
                                                <div  class="text-overflow-1-lines">
                                                    Chương {{$chuong->SoChuong}}: {{$chuong->TenChuong}}
                                                    <small  class="text-muted">
                                                        (
                                                        @php
                                                            $now =  \Illuminate\Support\Carbon::now();
                                                       echo $now->diffInDays($t->created_at) <= 0 ? $now->diffInHours($t->created_at) . ' Tiếng trước' : $now->diffInDays($t->created_at) . ' Ngày trước';
                                                        @endphp
                                                        )
                                                    </small>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="nav-comment" style="display: none" role="tabpanel" class="tab-pane fade active show">
                <div class="row">
                    <div class="col-8">
                        <div  id="comments">
                            <div  class="d-flex">
                                <h4 >23 bình luận</h4>
                                <select  class="custom-select w-auto ml-auto">
                                    <option  value="like_count">
                                        Lượt thích
                                    </option>
                                    <option  value="id">
                                        Mới nhất
                                    </option>
                                    <option  value="oldest">
                                        Cũ nhất
                                    </option>
                                </select>
                            </div>
                            <div  class="comment-form media align-items-center mt-3">
                                <div  class="nh-avatar nh-avatar--45 mr-3" style="cursor: pointer;">
                                    @auth
                                        <img alt="" class="img-fluid"
                                             src="{{Auth::user()->profile_photo_url}}" >
                                    @else
                                        <img alt="" class="img-fluid"
                                             src="{{env('Avata_Default')}}" >
                                    @endauth
                                </div>
                                <div  class="media-body comment-input-block">

                                    <form action="{{route('bltruyen',['id_truyen'=>$truyens->id])}}" method="post">
                                        @csrf
                                        <textarea name="content" placeholder="Bình luận của bạn" class="form-control bg-light" style="height: 60px !important;"></textarea>
                                        <button type="submit" class="btn btn-submit bg-transparent text-primary d-flex align-items-center justify-content-center shadow-none px-2">
                                            <i class="fa fa-paper-plane"></i>
                                        </button>
                                    </form>

                                </div>
                            </div>
                            <ul  class="list-unstyled mt-3 mb-4 border-top">
                                @foreach($truyens->comments()->orderBy('created_at','desc')->get()->paginate(10) as $c)
                                    <li  class="media py-2 border-bottom">
                                        <div  class="nh-avatar nh-avatar--45 mr-3" style="cursor: pointer;">
                                            <img alt="" class="img-fluid"
                                                 src="{{$c->Users->profile_photo_url}}" lazy="loading">
                                        </div>
                                        <div  class="media-body">
                                            <div  class="d-flex">
                                                <div  class="d-flex mb-1">
                                                    <a class="d-inline-block h5 mb-0">
                                                        {{$c->Users->name}}
                                                    </a>
                                                </div>
                                            </div>
                                            <div  class="d-flex align-items-center">
                                        <span class="small d-flex align-items-center text-tertiary">
                                            <i class="fa fa-clock-o mr-2"></i>
                                             @php
                                                 $now =  \Illuminate\Support\Carbon::now();
                                            echo $now->diffInDays($c->created_at) <= 0 ? $now->diffInHours($c->created_at) . ' Tiếng trước' : $now->diffInDays($c->created_at) . ' Ngày trước';
                                             @endphp
                                        </span>
                                            </div>
                                            <div  class="comment-body mt-2">
                                        <span>
                                           {{$c->NoiDungBL}}
                                        </span>
                                            </div>
                                            <div  class="d-flex justify-content-end mt-3 pr-2">
                                                <form method="post" action="{{route('like',['id'=>$c->id])}}">
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm btn-white fz-body text-tertiary rounded-3 d-flex align-items-center px-3 mr-2">
                                                        <i class="fa fa-thumbs-o-up mr-2" aria-hidden="true"></i>
                                                        {{$c->DanhGia}}
                                                    </button>
                                                </form>
                                                @if(Auth::id() == $c->MaNguoiDung)
                                                    <form method="post" action="{{route('y.remove.comment',['id'=>$c->id])}}" >
                                                        @csrf
                                                        @method('delete')
                                                        <button  data-toggle="modal" class="btn btn-sm btn-white fz-body text-tertiary rounded-3 d-flex align-items-center px-3">
                                                            <i class="fa fa-exclamation-triangle mr-2"  aria-hidden="true"></i>
                                                            Báo xấu
                                                        </button>
                                                    </form>
                                                @endif
                                            </div>
                                            <ul  class="list-unstyled mt-2">

                                            </ul>

                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                            <div  class="text-center mt-4">
                                <a class="btn btn-outline-secondary font-weight-semibold cursor-pointer">
                                    Xem thêm bình luận
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script >
            let tab = [];
            tab[0] = document.getElementById('nav-intro');
            tab[1]  = document.getElementById('nav-chap');
            tab[2] = document.getElementById('nav-comment');
            init = <?php echo session('num') ?? 0?>;

            tab.forEach(e => e.style.display = 'none');
            tab[init].style.display = 'block';

            function pageTab(index)
            {
                tab.forEach(e => e.style.display = 'none');
                tab[index].style.display = 'block';
            }

        </script>

    </div>

@endsection