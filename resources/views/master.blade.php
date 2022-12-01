<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>Mê Truyện Chữ</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    @include('layout.boot5css')
</head>

<body>

<!-- header will come here -->
    @include('layout.header')
<!-- end header -->

<div class="wrapper">
    <div class="container bg-gray">
    <h2>content here</h2>
     @yield('content')

    </div>
</div>
@include('layout.footer')
@include('layout.boot5js')
</body>
</html>
