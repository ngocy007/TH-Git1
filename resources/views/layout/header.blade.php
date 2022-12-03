<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a href="/" class="navbar-brand mr-4"><img src="https://metruyencv.com/assets/images/logo.png?81123" alt="" height="48"></a>
        <div class="collapse navbar-collapse justify-content-between">
            <ul class="navbar-nav mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">Thể loại</a>
                    <ul class="dropdown-menu">
                        @php
                            use App\Models\TheLoai;
                           $theloai = TheLoai::all();
                        @endphp
                        @foreach($theloai as $th)
                        <li><a class="dropdown-item" href="{{route('theloai',$th -> id)}}">{{$th->TenLoai}}</a></li>
                        @endforeach
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="/leaderboard" data-bs-toggle="dropdown" aria-expanded="false">Bảng xếp hạng</a>
                    <ul class="dropdown-menu">

                        <li><a class="dropdown-item" href="/leaderboard?sort=1">Top lượt xem</a></li>
                        <li><a class="dropdown-item" href="/leaderboard?sort=2">Top theo dõi</a></li>
                        <li><a class="dropdown-item" href="/leaderboard?sort=3">Top mới cập nhật</a></li>
                        <li><a class="dropdown-item" href="/leaderboard?sort=4">Top đánh giá cao</a></li>

                    </ul>
                </li>
            </ul>
            <form method="get" class="nav-item pt-2 form-group w-25"  action="{{route('search')}}">
                <input class="form-control rounded-pill" type="text"  name="q" placeholder="Tìm kiếm" value="{{ request()->get('q') }}" aria-label="Search">
            </form>
            <a class="nav-item" aria-current="page" href="#">Đăng truyện</a>
            <ul class="navbar-nav">
                @auth
                    @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                <img class="rounded-pill object-cover" style="height: 40px;width: 40px" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu">
                                <li class="dropdown-item">{{ Auth::user()->email }}</li>
                                <li><a class="dropdown-item" href="{{ route('profile.show') }}">Hồ sơ</a></li>
                                <li><form class="dropdown-item " method="post" action="{{ route('logout') }}" >
                                        @csrf
                                        <button class="border-0 bg-light rounded-2">Đăng xuất</button>
                                    </form></li>
                                @csrf
                            </ul>
                        </li>
                    @endif
                @else
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{route('login')}}">Đăng nhập</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{route('register')}}">Đăng ký</a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
