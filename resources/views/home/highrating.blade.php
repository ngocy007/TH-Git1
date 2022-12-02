<div class="container">
    <div class="row py-4">
        <div class="col-8">
            <section class="nh-section">
                <div class="d-flex align-items-center mb-4">
                    <h2 class="h4 mb-3">
                        Đánh giá cao
                    </h2>
                    <a href="#" class="link--see-more ml-auto text-primary">
                        Xem tất cả
                    </a>
                </div>
                @foreach($danhgiacaos->chunk(2) as $chunks)
                <div class="row">
                    @foreach($chunks as $danhgiacao)
                    <div class="col-6">
                        <div class="media">
                            <a href="#" class="nh-thumb nh-thumb--72 shadow mr-3"><img src="{{$danhgiacao -> AnhDaiDien}}" alt="" width="72"></a>
                            <div class="media-body">
                                <h2 class="fz-body text-overflow-1-lines mb-2">
                                    <a href="#" class="d-block">{{$danhgiacao -> TenTruyen}}</a>
                                </h2>
                                <div class="d-flex align-items-center mb-2">
                                    <div class="bg-danger rounded-3 h6 my-0 mr-3 text-white px-2 py-1">
                                        {{$danhgiacao -> DanhGiaTB}}
                                    </div>
                                    <div class="text-success">
                                        xx đánh giá
                                    </div>
                                </div>
                                <div class="text-secondary fz-14 text-overflow-2-lines">
                                    {{$danhgiacao -> MoTa}}
                                </div>
                                <div class="d-flex align-items-center mt-2 py-1">
                                    <div class="d-flex align-items-center mr-auto text-secondary">
                                        <span class="truncate-140 text-left">
                                            <i class="nh-icon icon-user-edit mr-1"></i>
                                            {{$danhgiacao -> TenTacGia}}
                                        </span>
                                    </div>
                                    <a href="">
                                        <span class="d-inline-block border border-primary small px-2 text-primary truncate-100">{{$danhgiacao -> LuotXem}}</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                    <hr>
                @endforeach
            </section>
        </div>
        <div class="col-4">
            <div class="d-flex align-items-center mb-4">
                <h2 class="h4 m-0 font-weight-semibold">
                    Mới đánh giá
                </h2>
                <a href="#" class="link--see-more ml-auto text-primary">
                    Xem tất cả
                </a>
            </div>
            <ul class="list-unstyled">
                @foreach($danhgiamois as $danhgiamoi)
                <li class="px-4 py-3 pb-4 bg-yellow-white rounded-2 mb-3">
                    <div class="d-flex align-items-center">
                        <div class="mr-2">
                            <a href=""><img src="{{$danhgiamoi -> AnhDaiDien}}" alt="Shivuuuuuuuuu" width="45" height="45" class="rounded-circle overflow-hidden mr-2"></a>
                        </div>
                        <div class="pl-1">
                            <div class="text-secondary">
                                <a href="" class="font-weight-semibold text-body">{{$danhgiamoi -> name}}</a>
                                đánh giá
                            </div>
                            <a href="" class="text-danger font-weight-semibold">{{$danhgiamoi -> TenTruyen}}</a>
                        </div>
                        <div class="ml-auto bg-danger rounded-3 h6 my-0 text-white px-2 py-1">
                            {{$danhgiamoi -> DanhGia}}
                        </div>
                    </div>
                    <div class="mt-2 pt-1 text-overflow-3-lines">
                        {{$danhgiamoi -> NoiDungBL}}
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
