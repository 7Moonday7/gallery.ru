<!DOCTYPE html>
<html lang='ru'>
<head>
    <title>Картинная галерея</title>
    <meta name='viewport' content='width=device-width, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0'>
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Zilla+Slab'>
    <link rel='stylesheet' href='{{asset('public/css/muilessium-0.1.26.min.css')}}'>
    <link rel='stylesheet' href='{{asset('public/css/style.css')}}'>
</head>
<body>
<div id="app">
    <vr-arena-left></vr-arena-left>
    <vr-arena-center></vr-arena-center>
    <vr-arena-right></vr-arena-right>
    <div class='fake-cursor _allow-empty'></div>
</div>
<script src="public/js/app.js"></script>
<script src="{{asset('public/js/assets/muilessium-0.1.26.min.js')}}"></script>
<script src="{{asset('public/js/assets/three.min.js')}}"></script>
<script src="{{asset('public/js/assets/CSS3DStereoRenderer.js')}}"></script>
<script src="{{asset('public/js/assets/DeviceOrientationController.js')}}"></script>
<script src="{{asset('public/js/arena.js')}}"></script>
</body>
</html>
