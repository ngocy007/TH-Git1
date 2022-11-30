<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a href="/" class="navbar-brand mr-4"><img src="https://metruyencv.com/assets/images/logo.png?81123" alt="" height="48"></a>
        <div class="collapse navbar-collapse justify-content-between">
            <ul class="navbar-nav mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">Thể loại</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">Bảng xếp hạng</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </li>
            </ul>
            <form class="nav-item form-group ml-auto w-25">
                <input class="form-control rounded-pill" type="text" placeholder="Tìm kiếm" aria-label="Search">
            </form>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Đăng truyện</a>
                </li>
                @auth
                    @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                        <div class="shrink-0 mr-3">
                            <img class="rounded-full object-cover" style="height: 40px;width: 40px" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                        </div>
                    @endif

                    <form method="post" action="{{ route('logout') }}" >
                        @csrf
                        <button> logout </button>
                    </form>

                    <a href="{{ route('profile.show') }}">profile</a>
                    <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                @else
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{route('login')}}">Đăng nhập</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{route('register')}}">Đăng ký</a>
                    </li>
{{--                    editing--}}
                    <li class="dropdown py-3">
                        <a role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="d-flex align-items-center text-body px-3 py-2" style="cursor: pointer;">
                            <div class="nh-avatar nh-avatar--24 mr-2">
                                <img data-src="https://static.cdnno.com/user/default/50.jpg" src="https://static.cdnno.com/user/default/50.jpg" lazy="loaded"></div>
                            griTr84972
                        </a>
                        <div aria-labelledby="dropdown-profile" class="dropdown-menu dropdown-menu-right dropdown-menu--profile px-4 rounded-0">
                            <div class="media mb-4">
                                <div class="nh-avatar nh-avatar--45 mr-3">
                                    <img data-src="https://static.cdnno.com/user/default/50.jpg" src="https://static.cdnno.com/user/default/50.jpg" lazy="loaded">
                                </div>
                                <div class="media-body">
                                    <div class="font-weight-semibold mb-1">griTr84972</div>
                                    <ul class="list-unstyled d-flex flex-wrap">
                                        <li class="d-flex align-items-center mr-4">
                                            <i class="svg-icon icon-flower mr-2"></i>
                                            <a href="javascript:void(0)">0</a>
                                        </li>
                                        <li class="d-flex align-items-center">
                                            <i class="svg-icon icon-candy text-primary mr-2"></i>
                                            <a href="javascript:void(0)">0</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <ul class="list-unstyled m-0">
                                <li class="mt-2">
                                    <a href="/tai-khoan" class="d-block py-2">
                                        Hồ sơ
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)" class="d-block py-2">
                                        Đăng xuất
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    {{--                    end edit--}}
                @endauth


            </ul>


        </div>
    </div>
</nav>
