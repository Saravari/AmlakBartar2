<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        @yield('title')
    </title>

    <link rel="stylesheet" type="text/css" href="assets/css/all.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="assets/bootstrap/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="assets/bootstrap/bootstrap-rtl.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css"
        integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />

    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"
        integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>
</head>

<body>
    @include('front.navbar')
    @yield('content')

    <script type="text/javascript" src="assets/js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="assets/js/scripts/thumbnailClick.js"></script>
    <script type="text/javascript" src="assets/js/scripts/login.js"></script>
    <script type="text/javascript" src="assets/js/scripts/search.js"></script>
    <script type="text/javascript" src="assets/js/scripts/enterCode.js"></script>
    <script type="text/javascript" src="assets/js/scripts/submenu.js"></script>
    <script type="text/javascript" src="assets/js/scripts/positioning.js"></script>
    <script type="text/javascript" src="assets/js/scripts/location.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
</body>

</html>
