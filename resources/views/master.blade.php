<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>Mê Truyện Chữ</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <link href="{{ asset('template/bootstrap3/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('template/assets/css/gsdk.css') }}" rel="stylesheet" />
</head>

<body>

<!-- header will come here -->
    @include('layout.header')
<!-- end navbar -->

<div class="wrapper">
    <div class="container">
    <h2>abc</h2>

    </div>
</div>

@include('layout.footer')
</body>

<!--  jQuery and Bootstrap core files    -->
<script src="{{ asset('template/assets/js/jquery.js') }}" type="text/javascript"></script>
<script src="{{ asset('template/assets/js/jquery-ui.custom.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('template/bootstrap3/js/bootstrap.min.js') }}" type="text/javascript"></script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>

<!--  Get Shit Done Kit PRO Core javascript 	 -->
<script src="{{ asset('template/assets/js/get-shit-done.js') }}"></script>

<!-- If you are using TypeKit.com uncomment this code otherwise you can delete it -->
<!--
<script src="https://use.typekit.net/[your kit code here].js"></script>
<script>try{Typekit.load({ async: true });}catch(e){}</script>
-->

<!-- If you have retina @2x images on your server which can be sent to iPhone/iPad/MacRetina, please uncomment the next line, otherwise you can delete it -->
<!-- <script src="assets/js/retina.min.js"></script> -->


</html>
