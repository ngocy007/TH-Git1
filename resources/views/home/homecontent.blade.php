<link rel="stylesheet" href="{{asset('css/home.css')}}">
<a href="#">
    <span class="top-bg-op-box">
        <img src="{{asset('asset/banner.webp')}}" alt="banner" style="width: 100%">
    </span>
</a>
<div class="page-content rounded-2">
    <div class="row">
        <div class="col-8">
            <section class="nh-section">
                <div class="d-flex align-items-center mb-4">
                    <h2 class="h4 mb-0">Biên tập viên đề cử</h2><a href="" class="link--see-more ml-auto text-primary"> Xem tất cả </a>
                </div>
                @foreach($truyens as $truyen)
                <div class="row">
                    <div class="col-12">
                        <div class="media"><a href="" class="nh-thumb nh-thumb--72 shadow mr-3"><img src="{{$truyen -> AnhDaiDien}}" alt="" width="72"></a>
                            <div class="media-body">
                                <h2 class="fz-body text-overflow-1-lines mb-2 "><a href="" class="d-block">{{$truyen -> TenTruyen}}</a></h2>
                                <div class="text-secondary fz-14 text-overflow-2-lines"> {{$truyen -> MoTa}} </div>
                                <div class="d-flex align-items-center mt-2 py-1">
                                    <div class="d-flex align-items-center mr-auto text-secondary"><span class="truncate-140 text-left"><i class="nh-icon icon-user-edit mr-1"></i> {{$truyen -> TenTacGia}} </span></div><a href=""><span class="d-inline-block border border-primary small px-2 text-primary truncate-100">{{$truyen -> LuotXem}}</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                @endforeach
            </section>
        </div>
        <div class="col-4">
            <section id="continue-reading" class="nh-section">
                <div id="continue-reading-template">
                    <div class="d-flex align-items-center mb-3">
                        <h2 class="h4 mb-0">Đang đọc</h2><a href="https://metruyencv.com/tai-khoan/tu-truyen" class="link--see-more ml-auto text-primary"> Xem tất cả </a>
                    </div>
                    <ul class="list-unstyled m-0">
                        <div data-v-f078dda2=""></div>
                        <li id="item-reading-0" class="media align-items-center py-2 mb-1"><a href="https://metruyencv.com/truyen/dau-la-dai-luc-trung-sinh-duong-tam" class="nh-thumb nh-thumb--32 shadow mr-3"><img src="https://static.cdnno.com/poster/dau-la-dai-luc-trung-sinh-duong-tam/150.jpg?1621052117" width="32"></a>
                            <div class="media-body">
                                <h2 class="fz-body mb-1"><a href="https://metruyencv.com/truyen/dau-la-dai-luc-trung-sinh-duong-tam" class="text-overflow-1-lines"> Đấu La Đại Lục Ⅴ Trùng Sinh Đường Tam </a></h2>
                                <div class="text-muted text-overflow-1-lines"> Đã đọc: 0/1168 </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </section>
        </div>
    </div>

</div>
<section class="nh-section py-3">
    <div class="d-flex align-items-center mb-3 ">
        <h2 class="h4 mb-0"> Mới cập nhật </h2><a href="https://metruyencv.com/truyen" class="link--see-more ml-3 text-primary"> Xem tất cả </a>
    </div>
    <table class="table table-striped table-borderless table-hover border-top fz-14">
        <tbody>
            <tr>
                <td class="align-middle text-tertiary"><span class="text-overflow-1-lines">Huyền Huyễn</span></td>
                <td class="align-middle w-25">
                    <h2 class="fz-body m-0 text-overflow-1-lines"><a href="https://metruyencv.com/truyen/vo-dich-tu-hien-te-to-su-gia-bat-dau">Vô Địch Từ Hiến Tế Tổ Sư Gia Bắt Đầu</a></h2>
                </td>
                <td class="align-middle w-25"><a href="https://metruyencv.com/truyen/vo-dich-tu-hien-te-to-su-gia-bat-dau/chuong-827" class="text-overflow-1-lines">Chương 827: Vì huynh đệ không tiếc mạng sống! Giúp ta chào hỏi tẩu tử</a></td>
                <td class="align-middle"><span class="text-overflow-1-lines">Hạ Quân Cát</span></td>
                <td class="align-middle text-tertiary"><span class="text-overflow-1-lines">SmileY</span></td>
                <td class="align-middle text-tertiary text-right">3 phút trước</td>
            </tr>
        </tbody>
    </table>
</section>
