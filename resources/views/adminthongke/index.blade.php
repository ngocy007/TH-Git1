@extends('adminindex')
@section('indexthongke')
    <div class="tab-content tab-content-basic">
        <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview">
            <div class="row">
                <div class="col-sm-12">
                    <div class="statistics-details d-flex align-items-center justify-content-between">
                        <div>
                            <p class="statistics-title">TỔNG SỐ TRUYỆN</p>
                            <h2 class="rate-percentage">{{$tk_t->truyen}}</h2>

                        </div>
                        <div>
                            <p class="statistics-title">TỔNG SỐ CHƯƠNG</p>
                            <h2 class="rate-percentage">{{$tk_c->chuong}}</h2>
                        </div>
                        <div>
                            <p class="statistics-title">TỔNG SỐ THỂ LOẠI</p>
                            <h2 class="rate-percentage">{{$tk_tl->theloai}}</h2>
                        </div>
                        <div class="d-none d-md-block">
                            <p class="statistics-title">TỔNG SỐ USER</p>
                            <h3 class="rate-percentage">{{$tk_u->user}}</h3>
                        </div>
                        <div class="d-none d-md-block">
                            <p class="statistics-title">TỔNG SỐ QUYỀN USER</p>
                            <h2 class="rate-percentage">{{$tk_q->quyen}}</h2>
                        </div>
                        <div class="d-none d-md-block">
                            <p class="statistics-title">TỔNG SỐ BÌNH LUẬN </p>
                            <h2 class="rate-percentage">{{$tk_b->binhluan}}</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 d-flex flex-column">
                    <div class="row flex-grow">
                        <div class="col-12 col-lg-4 col-lg-12 grid-margin stretch-card">
                            <div class="card card-rounded">
                                <div class="card-body">
                                    <div class="d-sm-flex justify-content-between align-items-start">
                                        <div>
                                            <h4 class="card-title card-title-dash">Biểu đồ</h4>
                                        </div>
                                        <div id="performance-line-legend"></div>
                                    </div>
                                    <div class="chartjs-wrapper mt-5">
                                        <canvas id="performaneLine"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 d-flex flex-column">
                    <div class="row flex-grow">
                        <div class="col-md-6 col-lg-12 grid-margin stretch-card">
                            <div class="card bg-primary card-rounded">
                                <div class="card-body pb-0">
                                    <h4 class="card-title card-title-dash text-white mb-4">Status Summary</h4>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <p class="status-summary-ight-white mb-1">Closed Value</p>
                                            <h2 class="text-info">357</h2>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="status-summary-chart-wrapper pb-4">
                                                <canvas id="status-summary"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-12 grid-margin stretch-card">
                            <div class="card card-rounded">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="d-flex justify-content-between align-items-center mb-2 mb-sm-0">
                                                <div class="circle-progress-width">
                                                    <div id="totalVisitors" class="progressbar-js-circle pr-2"></div>
                                                </div>
                                                <div>
                                                    <p class="text-small mb-2">Total Visitors</p>
                                                    <h4 class="mb-0 fw-bold">26.80%</h4>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="circle-progress-width">
                                                    <div id="visitperday" class="progressbar-js-circle pr-2"></div>
                                                </div>
                                                <div>
                                                    <p class="text-small mb-2">Visits per day</p>
                                                    <h4 class="mb-0 fw-bold">9065</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

@endsection
