@extends('master')

@push('styles')
    <link rel="stylesheet" href="{{asset('y/css/all-destop.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">




@endpush

@section('main')
    <main class="main py-4">
        <div class="nh-read__container" style="width: 1000px;">


            <div id="js-left-menu" class="nh-read__right sticky" style="
            height: 200px; inset: auto -85px auto auto; position: absolute; display: block;
            vertical-align: baseline; box-sizing: border-box; margin: 0; padding-left: 0; padding-right: 0;
             float: none; width: 70px; z-index: 2;">
                <ul id="js-menu-actions" class="list-unstyled m-0 nh-read__menu rounded-2">
                    <li class="item">
                        <a title="" data-toggle="tooltip" data-placement="right"
                                        class="d-flex align-items-center justify-content-center js-menu-item js-tooltip"
                                        data-original-title="Danh sách chương">
                            <i class="fa fa-bars"></i>
                        </a>
                        <div class="nh-read__popover">
                            <button type="button" data-type="close"
                                    class="btn btn-sm btn-close mr-2" style="z-index: 1;">
                                <i class="nh-icon icon-close float-left"></i>
                            </button>
                            <div class="nh-read__popover-content">
                                <div class="d-flex align-items-center mb-3 pr-3">
                                    <div class="h3 font-weight-normal mb-0">
                                        Danh sách chương
                                    </div>
                                    <button class="btn btn-white ml-auto px-3">
                                        <i class="nh-icon icon-sort-desc h4 m-0 float-left">
                                        </i>
                                    </button>
                                </div>
                                <div class="nh-section mb-4">
                                    <div class="row mt-2"></div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="item">
                        <a title="" data-toggle="tooltip" data-placement="right"
                           class="d-flex align-items-center justify-content-center js-menu-item js-tooltip"
                           data-original-title="Cài đặt hiển thị">
                            <i class="fa fa-cog"></i>
                        </a>
                        <div class="nh-read__popover nh-read__popover--setting">
                            <button type="button" data-type="close"  class="btn btn-close">
                                <i class="nh-icon icon-close float-left">
                                </i>
                            </button>
                            <div class="nh-read__popover-content">
                                <div class="d-flex align-items-center mb-3 pr-3">
                                    <div class="h3 font-weight-normal mb-0">Cài đặt</div>
                                </div>
                                <table class="table table-borderless">
                                    <tbody>
                                    <tr>
                                        <td style="width: 180px;">
                                            <div class="d-inline-flex align-items-center"><i
                                                        class="nh-icon icon-color h4 mb-0 mr-2 text-secondary"></i>Màu nền </div>
                                        </td>
                                        <td>
                                            <ul id="js-themes-picker" class="list-unstyled nh-read__themes d-flex flex-wrap">
                                                <li><a class="item rounded-circle item--1"></a></li>
                                                <li><a class="item rounded-circle item--2"></a></li>
                                                <li><a class="item rounded-circle item--3"></a></li>
                                                <li><a class="item rounded-circle item--4"></a></li>
                                                <li><a class="item rounded-circle item--5 active"></a></li>
                                                <li><a class="item rounded-circle item--6"></a></li>
                                                <li><a class="item rounded-circle item--7"></a></li>
                                                <li><a class="item rounded-circle item--8"></a></li>
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle" style="width: 180px;">
                                            <div class="d-inline-flex align-items-center">
                                                <i class="nh-icon icon-font h4 mb-0 mr-2 text-secondary">
                                                </i>
                                                Font chữ
                                            </div>
                                        </td>
                                        <td>
                                            <select id="js-font-picker" class="form-control custom-select">
                                                <option value="'Palatino Linotype', sans-serif"> Palatino Linotype </option>
                                                <option value="'Source Sans Pro', sans-serif">Source Sans Pro </option>
                                                <option value="'Segoe UI', sans-serif">Segoe UI</option>
                                                <option value="Roboto, sans-serif">Roboto</option>
                                                <option value="'Patrick Hand', sans-serif">Patrick Hand</option>
                                                <option value="'Noticia Text', sans-serif">Noticia Text</option>
                                                <option value="'Times New Roman', sans-serif">Times New Roman </option>
                                                <option value="Verdana, sans-serif">Verdana</option>
                                                <option value="Tahoma, sans-serif">Tahoma</option>
                                                <option value="Arial, sans-serif">Arial</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle" style="width: 180px;">
                                            <div class="d-inline-flex align-items-center">
                                                <i class="nh-icon icon-size h4 mb-0 mr-2 text-secondary"></i>
                                                Cỡ chữ
                                            </div>
                                        </td>
                                        <td>
                                            <div data-unit="px" data-type="font-size" data-max="30" data-min="14" data-step="1"
                                                 class="d-flex align-items-center js-content-options">
                                                <button class="btn btn-white border px-2 minus">
                                                    <i class="nh-icon icon-minus float-left"></i>
                                                </button>
                                                <div class="flex-fill text-center font-weight-semibold value">26px </div>
                                                <button class="btn btn-white border px-2 ml-auto plus">
                                                    <i class="nh-icon icon-plus float-left"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle" style="width: 180px;">
                                            <div class="d-inline-flex align-items-center">
                                                <i class="nh-icon icon-width-resize h4 mb-0 mr-2 text-secondary">
                                                </i>
                                                Chiều rộng khung </div>
                                        </td>
                                        <td>
                                            <div data-unit="px" data-type="width" data-max="1000" data-min="500" data-step="100"
                                                 class="d-flex align-items-center js-content-options">
                                                <button class="btn btn-white border px-2 minus">
                                                    <i class="nh-icon icon-minus float-left">
                                                    </i>
                                                </button>
                                                <div class="flex-fill text-center font-weight-semibold value">
                                                    1000px </div>
                                                <button class="btn btn-white border px-2 ml-auto plus">
                                                    <i class="nh-icon icon-plus float-left"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle" style="width: 180px;">
                                            <div class="d-inline-flex align-items-center">
                                                <i class="nh-icon icon-line-height h4 mb-0 mr-2 text-secondary">
                                                </i>Giãn dòng
                                            </div>
                                        </td>
                                        <td>
                                            <div data-unit="%" data-type="line-height" data-max="200" data-min="100" data-step="10"
                                                 class="d-flex align-items-center js-content-options"><button
                                                        class="btn btn-white border px-2 minus">
                                                    <i class="nh-icon icon-minus float-left"></i>
                                                </button>
                                                <div class="flex-fill text-center font-weight-semibold value">140% </div>
                                                <button class="btn btn-white border px-2 ml-auto plus">
                                                    <i class="nh-icon icon-plus float-left"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </li>
                    <li class="item">
                        <a href="/truyen/cuu-tinh-ba-the-quyet" title=""
                           data-toggle="tooltip" data-placement="right"
                           class="d-flex align-items-center justify-content-center js-tooltip"
                           data-original-title="Thông tin truyện">
                            <i class="fa fa-arrow-right"></i>
                        </a>
                    </li>
                </ul>
            </div>


            <div id="js-right-menu" class="nh-read__right sticky"
                 style="height: 150px; inset: 250px -85px auto auto; position: absolute; display: block;
                 vertical-align: baseline; box-sizing: border-box; margin: 0; padding-left: 0; padding-right: 0;
                  float: none; width: 70px; z-index: 2;">
                <ul class="list-unstyled m-0 nh-read__menu rounded-2">
                    <li style="height: 50px;">
                        <a title="" data-toggle="tooltip" data-placement="right"
                           class="d-flex align-items-center justify-content-center js-tooltip" data-original-title="Đánh dấu">
                            <i class="fa fa-bookmark">
                            </i>
                        </a>
                        <!---->
                    </li>
                    <li>
                        <a onclick="window.scrollTo(0, $('#read-comments').offset().top)" title="" data-toggle="tooltip"
                           data-placement="right" class="d-flex align-items-center justify-content-center js-tooltip"
                           data-original-title="Xem bình luận">
                            <i class="fa fa-comment-o"></i>
                        </a>
                    </li>
                </ul>
            </div>


            <div class="mb-3"></div>


            <div id="js-read__body" class="nh-read__body rounded-2">
                <div class="d-flex align-items-center mb-4">
                    <a class="nh-read__action d-flex align-items-center h6 mb-0 rounded-3 py-2 px-4 disabled">
                        <i class="fa fa-arrow-left mr-2"></i>
                        Chương trước
                    </a>
                    <a class="nh-read__action d-flex align-items-center h6 mb-0 ml-auto rounded-3 py-2 px-4">
                        Chương sau
                        <i class="fa fa-arrow-right ml-2"></i>
                    </a>
                </div>
                <div class="h1 mb-4 font-weight-normal nh-read__title"> Chương 1: Đan Đế trí nhớ </div>

                <ul class="list-unstyled d-flex align-items-center flex-wrap">
                    <li class="d-flex mr-4 mb-1">
                        <h1 class="fz-body font-weight-normal m-0">
                            <a href="https://metruyencv.com/truyen/cuu-tinh-ba-the-quyet" class="text-inherit d-flex align-items-center">
                                <i class="fa fa-book mr-1" aria-hidden="true"></i>
                                Cửu Tinh Bá Thể Quyết
                            </a>
                        </h1>
                    </li>
                    <li class="d-flex align-items-center mr-4 mb-1">
                        <i class="fa fa-pencil mr-2" aria-hidden="true"></i>
                        <a href="https://metruyencv.com/ho-so/1000020">
                            Vô Ưu
                        </a>
                    </li>
                    <li class="d-flex align-items-center mr-4 mb-1">
                        <i class="fa fa-text-height mr-2" aria-hidden="true"></i> 2494 chữ
                    </li>
                    <li class="d-flex align-items-center mr-4 mb-1">
                        <i class="fa fa-heart mr-2" aria-hidden="true"></i> 24 cảm xúc
                    </li>
                    <li class="d-flex align-items-center mr-4 mb-1">
                        <i class="fa fa-clock-o mr-2" aria-hidden="true"></i> 2021-10-12 10:53:53
                    </li>
                </ul>

                <div id="js-read__content" class="nh-read__content post-body"
                     style="font-size: 26px; font-family: &quot;Palatino Linotype&quot;, sans-serif; margin: auto; line-height: 140%;">

                    {{$chuong->NoiDung}}


{{--                    <a href="https://vtruyen.com/truyen/di-ban-hu-tieu-tai-di-gioi" target="_blank">--}}
{{--                        <strong class="text-muted">Ta Bán Hủ Tiếu Tại Dị Giới</strong>--}}
{{--                    </a>--}}
{{--                    cũng vậy. Một tác phẩm chữa lành tâm hồn tuyệt vời sau những ngày vật lộn ngoài đời thực.--}}

                </div>

                <div class="d-flex justify-content-center mt-5">
                    <button data-toggle="modal" class="btn rounded-3 text-center px-3 mx-3 nh-read__button d-flex align-items-center flex-column">
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <span>Đánh giá</span>
                    </button>

                    <button data-toggle="modal" class="btn rounded-3 text-center px-3 mx-3 nh-read__button d-flex align-items-center flex-column">
                        <i class="fa fa-gift" aria-hidden="true"></i>
                        <span>Tặng quà</span>
                    </button>
                </div>
            </div>


            <div class="mt-3"></div>



            <div class="nh-read__pagination d-flex mt-3 rounded-2">
                <a id="prevChapter" class="paginate-chapter-item d-flex align-items-center justify-content-center flex-fill h6 mb-0 py-3 px-4 disabled">
                    <i class="fa fa-arrow-left mr-2"></i>
                    Chương trước
                </a>
                <a data-toggle="modal" class="nh-read__pagination--report d-flex align-items-center justify-content-center h4 mb-0 py-3 px-4">
                    <i class="fa fa-exclamation-triangle"></i>
                </a>
                <a id="nextChapter" class="paginate-chapter-item d-flex align-items-center justify-content-center flex-fill h6 mb-0 ml-auto py-3 px-4">
                    Chương sau
                    <i class="fa fa-arrow-right ml-2">
                    </i>
                </a>
            </div>
            <div id="read-comments" class="nh-read__comments mt-3 rounded">
                <div class="row">
                    <div class="col-8">
                        <div data-v-84d735ce="" id="comments">
                            <div data-v-84d735ce="" class="d-flex">
                                <h4 data-v-84d735ce="">1056 bình luận</h4> <select data-v-84d735ce=""
                                                                                   class="custom-select w-auto ml-auto">
                                    <option data-v-84d735ce="" value="like_count">
                                        Lượt thích
                                    </option>
                                    <option data-v-84d735ce="" value="id">
                                        Mới nhất
                                    </option>
                                    <option data-v-84d735ce="" value="oldest">
                                        Cũ nhất
                                    </option>
                                </select>
                            </div>
                            <div data-v-84d735ce="" class="comment-form media align-items-center mt-3">
                                <div data-v-84d735ce="" class="nh-avatar nh-avatar--45 mr-3" style="cursor: pointer;"><img
                                            data-v-84d735ce="" alt="" class="img-fluid"
                                            data-src="/images/avatar-profile.png?97b80827721f6116c3dbc797d11d629b"
                                            src="/images/avatar-profile.png?97b80827721f6116c3dbc797d11d629b" lazy="loaded"></div>
                                <div data-v-84d735ce="" class="media-body comment-input-block">
                                    <textarea data-v-84d735ce="" placeholder="Bình luận của bạn" class="form-control bg-light"
                                              style="height: 60px !important;">

                                    </textarea>
                                    <button data-v-84d735ce="" class="btn btn-submit bg-transparent text-primary d-flex align-items-center justify-content-center shadow-none px-2">
                                        <i data-v-84d735ce="" class="nh-icon icon-send"></i>
                                    </button>
                                </div>
                            </div>
                            <!-- binh luan -->
                            <ul data-v-84d735ce="" class="list-unstyled mt-3 mb-4 border-top">
                                <li data-v-84d735ce="" class="media py-2 border-bottom">
                                    <div data-v-84d735ce="" class="nh-avatar nh-avatar--45 mr-3" style="cursor: pointer;"><img
                                                data-v-84d735ce="" alt="" class="img-fluid" data-src="https://static.cdnno.com/user/default/100.jpg"
                                                src="https://static.cdnno.com/user/default/100.jpg" lazy="loaded">
                                        <span data-v-84d735ce="" class="level px-1 py-0 small bg-primary rounded-3 text-white">Cấp 0</span>
                                    </div>
                                    <div data-v-84d735ce="" class="media-body">
                                        <div data-v-84d735ce="" class="d-flex">
                                            <div data-v-84d735ce="" class="d-flex mb-1">
                                                <a data-v-84d735ce="" href="javascript:void(0)"
                                                   class="d-inline-block h5 mb-0">hsQym56009
                                                </a>

                                            </div>
                                        </div>
                                        <div data-v-84d735ce="" class="d-flex align-items-center">
                                            <span data-v-84d735ce="" class="small d-flex align-items-center text-tertiary">
                                                <i data-v-84d735ce="" class="nh-icon icon-clock mr-2">
                                                </i> 16 giờ trước <i data-v-84d735ce="" class="nh-icon icon-eye-glasses ml-4 mr-2">
                                                </i> Chương 30</span>
                                        </div>
                                        <div data-v-84d735ce="" class="comment-body mt-2">
                                            <span>
                                                nghe nói tác để long ngạo thiên tới c4k mớtiêu<br>để 1 nv phản diện sống tới 4kc thì nản thật
                                            </span>
                                            <span style="display: none;">
                                                <a href="#" id="readmore" class="text-muted font-weight-semibold">đọc tiếp
                                                </a>
                                                <a href="#" id="readmore" class="text-muted font-weight-semibold" style="display: none;"></a>
                                            </span>
                                        </div>
                                        <div data-v-84d735ce="" class="d-flex mt-3">
                                            <div data-v-84d735ce="" class="mr-auto font-weight-semibold">
                                            </div>
                                            <button data-v-84d735ce="" class="btn btn-sm btn-white fz-body text-tertiary rounded-3 d-flex align-items-center px-3 mr-2">
                                                <i data-v-84d735ce="" class="nh-icon icon-like mr-2">
                                                </i>
                                                0
                                            </button>
                                            <button data-v-84d735ce=""class="btn btn-sm btn-white fz-body text-tertiary rounded-3 d-flex align-items-center px-3 mr-2">
                                                <i data-v-84d735ce="" class="nh-icon icon-reply mr-2"></i>
                                                Trả lời
                                            </button>
                                            <button data-v-84d735ce="" data-toggle="modal" class="btn btn-sm btn-white fz-body text-tertiary rounded-3 d-flex align-items-center px-3">
                                                <i data-v-84d735ce="" class="nh-icon icon-flag mr-2">
                                                </i>
                                                Báo xấu
                                            </button>
                                            <!---->
                                        </div>
                                        <ul data-v-84d735ce="" class="list-unstyled mt-2">
                                            <!---->
                                        </ul>
                                        <!---->
                                    </div>
                                </li>

                            </ul>
                            <div data-v-84d735ce="" class="text-center mt-4">
                                <a data-v-84d735ce="" class="btn btn-outline-secondary font-weight-semibold cursor-pointer">
                                    Xem thêm bình luận
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div>
                            <div class="nh-read__pagination" style="text-align: center;">
                                <a href="https://vtruyen.com/truyen/thinh-the-dien-ninh"
                                   target="_blank">
                                    <img src="https://static.cdnno.com/storage/topbox/e272bd1e205fda7dcc879acd5c51e1f6.jpg"
                                         alt="Thịnh Thế Diên Ninh" class="img-fluid">
                                </a>
                            </div>
                        </div>
                        <hr class="my-3">
                    </div>
                </div>
            </div>
        </div>
        <!---->
        <!---->
        <!---->
        <!---->
        <!---->
        <!---->
    </main>
@endsection